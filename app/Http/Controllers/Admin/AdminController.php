<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Order;
use App\Models\Category;
use App\Models\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $totalProducts = Product::count();
        $totalOrders = Order::count();
        $totalCategories = Category::count();
        $pendingOrders = Order::where('status', 'pending')->count();
        $lowStockProducts = Product::lowStock()->count();

        $recentOrders = Order::with('orderItems.product')
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        // Buscar alertas estáticos do banco de dados
        $staticAlerts = Alert::active()->byPriority()->get();

        // Gerar alertas dinâmicos baseados em dados reais do sistema
        $dynamicAlerts = $this->generateDynamicAlerts($lowStockProducts, $pendingOrders);

        // Combinar alertas dinâmicos e estáticos
        $alerts = $dynamicAlerts->merge($staticAlerts)->sortByDesc('priority')->take(5);

        return view('admin.dashboard', compact(
            'totalProducts',
            'totalOrders',
            'totalCategories',
            'pendingOrders',
            'recentOrders',
            'alerts'
        ));
    }

    private function generateDynamicAlerts($lowStockProducts, $pendingOrders)
    {
        $dynamicAlerts = collect();

        // Alerta de estoque baixo
        if ($lowStockProducts > 0) {
            $dynamicAlerts->push((object) [
                'id' => 'dynamic-' . uniqid(),
                'type' => 'warning',
                'title' => 'Estoque Baixo',
                'message' => "{$lowStockProducts} produto(s) com estoque crítico",
                'icon' => 'exclamation',
                'priority' => 10,
                'is_dynamic' => true,
            ]);
        }

        // Alerta de pedidos pendentes
        if ($pendingOrders > 0) {
            $dynamicAlerts->push((object) [
                'id' => 'dynamic-' . uniqid(),
                'type' => 'info',
                'title' => 'Pedidos Pendentes',
                'message' => "{$pendingOrders} pedido(s) aguardando processamento",
                'icon' => 'clock',
                'priority' => 8,
                'is_dynamic' => true,
            ]);
        }

        return $dynamicAlerts;
    }
}
