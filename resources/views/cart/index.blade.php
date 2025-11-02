@php
use Illuminate\Support\Facades\Storage;
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Carrinho - ALFA DRONES</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50">
    <!-- Navbar -->
    <nav class="bg-white shadow-sm border-b border-gray-200 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <div class="flex items-center flex-shrink-0">
                    <a href="{{ route('home') }}" class="flex items-center">
                        <img src="{{ asset('images/logo.png') }}" alt="Alfa Drones Logo" class="h-12 md:h-16 w-auto">
                    </a>
                </div>

                <!-- Menu de Navegação -->
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-8">
                        <a href="{{ route('home') }}" class="text-gray-700 hover:text-red-600 px-3 py-2 text-sm font-medium transition-colors duration-200">Home</a>
                        <a href="{{ route('products.index') }}" class="text-gray-700 hover:text-red-600 px-3 py-2 text-sm font-medium transition-colors duration-200">Produtos</a>
                        <a href="{{ route('cart.index') }}" class="text-red-600 px-3 py-2 text-sm font-medium flex items-center space-x-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-2.5 5M7 13l2.5 5m0 0L17 18m-7.5-5l7.5-5" />
                            </svg>
                            <span>Carrinho</span>
                        </a>
                        @auth
                        <a href="{{ route('admin.dashboard') }}" class="bg-red-600 text-white px-4 py-2 rounded-md text-sm font-medium hover:bg-red-700 transition-colors duration-200">Admin</a>
                        @else
                        <a href="{{ route('login') }}" class="bg-red-600 text-white px-4 py-2 rounded-md text-sm font-medium hover:bg-red-700 transition-colors duration-200">Login</a>
                        @endauth
                    </div>
                </div>

                <!-- Menu Mobile: Carrinho e Hamburger -->
                <div class="md:hidden flex items-center space-x-2">
                    <!-- Botão Carrinho Mobile -->
                    <a href="{{ route('cart.index') }}" class="relative inline-flex items-center justify-center p-2 rounded-md text-red-600 hover:text-red-900 hover:bg-red-50 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-red-500">
                        <span class="sr-only">Carrinho</span>
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-2.5 5M7 13l2.5 5m0 0L17 18m-7.5-5l7.5-5" />
                        </svg>
                    </a>
                    <!-- Botão Hamburger -->
                    <button type="button" id="mobile-menu-button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-600 hover:text-gray-900 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-red-500">
                        <span class="sr-only">Abrir menu principal</span>
                        <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Menu Mobile -->
        <div class="md:hidden hidden" id="mobile-menu">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3 bg-white border-t border-gray-200">
                <a href="{{ route('home') }}" class="text-gray-700 hover:text-red-600 block px-3 py-2 text-base font-medium">Home</a>
                <a href="{{ route('products.index') }}" class="text-gray-700 hover:text-red-600 block px-3 py-2 text-base font-medium">Produtos</a>
                <a href="{{ route('cart.index') }}" class="text-red-600 flex items-center px-3 py-2 text-base font-medium">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-2.5 5M7 13l2.5 5m0 0L17 18m-7.5-5l7.5-5" />
                    </svg>
                    Carrinho
                </a>
                @auth
                <a href="{{ route('admin.dashboard') }}" class="bg-red-600 text-white block px-3 py-2 text-base font-medium rounded-md">Admin</a>
                @else
                <a href="{{ route('login') }}" class="bg-red-600 text-white block px-3 py-2 text-base font-medium rounded-md">Login</a>
                @endauth
            </div>
        </div>
    </nav>

    <script>
        // Menu mobile toggle
        document.addEventListener('DOMContentLoaded', function() {
            const button = document.getElementById('mobile-menu-button');
            const menu = document.getElementById('mobile-menu');

            if (button && menu) {
                button.addEventListener('click', function() {
                    menu.classList.toggle('hidden');
                });
            }
        });
    </script>

    <!-- Header -->
    <div class="bg-white border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 md:py-8">
            <h1 class="text-2xl md:text-3xl font-bold text-gray-900">Carrinho de Compras</h1>
            <p class="text-sm md:text-base text-gray-600 mt-2">Revise seus produtos antes de finalizar a compra</p>
        </div>
    </div>

    <!-- Conteúdo -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 overflow-x-hidden">
        @if(session('success'))
        <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg">
            {{ session('success') }}
        </div>
        @endif

        @if(session('error'))
        <div class="mb-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg">
            {{ session('error') }}
        </div>
        @endif

        @if(count($cartItems) > 0)
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Lista de Produtos -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-lg shadow-sm border border-gray-200">
                    <div class="p-4 md:p-6">
                        <h2 class="text-base md:text-lg font-semibold text-gray-900 mb-4">Produtos no Carrinho</h2>

                        <div class="space-y-4">
                            @foreach($cartItems as $item)
                            <div class="flex flex-col md:flex-row md:items-center gap-4 p-4 border border-gray-200 rounded-lg">
                                <!-- Imagem e Informações do Produto -->
                                <div class="flex items-start space-x-4 flex-1 min-w-0">
                                    <!-- Imagem do Produto -->
                                    <div class="flex-shrink-0">
                                        @if($item['product']->image_path)
                                        <img src="{{ Storage::url($item['product']->image_path) }}"
                                            alt="{{ $item['product']->name }}"
                                            class="w-20 h-20 md:w-24 md:h-24 object-cover rounded-lg">
                                        @else
                                        <div class="w-20 h-20 md:w-24 md:h-24 bg-gray-100 rounded-lg flex items-center justify-center">
                                            <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                                            </svg>
                                        </div>
                                        @endif
                                    </div>

                                    <!-- Informações do Produto -->
                                    <div class="flex-1 min-w-0">
                                        <h3 class="text-base md:text-lg font-medium text-gray-900 break-words">{{ $item['product']->name }}</h3>
                                        <p class="text-sm text-gray-600 mt-1">{{ $item['product']->category->name }}</p>
                                        <p class="text-base md:text-lg font-semibold text-red-600 mt-2">
                                            R$ {{ number_format($item['product']->current_price, 2, ',', '.') }}
                                        </p>
                                    </div>
                                </div>

                                <!-- Controles de Quantidade e Preço -->
                                <div class="flex flex-col md:flex-row md:items-center gap-4">
                                    <!-- Controles de Quantidade -->
                                    <div class="flex items-center justify-center md:justify-start space-x-2">
                                        <form method="POST" action="{{ route('cart.update', $item['product']->id) }}" class="flex items-center space-x-2">
                                            @csrf
                                            <button type="submit" name="quantity" value="{{ $item['quantity'] - 1 }}"
                                                class="w-8 h-8 rounded-full bg-gray-200 hover:bg-gray-300 flex items-center justify-center transition-colors duration-200 disabled:opacity-50 disabled:cursor-not-allowed"
                                                {{ $item['quantity'] <= 1 ? 'disabled' : '' }}>
                                                <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
                                                </svg>
                                            </button>

                                            <input type="number" value="{{ $item['quantity'] }}" min="1" max="{{ $item['product']->stock_quantity }}"
                                                class="w-16 px-2 py-1 text-center border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500"
                                                onchange="this.form.submit()">

                                            <button type="submit" name="quantity" value="{{ $item['quantity'] + 1 }}"
                                                class="w-8 h-8 rounded-full bg-gray-200 hover:bg-gray-300 flex items-center justify-center transition-colors duration-200 disabled:opacity-50 disabled:cursor-not-allowed"
                                                {{ $item['quantity'] >= $item['product']->stock_quantity ? 'disabled' : '' }}>
                                                <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>

                                    <!-- Subtotal e Remover -->
                                    <div class="text-center md:text-right flex flex-col md:block">
                                        <p class="text-lg font-semibold text-gray-900">
                                            R$ {{ number_format($item['subtotal'], 2, ',', '.') }}
                                        </p>
                                        <form method="POST" action="{{ route('cart.remove', $item['product']->id) }}" class="mt-2">
                                            @csrf
                                            <button type="submit" class="text-red-600 hover:text-red-800 text-sm font-medium transition-colors duration-200">
                                                Remover
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>

                        <!-- Limpar Carrinho -->
                        <div class="mt-6 pt-6 border-t border-gray-200">
                            <form method="POST" action="{{ route('cart.clear') }}" onsubmit="return confirm('Tem certeza que deseja limpar o carrinho?')">
                                @csrf
                                <button type="submit" class="text-red-600 hover:text-red-800 text-sm font-medium transition-colors duration-200">
                                    Limpar Carrinho
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Resumo do Pedido -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 sticky top-24">
                    <div class="p-6">
                        <h2 class="text-lg font-semibold text-gray-900 mb-4">Resumo do Pedido</h2>

                        <div class="space-y-3 mb-6">
                            @foreach($cartItems as $item)
                            <div class="flex justify-between text-sm">
                                <span class="text-gray-600">{{ $item['product']->name }} ({{ $item['quantity'] }}x)</span>
                                <span class="font-medium">R$ {{ number_format($item['subtotal'], 2, ',', '.') }}</span>
                            </div>
                            @endforeach
                        </div>

                        <div class="border-t border-gray-200 pt-4">
                            <div class="flex justify-between text-lg font-semibold">
                                <span>Total:</span>
                                <span class="text-red-600">R$ {{ number_format($total, 2, ',', '.') }}</span>
                            </div>
                        </div>

                        <div class="mt-6 space-y-3">
                            <a href="{{ route('cart.checkout') }}"
                                class="w-full bg-red-600 hover:bg-red-700 text-white font-medium py-3 px-4 rounded-lg transition-colors duration-200 text-center block">
                                Finalizar Compra
                            </a>

                            <a href="{{ route('products.index') }}"
                                class="w-full bg-gray-200 hover:bg-gray-300 text-gray-800 font-medium py-3 px-4 rounded-lg transition-colors duration-200 text-center block">
                                Continuar Comprando
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @else
        <!-- Carrinho Vazio -->
        <div class="text-center py-16">
            <svg class="w-24 h-24 text-gray-400 mx-auto mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-2.5 5M7 13l2.5 5m0 0L17 18m-7.5-5l7.5-5" />
            </svg>
            <h2 class="text-2xl font-bold text-gray-900 mb-4">Seu carrinho está vazio</h2>
            <p class="text-gray-600 mb-8">Adicione alguns produtos para começar sua compra.</p>
            <a href="{{ route('products.index') }}"
                class="inline-flex items-center px-6 py-3 bg-red-600 hover:bg-red-700 text-white font-medium rounded-lg transition-colors duration-200">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                Continuar Comprando
            </a>
        </div>
        @endif
    </div>

    <!-- Footer -->
    <footer class="bg-gray-100 border-t border-gray-200 py-12 mt-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <div class="flex items-center justify-center mb-4">
                    <img src="{{ asset('images/logo.png') }}" alt="Alfa Drones Logo" class="h-16 w-auto">
                </div>
                <p class="text-gray-600 mb-4">Especializada em soluções inovadoras com drones</p>
                <div class="border-t border-gray-300 pt-4 text-gray-600">
                    <p>&copy; {{ date('Y') }} Alfa Drones. Todos os direitos reservados.</p>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>