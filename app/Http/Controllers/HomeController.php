<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $featuredProducts = Product::where('featured', true)
            ->where('active', true)
            ->with('category')
            ->limit(6)
            ->get();

        $categories = Category::where('active', true)
            ->withCount('products')
            ->get();

        return view('home', compact('featuredProducts', 'categories'));
    }
}
