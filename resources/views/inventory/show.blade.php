@php
use Illuminate\Support\Facades\Storage;
@endphp

<x-app-layout>
    <div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

            <!-- Header -->
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-gray-900">{{ $product->name }}</h1>
                <p class="text-gray-600 mt-1">Detalhes e controle do produto</p>
            </div>

            <!-- Informações Gerais -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 mb-6">
                <div class="p-8">
                    <div class="flex items-center mb-6">
                        <svg class="w-6 h-6 text-red-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <h3 class="text-xl font-bold text-gray-900">Informações Gerais</h3>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        @if($product->image_path)
                        <div class="flex justify-center">
                            <div class="relative group">
                                <img src="{{ Storage::url($product->image_path) }}" alt="{{ $product->name }}"
                                    class="h-64 w-64 object-cover rounded-xl shadow-lg group-hover:shadow-2xl transition-shadow">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent rounded-xl opacity-0 group-hover:opacity-100 transition-opacity"></div>
                            </div>
                        </div>
                        @endif

                        <div class="grid grid-cols-1 gap-6">
                            <div class="bg-gradient-to-br from-red-50 to-white p-4 rounded-xl border border-red-100">
                                <label class="text-xs font-medium text-gray-500 uppercase tracking-wide">Nome</label>
                                <p class="mt-1 text-base font-semibold text-gray-900">{{ $product->name }}</p>
                            </div>

                            <div class="grid grid-cols-2 gap-4">
                                <div class="bg-gradient-to-br from-blue-50 to-white p-4 rounded-xl border border-blue-100">
                                    <label class="text-xs font-medium text-gray-500 uppercase tracking-wide">Categoria</label>
                                    <p class="mt-1 text-base font-semibold text-gray-900">{{ $product->category->name }}</p>
                                </div>

                                <div class="bg-gradient-to-br from-purple-50 to-white p-4 rounded-xl border border-purple-100">
                                    <label class="text-xs font-medium text-gray-500 uppercase tracking-wide">Status</label>
                                    <span class="mt-1 inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold
                                        @if($product->status == 'ativo') bg-green-100 text-green-800
                                        @elseif($product->status == 'inativo') bg-gray-100 text-gray-800
                                        @else bg-red-100 text-red-800 @endif">
                                        {{ ucfirst($product->status) }}
                                    </span>
                                </div>
                            </div>

                            @if($product->sku || $product->barcode)
                            <div class="grid grid-cols-2 gap-4">
                                @if($product->sku)
                                <div class="bg-gray-50 p-4 rounded-xl border border-gray-200">
                                    <label class="text-xs font-medium text-gray-500 uppercase tracking-wide">SKU</label>
                                    <p class="mt-1 text-base font-mono font-medium text-gray-900">{{ $product->sku }}</p>
                                </div>
                                @endif

                                @if($product->barcode)
                                <div class="bg-gray-50 p-4 rounded-xl border border-gray-200">
                                    <label class="text-xs font-medium text-gray-500 uppercase tracking-wide">Código de Barras</label>
                                    <p class="mt-1 text-base font-mono font-medium text-gray-900">{{ $product->barcode }}</p>
                                </div>
                                @endif
                            </div>
                            @endif
                        </div>
                    </div>

                    @if($product->description)
                    <div class="mt-6 bg-gradient-to-r from-yellow-50 to-orange-50 p-6 rounded-xl border border-yellow-200">
                        <label class="text-xs font-medium text-gray-700 uppercase tracking-wide flex items-center">
                            <svg class="w-4 h-4 mr-2 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                            </svg>
                            Descrição
                        </label>
                        <p class="mt-2 text-base text-gray-900 leading-relaxed">{{ $product->description }}</p>
                    </div>
                    @endif
                </div>
            </div>

            <!-- Estoque e Preços -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
                <!-- Controle de Estoque -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-100">
                    <div class="p-6">
                        <div class="flex justify-between items-center mb-6">
                            <div class="flex items-center">
                                <svg class="w-6 h-6 text-red-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                                </svg>
                                <h3 class="text-xl font-bold text-gray-900">Estoque</h3>
                            </div>
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold
                                @if($product->isOutOfStock()) bg-red-100 text-red-800
                                @elseif($product->isLowStock()) bg-yellow-100 text-yellow-800
                                @else bg-green-100 text-green-800 @endif">
                                {{ $product->stock_status }}
                            </span>
                        </div>

                        <div class="space-y-4">
                            <div class="flex justify-between items-center p-4 bg-red-50 rounded-lg">
                                <span class="text-sm font-medium text-gray-700">Quantidade atual</span>
                                <span class="text-2xl font-bold text-red-600">{{ $product->stock_quantity }}</span>
                            </div>

                            <div class="flex justify-between items-center p-3 bg-gray-50 rounded-lg">
                                <span class="text-sm text-gray-600">Estoque mínimo</span>
                                <span class="text-sm font-semibold text-gray-900">{{ $product->min_stock_level }}</span>
                            </div>

                            <div class="flex justify-between items-center p-3 bg-gray-50 rounded-lg">
                                <span class="text-sm text-gray-600">Quantidade vendida</span>
                                <span class="text-sm font-semibold text-gray-900">{{ $product->sold_quantity }}</span>
                            </div>
                        </div>

                        <!-- Formulário de Ajuste -->
                        <div class="mt-6 border-t border-gray-200 pt-6">
                            <h4 class="text-md font-semibold text-gray-900 mb-4">Ajustar Estoque</h4>

                            <form method="POST" action="{{ route('admin.estoque.adjust-stock', $product) }}" class="space-y-4">
                                @csrf
                                <div class="grid grid-cols-2 gap-3">
                                    <select name="adjustment_type" class="px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 text-sm">
                                        <option value="add">Adicionar</option>
                                        <option value="remove">Remover</option>
                                        <option value="set">Definir</option>
                                    </select>

                                    <input type="number" name="quantity" min="1" placeholder="Quantidade"
                                        class="px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 text-sm" required>
                                </div>

                                <input type="text" name="reason" placeholder="Motivo do ajuste (opcional)"
                                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 text-sm">

                                <button type="submit" class="w-full bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white px-4 py-2.5 rounded-lg text-sm font-medium transition-all shadow-lg hover:shadow-xl">
                                    📦 Ajustar Estoque
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Controle de Preços -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-100">
                    <div class="p-6">
                        <div class="flex items-center mb-6">
                            <svg class="w-6 h-6 text-red-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1" />
                            </svg>
                            <h3 class="text-xl font-bold text-gray-900">Preços</h3>
                        </div>

                        <div class="space-y-4">
                            <div class="flex justify-between items-center p-4 bg-red-50 rounded-lg">
                                <span class="text-sm font-medium text-gray-700">Preço de venda</span>
                                <span class="text-2xl font-bold text-red-600">R$ {{ number_format($product->price, 2, ',', '.') }}</span>
                            </div>

                            @if($product->sale_price)
                            <div class="flex justify-between items-center p-3 bg-green-50 rounded-lg">
                                <span class="text-sm text-gray-700">Preço promocional</span>
                                <span class="text-lg font-bold text-green-600">R$ {{ number_format($product->sale_price, 2, ',', '.') }}</span>
                            </div>
                            @endif

                            @if($product->cost_price)
                            <div class="flex justify-between items-center p-3 bg-gray-50 rounded-lg">
                                <span class="text-sm text-gray-600">Preço de custo</span>
                                <span class="text-sm font-semibold text-gray-900">R$ {{ number_format($product->cost_price, 2, ',', '.') }}</span>
                            </div>

                            <div class="flex justify-between items-center p-3 bg-blue-50 rounded-lg">
                                <span class="text-sm text-gray-700">Margem de lucro</span>
                                <span class="text-sm font-bold text-blue-600">{{ number_format($product->profit_margin, 1) }}%</span>
                            </div>
                            @endif
                        </div>

                        <!-- Formulário de Preços -->
                        <div class="mt-6 border-t border-gray-200 pt-6">
                            <h4 class="text-md font-semibold text-gray-900 mb-4">Atualizar Preços</h4>

                            <form method="POST" action="{{ route('admin.estoque.update-price', $product) }}" class="space-y-4">
                                @csrf
                                <div>
                                    <label class="block text-xs font-medium text-gray-700 mb-2">Preço de venda</label>
                                    <input type="number" name="price" step="0.01" min="0" value="{{ $product->price }}"
                                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 text-sm" required>
                                </div>

                                <div>
                                    <label class="block text-xs font-medium text-gray-700 mb-2">Preço promocional</label>
                                    <input type="number" name="sale_price" step="0.01" min="0" value="{{ $product->sale_price }}"
                                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 text-sm">
                                </div>

                                <div>
                                    <label class="block text-xs font-medium text-gray-700 mb-2">Preço de custo</label>
                                    <input type="number" name="cost_price" step="0.01" min="0" value="{{ $product->cost_price }}"
                                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 text-sm">
                                </div>

                                <button type="submit" class="w-full bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white px-4 py-2.5 rounded-lg text-sm font-medium transition-all shadow-lg hover:shadow-xl">
                                    💰 Atualizar Preços
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Histórico de Vendas -->
            @if($product->orderItems->count() > 0)
            <div class="bg-white rounded-xl shadow-sm border border-gray-100">
                <div class="p-8">
                    <div class="flex items-center mb-6">
                        <svg class="w-6 h-6 text-red-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                        <h3 class="text-xl font-bold text-gray-900">Histórico de Vendas</h3>
                    </div>

                    <div class="overflow-x-auto rounded-lg border border-gray-200">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gradient-to-r from-red-600 to-red-700">
                                <tr>
                                    <th class="px-6 py-4 text-left text-xs font-bold text-white uppercase tracking-wider">Pedido</th>
                                    <th class="px-6 py-4 text-left text-xs font-bold text-white uppercase tracking-wider">Cliente</th>
                                    <th class="px-6 py-4 text-left text-xs font-bold text-white uppercase tracking-wider">Qtd</th>
                                    <th class="px-6 py-4 text-left text-xs font-bold text-white uppercase tracking-wider">Preço Unit.</th>
                                    <th class="px-6 py-4 text-left text-xs font-bold text-white uppercase tracking-wider">Total</th>
                                    <th class="px-6 py-4 text-left text-xs font-bold text-white uppercase tracking-wider">Data</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-100">
                                @foreach($product->orderItems as $item)
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="text-sm font-semibold text-gray-900">#{{ $item->order->order_number }}</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                        {{ $item->order->customer_name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-gray-100 text-gray-800">
                                            {{ $item->quantity }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        R$ {{ number_format($item->price, 2, ',', '.') }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-red-600">
                                        R$ {{ number_format($item->quantity * $item->price, 2, ',', '.') }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                        {{ $item->order->created_at->format('d/m/Y') }}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</x-app-layout>