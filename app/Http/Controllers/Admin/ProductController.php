<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->paginate(15);
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::where('active', true)->get();
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'category_id' => 'required|exists:categories,id',
            'description' => 'required',
            'price' => 'required|numeric|min:0',
            'stock_quantity' => 'required|integer|min:0',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->name);

        if ($request->has('images')) {
            $data['images'] = $request->images;
        }

        if ($request->has('specifications')) {
            $data['specifications'] = $request->specifications;
        }

        Product::create($data);

        return redirect()->route('admin.products.index')
            ->with('success', 'Produto criado com sucesso!');
    }

    public function edit(Product $product)
    {
        $categories = Category::where('active', true)->get();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|max:255',
            'category_id' => 'required|exists:categories,id',
            'description' => 'required',
            'price' => 'required|numeric|min:0',
            'stock_quantity' => 'required|integer|min:0',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->name);

        if ($request->has('images')) {
            $data['images'] = $request->images;
        }

        if ($request->has('specifications')) {
            $data['specifications'] = $request->specifications;
        }

        $product->update($data);

        return redirect()->route('admin.products.index')
            ->with('success', 'Produto atualizado com sucesso!');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.products.index')
            ->with('success', 'Produto excluído com sucesso!');
    }
}
