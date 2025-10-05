@php
use Illuminate\Support\Facades\Storage;
@endphp

<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ $product->name }}
                </h2>
                <p class="text-sm text-gray-600 mt-1">Detalhes e controle do produto</p>
            </div>
            <div class="flex space-x-3">
                <a href="{{ route('inventory.edit', $product) }}"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition duration-200 flex items-center space-x-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                    <span>Editar</span>
                </a>
                <a href="{{ route('inventory.index') }}"
                    class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition duration-200 flex items-center space-x-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                    <span>Voltar</span>
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Informações Gerais -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Informações Gerais</h3>

                    @if($product->image_path)
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Imagem do Produto:</label>
                        <img src="{{ Storage::url($product->image_path) }}" alt="{{ $product->name }}" class="h-48 w-48 object-cover rounded-lg shadow-md">
                    </div>
                    @endif

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Nome</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $product->name }}</p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Categoria</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $product->category->name }}</p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Status</label>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                @if($product->status == 'ativo') bg-green-100 text-green-800
                                @elseif($product->status == 'inativo') bg-gray-100 text-gray-800
                                @else bg-red-100 text-red-800 @endif">
                                {{ ucfirst($product->status) }}
                            </span>
                        </div>

                        @if($product->sku)
                        <div>
                            <label class="block text-sm font-medium text-gray-700">SKU</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $product->sku }}</p>
                        </div>
                        @endif

                        @if($product->barcode)
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Código de Barras</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $product->barcode }}</p>
                        </div>
                        @endif

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Criado em</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $product->created_at->format('d/m/Y H:i') }}</p>
                        </div>
                    </div>

                    @if($product->description)
                    <div class="mt-6">
                        <label class="block text-sm font-medium text-gray-700">Descrição</label>
                        <p class="mt-1 text-sm text-gray-900">{{ $product->description }}</p>
                    </div>
                    @endif
                </div>
            </div>

            <!-- Estoque e Preços -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
                <!-- Controle de Estoque -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-lg font-medium text-gray-900">Controle de Estoque</h3>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                @if($product->isOutOfStock()) bg-red-100 text-red-800
                                @elseif($product->isLowStock()) bg-yellow-100 text-yellow-800
                                @else bg-green-100 text-green-800 @endif">
                                {{ $product->stock_status }}
                            </span>
                        </div>

                        <div class="space-y-4">
                            <div class="flex justify-between">
                                <span class="text-sm text-gray-600">Quantidade atual:</span>
                                <span class="text-sm font-medium text-gray-900">{{ $product->stock_quantity }}</span>
                            </div>

                            <div class="flex justify-between">
                                <span class="text-sm text-gray-600">Estoque mínimo:</span>
                                <span class="text-sm font-medium text-gray-900">{{ $product->min_stock_level }}</span>
                            </div>

                            <div class="flex justify-between">
                                <span class="text-sm text-gray-600">Quantidade vendida:</span>
                                <span class="text-sm font-medium text-gray-900">{{ $product->sold_quantity }}</span>
                            </div>
                        </div>

                        <!-- Formulário de Ajuste de Estoque -->
                        <div class="mt-6 border-t pt-6">
                            <h4 class="text-md font-medium text-gray-900 mb-3">Ajustar Estoque</h4>

                            <form method="POST" action="{{ route('inventory.adjust-stock', $product) }}" class="space-y-3">
                                @csrf

                                <div class="grid grid-cols-2 gap-3">
                                    <select name="adjustment_type" class="px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                        <option value="add">Adicionar</option>
                                        <option value="remove">Remover</option>
                                        <option value="set">Definir quantidade</option>
                                    </select>

                                    <input type="number" name="quantity" min="1" placeholder="Quantidade"
                                        class="px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                                </div>

                                <input type="text" name="reason" placeholder="Motivo do ajuste (opcional)"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">

                                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition duration-200">
                                    📦 Ajustar Estoque
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Controle de Preços -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Preços</h3>

                        <div class="space-y-4">
                            <div class="flex justify-between">
                                <span class="text-sm text-gray-600">Preço de venda:</span>
                                <span class="text-sm font-medium text-gray-900">R$ {{ number_format($product->price, 2, ',', '.') }}</span>
                            </div>

                            @if($product->sale_price)
                            <div class="flex justify-between">
                                <span class="text-sm text-gray-600">Preço promocional:</span>
                                <span class="text-sm font-medium text-green-600">R$ {{ number_format($product->sale_price, 2, ',', '.') }}</span>
                            </div>
                            @endif

                            @if($product->cost_price)
                            <div class="flex justify-between">
                                <span class="text-sm text-gray-600">Preço de custo:</span>
                                <span class="text-sm font-medium text-gray-900">R$ {{ number_format($product->cost_price, 2, ',', '.') }}</span>
                            </div>

                            <div class="flex justify-between">
                                <span class="text-sm text-gray-600">Margem de lucro:</span>
                                <span class="text-sm font-medium text-green-600">{{ number_format($product->profit_margin, 1) }}%</span>
                            </div>
                            @endif

                            <div class="flex justify-between font-medium">
                                <span class="text-sm text-gray-900">Preço atual:</span>
                                <span class="text-sm text-blue-600">R$ {{ number_format($product->current_price, 2, ',', '.') }}</span>
                            </div>
                        </div>

                        <!-- Formulário de Atualização de Preços -->
                        <div class="mt-6 border-t pt-6">
                            <h4 class="text-md font-medium text-gray-900 mb-3">Atualizar Preços</h4>

                            <form method="POST" action="{{ route('inventory.update-price', $product) }}" class="space-y-3">
                                @csrf

                                <div>
                                    <label class="block text-xs font-medium text-gray-700 mb-1">Preço de venda</label>
                                    <input type="number" name="price" step="0.01" min="0" value="{{ $product->price }}"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                                </div>

                                <div>
                                    <label class="block text-xs font-medium text-gray-700 mb-1">Preço promocional</label>
                                    <input type="number" name="sale_price" step="0.01" min="0" value="{{ $product->sale_price }}"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                </div>

                                <div>
                                    <label class="block text-xs font-medium text-gray-700 mb-1">Preço de custo</label>
                                    <input type="number" name="cost_price" step="0.01" min="0" value="{{ $product->cost_price }}"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                </div>

                                <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition duration-200">
                                    💰 Atualizar Preços
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Histórico de Vendas -->
            @if($product->orderItems->count() > 0)
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Histórico de Vendas</h3>

                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pedido</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cliente</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Quantidade</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Preço Unit.</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Data</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($product->orderItems as $item)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        #{{ $item->order->order_number }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ $item->order->customer_name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ $item->quantity }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        R$ {{ number_format($item->price, 2, ',', '.') }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        R$ {{ number_format($item->quantity * $item->price, 2, ',', '.') }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
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