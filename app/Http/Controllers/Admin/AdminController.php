<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Order;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $totalProducts = Product::count();
        $totalOrders = Order::count();
        $totalCategories = Category::count();
        $pendingOrders = Order::where('status', 'pending')->count();

        $recentOrders = Order::with('orderItems.product')
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        return view('admin.dashboard', compact(
            'totalProducts',
            'totalOrders',
            'totalCategories',
            'pendingOrders',
            'recentOrders'
        ));
    }
}
