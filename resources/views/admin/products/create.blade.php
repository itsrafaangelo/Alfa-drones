<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Adicionar Produto') }}
            </h2>
            <a href="{{ route('admin.products.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-md font-medium transition-colors duration-200">
                Voltar
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form action="{{ route('admin.products.store') }}" method="POST" id="productForm">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Informações Básicas -->
                            <div class="space-y-4">
                                <h3 class="text-lg font-medium text-gray-900">Informações Básicas</h3>

                                <div>
                                    <label for="name" class="block text-sm font-medium text-gray-700">Nome do Produto *</label>
                                    <input type="text" name="name" id="name" value="{{ old('name') }}" required
                                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                    @error('name')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="category_id" class="block text-sm font-medium text-gray-700">Categoria *</label>
                                    <select name="category_id" id="category_id" required
                                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
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
                                    <label for="short_description" class="block text-sm font-medium text-gray-700">Descrição Curta</label>
                                    <textarea name="short_description" id="short_description" rows="2"
                                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">{{ old('short_description') }}</textarea>
                                    @error('short_description')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="description" class="block text-sm font-medium text-gray-700">Descrição Completa *</label>
                                    <textarea name="description" id="description" rows="4" required
                                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">{{ old('description') }}</textarea>
                                    @error('description')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <!-- Preços e Estoque -->
                            <div class="space-y-4">
                                <h3 class="text-lg font-medium text-gray-900">Preços e Estoque</h3>

                                <div>
                                    <label for="price" class="block text-sm font-medium text-gray-700">Preço *</label>
                                    <input type="number" name="price" id="price" value="{{ old('price') }}" step="0.01" min="0" required
                                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                    @error('price')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="sale_price" class="block text-sm font-medium text-gray-700">Preço Promocional</label>
                                    <input type="number" name="sale_price" id="sale_price" value="{{ old('sale_price') }}" step="0.01" min="0"
                                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                    @error('sale_price')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="stock_quantity" class="block text-sm font-medium text-gray-700">Quantidade em Estoque *</label>
                                    <input type="number" name="stock_quantity" id="stock_quantity" value="{{ old('stock_quantity', 0) }}" min="0" required
                                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                    @error('stock_quantity')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="flex items-center space-x-4">
                                    <div class="flex items-center">
                                        <input type="checkbox" name="active" id="active" value="1" {{ old('active', true) ? 'checked' : '' }}
                                            class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                                        <label for="active" class="ml-2 block text-sm text-gray-900">Produto Ativo</label>
                                    </div>

                                    <div class="flex items-center">
                                        <input type="checkbox" name="featured" id="featured" value="1" {{ old('featured') ? 'checked' : '' }}
                                            class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                                        <label for="featured" class="ml-2 block text-sm text-gray-900">Produto em Destaque</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Imagens -->
                        <div class="mt-8">
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Imagens do Produto</h3>
                            <div id="images-container">
                                <div class="image-input flex items-center space-x-2 mb-2">
                                    <input type="text" name="images[]" placeholder="Nome do arquivo de imagem (ex: drone-1.jpg)"
                                        class="flex-1 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                    <button type="button" onclick="removeImageInput(this)" class="bg-red-500 text-white px-3 py-2 rounded-md hover:bg-red-600">Remover</button>
                                </div>
                            </div>
                            <button type="button" onclick="addImageInput()" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600">
                                Adicionar Imagem
                            </button>
                            <p class="text-sm text-gray-500 mt-2">As imagens devem estar na pasta public/images/</p>
                        </div>

                        <!-- Especificações -->
                        <div class="mt-8">
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Especificações Técnicas</h3>
                            <div id="specifications-container">
                                <div class="specification-input grid grid-cols-2 gap-2 mb-2">
                                    <input type="text" name="spec_keys[]" placeholder="Nome da especificação"
                                        class="border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                    <div class="flex space-x-2">
                                        <input type="text" name="spec_values[]" placeholder="Valor"
                                            class="flex-1 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                        <button type="button" onclick="removeSpecInput(this)" class="bg-red-500 text-white px-3 py-2 rounded-md hover:bg-red-600">Remover</button>
                                    </div>
                                </div>
                            </div>
                            <button type="button" onclick="addSpecInput()" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600">
                                Adicionar Especificação
                            </button>
                        </div>

                        <div class="mt-8 flex justify-end space-x-3">
                            <a href="{{ route('admin.products.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-700 px-6 py-2 rounded-md font-medium transition-colors duration-200">
                                Cancelar
                            </a>
                            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-md font-medium transition-colors duration-200">
                                Salvar Produto
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function addImageInput() {
            const container = document.getElementById('images-container');
            const div = document.createElement('div');
            div.className = 'image-input flex items-center space-x-2 mb-2';
            div.innerHTML = `
                <input type="text" name="images[]" placeholder="Nome do arquivo de imagem (ex: drone-1.jpg)" 
                       class="flex-1 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                <button type="button" onclick="removeImageInput(this)" class="bg-red-500 text-white px-3 py-2 rounded-md hover:bg-red-600">Remover</button>
            `;
            container.appendChild(div);
        }

        function removeImageInput(button) {
            button.parentElement.remove();
        }

        function addSpecInput() {
            const container = document.getElementById('specifications-container');
            const div = document.createElement('div');
            div.className = 'specification-input grid grid-cols-2 gap-2 mb-2';
            div.innerHTML = `
                <input type="text" name="spec_keys[]" placeholder="Nome da especificação" 
                       class="border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                <div class="flex space-x-2">
                    <input type="text" name="spec_values[]" placeholder="Valor" 
                           class="flex-1 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    <button type="button" onclick="removeSpecInput(this)" class="bg-red-500 text-white px-3 py-2 rounded-md hover:bg-red-600">Remover</button>
                </div>
            `;
            container.appendChild(div);
        }

        function removeSpecInput(button) {
            button.parentElement.parentElement.remove();
        }

        // Form submission handler
        document.getElementById('productForm').addEventListener('submit', function(e) {
            // Process specifications
            const specKeys = document.querySelectorAll('input[name="spec_keys[]"]');
            const specValues = document.querySelectorAll('input[name="spec_values[]"]');
            const specifications = {};

            specKeys.forEach((key, index) => {
                if (key.value && specValues[index] && specValues[index].value) {
                    specifications[key.value] = specValues[index].value;
                }
            });

            // Create hidden input for specifications
            const specInput = document.createElement('input');
            specInput.type = 'hidden';
            specInput.name = 'specifications';
            specInput.value = JSON.stringify(specifications);
            this.appendChild(specInput);

            // Process images
            const imageInputs = document.querySelectorAll('input[name="images[]"]');
            const images = [];
            imageInputs.forEach(input => {
                if (input.value) {
                    images.push(input.value);
                }
            });

            // Create hidden input for images
            const imagesInput = document.createElement('input');
            imagesInput.type = 'hidden';
            imagesInput.name = 'images';
            imagesInput.value = JSON.stringify(images);
            this.appendChild(imagesInput);
        });
    </script>
</x-app-layout>