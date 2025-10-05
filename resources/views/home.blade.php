@php
use Illuminate\Support\Facades\Storage;
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ALFA DRONES - Soluções e Imagens</title>
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
                        <a href="#sobre" class="text-gray-700 hover:text-red-600 px-3 py-2 text-sm font-medium transition-colors duration-200">Sobre</a>
                        <a href="#servicos" class="text-gray-700 hover:text-red-600 px-3 py-2 text-sm font-medium transition-colors duration-200">Serviços</a>
                        <a href="#agricultura" class="text-gray-700 hover:text-red-600 px-3 py-2 text-sm font-medium transition-colors duration-200">Agricultura</a>
                        <a href="{{ route('products.index') }}" class="text-gray-700 hover:text-red-600 px-3 py-2 text-sm font-medium transition-colors duration-200">Produtos</a>
                        <a href="#contato" class="text-gray-700 hover:text-red-600 px-3 py-2 text-sm font-medium transition-colors duration-200">Contato</a>
                        @auth
                        <a href="{{ route('inventory.index') }}" class="bg-red-600 text-white px-4 py-2 rounded-md text-sm font-medium hover:bg-red-700 transition-colors duration-200">Admin</a>
                        @else
                        <a href="{{ route('login') }}" class="bg-red-600 text-white px-4 py-2 rounded-md text-sm font-medium hover:bg-red-700 transition-colors duration-200">Login</a>
                        @endauth
                    </div>
                </div>

                <!-- Menu Mobile (Hamburger) -->
                <div class="md:hidden">
                    <button type="button" id="mobile-menu-button" class="bg-white inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100">
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
                <a href="#sobre" class="text-gray-700 hover:text-red-600 block px-3 py-2 text-base font-medium">Sobre</a>
                <a href="#servicos" class="text-gray-700 hover:text-red-600 block px-3 py-2 text-base font-medium">Serviços</a>
                <a href="#agricultura" class="text-gray-700 hover:text-red-600 block px-3 py-2 text-base font-medium">Agricultura</a>
                <a href="{{ route('products.index') }}" class="text-gray-700 hover:text-red-600 block px-3 py-2 text-base font-medium">Produtos</a>
                <a href="#contato" class="text-gray-700 hover:text-red-600 block px-3 py-2 text-base font-medium">Contato</a>
                @auth
                <a href="{{ route('inventory.index') }}" class="bg-red-600 text-white block px-3 py-2 text-base font-medium rounded-md">Admin</a>
                @else
                <a href="{{ route('login') }}" class="bg-red-600 text-white block px-3 py-2 text-base font-medium rounded-md">Login</a>
                @endauth
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="relative bg-gradient-to-br from-gray-50 via-white to-gray-100 text-gray-900 overflow-hidden">
        <!-- Background Image with Overlay -->
        <div class="absolute inset-0">
            <img src="{{ asset('images/banner.jpg') }}" alt="Drones Background" class="w-full h-full object-cover opacity-10">
            <div class="absolute inset-0 bg-gradient-to-br from-white/80 via-white/90 to-gray-100/95"></div>
        </div>

        <!-- Advanced Grid Pattern -->
        <div class="absolute inset-0 opacity-30">
            <div class="absolute inset-0" style="background-image: 
                linear-gradient(rgba(239, 68, 68, 0.08) 1px, transparent 1px),
                linear-gradient(90deg, rgba(239, 68, 68, 0.08) 1px, transparent 1px),
                linear-gradient(rgba(59, 130, 246, 0.05) 2px, transparent 2px),
                linear-gradient(90deg, rgba(59, 130, 246, 0.05) 2px, transparent 2px);
                background-size: 40px 40px, 40px 40px, 120px 120px, 120px 120px;
                background-position: 0 0, 0 0, 20px 20px, 20px 20px;"></div>
        </div>

        <!-- Diagonal Lines Pattern -->
        <div class="absolute inset-0 opacity-15">
            <div class="absolute inset-0" style="background-image: 
                repeating-linear-gradient(45deg, transparent, transparent 35px, rgba(239, 68, 68, 0.04) 35px, rgba(239, 68, 68, 0.04) 70px),
                repeating-linear-gradient(-45deg, transparent, transparent 35px, rgba(59, 130, 246, 0.03) 35px, rgba(59, 130, 246, 0.03) 70px);"></div>
        </div>


        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 lg:py-32">
            <div class="text-center">
                <!-- Icon with subtle shadow -->
                <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-r from-red-500 to-red-600 rounded-3xl mb-8 shadow-2xl shadow-red-500/20">
                    <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5" />
                    </svg>
                </div>

                <h1 class="text-5xl md:text-7xl font-bold mb-8 leading-tight">
                    Soluções em <span class="text-transparent bg-clip-text bg-gradient-to-r from-red-500 via-red-600 to-red-700">Drones</span>
                </h1>

                <p class="text-xl md:text-2xl mb-12 text-gray-600 max-w-4xl mx-auto leading-relaxed">
                    Mapeamento aéreo, agricultura de precisão e inspeções técnicas com tecnologia de ponta
                </p>

                <!-- Enhanced Buttons -->
                <div class="flex flex-col sm:flex-row gap-6 justify-center items-center">
                    <a href="{{ route('products.index') }}"
                        class="group relative bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 text-white px-10 py-4 rounded-2xl font-semibold transition-all duration-300 transform hover:scale-105 active:scale-95 shadow-xl hover:shadow-2xl shadow-red-500/25 overflow-hidden">
                        <span class="relative z-10 flex items-center space-x-2">
                            <span>Ver Produtos</span>
                            <svg class="w-5 h-5 transform transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </span>
                        <!-- Button shine effect -->
                        <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/20 to-transparent translate-x-[-100%] group-hover:translate-x-[100%] transition-transform duration-700"></div>
                    </a>

                    <a href="#servicos"
                        class="group bg-white hover:bg-gray-50 text-gray-900 border-2 border-gray-300 hover:border-red-500 px-10 py-4 rounded-2xl font-semibold transition-all duration-300 transform hover:scale-105 active:scale-95 shadow-lg hover:shadow-xl">
                        <span class="flex items-center space-x-2">
                            <span>Nossos Serviços</span>
                            <svg class="w-5 h-5 transform transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </span>
                    </a>
                </div>

            </div>
        </div>
    </section>

    <!-- Sobre Section -->
    <section id="sobre" class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Sobre a Alfa Drones</h2>
                <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                    Especializada em soluções inovadoras com drones, oferecemos tecnologia de ponta para mapeamento aéreo,
                    agricultura de precisão e inspeções técnicas profissionais.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="text-center">
                    <div class="bg-red-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-red-600" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Tecnologia Avançada</h3>
                    <p class="text-gray-600">Equipamentos de última geração para resultados precisos e confiáveis</p>
                </div>

                <div class="text-center">
                    <div class="bg-red-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-red-600" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Qualidade Garantida</h3>
                    <p class="text-gray-600">Compromisso com a excelência em todos os nossos serviços</p>
                </div>

                <div class="text-center">
                    <div class="bg-red-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-red-600" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20a3 3 0 01-3-3v-2a3 3 0 01.879-2.121M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Equipe Especializada</h3>
                    <p class="text-gray-600">Profissionais certificados e experientes no setor</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Serviços Section -->
    <section id="servicos" class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Nossos Serviços</h2>
                <p class="text-lg text-gray-600">Soluções completas para diferentes necessidades</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="bg-white p-6 rounded-lg shadow-sm hover:shadow-md transition-shadow duration-200">
                    <div class="text-red-600 mb-4">
                        <svg class="w-12 h-12" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Mapeamento Aéreo</h3>
                    <p class="text-gray-600">Levantamentos topográficos precisos e ortofotocartas de alta resolução</p>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-sm hover:shadow-md transition-shadow duration-200">
                    <div class="text-red-600 mb-4">
                        <svg class="w-12 h-12" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Agricultura de Precisão</h3>
                    <p class="text-gray-600">Monitoramento de culturas e análise de variabilidade espacial</p>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-sm hover:shadow-md transition-shadow duration-200">
                    <div class="text-red-600 mb-4">
                        <svg class="w-12 h-12" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Inspeções Técnicas</h3>
                    <p class="text-gray-600">Inspeções de infraestrutura, torres, linhas de transmissão</p>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-sm hover:shadow-md transition-shadow duration-200">
                    <div class="text-red-600 mb-4">
                        <svg class="w-12 h-12" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Filmagens Aéreas</h3>
                    <p class="text-gray-600">Produção audiovisual profissional para eventos e marketing</p>
                </div>
            </div>
        </div>
    </section>

    @if($featuredProducts->count() > 0)
    <!-- Produtos Destacados -->
    <section class="py-20 bg-gradient-to-br from-gray-50 via-white to-gray-50 relative overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-5">
            <div class="absolute top-0 left-0 w-full h-full" style="background-image: radial-gradient(circle at 2px 2px, rgba(0,0,0,0.15) 1px, transparent 0); background-size: 40px 40px;"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
            <!-- Header Section -->
            <div class="text-center mb-16">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-r from-red-500 to-red-600 rounded-2xl mb-6 shadow-lg">
                    <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5" />
                    </svg>
                </div>
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6 leading-tight">
                    Produtos <span class="text-transparent bg-clip-text bg-gradient-to-r from-red-500 to-red-600">Destacados</span>
                </h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto leading-relaxed">
                    Equipamentos de última geração selecionados para profissionais que buscam excelência
                </p>
                <div class="w-24 h-1 bg-gradient-to-r from-red-500 to-red-600 mx-auto mt-6 rounded-full"></div>
            </div>

            <!-- Products Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 lg:gap-10">
                @foreach($featuredProducts as $index => $product)
                <div class="group relative bg-white rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 overflow-hidden border border-gray-100 animate-fade-in-up"
                    data-delay="{{ $index * 150 }}">

                    <!-- Image Container -->
                    <div class="relative overflow-hidden rounded-t-3xl">
                        @if($product->image_path)
                        <img src="{{ Storage::url($product->image_path) }}"
                            alt="{{ $product->name }}"
                            class="w-full h-64 object-cover transition-transform duration-700 group-hover:scale-110">
                        @else
                        <div class="w-full h-64 bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center">
                            <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                            </svg>
                        </div>
                        @endif

                        <!-- Category Badge -->
                        <div class="absolute top-4 left-4">
                            <span class="bg-white/90 backdrop-blur-sm text-red-600 px-3 py-1 rounded-full text-xs font-semibold shadow-lg">
                                {{ $product->category->name }}
                            </span>
                        </div>

                        @if($product->sale_price)
                        <!-- Discount Badge -->
                        <div class="absolute top-4 right-4">
                            <span class="bg-gradient-to-r from-red-500 to-red-600 text-white px-3 py-1 rounded-full text-xs font-bold shadow-lg">
                                {{ number_format((($product->price - $product->sale_price) / $product->price) * 100, 0) }}% OFF
                            </span>
                        </div>
                        @endif

                        <!-- Overlay Gradient -->
                        <div class="absolute inset-0 bg-gradient-to-t from-black/20 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </div>

                    <!-- Content -->
                    <div class="p-8">
                        <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-red-600 transition-colors duration-300">
                            {{ $product->name }}
                        </h3>
                        <p class="text-gray-600 text-sm mb-6 leading-relaxed line-clamp-2">
                            {{ $product->short_description ?? Str::limit($product->description, 120) }}
                        </p>

                        <!-- Price Section -->
                        <div class="flex items-center justify-between mb-6">
                            <div class="flex flex-col">
                                @if($product->sale_price)
                                <span class="text-sm text-gray-500 line-through mb-1">
                                    R$ {{ number_format($product->price, 2, ',', '.') }}
                                </span>
                                <span class="text-2xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-red-500 to-red-600">
                                    R$ {{ number_format($product->sale_price, 2, ',', '.') }}
                                </span>
                                @else
                                <span class="text-2xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-red-500 to-red-600">
                                    R$ {{ number_format($product->price, 2, ',', '.') }}
                                </span>
                                @endif
                            </div>

                            <!-- Stock Indicator -->
                            @if($product->stock_quantity <= 5 && $product->stock_quantity > 0)
                                <span class="bg-orange-100 text-orange-800 px-2 py-1 rounded-full text-xs font-medium">
                                    Últimas {{ $product->stock_quantity }} unidades
                                </span>
                                @elseif($product->stock_quantity == 0)
                                <span class="bg-red-100 text-red-800 px-2 py-1 rounded-full text-xs font-medium">
                                    Esgotado
                                </span>
                                @else
                                <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs font-medium">
                                    Em estoque
                                </span>
                                @endif
                        </div>

                        <!-- Action Button -->
                        <a href="{{ route('products.show', $product->slug) }}"
                            class="group/btn relative w-full bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 text-white px-6 py-4 rounded-2xl font-semibold transition-all duration-300 transform hover:scale-[1.02] active:scale-[0.98] shadow-lg hover:shadow-xl flex items-center justify-center space-x-2 overflow-hidden">
                            <span class="relative z-10">Ver Detalhes</span>
                            <svg class="w-5 h-5 relative z-10 transform transition-transform duration-300 group-hover/btn:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>

                            <!-- Button Shine Effect -->
                            <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/20 to-transparent translate-x-[-100%] group-hover/btn:translate-x-[100%] transition-transform duration-700"></div>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- CTA Section -->
            <div class="text-center mt-20">
                <div class="bg-white rounded-3xl shadow-xl p-10 max-w-2xl mx-auto border border-gray-100">
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">
                        Explore Nossa Linha Completa
                    </h3>
                    <p class="text-gray-600 mb-8 leading-relaxed">
                        Descubra mais de 50 produtos especializados para suas necessidades profissionais
                    </p>
                    <a href="{{ route('products.index') }}"
                        class="group inline-flex items-center bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 text-white px-10 py-4 rounded-2xl font-semibold transition-all duration-300 transform hover:scale-105 active:scale-95 shadow-lg hover:shadow-xl space-x-3">
                        <span>Ver Todos os Produtos</span>
                        <svg class="w-5 h-5 transform transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>
    @endif

    <!-- Agricultura Section -->
    <section id="agricultura" class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="text-3xl font-bold text-gray-900 mb-6">Agricultura de Precisão</h2>
                    <p class="text-lg text-gray-600 mb-6">
                        Revolucione sua produção agrícola com tecnologia de drones. Monitore suas culturas,
                        identifique problemas precocemente e otimize o uso de recursos.
                    </p>

                    <div class="space-y-4">
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <div class="bg-green-100 w-8 h-8 rounded-full flex items-center justify-center">
                                    <svg class="w-4 h-4 text-green-600" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                            </div>
                            <div class="ml-3">
                                <h3 class="text-lg font-semibold text-gray-900">Monitoramento em Tempo Real</h3>
                                <p class="text-gray-600">Acompanhe o desenvolvimento das culturas com imagens de alta resolução</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <div class="bg-green-100 w-8 h-8 rounded-full flex items-center justify-center">
                                    <svg class="w-4 h-4 text-green-600" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                            </div>
                            <div class="ml-3">
                                <h3 class="text-lg font-semibold text-gray-900">Análise de Variabilidade</h3>
                                <p class="text-gray-600">Mapas de índices de vegetação para aplicação localizada de insumos</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <div class="bg-green-100 w-8 h-8 rounded-full flex items-center justify-center">
                                    <svg class="w-4 h-4 text-green-600" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                            </div>
                            <div class="ml-3">
                                <h3 class="text-lg font-semibold text-gray-900">Detecção de Pragas e Doenças</h3>
                                <p class="text-gray-600">Identificação precoce de problemas para ação rápida e eficaz</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <img src="{{ asset('images/agricultura-1.jpg') }}" alt="Agricultura de Precisão" class="rounded-lg shadow-md" onerror="this.style.display='none'">
                    <img src="{{ asset('images/agricultura-2.jpg') }}" alt="Monitoramento de Culturas" class="rounded-lg shadow-md" onerror="this.style.display='none'">
                    <img src="{{ asset('images/agricultura-3.jpg') }}" alt="Análise de Dados" class="rounded-lg shadow-md" onerror="this.style.display='none'">
                    <img src="{{ asset('images/agricultura-4.jpg') }}" alt="Resultados Precisos" class="rounded-lg shadow-md" onerror="this.style.display='none'">
                </div>
            </div>
        </div>
    </section>

    <!-- Contato Section -->
    <section id="contato" class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Entre em Contato</h2>
                <p class="text-lg text-gray-600">Pronto para revolucionar seu negócio com tecnologia drone?</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="text-center">
                    <div class="bg-red-100 w-12 h-12 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6 text-red-600" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Telefone</h3>
                    <p class="text-gray-600">(11) 99999-9999</p>
                </div>

                <div class="text-center">
                    <div class="bg-red-100 w-12 h-12 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6 text-red-600" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Email</h3>
                    <p class="text-gray-600">contato@alfadrones.com.br</p>
                </div>

                <div class="text-center">
                    <div class="bg-red-100 w-12 h-12 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6 text-red-600" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Localização</h3>
                    <p class="text-gray-600">São Paulo, SP</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="col-span-1 md:col-span-2">
                    <div class="flex items-center mb-4">
                        <div class="w-8 h-8 bg-red-600 rounded-sm mr-3 flex items-center justify-center">
                            <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5" />
                            </svg>
                        </div>
                        <span class="text-xl font-bold">ALFA DRONES</span>
                    </div>
                    <p class="text-gray-400 mb-4">
                        Especializada em soluções inovadoras com drones para mapeamento aéreo,
                        agricultura de precisão e inspeções técnicas.
                    </p>
                </div>

                <div>
                    <h3 class="text-lg font-semibold mb-4">Links Rápidos</h3>
                    <ul class="space-y-2">
                        <li><a href="#sobre" class="text-gray-400 hover:text-white transition-colors duration-200">Sobre</a></li>
                        <li><a href="#servicos" class="text-gray-400 hover:text-white transition-colors duration-200">Serviços</a></li>
                        <li><a href="{{ route('products.index') }}" class="text-gray-400 hover:text-white transition-colors duration-200">Produtos</a></li>
                        <li><a href="#contato" class="text-gray-400 hover:text-white transition-colors duration-200">Contato</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-lg font-semibold mb-4">Serviços</h3>
                    <ul class="space-y-2">
                        <li><span class="text-gray-400">Mapeamento Aéreo</span></li>
                        <li><span class="text-gray-400">Agricultura de Precisão</span></li>
                        <li><span class="text-gray-400">Inspeções Técnicas</span></li>
                        <li><span class="text-gray-400">Filmagens Aéreas</span></li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400">
                <p>&copy; {{ date('Y') }} Alfa Drones. Todos os direitos reservados.</p>
            </div>
        </div>
    </footer>

    <style>
        .animate-fade-in-up {
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 0.6s ease-out forwards;
        }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>

    <script>
        // Initialize staggered animations
        document.addEventListener('DOMContentLoaded', function() {
            const animatedElements = document.querySelectorAll('[data-delay]');
            animatedElements.forEach(element => {
                const delay = element.getAttribute('data-delay');
                element.style.animationDelay = delay + 'ms';
            });
        });

        // Menu mobile toggle
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            const mobileMenu = document.getElementById('mobile-menu');
            mobileMenu.classList.toggle('hidden');
        });

        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    </script>
</body>

</html>