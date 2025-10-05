@php
use Illuminate\Support\Facades\Storage;
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pedido Confirmado - ALFA DRONES</title>
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
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="flex items-center">
                        <div class="w-8 h-8 bg-red-600 rounded-sm mr-3 flex items-center justify-center">
                            <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5" />
                            </svg>
                        </div>
                        <span class="text-xl font-bold text-gray-900">ALFA DRONES</span>
                        <span class="text-xs text-gray-500 ml-2">SOLUÇÕES E IMAGENS</span>
                    </a>
                </div>

                <!-- Menu de Navegação -->
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-8">
                        <a href="{{ route('home') }}" class="text-gray-700 hover:text-red-600 px-3 py-2 text-sm font-medium transition-colors duration-200">Home</a>
                        <a href="{{ route('products.index') }}" class="text-gray-700 hover:text-red-600 px-3 py-2 text-sm font-medium transition-colors duration-200">Produtos</a>
                        <a href="{{ route('cart.index') }}" class="text-gray-700 hover:text-red-600 px-3 py-2 text-sm font-medium transition-colors duration-200">Carrinho</a>
                        @auth
                        <a href="{{ route('admin.dashboard') }}" class="bg-red-600 text-white px-4 py-2 rounded-md text-sm font-medium hover:bg-red-700 transition-colors duration-200">Admin</a>
                        @else
                        <a href="{{ route('login') }}" class="bg-red-600 text-white px-4 py-2 rounded-md text-sm font-medium hover:bg-red-700 transition-colors duration-200">Login</a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Conteúdo -->
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <!-- Sucesso -->
        <div class="text-center mb-12">
            <div class="mx-auto w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mb-6">
                <svg class="w-10 h-10 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
            </div>
            <h1 class="text-3xl font-bold text-gray-900 mb-4">Pedido Confirmado!</h1>
            <p class="text-lg text-gray-600">Seu pedido foi recebido e está sendo processado.</p>
        </div>

        <!-- Informações do Pedido -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 mb-8">
            <div class="p-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-6">Detalhes do Pedido</h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <h3 class="text-sm font-medium text-gray-700 mb-2">Número do Pedido</h3>
                        <p class="text-lg font-semibold text-gray-900">#{{ $order->id }}</p>
                    </div>

                    <div>
                        <h3 class="text-sm font-medium text-gray-700 mb-2">Data do Pedido</h3>
                        <p class="text-lg font-semibold text-gray-900">{{ $order->created_at->format('d/m/Y H:i') }}</p>
                    </div>

                    <div>
                        <h3 class="text-sm font-medium text-gray-700 mb-2">Cliente</h3>
                        <p class="text-lg font-semibold text-gray-900">{{ $order->customer_name }}</p>
                    </div>

                    <div>
                        <h3 class="text-sm font-medium text-gray-700 mb-2">Forma de Pagamento</h3>
                        <p class="text-lg font-semibold text-gray-900">{{ $order->notes }}</p>
                    </div>
                </div>

                <div class="mb-6">
                    <h3 class="text-sm font-medium text-gray-700 mb-2">Endereço de Entrega</h3>
                    <p class="text-gray-900">{{ $order->customer_address }}</p>
                </div>

                <div class="border-t border-gray-200 pt-4">
                    <h3 class="text-sm font-medium text-gray-700 mb-2">Status do Pedido</h3>
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-yellow-100 text-yellow-800">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Pendente
                    </span>
                </div>
            </div>
        </div>

        <!-- Produtos do Pedido -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 mb-8">
            <div class="p-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-6">Produtos</h2>

                <div class="space-y-4">
                    @foreach($order->orderItems as $item)
                    <div class="flex items-center space-x-4 p-4 border border-gray-200 rounded-lg">
                        <div class="flex-shrink-0">
                            @if($item->product->image_path)
                            <img src="{{ Storage::url($item->product->image_path) }}"
                                alt="{{ $item->product->name }}"
                                class="w-16 h-16 object-cover rounded-lg">
                            @else
                            <div class="w-16 h-16 bg-gray-100 rounded-lg flex items-center justify-center">
                                <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                                </svg>
                            </div>
                            @endif
                        </div>

                        <div class="flex-1">
                            <h3 class="text-lg font-medium text-gray-900">{{ $item->product->name }}</h3>
                            <p class="text-sm text-gray-600">{{ $item->product->category->name }}</p>
                            <p class="text-sm text-gray-600">Quantidade: {{ $item->quantity }}</p>
                        </div>

                        <div class="text-right">
                            <p class="text-sm text-gray-600">R$ {{ number_format($item->price, 2, ',', '.') }} cada</p>
                            <p class="text-lg font-semibold text-gray-900">
                                R$ {{ number_format($item->price * $item->quantity, 2, ',', '.') }}
                            </p>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="border-t border-gray-200 pt-4 mt-6">
                    <div class="flex justify-between text-lg font-semibold">
                        <span>Total do Pedido:</span>
                        <span class="text-red-600">R$ {{ number_format($order->total_amount, 2, ',', '.') }}</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Informações Importantes -->
        <div class="bg-blue-50 border border-blue-200 rounded-lg p-6 mb-8">
            <h3 class="text-lg font-semibold text-blue-900 mb-4">Próximos Passos</h3>
            <ul class="space-y-2 text-blue-800">
                <li class="flex items-start space-x-2">
                    <svg class="w-5 h-5 text-blue-600 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>Você receberá um email de confirmação em breve.</span>
                </li>
                <li class="flex items-start space-x-2">
                    <svg class="w-5 h-5 text-blue-600 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>Entraremos em contato para confirmar os detalhes da entrega.</span>
                </li>
                <li class="flex items-start space-x-2">
                    <svg class="w-5 h-5 text-blue-600 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>O prazo de entrega será informado após a confirmação.</span>
                </li>
            </ul>
        </div>

        <!-- Ações -->
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('products.index') }}"
                class="inline-flex items-center px-6 py-3 bg-red-600 hover:bg-red-700 text-white font-medium rounded-lg transition-colors duration-200">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                Continuar Comprando
            </a>

            <a href="{{ route('home') }}"
                class="inline-flex items-center px-6 py-3 bg-gray-200 hover:bg-gray-300 text-gray-800 font-medium rounded-lg transition-colors duration-200">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                Voltar ao Início
            </a>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12 mt-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <div class="flex items-center justify-center mb-4">
                    <div class="w-8 h-8 bg-red-600 rounded-sm mr-3 flex items-center justify-center">
                        <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5" />
                        </svg>
                    </div>
                    <span class="text-xl font-bold">ALFA DRONES</span>
                </div>
                <p class="text-gray-400 mb-4">Especializada em soluções inovadoras com drones</p>
                <div class="border-t border-gray-800 pt-4 text-gray-400">
                    <p>&copy; {{ date('Y') }} Alfa Drones. Todos os direitos reservados.</p>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>