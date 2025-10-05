@php
use Illuminate\Support\Facades\Storage;
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $product->name }} - ALFA DRONES</title>
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

    <!-- Breadcrumb -->
    <div class="bg-white border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
            <nav class="flex text-sm text-gray-500">
                <a href="{{ route('home') }}" class="hover:text-gray-700">Home</a>
                <span class="mx-2">/</span>
                <a href="{{ route('products.index') }}" class="hover:text-gray-700">Produtos</a>
                <span class="mx-2">/</span>
                <span class="text-gray-900">{{ $product->name }}</span>
            </nav>
        </div>
    </div>

    <!-- Produto -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Imagens -->
            <div class="space-y-4">
                @if($product->image_path)
                <div class="aspect-square bg-white rounded-lg border border-gray-200 overflow-hidden">
                    <img id="main-image" src="{{ Storage::url($product->image_path) }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                </div>
                @else
                <div class="aspect-square bg-gray-100 rounded-lg flex items-center justify-center">
                    <svg class="w-24 h-24 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                    </svg>
                </div>
                @endif
            </div>

            <!-- Informações -->
            <div class="space-y-6">
                <div>
                    <div class="text-sm text-red-600 font-medium mb-2">{{ $product->category->name }}</div>
                    <h1 class="text-3xl font-bold text-gray-900 mb-4">{{ $product->name }}</h1>

                    <div class="flex items-center space-x-4 mb-4">
                        @if($product->sale_price)
                        <div class="text-2xl text-gray-500 line-through">R$ {{ number_format($product->price, 2, ',', '.') }}</div>
                        <div class="text-3xl font-bold text-red-600">R$ {{ number_format($product->sale_price, 2, ',', '.') }}</div>
                        <div class="bg-red-100 text-red-800 text-sm font-medium px-2 py-1 rounded">
                            {{ number_format((($product->price - $product->sale_price) / $product->price) * 100, 0) }}% OFF
                        </div>
                        @else
                        <div class="text-3xl font-bold text-red-600">R$ {{ number_format($product->price, 2, ',', '.') }}</div>
                        @endif
                    </div>

                    <div class="flex items-center space-x-4 mb-6">
                        @if($product->stock_quantity > 0)
                        <div class="flex items-center text-green-600">
                            <svg class="w-5 h-5 mr-1" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Em estoque ({{ $product->stock_quantity }} unidades)
                        </div>
                        @else
                        <div class="flex items-center text-red-600">
                            <svg class="w-5 h-5 mr-1" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Fora de estoque
                        </div>
                        @endif
                    </div>
                </div>

                <!-- Descrição -->
                <div>
                    <h2 class="text-lg font-semibold text-gray-900 mb-3">Descrição</h2>
                    <div class="text-gray-600 space-y-2">
                        {!! nl2br(e($product->description)) !!}
                    </div>
                </div>

                <!-- Especificações -->
                @if($product->specifications && count($product->specifications) > 0)
                <div>
                    <h2 class="text-lg font-semibold text-gray-900 mb-3">Especificações</h2>
                    <div class="bg-white rounded-lg border border-gray-200 divide-y divide-gray-200">
                        @foreach($product->specifications as $key => $value)
                        <div class="px-4 py-3 flex justify-between">
                            <dt class="text-sm font-medium text-gray-900">{{ $key }}</dt>
                            <dd class="text-sm text-gray-600">{{ $value }}</dd>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- Ações -->
                <div class="space-y-4">
                    @if($product->stock_quantity > 0)
                    <div class="flex items-center space-x-4">
                        <label for="quantity" class="text-sm font-medium text-gray-900">Quantidade:</label>
                        <select id="quantity" class="border border-gray-300 rounded px-3 py-2">
                            @for($i = 1; $i <= min($product->stock_quantity, 10); $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                        </select>
                    </div>

                    <button onclick="addToCart()" class="w-full bg-red-600 hover:bg-red-700 text-white py-3 px-6 rounded-lg font-medium transition-colors duration-200">
                        Solicitar Orçamento
                    </button>
                    @else
                    <button disabled class="w-full bg-gray-400 text-white py-3 px-6 rounded-lg font-medium cursor-not-allowed">
                        Produto Indisponível
                    </button>
                    @endif

                    <button onclick="openContactModal()" class="w-full border border-red-600 text-red-600 hover:bg-red-50 py-3 px-6 rounded-lg font-medium transition-colors duration-200">
                        Falar com Vendedor
                    </button>
                </div>
            </div>
        </div>

        <!-- Produtos Relacionados -->
        @if($relatedProducts->count() > 0)
        <div class="mt-16">
            <h2 class="text-2xl font-bold text-gray-900 mb-8">Produtos Relacionados</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($relatedProducts as $relatedProduct)
                <div class="bg-white border border-gray-200 rounded-lg shadow-sm hover:shadow-md transition-shadow duration-200">
                    @if($relatedProduct->image_path)
                    <img src="{{ Storage::url($relatedProduct->image_path) }}" alt="{{ $relatedProduct->name }}" class="w-full h-48 object-cover rounded-t-lg">
                    @else
                    <div class="w-full h-48 bg-gray-100 rounded-t-lg flex items-center justify-center">
                        <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                        </svg>
                    </div>
                    @endif

                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ $relatedProduct->name }}</h3>
                        <div class="text-lg font-bold text-red-600 mb-3">
                            R$ {{ number_format($relatedProduct->current_price, 2, ',', '.') }}
                        </div>
                        <a href="{{ route('products.show', $relatedProduct->slug) }}" class="block text-center bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded text-sm font-medium transition-colors duration-200">
                            Ver Detalhes
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif
    </div>

    <!-- Modal de Contato -->
    <div id="contactModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50">
        <div class="flex items-center justify-center min-h-screen px-4">
            <div class="bg-white rounded-lg max-w-md w-full p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-semibold text-gray-900">Falar com Vendedor</h3>
                    <button onclick="closeContactModal()" class="text-gray-400 hover:text-gray-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>

                <form id="contactForm">
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Nome</label>
                            <input type="text" name="name" required class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-red-500 focus:border-red-500">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                            <input type="email" name="email" required class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-red-500 focus:border-red-500">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Telefone</label>
                            <input type="tel" name="phone" required class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-red-500 focus:border-red-500">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Mensagem</label>
                            <textarea name="message" rows="3" class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-red-500 focus:border-red-500">Tenho interesse no produto: {{ $product->name }}</textarea>
                        </div>
                    </div>

                    <div class="flex space-x-3 mt-6">
                        <button type="button" onclick="closeContactModal()" class="flex-1 border border-gray-300 text-gray-700 py-2 px-4 rounded font-medium hover:bg-gray-50 transition-colors duration-200">
                            Cancelar
                        </button>
                        <button type="submit" class="flex-1 bg-red-600 hover:bg-red-700 text-white py-2 px-4 rounded font-medium transition-colors duration-200">
                            Enviar
                        </button>
                    </div>
                </form>
            </div>
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

    <script>
        // Initialize image thumbnails
        document.addEventListener('DOMContentLoaded', function() {
            const imageThumbs = document.querySelectorAll('.image-thumb');
            imageThumbs.forEach(thumb => {
                thumb.addEventListener('click', function() {
                    const imageSrc = this.getAttribute('data-image');
                    changeMainImage(imageSrc);

                    // Update active thumbnail
                    imageThumbs.forEach(btn => {
                        btn.classList.remove('border-red-500');
                        btn.classList.add('border-gray-200');
                    });
                    this.classList.add('border-red-500');
                    this.classList.remove('border-gray-200');
                });
            });
        });

        function changeMainImage(src) {
            document.getElementById('main-image').src = src;
        }

        function openContactModal() {
            document.getElementById('contactModal').classList.remove('hidden');
        }

        function closeContactModal() {
            document.getElementById('contactModal').classList.add('hidden');
        }

        function addToCart() {
            const quantity = document.getElementById('quantity') ? document.getElementById('quantity').value : 1;
            alert(`Produto adicionado ao orçamento! Quantidade: ${quantity}`);
        }

        // Handle contact form submission
        document.getElementById('contactForm').addEventListener('submit', function(e) {
            e.preventDefault();
            alert('Mensagem enviada com sucesso! Entraremos em contato em breve.');
            closeContactModal();
        });

        // Close modal when clicking outside
        document.getElementById('contactModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeContactModal();
            }
        });
    </script>
</body>

</html>