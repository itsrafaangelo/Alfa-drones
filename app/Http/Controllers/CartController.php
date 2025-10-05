<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        $cartItems = [];
        $total = 0;

        foreach ($cart as $id => $details) {
            $product = Product::find($id);
            if ($product) {
                $cartItems[] = [
                    'product' => $product,
                    'quantity' => $details['quantity'],
                    'subtotal' => $product->current_price * $details['quantity']
                ];
                $total += $product->current_price * $details['quantity'];
            }
        }

        return view('cart.index', compact('cartItems', 'total'));
    }

    public function add(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $quantity = $request->input('quantity', 1);

        if ($quantity <= 0) {
            return back()->with('error', 'Quantidade deve ser maior que zero.');
        }

        if ($product->stock_quantity < $quantity) {
            return back()->with('error', 'Quantidade solicitada não disponível em estoque.');
        }

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $newQuantity = $cart[$id]['quantity'] + $quantity;
            if ($newQuantity > $product->stock_quantity) {
                return back()->with('error', 'Quantidade total excede o estoque disponível.');
            }
            $cart[$id]['quantity'] = $newQuantity;
        } else {
            $cart[$id] = [
                'quantity' => $quantity,
                'name' => $product->name,
                'price' => $product->current_price
            ];
        }

        session()->put('cart', $cart);

        return back()->with('success', 'Produto adicionado ao carrinho!');
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $quantity = $request->input('quantity');

        if ($quantity <= 0) {
            return $this->remove($id);
        }

        if ($product->stock_quantity < $quantity) {
            return back()->with('error', 'Quantidade solicitada não disponível em estoque.');
        }

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] = $quantity;
            session()->put('cart', $cart);
        }

        return back()->with('success', 'Carrinho atualizado!');
    }

    public function remove($id)
    {
        $cart = session()->get('cart', []);
        unset($cart[$id]);
        session()->put('cart', $cart);

        return back()->with('success', 'Produto removido do carrinho!');
    }

    public function clear()
    {
        session()->forget('cart');
        return back()->with('success', 'Carrinho limpo!');
    }

    public function checkout()
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('products.index')->with('error', 'Carrinho vazio.');
        }

        $cartItems = [];
        $total = 0;

        foreach ($cart as $id => $details) {
            $product = Product::find($id);
            if ($product) {
                $cartItems[] = [
                    'product' => $product,
                    'quantity' => $details['quantity'],
                    'subtotal' => $product->current_price * $details['quantity']
                ];
                $total += $product->current_price * $details['quantity'];
            }
        }

        return view('cart.checkout', compact('cartItems', 'total'));
    }

    public function processOrder(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
            'customer_phone' => 'required|string|max:20',
            'shipping_address' => 'required|string|max:500',
            'payment_method' => 'required|in:dinheiro,pix,cartao',
        ]);

        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('products.index')->with('error', 'Carrinho vazio.');
        }

        DB::beginTransaction();

        try {
            // Verificar estoque novamente antes de processar
            foreach ($cart as $id => $details) {
                $product = Product::find($id);
                if (!$product || $product->stock_quantity < $details['quantity']) {
                    DB::rollback();
                    return back()->with('error', 'Produto indisponível ou estoque insuficiente.');
                }
            }

            // Criar pedido
            $order = Order::create([
                'customer_name' => $request->customer_name,
                'customer_email' => $request->customer_email,
                'customer_phone' => $request->customer_phone,
                'customer_address' => $request->shipping_address,
                'status' => 'pending',
                'total_amount' => $this->calculateTotal($cart),
                'notes' => 'Forma de pagamento: ' . ucfirst($request->payment_method),
            ]);

            // Criar itens do pedido e atualizar estoque
            foreach ($cart as $id => $details) {
                $product = Product::find($id);

                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $id,
                    'quantity' => $details['quantity'],
                    'price' => $product->current_price,
                ]);

                // Atualizar estoque
                $product->decrement('stock_quantity', $details['quantity']);
                $product->increment('sold_quantity', $details['quantity']);
            }

            DB::commit();

            // Limpar carrinho
            session()->forget('cart');

            return redirect()->route('cart.success', $order->id)
                ->with('success', 'Pedido realizado com sucesso!');
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('error', 'Erro ao processar pedido. Tente novamente.');
        }
    }

    public function success($orderId)
    {
        $order = Order::with('orderItems.product')->findOrFail($orderId);
        return view('cart.success', compact('order'));
    }

    private function calculateTotal($cart)
    {
        $total = 0;
        foreach ($cart as $id => $details) {
            $product = Product::find($id);
            if ($product) {
                $total += $product->current_price * $details['quantity'];
            }
        }
        return $total;
    }

    public function getCartCount()
    {
        $cart = session()->get('cart', []);
        $count = array_sum(array_column($cart, 'quantity'));
        return response()->json(['count' => $count]);
    }
}
