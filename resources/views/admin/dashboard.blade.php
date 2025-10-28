<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="font-bold text-2xl text-gray-900 leading-tight">
                    {{ __('Dashboard Administrativo') }}
                </h2>
                <p class="text-sm text-gray-600 mt-1">Visão geral do sistema Alfa Drones</p>
            </div>

        </div>
    </x-slot>

    <div class="py-8 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Cards de Estatísticas -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <!-- Produtos -->
                <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 border border-gray-100 overflow-hidden group">
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-600 mb-1">Total de Produtos</p>
                                <p class="text-3xl font-bold text-gray-900">{{ $totalProducts }}</p>
                                <p class="text-xs text-gray-500 mt-1">Cadastrados no sistema</p>
                            </div>
                            <div class="relative">
                                <div class="w-16 h-16 bg-gradient-to-br from-red-500 to-red-600 rounded-xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-300">
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                                    </svg>
                                </div>
                                <div class="absolute -top-1 -right-1 w-4 h-4 bg-red-100 rounded-full flex items-center justify-center">
                                    <div class="w-2 h-2 bg-red-500 rounded-full"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="h-1 bg-gradient-to-r from-red-500 to-red-600"></div>
                </div>

                <!-- Pedidos -->
                <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 border border-gray-100 overflow-hidden group">
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-600 mb-1">Total de Pedidos</p>
                                <p class="text-3xl font-bold text-gray-900">{{ $totalOrders }}</p>
                                <p class="text-xs text-gray-500 mt-1">Histórico completo</p>
                            </div>
                            <div class="relative">
                                <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-green-600 rounded-xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-300">
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                                    </svg>
                                </div>
                                <div class="absolute -top-1 -right-1 w-4 h-4 bg-green-100 rounded-full flex items-center justify-center">
                                    <div class="w-2 h-2 bg-green-500 rounded-full"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="h-1 bg-gradient-to-r from-green-500 to-green-600"></div>
                </div>

                <!-- Categorias -->
                <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 border border-gray-100 overflow-hidden group">
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-600 mb-1">Categorias</p>
                                <p class="text-3xl font-bold text-gray-900">{{ $totalCategories }}</p>
                                <p class="text-xs text-gray-500 mt-1">Organizações ativas</p>
                            </div>
                            <div class="relative">
                                <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-300">
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                    </svg>
                                </div>
                                <div class="absolute -top-1 -right-1 w-4 h-4 bg-purple-100 rounded-full flex items-center justify-center">
                                    <div class="w-2 h-2 bg-purple-500 rounded-full"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="h-1 bg-gradient-to-r from-purple-500 to-purple-600"></div>
                </div>

                <!-- Pedidos Pendentes -->
                <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 border border-gray-100 overflow-hidden group">
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-600 mb-1">Pedidos Pendentes</p>
                                <p class="text-3xl font-bold text-gray-900">{{ $pendingOrders }}</p>
                                <p class="text-xs text-gray-500 mt-1">Aguardando processamento</p>
                            </div>
                            <div class="relative">
                                <div class="w-16 h-16 bg-gradient-to-br from-orange-500 to-orange-600 rounded-xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-300">
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <div class="absolute -top-1 -right-1 w-4 h-4 bg-orange-100 rounded-full flex items-center justify-center">
                                    <div class="w-2 h-2 bg-orange-500 rounded-full animate-pulse"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="h-1 bg-gradient-to-r from-orange-500 to-orange-600"></div>
                </div>
            </div>


            <!-- Alertas e Notificações -->
            <div class="bg-white rounded-xl shadow-lg border border-gray-100">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-lg font-bold text-gray-900">Alertas</h3>
                        <span class="bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded-full">{{ $alerts->count() }} ativo(s)</span>
                    </div>

                    <div class="space-y-4">
                        @forelse($alerts as $alert)
                        <!-- Alerta Dinâmico -->
                        <div class="flex items-start space-x-3 p-3 rounded-lg border
                            @if($alert->type == 'warning' || $alert->type == 'danger') bg-orange-50 border-orange-200
                            @elseif($alert->type == 'info') bg-blue-50 border-blue-200
                            @elseif($alert->type == 'success') bg-green-50 border-green-200
                            @else bg-gray-50 border-gray-200
                            @endif">
                            <div class="flex-shrink-0 w-8 h-8 rounded-full flex items-center justify-center
                                @if($alert->type == 'warning' || $alert->type == 'danger') bg-orange-100
                                @elseif($alert->type == 'info') bg-red-100
                                @elseif($alert->type == 'success') bg-green-100
                                @else bg-gray-100
                                @endif">
                                @if($alert->icon == 'exclamation')
                                <svg class="w-4 h-4 {{ $alert->type == 'warning' ? 'text-orange-600' : 'text-red-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z" />
                                </svg>
                                @elseif($alert->icon == 'clock')
                                <svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                @else
                                <svg class="w-4 h-4 {{ $alert->type == 'success' ? 'text-red-600' : 'text-gray-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                @endif
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-900">{{ $alert->title }}</p>
                                <p class="text-xs text-gray-600 mt-1">{{ $alert->message }}</p>
                            </div>
                        </div>
                        @empty
                        <div class="text-center py-8">
                            <p class="text-gray-500 text-sm">Nenhum alerta ativo no momento</p>
                        </div>
                        @endforelse
                    </div>

                    <div class="mt-6">
                        <a href="{{ route('admin.alertas.index') }}" class="block w-full bg-red-600 hover:bg-red-700 text-white py-2 px-4 rounded-lg text-sm font-medium transition-colors duration-200 text-center">
                            Ver todos os alertas
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Menu de Ações Rápidas -->
        <div class="bg-white rounded-xl shadow-lg border border-gray-100 mb-8">
            <div class="p-8">
                <div class="flex items-center justify-between mb-6">
                    <div>
                        <h3 class="text-xl font-bold text-gray-900">Ações Rápidas</h3>
                        <p class="text-sm text-gray-600 mt-1">Acesso rápido às principais funcionalidades</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                    <!-- Adicionar Produto -->
                    <a href="{{ route('admin.products.create') }}" class="group relative bg-gradient-to-br from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white p-4 rounded-xl text-center transition-all duration-300 transform hover:scale-105 hover:shadow-xl">
                        <div class="absolute inset-0 bg-white opacity-0 group-hover:opacity-10 rounded-xl transition-opacity duration-300"></div>
                        <div class="relative">
                            <div class="w-10 h-10 mx-auto mb-2 bg-white bg-opacity-20 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                </svg>
                            </div>
                            <div class="font-semibold text-sm">Adicionar Produto</div>
                            <div class="text-blue-100 text-xs mt-1">Novo item</div>
                        </div>
                    </a>

                    <!-- Gerenciar Produtos -->
                    <a href="{{ route('admin.products.index') }}" class="group relative bg-gradient-to-br from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white p-4 rounded-xl text-center transition-all duration-300 transform hover:scale-105 hover:shadow-xl">
                        <div class="absolute inset-0 bg-white opacity-0 group-hover:opacity-10 rounded-xl transition-opacity duration-300"></div>
                        <div class="relative">
                            <div class="w-10 h-10 mx-auto mb-2 bg-white bg-opacity-20 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                                </svg>
                            </div>
                            <div class="font-semibold text-sm">Gerenciar Produtos</div>
                            <div class="text-green-100 text-xs mt-1">Editar itens</div>
                        </div>
                    </a>

                    <!-- Controle de Estoque -->
                    <a href="{{ route('inventory.index') }}" class="group relative bg-gradient-to-br from-purple-500 to-purple-600 hover:from-purple-600 hover:to-purple-700 text-white p-4 rounded-xl text-center transition-all duration-300 transform hover:scale-105 hover:shadow-xl">
                        <div class="absolute inset-0 bg-white opacity-0 group-hover:opacity-10 rounded-xl transition-opacity duration-300"></div>
                        <div class="relative">
                            <div class="w-10 h-10 mx-auto mb-2 bg-white bg-opacity-20 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                                </svg>
                            </div>
                            <div class="font-semibold text-sm">Controle de Estoque</div>
                            <div class="text-purple-100 text-xs mt-1">Inventário</div>
                        </div>
                    </a>

                    <!-- Relatórios -->
                    <a href="{{ route('inventory.reports') }}" class="group relative bg-gradient-to-br from-indigo-500 to-indigo-600 hover:from-indigo-600 hover:to-indigo-700 text-white p-4 rounded-xl text-center transition-all duration-300 transform hover:scale-105 hover:shadow-xl">
                        <div class="absolute inset-0 bg-white opacity-0 group-hover:opacity-10 rounded-xl transition-opacity duration-300"></div>
                        <div class="relative">
                            <div class="w-10 h-10 mx-auto mb-2 bg-white bg-opacity-20 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                </svg>
                            </div>
                            <div class="font-semibold text-sm">Relatórios</div>
                            <div class="text-indigo-100 text-xs mt-1">Análises</div>
                        </div>
                    </a>

                    <!-- Configurações -->
                    <a href="#" class="group relative bg-gradient-to-br from-gray-500 to-gray-600 hover:from-gray-600 hover:to-gray-700 text-white p-4 rounded-xl text-center transition-all duration-300 transform hover:scale-105 hover:shadow-xl">
                        <div class="absolute inset-0 bg-white opacity-0 group-hover:opacity-10 rounded-xl transition-opacity duration-300"></div>
                        <div class="relative">
                            <div class="w-10 h-10 mx-auto mb-2 bg-white bg-opacity-20 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                            <div class="font-semibold text-sm">Configurações</div>
                            <div class="text-gray-100 text-xs mt-1">Sistema</div>
                        </div>
                    </a>

                    <!-- Ver Site -->
                    <a href="{{ route('home') }}" target="_blank" class="group relative bg-gradient-to-br from-orange-500 to-orange-600 hover:from-orange-600 hover:to-orange-700 text-white p-4 rounded-xl text-center transition-all duration-300 transform hover:scale-105 hover:shadow-xl">
                        <div class="absolute inset-0 bg-white opacity-0 group-hover:opacity-10 rounded-xl transition-opacity duration-300"></div>
                        <div class="relative">
                            <div class="w-10 h-10 mx-auto mb-2 bg-white bg-opacity-20 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                </svg>
                            </div>
                            <div class="font-semibold text-sm">Ver Site</div>
                            <div class="text-orange-100 text-xs mt-1">Abrir loja</div>
                        </div>
                    </a>

                    <!-- Gerenciar Pedidos -->
                    <a href="{{ route('admin.pedidos.index') }}" class="group relative bg-gradient-to-br from-teal-500 to-teal-600 hover:from-teal-600 hover:to-teal-700 text-white p-4 rounded-xl text-center transition-all duration-300 transform hover:scale-105 hover:shadow-xl">
                        <div class="absolute inset-0 bg-white opacity-0 group-hover:opacity-10 rounded-xl transition-opacity duration-300"></div>
                        <div class="relative">
                            <div class="w-10 h-10 mx-auto mb-2 bg-white bg-opacity-20 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                                </svg>
                            </div>
                            <div class="font-semibold text-sm">Gerenciar Pedidos</div>
                            <div class="text-teal-100 text-xs mt-1">Pedidos</div>
                        </div>
                    </a>

                    <!-- Alertas -->
                    <a href="{{ route('admin.alertas.index') }}" class="group relative bg-gradient-to-br from-pink-500 to-pink-600 hover:from-pink-600 hover:to-pink-700 text-white p-4 rounded-xl text-center transition-all duration-300 transform hover:scale-105 hover:shadow-xl">
                        <div class="absolute inset-0 bg-white opacity-0 group-hover:opacity-10 rounded-xl transition-opacity duration-300"></div>
                        <div class="relative">
                            <div class="w-10 h-10 mx-auto mb-2 bg-white bg-opacity-20 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z" />
                                </svg>
                            </div>
                            <div class="font-semibold text-sm">Alertas</div>
                            <div class="text-pink-100 text-xs mt-1">Notificações</div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <!-- Pedidos Recentes -->
        @if($recentOrders->count() > 0)
        <div class="bg-white rounded-xl shadow-lg border border-gray-100">
            <div class="p-8">
                <div class="flex items-center justify-between mb-6">
                    <div>
                        <h3 class="text-xl font-bold text-gray-900">Pedidos Recentes</h3>
                        <p class="text-sm text-gray-600 mt-1">Últimas 5 transações do sistema</p>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="text-right">
                            <p class="text-xs text-gray-500">Total de pedidos</p>
                            <p class="text-sm font-semibold text-gray-900">{{ $totalOrders }}</p>
                        </div>
                        <a href="{{ route('admin.pedidos.index') }}" class="bg-red-600 hover:bg-red-700 text-white px-3 py-2 rounded-lg text-sm font-medium transition-colors duration-200">
                            Ver todos
                        </a>
                    </div>
                </div>

                <div class="overflow-hidden rounded-lg border border-gray-200">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gradient-to-r from-gray-50 to-gray-100">
                            <tr>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Número</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Cliente</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Total</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Data</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-100">
                            @foreach($recentOrders as $order)
                            <tr class="hover:bg-gray-50 transition-colors duration-150">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="w-8 h-8 bg-red-100 rounded-lg flex items-center justify-center mr-3">
                                            <svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                                            </svg>
                                        </div>
                                        <div>
                                            <div class="text-sm font-semibold text-gray-900">{{ $order->order_number }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">{{ $order->customer_name }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-bold text-gray-900">R$ {{ number_format($order->total_amount, 2, ',', '.') }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold
                                            @if($order->status == 'pending') bg-yellow-100 text-yellow-800
                                            @elseif($order->status == 'processing') bg-red-100 text-red-800
                                            @elseif($order->status == 'shipped') bg-purple-100 text-purple-800
                                            @elseif($order->status == 'delivered') bg-green-100 text-green-800
                                            @else bg-red-100 text-red-800
                                            @endif">
                                        <div class="w-2 h-2 rounded-full mr-2
                                                @if($order->status == 'pending') bg-yellow-500
                                                @elseif($order->status == 'processing') bg-blue-500
                                                @elseif($order->status == 'shipped') bg-purple-500
                                                @elseif($order->status == 'delivered') bg-green-500
                                                @else bg-red-500
                                                @endif"></div>
                                        @switch($order->status)
                                        @case('pending') Pendente @break
                                        @case('processing') Processando @break
                                        @case('shipped') Enviado @break
                                        @case('delivered') Entregue @break
                                        @case('cancelled') Cancelado @break
                                        @endswitch
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-600">{{ $order->created_at->format('d/m/Y') }}</div>
                                    <div class="text-xs text-gray-500">{{ $order->created_at->format('H:i') }}</div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @else
        <div class="bg-white rounded-xl shadow-lg border border-gray-100">
            <div class="p-12 text-center">
                <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Nenhum pedido encontrado</h3>
                <p class="text-gray-600 mb-6">Ainda não há pedidos registrados no sistema.</p>
                <a href="{{ route('home') }}" target="_blank" class="inline-flex items-center px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg font-medium transition-colors duration-200">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                    </svg>
                    Visitar loja
                </a>
            </div>
        </div>
        @endif
    </div>
    </div>
</x-app-layout>