@php
use Illuminate\Support\Facades\Storage;
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Checkout - ALFA DRONES</title>
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
                        <img src="{{ asset('images/logo.png') }}" alt="Alfa Drones Logo" class="h-16 w-auto">
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

    <!-- Header -->
    <div class="bg-white border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <h1 class="text-3xl font-bold text-gray-900">Finalizar Compra</h1>
            <p class="text-gray-600 mt-2">Preencha seus dados para concluir o pedido</p>
        </div>
    </div>

    <!-- Conteúdo -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        @if(session('error'))
        <div class="mb-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg">
            {{ session('error') }}
        </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Formulário de Checkout -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-lg shadow-sm border border-gray-200">
                    <div class="p-6">
                        <h2 class="text-lg font-semibold text-gray-900 mb-6">Dados do Cliente</h2>

                        <form method="POST" action="{{ route('cart.process') }}" class="space-y-6">
                            @csrf

                            <!-- Dados Pessoais -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="customer_name" class="block text-sm font-medium text-gray-700 mb-2">
                                        Nome Completo *
                                    </label>
                                    <input type="text"
                                        id="customer_name"
                                        name="customer_name"
                                        value="{{ old('customer_name') }}"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 @error('customer_name') border-red-500 @enderror"
                                        placeholder="Seu nome completo"
                                        required>
                                    @error('customer_name')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="customer_email" class="block text-sm font-medium text-gray-700 mb-2">
                                        Email *
                                    </label>
                                    <input type="email"
                                        id="customer_email"
                                        name="customer_email"
                                        value="{{ old('customer_email') }}"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 @error('customer_email') border-red-500 @enderror"
                                        placeholder="seu@email.com"
                                        required>
                                    @error('customer_email')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div>
                                <label for="customer_phone" class="block text-sm font-medium text-gray-700 mb-2">
                                    Telefone *
                                </label>
                                <input type="tel"
                                    id="customer_phone"
                                    name="customer_phone"
                                    value="{{ old('customer_phone') }}"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 @error('customer_phone') border-red-500 @enderror"
                                    placeholder="(11) 99999-9999"
                                    required>
                                @error('customer_phone')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="shipping_address" class="block text-sm font-medium text-gray-700 mb-2">
                                    Endereço de Entrega *
                                </label>
                                <textarea id="shipping_address"
                                    name="shipping_address"
                                    rows="3"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 @error('shipping_address') border-red-500 @enderror"
                                    placeholder="Rua, número, bairro, cidade, estado, CEP"
                                    required>{{ old('shipping_address') }}</textarea>
                                @error('shipping_address')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Forma de Pagamento *
                                </label>
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                    <label class="relative">
                                        <input type="radio" name="payment_method" value="dinheiro" class="sr-only peer" required>
                                        <div class="p-4 border border-gray-300 rounded-lg cursor-pointer peer-checked:border-red-500 peer-checked:bg-red-50 transition-colors duration-200">
                                            <div class="flex items-center space-x-3">
                                                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1" />
                                                </svg>
                                                <span class="font-medium">Dinheiro</span>
                                            </div>
                                        </div>
                                    </label>

                                    <label class="relative">
                                        <input type="radio" name="payment_method" value="pix" class="sr-only peer" required>
                                        <div class="p-4 border border-gray-300 rounded-lg cursor-pointer peer-checked:border-red-500 peer-checked:bg-red-50 transition-colors duration-200">
                                            <div class="flex items-center space-x-3">
                                                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                                </svg>
                                                <span class="font-medium">PIX</span>
                                            </div>
                                        </div>
                                    </label>

                                    <label class="relative">
                                        <input type="radio" name="payment_method" value="cartao" class="sr-only peer" required>
                                        <div class="p-4 border border-gray-300 rounded-lg cursor-pointer peer-checked:border-red-500 peer-checked:bg-red-50 transition-colors duration-200">
                                            <div class="flex items-center space-x-3">
                                                <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                                                </svg>
                                                <span class="font-medium">Cartão</span>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                                @error('payment_method')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="pt-6 border-t border-gray-200">
                                <button type="submit"
                                    class="w-full bg-red-600 hover:bg-red-700 text-white font-medium py-4 px-6 rounded-lg transition-colors duration-200 text-lg">
                                    Finalizar Pedido
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Resumo do Pedido -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 sticky top-24">
                    <div class="p-6">
                        <h2 class="text-lg font-semibold text-gray-900 mb-4">Resumo do Pedido</h2>

                        <div class="space-y-4 mb-6">
                            @foreach($cartItems as $item)
                            <div class="flex items-center space-x-3">
                                <div class="flex-shrink-0">
                                    @if($item['product']->image_path)
                                    <img src="{{ Storage::url($item['product']->image_path) }}"
                                        alt="{{ $item['product']->name }}"
                                        class="w-12 h-12 object-cover rounded-lg">
                                    @else
                                    <div class="w-12 h-12 bg-gray-100 rounded-lg flex items-center justify-center">
                                        <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                                        </svg>
                                    </div>
                                    @endif
                                </div>

                                <div class="flex-1">
                                    <h3 class="text-sm font-medium text-gray-900">{{ $item['product']->name }}</h3>
                                    <p class="text-xs text-gray-600">Qtd: {{ $item['quantity'] }}</p>
                                </div>

                                <div class="text-right">
                                    <p class="text-sm font-medium text-gray-900">
                                        R$ {{ number_format($item['subtotal'], 2, ',', '.') }}
                                    </p>
                                </div>
                            </div>
                            @endforeach
                        </div>

                        <div class="border-t border-gray-200 pt-4">
                            <div class="flex justify-between text-lg font-semibold">
                                <span>Total:</span>
                                <span class="text-red-600">R$ {{ number_format($total, 2, ',', '.') }}</span>
                            </div>
                        </div>

                        <div class="mt-6">
                            <a href="{{ route('cart.index') }}"
                                class="w-full bg-gray-200 hover:bg-gray-300 text-gray-800 font-medium py-3 px-4 rounded-lg transition-colors duration-200 text-center block">
                                Voltar ao Carrinho
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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