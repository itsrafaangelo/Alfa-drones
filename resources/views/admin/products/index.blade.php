<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Gerenciar Produtos') }}
            </h2>
            <a href="{{ route('admin.products.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md font-medium transition-colors duration-200">
                Adicionar Produto
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
            <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                {{ session('success') }}
            </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    @if($products->count() > 0)
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Produto</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Categoria</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Preço</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Estoque</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ações</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($products as $product)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-12 w-12">
                                                @if($product->images && count($product->images) > 0)
                                                <img class="h-12 w-12 rounded-lg object-cover" src="{{ asset('images/' . $product->images[0]) }}" alt="{{ $product->name }}">
                                                @else
                                                <div class="h-12 w-12 rounded-lg bg-gray-200 flex items-center justify-center">
                                                    <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 24 24">
                                                        <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5" />
                                                    </svg>
                                                </div>
                                                @endif
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">{{ $product->name }}</div>
                                                <div class="text-sm text-gray-500">{{ Str::limit($product->short_description ?? $product->description, 50) }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ $product->category->name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        @if($product->sale_price)
                                        <div class="text-gray-500 line-through">R$ {{ number_format($product->price, 2, ',', '.') }}</div>
                                        <div class="font-medium text-red-600">R$ {{ number_format($product->sale_price, 2, ',', '.') }}</div>
                                        @else
                                        <div class="font-medium">R$ {{ number_format($product->price, 2, ',', '.') }}</div>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        <span class="@if($product->stock_quantity <= 5) text-red-600 @elseif($product->stock_quantity <= 10) text-yellow-600 @else text-green-600 @endif">
                                            {{ $product->stock_quantity }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $product->active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                            {{ $product->active ? 'Ativo' : 'Inativo' }}
                                        </span>
                                        @if($product->featured)
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800 ml-1">
                                            Destaque
                                        </span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <div class="flex space-x-2">
                                            <a href="{{ route('products.show', $product->slug) }}" target="_blank" class="text-blue-600 hover:text-blue-900" title="Ver no site">
                                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                                </svg>
                                            </a>
                                            <a href="{{ route('admin.products.edit', $product) }}" class="text-indigo-600 hover:text-indigo-900" title="Editar">
                                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z" />
                                                </svg>
                                            </a>
                                            <form action="{{ route('admin.products.destroy', $product) }}" method="POST" class="inline" onsubmit="return confirm('Tem certeza que deseja excluir este produto?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900" title="Excluir">
                                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                                        <path d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-6">
                        {{ $products->links() }}
                    </div>
                    @else
                    <div class="text-center py-8">
                        <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5" />
                        </svg>
                        <h3 class="text-lg font-medium text-gray-900 mb-2">Nenhum produto cadastrado</h3>
                        <p class="text-gray-600 mb-4">Comece adicionando seu primeiro produto.</p>
                        <a href="{{ route('admin.products.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md font-medium transition-colors duration-200">
                            Adicionar Produto
                        </a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>