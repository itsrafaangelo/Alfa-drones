<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class InventoryController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with('category');

        // Filtros
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('sku', 'like', "%{$search}%")
                    ->orWhere('barcode', 'like', "%{$search}%");
            });
        }

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('stock_status')) {
            switch ($request->stock_status) {
                case 'low':
                    $query->lowStock();
                    break;
                case 'out':
                    $query->where('stock_quantity', 0);
                    break;
                case 'in_stock':
                    $query->where('stock_quantity', '>', 0);
                    break;
            }
        }

        $products = $query->orderBy('name')->paginate(15);
        $categories = Category::orderBy('name')->get();

        return view('inventory.index', compact('products', 'categories'));
    }

    public function create()
    {
        $categories = Category::orderBy('name')->get();
        return view('inventory.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'sku' => 'nullable|string|max:100|unique:products,sku',
            'barcode' => 'nullable|string|max:100',
            'description' => 'required|string',
            'short_description' => 'nullable|string|max:500',
            'price' => 'required|numeric|min:0',
            'sale_price' => 'nullable|numeric|min:0',
            'cost_price' => 'nullable|numeric|min:0',
            'stock_quantity' => 'required|integer|min:0',
            'min_stock_level' => 'required|integer|min:0',
            'status' => 'required|in:ativo,inativo,descontinuado',
            'active' => 'boolean',
            'featured' => 'boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $validated['slug'] = Str::slug($validated['name']);
        $validated['active'] = $request->has('active');
        $validated['featured'] = $request->has('featured');

        // Upload da imagem
        if ($request->hasFile('image')) {
            $validated['image_path'] = $request->file('image')->store('products', 'public');
        }

        Product::create($validated);

        return redirect()->route('inventory.index')
            ->with('success', 'Produto cadastrado com sucesso!');
    }

    public function show(Product $product)
    {
        $product->load('category', 'orderItems');
        return view('inventory.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $categories = Category::orderBy('name')->get();
        return view('inventory.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'sku' => [
                'nullable',
                'string',
                'max:100',
                Rule::unique('products', 'sku')->ignore($product->id)
            ],
            'barcode' => 'nullable|string|max:100',
            'description' => 'required|string',
            'short_description' => 'nullable|string|max:500',
            'price' => 'required|numeric|min:0',
            'sale_price' => 'nullable|numeric|min:0',
            'cost_price' => 'nullable|numeric|min:0',
            'stock_quantity' => 'required|integer|min:0',
            'min_stock_level' => 'required|integer|min:0',
            'status' => 'required|in:ativo,inativo,descontinuado',
            'active' => 'boolean',
            'featured' => 'boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'remove_current_image' => 'boolean',
        ]);

        $validated['slug'] = Str::slug($validated['name']);
        $validated['active'] = $request->has('active');
        $validated['featured'] = $request->has('featured');

        // Gerenciar imagem
        if ($request->has('remove_current_image') && $request->remove_current_image) {
            // Remover imagem atual
            if ($product->image_path && Storage::disk('public')->exists($product->image_path)) {
                Storage::disk('public')->delete($product->image_path);
            }
            $validated['image_path'] = null;
        } elseif ($request->hasFile('image')) {
            // Upload nova imagem
            if ($product->image_path && Storage::disk('public')->exists($product->image_path)) {
                Storage::disk('public')->delete($product->image_path);
            }
            $validated['image_path'] = $request->file('image')->store('products', 'public');
        }

        $product->update($validated);

        return redirect()->route('inventory.index')
            ->with('success', 'Produto atualizado com sucesso!');
    }

    public function destroy(Product $product)
    {
        // Verificar se o produto tem pedidos associados
        if ($product->orderItems()->exists()) {
            return redirect()->route('inventory.index')
                ->with('error', 'Não é possível excluir um produto que possui pedidos associados.');
        }

        // Remover imagem se existir
        if ($product->image_path && Storage::disk('public')->exists($product->image_path)) {
            Storage::disk('public')->delete($product->image_path);
        }

        $product->delete();

        return redirect()->route('inventory.index')
            ->with('success', 'Produto excluído com sucesso!');
    }

    public function adjustStock(Request $request, Product $product)
    {
        $validated = $request->validate([
            'adjustment_type' => 'required|in:add,remove,set',
            'quantity' => 'required|integer|min:1',
            'reason' => 'nullable|string|max:255',
        ]);

        $oldQuantity = $product->stock_quantity;

        switch ($validated['adjustment_type']) {
            case 'add':
                $product->stock_quantity += $validated['quantity'];
                break;
            case 'remove':
                $product->stock_quantity = max(0, $product->stock_quantity - $validated['quantity']);
                break;
            case 'set':
                $product->stock_quantity = $validated['quantity'];
                break;
        }

        $product->save();

        $message = "Estoque ajustado de {$oldQuantity} para {$product->stock_quantity}";
        if ($validated['reason']) {
            $message .= " (Motivo: {$validated['reason']})";
        }

        return redirect()->route('inventory.show', $product)
            ->with('success', $message);
    }

    public function updatePrice(Request $request, Product $product)
    {
        $validated = $request->validate([
            'price' => 'required|numeric|min:0',
            'sale_price' => 'nullable|numeric|min:0',
            'cost_price' => 'nullable|numeric|min:0',
        ]);

        $product->update($validated);

        return redirect()->route('inventory.show', $product)
            ->with('success', 'Preços atualizados com sucesso!');
    }

    public function reports()
    {
        $stats = [
            'total_products' => Product::count(),
            'active_products' => Product::where('status', 'ativo')->count(),
            'low_stock_products' => Product::lowStock()->count(),
            'out_of_stock_products' => Product::where('stock_quantity', 0)->count(),
            'total_stock_value' => Product::sum(DB::raw('stock_quantity * price')),
            'total_sold_quantity' => Product::sum('sold_quantity'),
        ];

        $lowStockProducts = Product::lowStock()->with('category')->get();
        $topSellingProducts = Product::orderBy('sold_quantity', 'desc')->limit(10)->get();

        return view('inventory.reports', compact('stats', 'lowStockProducts', 'topSellingProducts'));
    }
}
