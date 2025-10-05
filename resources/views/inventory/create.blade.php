<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Novo Produto') }}
                </h2>
                <p class="text-sm text-gray-600 mt-1">Cadastre um novo produto no estoque</p>
            </div>
            <a href="{{ route('inventory.index') }}"
                class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition duration-200 flex items-center space-x-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                <span>Voltar</span>
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form method="POST" action="{{ route('inventory.store') }}" enctype="multipart/form-data" class="space-y-6">
                        @csrf

                        <!-- Informações Básicas -->
                        <div class="border-b border-gray-200 pb-6">
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Informações Básicas</h3>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                                        Nome do Produto *
                                    </label>
                                    <input type="text"
                                        id="name"
                                        name="name"
                                        value="{{ old('name') }}"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('name') border-red-500 @enderror"
                                        placeholder="Ex: Drone DJI Mini 4 Pro"
                                        required>
                                    @error('name')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="category_id" class="block text-sm font-medium text-gray-700 mb-2">
                                        Categoria *
                                    </label>
                                    <select id="category_id"
                                        name="category_id"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('category_id') border-red-500 @enderror"
                                        required>
                                        <option value="">Selecione uma categoria</option>
                                        @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="sku" class="block text-sm font-medium text-gray-700 mb-2">
                                        SKU (Código do Produto)
                                    </label>
                                    <input type="text"
                                        id="sku"
                                        name="sku"
                                        value="{{ old('sku') }}"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('sku') border-red-500 @enderror"
                                        placeholder="Ex: DRONE-DJI-MINI4-001">
                                    @error('sku')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="barcode" class="block text-sm font-medium text-gray-700 mb-2">
                                        Código de Barras
                                    </label>
                                    <input type="text"
                                        id="barcode"
                                        name="barcode"
                                        value="{{ old('barcode') }}"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('barcode') border-red-500 @enderror"
                                        placeholder="Ex: 7891234567890">
                                    @error('barcode')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="mt-6">
                                <label for="short_description" class="block text-sm font-medium text-gray-700 mb-2">
                                    Descrição Curta
                                </label>
                                <input type="text"
                                    id="short_description"
                                    name="short_description"
                                    value="{{ old('short_description') }}"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('short_description') border-red-500 @enderror"
                                    placeholder="Breve descrição do produto">
                                @error('short_description')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mt-6">
                                <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                                    Descrição Completa *
                                </label>
                                <textarea id="description"
                                    name="description"
                                    rows="4"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('description') border-red-500 @enderror"
                                    placeholder="Descrição detalhada do produto"
                                    required>{{ old('description') }}</textarea>
                                @error('description')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mt-6">
                                <label for="image" class="block text-sm font-medium text-gray-700 mb-2">
                                    Imagem do Produto
                                </label>
                                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-lg hover:border-gray-400 transition-colors duration-200">
                                    <div class="space-y-1 text-center">
                                        <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        <div class="flex text-sm text-gray-600">
                                            <label for="image" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                                <span>Clique para fazer upload</span>
                                                <input id="image" name="image" type="file" accept="image/*" class="sr-only" onchange="previewImage(this)">
                                            </label>
                                            <p class="pl-1">ou arraste e solte</p>
                                        </div>
                                        <p class="text-xs text-gray-500">PNG, JPG, JPEG até 2MB</p>
                                    </div>
                                </div>
                                <div id="image-preview" class="mt-3 hidden">
                                    <img id="preview-img" class="mx-auto h-32 w-32 object-cover rounded-lg" alt="Preview">
                                    <button type="button" onclick="removeImage()" class="mt-2 text-sm text-red-600 hover:text-red-500">Remover imagem</button>
                                </div>
                                @error('image')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Preços -->
                        <div class="border-b border-gray-200 pb-6">
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Preços</h3>

                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                <div>
                                    <label for="price" class="block text-sm font-medium text-gray-700 mb-2">
                                        Preço de Venda *
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <span class="text-gray-500 sm:text-sm">R$</span>
                                        </div>
                                        <input type="number"
                                            id="price"
                                            name="price"
                                            step="0.01"
                                            min="0"
                                            value="{{ old('price') }}"
                                            class="w-full pl-8 pr-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('price') border-red-500 @enderror"
                                            placeholder="0,00"
                                            required>
                                    </div>
                                    @error('price')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="sale_price" class="block text-sm font-medium text-gray-700 mb-2">
                                        Preço Promocional
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <span class="text-gray-500 sm:text-sm">R$</span>
                                        </div>
                                        <input type="number"
                                            id="sale_price"
                                            name="sale_price"
                                            step="0.01"
                                            min="0"
                                            value="{{ old('sale_price') }}"
                                            class="w-full pl-8 pr-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('sale_price') border-red-500 @enderror"
                                            placeholder="0,00">
                                    </div>
                                    @error('sale_price')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="cost_price" class="block text-sm font-medium text-gray-700 mb-2">
                                        Preço de Custo
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <span class="text-gray-500 sm:text-sm">R$</span>
                                        </div>
                                        <input type="number"
                                            id="cost_price"
                                            name="cost_price"
                                            step="0.01"
                                            min="0"
                                            value="{{ old('cost_price') }}"
                                            class="w-full pl-8 pr-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('cost_price') border-red-500 @enderror"
                                            placeholder="0,00">
                                    </div>
                                    @error('cost_price')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Estoque -->
                        <div class="border-b border-gray-200 pb-6">
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Controle de Estoque</h3>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="stock_quantity" class="block text-sm font-medium text-gray-700 mb-2">
                                        Quantidade em Estoque *
                                    </label>
                                    <input type="number"
                                        id="stock_quantity"
                                        name="stock_quantity"
                                        min="0"
                                        value="{{ old('stock_quantity', 0) }}"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('stock_quantity') border-red-500 @enderror"
                                        required>
                                    @error('stock_quantity')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="min_stock_level" class="block text-sm font-medium text-gray-700 mb-2">
                                        Estoque Mínimo *
                                    </label>
                                    <input type="number"
                                        id="min_stock_level"
                                        name="min_stock_level"
                                        min="0"
                                        value="{{ old('min_stock_level', 10) }}"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('min_stock_level') border-red-500 @enderror"
                                        required>
                                    @error('min_stock_level')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Status e Configurações -->
                        <div class="pb-6">
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Status e Configurações</h3>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="status" class="block text-sm font-medium text-gray-700 mb-2">
                                        Status do Produto *
                                    </label>
                                    <select id="status"
                                        name="status"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('status') border-red-500 @enderror"
                                        required>
                                        <option value="ativo" {{ old('status') == 'ativo' ? 'selected' : '' }}>Ativo</option>
                                        <option value="inativo" {{ old('status') == 'inativo' ? 'selected' : '' }}>Inativo</option>
                                        <option value="descontinuado" {{ old('status') == 'descontinuado' ? 'selected' : '' }}>Descontinuado</option>
                                    </select>
                                    @error('status')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="space-y-4">
                                    <div class="flex items-center">
                                        <input id="active"
                                            name="active"
                                            type="checkbox"
                                            value="1"
                                            {{ old('active', true) ? 'checked' : '' }}
                                            class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                                        <label for="active" class="ml-2 block text-sm text-gray-700">
                                            Produto ativo no sistema
                                        </label>
                                    </div>

                                    <div class="flex items-center">
                                        <input id="featured"
                                            name="featured"
                                            type="checkbox"
                                            value="1"
                                            {{ old('featured') ? 'checked' : '' }}
                                            class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                                        <label for="featured" class="ml-2 block text-sm text-gray-700">
                                            Produto em destaque
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Botões -->
                        <div class="flex justify-end space-x-4">
                            <a href="{{ route('inventory.index') }}"
                                class="bg-gray-600 hover:bg-gray-700 text-white px-6 py-2 rounded-lg text-sm font-medium transition duration-200">
                                Cancelar
                            </a>
                            <button type="submit"
                                class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-lg text-sm font-medium transition duration-200">
                                💾 Salvar Produto
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function previewImage(input) {
            const file = input.files[0];
            const preview = document.getElementById('image-preview');
            const previewImg = document.getElementById('preview-img');

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImg.src = e.target.result;
                    preview.classList.remove('hidden');
                };
                reader.readAsDataURL(file);
            }
        }

        function removeImage() {
            document.getElementById('image').value = '';
            document.getElementById('image-preview').classList.add('hidden');
        }
    </script>
</x-app-layout>