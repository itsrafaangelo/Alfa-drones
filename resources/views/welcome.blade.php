<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    ead>
</head>

<body class="bg-gray-50">
    <!-- Navbar -->
    <nav class="bg-white shadow-sm border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <div class="flex items-center">
                    <div class="flex-shrink-0 flex items-center">
                        <!-- Ícone/Logo -->
                        <div class="w-8 h-8 bg-red-600 rounded-sm mr-3 flex items-center justify-center">
                            <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5" />
                            </svg>
                        </div>
                        <span class="text-xl font-bold text-gray-900">ALFA DRONES</span>
                        <span class="text-xs text-gray-500 ml-2">SOLUÇÕES E IMAGENS</span>
                    </div>
                </div>

                <!-- Menu de Navegação -->
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-8">
                        <a href="#" class="text-gray-700 hover:text-red-600 px-3 py-2 text-sm font-medium transition-colors duration-200">Sobre</a>
                        <a href="#" class="text-gray-700 hover:text-red-600 px-3 py-2 text-sm font-medium transition-colors duration-200">Serviços</a>
                        <a href="#" class="text-gray-700 hover:text-red-600 px-3 py-2 text-sm font-medium transition-colors duration-200">Agricultura</a>
                        <a href="#" class="text-gray-700 hover:text-red-600 px-3 py-2 text-sm font-medium transition-colors duration-200">Produtos</a>
                        <a href="#" class="text-gray-700 hover:text-red-600 px-3 py-2 text-sm font-medium transition-colors duration-200">Contato</a>
                        <a href="#" class="text-gray-700 hover:text-red-600 px-3 py-2 text-sm font-medium transition-colors duration-200">Instagram</a>
                    </div>
                </div>

                <!-- Menu Mobile (Hamburger) -->
                <div class="md:hidden">
                    <button type="button" class="bg-white inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-red-500" aria-controls="mobile-menu" aria-expanded="false">
                        <span class="sr-only">Abrir menu principal</span>
                        <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Menu Mobile -->
        <div class="md:hidden hidden" id="mobile-menu">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3 bg-white border-t border-gray-200">
                <a href="#" class="text-gray-700 hover:text-red-600 block px-3 py-2 text-base font-medium">Sobre</a>
                <a href="#" class="text-gray-700 hover:text-red-600 block px-3 py-2 text-base font-medium">Serviços</a>
                <a href="#" class="text-gray-700 hover:text-red-600 block px-3 py-2 text-base font-medium">Agricultura</a>
                <a href="#" class="text-gray-700 hover:text-red-600 block px-3 py-2 text-base font-medium">Produtos</a>
                <a href="#" class="text-gray-700 hover:text-red-600 block px-3 py-2 text-base font-medium">Contato</a>
                <a href="#" class="text-gray-700 hover:text-red-600 block px-3 py-2 text-base font-medium">Instagram</a>
            </div>
        </div>
    </nav>

    <!-- Conteúdo Principal -->
    <main class="min-h-screen">
        <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
            <div class="px-4 py-6 sm:px-0">
                <div class="border-4 border-dashed border-gray-200 rounded-lg h-96 flex items-center justify-center">
                    <h1 class="text-2xl font-bold text-gray-900">Bem-vindo à Alfa Drones</h1>
                </div>
            </div>
        </div>
    </main>

    <!-- JavaScript para o menu mobile -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuButton = document.querySelector('[aria-controls="mobile-menu"]');
            const mobileMenu = document.getElementById('mobile-menu');

            if (mobileMenuButton && mobileMenu) {
                mobileMenuButton.addEventListener('click', function() {
                    const isExpanded = mobileMenuButton.getAttribute('aria-expanded') === 'true';

                    mobileMenuButton.setAttribute('aria-expanded', !isExpanded);
                    mobileMenu.classList.toggle('hidden');
                });
            }
        });
    </script>
</body>

</html>