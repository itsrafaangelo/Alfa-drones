<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AgricultureController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AlertController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use Illuminate\Support\Facades\Route;

// Rotas públicas
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/agricultura', [AgricultureController::class, 'index'])->name('agriculture.index');
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
    return redirect()->route('admin.pedidos.index');
})->middleware(['auth', 'verified'])->name('dashboard');

// Rotas administrativas (protegidas por autenticação)
Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () {
        return redirect()->route('admin.pedidos.index');
    });
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

    // Alertas
    Route::get('alertas', [AlertController::class, 'index'])->name('alertas.index');
    Route::post('alertas/{id}/toggle', [AlertController::class, 'toggle'])->name('alertas.toggle');
    Route::delete('alertas/{id}', [AlertController::class, 'destroy'])->name('alertas.destroy');

    // Pedidos
    Route::get('pedidos', [AdminOrderController::class, 'index'])->name('pedidos.index');
    Route::get('pedidos/{order}', [AdminOrderController::class, 'show'])->name('pedidos.show');
    Route::post('pedidos/{order}/status', [AdminOrderController::class, 'updateStatus'])->name('pedidos.update-status');
});

// Rotas do sistema de controle de estoque no padrão admin
Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    // Rotas principais do estoque
    Route::get('estoque', [InventoryController::class, 'index'])->name('estoque.index');
    Route::get('estoque/create', [InventoryController::class, 'create'])->name('estoque.create');
    Route::post('estoque', [InventoryController::class, 'store'])->name('estoque.store');
    Route::get('estoque/{product}', [InventoryController::class, 'show'])->name('estoque.show');
    Route::get('estoque/{product}/edit', [InventoryController::class, 'edit'])->name('estoque.edit');
    Route::put('estoque/{product}', [InventoryController::class, 'update'])->name('estoque.update');
    Route::delete('estoque/{product}', [InventoryController::class, 'destroy'])->name('estoque.destroy');

    // Toggle actions
    Route::post('estoque/{product}/toggle-status', [InventoryController::class, 'toggleStatus'])->name('estoque.toggle-status');
    Route::post('estoque/{product}/toggle-featured', [InventoryController::class, 'toggleFeatured'])->name('estoque.toggle-featured');

    // Rotas específicas para ajuste de estoque e preços
    Route::post('estoque/{product}/adjust-stock', [InventoryController::class, 'adjustStock'])->name('estoque.adjust-stock');
    Route::post('estoque/{product}/update-price', [InventoryController::class, 'updatePrice'])->name('estoque.update-price');

    // Rota para relatórios
    Route::get('relatorios', [InventoryController::class, 'reports'])->name('relatorios.index');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
