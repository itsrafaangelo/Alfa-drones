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
                    <a href="{{ route('home') }}#sobre" class="text-gray-700 hover:text-red-600 px-3 py-2 text-sm font-medium transition-colors duration-200">Sobre</a>
                    <a href="{{ route('home') }}#servicos" class="text-gray-700 hover:text-red-600 px-3 py-2 text-sm font-medium transition-colors duration-200">Serviços</a>
                    <a href="{{ route('agriculture.index') }}" class="text-gray-700 hover:text-red-600 px-3 py-2 text-sm font-medium transition-colors duration-200">Agricultura</a>
                    <a href="{{ route('products.index') }}" class="text-gray-700 hover:text-red-600 px-3 py-2 text-sm font-medium transition-colors duration-200">Produtos</a>
                    <a href="{{ route('home') }}#contato" class="text-gray-700 hover:text-red-600 px-3 py-2 text-sm font-medium transition-colors duration-200">Contato</a>
                    @auth
                    <a href="{{ route('admin.estoque.index') }}" class="bg-red-600 text-white px-4 py-2 rounded-md text-sm font-medium hover:bg-red-700 transition-colors duration-200">Admin</a>
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
            <a href="{{ route('home') }}#sobre" class="text-gray-700 hover:text-red-600 block px-3 py-2 text-base font-medium">Sobre</a>
            <a href="{{ route('home') }}#servicos" class="text-gray-700 hover:text-red-600 block px-3 py-2 text-base font-medium">Serviços</a>
            <a href="{{ route('agriculture.index') }}" class="text-gray-700 hover:text-red-600 block px-3 py-2 text-base font-medium">Agricultura</a>
            <a href="{{ route('products.index') }}" class="text-gray-700 hover:text-red-600 block px-3 py-2 text-base font-medium">Produtos</a>
            <a href="{{ route('home') }}#contato" class="text-gray-700 hover:text-red-600 block px-3 py-2 text-base font-medium">Contato</a>
            @auth
            <a href="{{ route('admin.estoque.index') }}" class="bg-red-600 text-white block px-3 py-2 text-base font-medium rounded-md">Admin</a>
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