<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
            'customer_phone' => 'required|string|max:20',
            'customer_address' => 'required|string',
            'items' => 'required|array|min:1',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.quantity' => 'required|integer|min:1',
        ]);

        $totalAmount = 0;
        $orderItems = [];

        foreach ($request->items as $item) {
            $product = Product::findOrFail($item['product_id']);
            $itemTotal = $product->current_price * $item['quantity'];
            $totalAmount += $itemTotal;

            $orderItems[] = [
                'product_id' => $product->id,
                'quantity' => $item['quantity'],
                'price' => $product->current_price,
            ];
        }

        $order = Order::create([
            'customer_name' => $request->customer_name,
            'customer_email' => $request->customer_email,
            'customer_phone' => $request->customer_phone,
            'customer_address' => $request->customer_address,
            'total_amount' => $totalAmount,
            'notes' => $request->notes,
        ]);

        foreach ($orderItems as $orderItem) {
            $orderItem['order_id'] = $order->id;
            OrderItem::create($orderItem);
        }

        return response()->json([
            'success' => true,
            'message' => 'Pedido criado com sucesso!',
            'order_number' => $order->order_number
        ]);
    }
}
