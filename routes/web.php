<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use Illuminate\Support\Facades\Route;

// Rotas públicas
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/produtos', [ProductController::class, 'index'])->name('products.index');
Route::get('/produto/{slug}', [ProductController::class, 'show'])->name('products.show');

// Rotas do carrinho
Route::get('/carrinho', [CartController::class, 'index'])->name('cart.index');
Route::post('/carrinho/adicionar/{id}', [CartController::class, 'add'])->name('cart.add');
Route::post('/carrinho/atualizar/{id}', [CartController::class, 'update'])->name('cart.update');
Route::post('/carrinho/remover/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/carrinho/limpar', [CartController::class, 'clear'])->name('cart.clear');
Route::get('/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
Route::post('/checkout/processar', [CartController::class, 'processOrder'])->name('cart.process');
Route::get('/pedido-sucesso/{id}', [CartController::class, 'success'])->name('cart.success');

// Rotas de pedidos
Route::post('/pedido', [OrderController::class, 'store'])->name('orders.store');

// Dashboard original do Breeze redirecionado para admin
Route::get('/dashboard', function () {
    return redirect()->route('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Rotas administrativas (protegidas por autenticação)
Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');

    // Produtos
    Route::resource('produtos', AdminProductController::class, [
        'names' => [
            'index' => 'products.index',
            'create' => 'products.create',
            'store' => 'products.store',
            'show' => 'products.show',
            'edit' => 'products.edit',
            'update' => 'products.update',
            'destroy' => 'products.destroy',
        ]
    ]);
});

// Rotas do sistema de controle de estoque (protegidas por autenticação)
Route::middleware(['auth', 'verified'])->group(function () {
    // Rotas principais do estoque
    Route::get('inventory', [InventoryController::class, 'index'])->name('inventory.index');
    Route::get('inventory/create', [InventoryController::class, 'create'])->name('inventory.create');
    Route::post('inventory', [InventoryController::class, 'store'])->name('inventory.store');
    Route::get('inventory/{product}', [InventoryController::class, 'show'])->name('inventory.show');
    Route::get('inventory/{product}/edit', [InventoryController::class, 'edit'])->name('inventory.edit');
    Route::put('inventory/{product}', [InventoryController::class, 'update'])->name('inventory.update');
    Route::delete('inventory/{product}', [InventoryController::class, 'destroy'])->name('inventory.destroy');

    // Rotas específicas para ajuste de estoque e preços
    Route::post('inventory/{product}/adjust-stock', [InventoryController::class, 'adjustStock'])->name('inventory.adjust-stock');
    Route::post('inventory/{product}/update-price', [InventoryController::class, 'updatePrice'])->name('inventory.update-price');
    Route::get('inventory-reports', [InventoryController::class, 'reports'])->name('inventory.reports');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
