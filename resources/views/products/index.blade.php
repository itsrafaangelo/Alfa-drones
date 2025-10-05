@php
use Illuminate\Support\Facades\Storage;
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Produtos - ALFA DRONES</title>
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
                        <a href="{{ route('products.index') }}" class="text-red-600 px-3 py-2 text-sm font-medium">Produtos</a>
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
            <h1 class="text-3xl font-bold text-gray-900">Nossos Produtos</h1>
            <p class="text-gray-600 mt-2">Equipamentos de alta qualidade para suas necessidades profissionais</p>
        </div>
    </div>

    <!-- Filtros e Busca -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <div class="flex flex-col md:flex-row gap-4 mb-8">
            <div class="flex-1">
                <form method="GET" action="{{ route('products.index') }}" class="flex gap-4">
                    <div class="flex-1">
                        <input type="text" name="search" value="{{ request('search') }}"
                            placeholder="Buscar produtos..."
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500">
                    </div>

                    <div class="w-48">
                        <select name="category" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500">
                            <option value="">Todas as Categorias</option>
                            @foreach($categories as $category)
                            <option value="{{ $category->slug }}" {{ request('category') == $category->slug ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-6 py-2 rounded-lg font-medium transition-colors duration-200">
                        Buscar
                    </button>
                </form>
            </div>
        </div>

        @if(request('search') || request('category'))
        <div class="mb-6">
            <p class="text-gray-600">
                Mostrando resultados para:
                @if(request('search'))
                <span class="font-medium">"{{ request('search') }}"</span>
                @endif
                @if(request('category'))
                <span class="font-medium">Categoria: {{ $categories->where('slug', request('category'))->first()->name ?? request('category') }}</span>
                @endif
            </p>
            <a href="{{ route('products.index') }}" class="text-red-600 hover:text-red-700 text-sm">Limpar filtros</a>
        </div>
        @endif

        <!-- Grid de Produtos -->
        @if($products->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach($products as $product)
            <div class="bg-white border border-gray-200 rounded-lg shadow-sm hover:shadow-md transition-shadow duration-200">
                @if($product->image_path)
                <img src="{{ Storage::url($product->image_path) }}" alt="{{ $product->name }}" class="w-full h-48 object-cover rounded-t-lg">
                @else
                <div class="w-full h-48 bg-gray-100 rounded-t-lg flex items-center justify-center">
                    <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                    </svg>
                </div>
                @endif

                <div class="p-4">
                    <div class="text-xs text-red-600 font-medium mb-1">{{ $product->category->name }}</div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ $product->name }}</h3>
                    <p class="text-gray-600 text-sm mb-4 line-clamp-2">{{ $product->short_description ?? Str::limit($product->description, 80) }}</p>

                    <div class="flex justify-between items-center">
                        <div>
                            @if($product->sale_price)
                            <div class="text-sm text-gray-500 line-through">R$ {{ number_format($product->price, 2, ',', '.') }}</div>
                            <div class="text-lg font-bold text-red-600">R$ {{ number_format($product->sale_price, 2, ',', '.') }}</div>
                            @else
                            <div class="text-lg font-bold text-red-600">R$ {{ number_format($product->price, 2, ',', '.') }}</div>
                            @endif
                        </div>

                        <a href="{{ route('products.show', $product->slug) }}" class="bg-red-600 hover:bg-red-700 text-white px-3 py-2 rounded text-sm font-medium transition-colors duration-200">
                            Ver Detalhes
                        </a>
                    </div>

                    @if($product->stock_quantity <= 5 && $product->stock_quantity > 0)
                        <div class="text-xs text-orange-600 mt-2">
                            Apenas {{ $product->stock_quantity }} em estoque
                        </div>
                        @elseif($product->stock_quantity == 0)
                        <div class="text-xs text-red-600 mt-2">
                            Fora de estoque
                        </div>
                        @endif
                </div>
            </div>
            @endforeach
        </div>

        <!-- Paginação -->
        @if($products->hasPages())
        <div class="mt-8">
            {{ $products->appends(request()->query())->links() }}
        </div>
        @endif

        @else
        <div class="text-center py-12">
            <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5" />
            </svg>
            <h3 class="text-lg font-medium text-gray-900 mb-2">Nenhum produto encontrado</h3>
            <p class="text-gray-600">Tente ajustar seus filtros de busca.</p>
        </div>
        @endif
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