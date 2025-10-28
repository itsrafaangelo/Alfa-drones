@php
use Illuminate\Support\Facades\Storage;
@endphp

<x-app-layout>
    <div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

            <!-- Header -->
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-gray-900">Editar Produto</h1>
                <p class="text-gray-600 mt-1">{{ $product->name }}</p>
            </div>

            <!-- Formulário -->
            <form method="POST" action="{{ route('admin.estoque.update', $product) }}" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')

                <!-- Informações Básicas -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-100">
                    <div class="p-6 border-b border-gray-100">
                        <h2 class="text-lg font-semibold text-gray-900">Informações Básicas</h2>
                    </div>
                    <div class="p-6 space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                                    Nome do Produto *
                                </label>
                                <input type="text"
                                    id="name"
                                    name="name"
                                    value="{{ old('name', $product->name) }}"
                                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all @error('name') border-red-500 @enderror"
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
                                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all @error('category_id') border-red-500 @enderror"
                                    required>
                                    <option value="">Selecione uma categoria</option>
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
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
                                    value="{{ old('sku', $product->sku) }}"
                                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all @error('sku') border-red-500 @enderror"
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
                                    value="{{ old('barcode', $product->barcode) }}"
                                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all @error('barcode') border-red-500 @enderror"
                                    placeholder="Ex: 7891234567890">
                                @error('barcode')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label for="short_description" class="block text-sm font-medium text-gray-700 mb-2">
                                Descrição Curta
                            </label>
                            <input type="text"
                                id="short_description"
                                name="short_description"
                                value="{{ old('short_description', $product->short_description) }}"
                                class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all @error('short_description') border-red-500 @enderror"
                                placeholder="Breve descrição do produto">
                            @error('short_description')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                                Descrição Completa *
                            </label>
                            <textarea id="description"
                                name="description"
                                rows="4"
                                class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all @error('description') border-red-500 @enderror"
                                placeholder="Descrição detalhada do produto"
                                required>{{ old('description', $product->description) }}</textarea>
                            @error('description')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Imagem do Produto
                            </label>

                            @if($product->image_path)
                            <div class="mb-4">
                                <p class="text-sm text-gray-600 mb-2">Imagem Atual:</p>
                                <div class="relative inline-block">
                                    <img src="{{ Storage::url($product->image_path) }}" alt="{{ $product->name }}" class="h-32 w-32 object-cover rounded-lg border-2 border-gray-200">
                                    <button type="button" onclick="removeCurrentImage()" class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full p-1.5 hover:bg-red-600 transition-all">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                </div>
                                <input type="hidden" name="remove_current_image" id="remove-current-image" value="0">
                            </div>
                            @endif

                            <div class="flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-lg hover:border-red-400 transition-all cursor-pointer">
                                <div class="space-y-2 text-center">
                                    <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                        <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    <div class="flex text-sm text-gray-600 justify-center">
                                        <label for="image" class="relative cursor-pointer bg-white rounded-md font-medium text-red-600 hover:text-red-500">
                                            <span>{{ $product->image_path ? 'Trocar imagem' : 'Clique para fazer upload' }}</span>
                                            <input id="image" name="image" type="file" accept="image/*" class="sr-only" onchange="previewImage(this)">
                                        </label>
                                        <p class="pl-1">ou arraste e solte</p>
                                    </div>
                                    <p class="text-xs text-gray-500">PNG, JPG, JPEG até 2MB</p>
                                </div>
                            </div>
                            <div id="image-preview" class="mt-4 hidden">
                                <p class="text-sm text-gray-600 mb-2">Nova Imagem:</p>
                                <div class="relative inline-block">
                                    <img id="preview-img" class="h-32 w-32 object-cover rounded-lg border-2 border-green-400" alt="Preview">
                                    <button type="button" onclick="removeImage()" class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full p-1.5 hover:bg-red-600 transition-all">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            @error('image')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Preços -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-100">
                    <div class="p-6 border-b border-gray-100">
                        <h2 class="text-lg font-semibold text-gray-900">Preços</h2>
                    </div>
                    <div class="p-6">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div>
                                <label for="price" class="block text-sm font-medium text-gray-700 mb-2">
                                    Preço de Venda *
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                        <span class="text-gray-500 text-sm font-medium">R$</span>
                                    </div>
                                    <input type="number"
                                        id="price"
                                        name="price"
                                        step="0.01"
                                        min="0"
                                        value="{{ old('price', $product->price) }}"
                                        class="w-full pl-12 pr-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all @error('price') border-red-500 @enderror"
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
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                        <span class="text-gray-500 text-sm font-medium">R$</span>
                                    </div>
                                    <input type="number"
                                        id="sale_price"
                                        name="sale_price"
                                        step="0.01"
                                        min="0"
                                        value="{{ old('sale_price', $product->sale_price) }}"
                                        class="w-full pl-12 pr-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all @error('sale_price') border-red-500 @enderror"
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
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                        <span class="text-gray-500 text-sm font-medium">R$</span>
                                    </div>
                                    <input type="number"
                                        id="cost_price"
                                        name="cost_price"
                                        step="0.01"
                                        min="0"
                                        value="{{ old('cost_price', $product->cost_price) }}"
                                        class="w-full pl-12 pr-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all @error('cost_price') border-red-500 @enderror"
                                        placeholder="0,00">
                                </div>
                                @error('cost_price')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Estoque -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-100">
                    <div class="p-6 border-b border-gray-100">
                        <h2 class="text-lg font-semibold text-gray-900">Controle de Estoque</h2>
                    </div>
                    <div class="p-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="stock_quantity" class="block text-sm font-medium text-gray-700 mb-2">
                                    Quantidade em Estoque *
                                </label>
                                <input type="number"
                                    id="stock_quantity"
                                    name="stock_quantity"
                                    min="0"
                                    value="{{ old('stock_quantity', $product->stock_quantity) }}"
                                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all @error('stock_quantity') border-red-500 @enderror"
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
                                    value="{{ old('min_stock_level', $product->min_stock_level) }}"
                                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all @error('min_stock_level') border-red-500 @enderror"
                                    required>
                                @error('min_stock_level')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Especificações -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-100">
                    <div class="p-6 border-b border-gray-100">
                        <h2 class="text-lg font-semibold text-gray-900">Especificações Técnicas</h2>
                        <p class="text-sm text-gray-600 mt-1">Adicione especificações técnicas do produto (ex: Tempo de Voo, Câmera, Peso, etc.)</p>
                    </div>
                    <div class="p-6">
                        <div id="specifications-container" class="space-y-4">
                            @if($product->specifications && count($product->specifications) > 0)
                            @foreach($product->specifications as $key => $value)
                            <div class="flex gap-4 items-start p-4 bg-gray-50 rounded-lg border border-gray-200" id="spec-{{ $loop->index }}">
                                <div class="flex-1">
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Nome da Especificação</label>
                                    <input type="text"
                                        name="specifications_keys[]"
                                        value="{{ $key }}"
                                        placeholder="Ex: Tempo de Voo"
                                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all">
                                </div>
                                <div class="flex-1">
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Valor</label>
                                    <input type="text"
                                        name="specifications_values[]"
                                        value="{{ $value }}"
                                        placeholder="Ex: 34 minutos"
                                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all">
                                </div>
                                <div class="pt-8">
                                    <button type="button"
                                        onclick="removeSpecification({{ $loop->index }})"
                                        class="p-2.5 bg-red-50 text-red-600 rounded-lg hover:bg-red-100 transition-all">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            @endforeach
                            @endif
                        </div>
                        <button type="button"
                            onclick="addSpecification()"
                            class="mt-4 inline-flex items-center px-4 py-2 bg-green-50 text-green-700 rounded-lg hover:bg-green-100 transition-all font-medium">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                            Adicionar Especificação
                        </button>
                    </div>
                </div>

                <!-- Status e Configurações -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-100">
                    <div class="p-6 border-b border-gray-100">
                        <h2 class="text-lg font-semibold text-gray-900">Status e Configurações</h2>
                    </div>
                    <div class="p-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="status" class="block text-sm font-medium text-gray-700 mb-2">
                                    Status do Produto *
                                </label>
                                <select id="status"
                                    name="status"
                                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all @error('status') border-red-500 @enderror"
                                    required>
                                    <option value="ativo" {{ old('status', $product->status) == 'ativo' ? 'selected' : '' }}>Ativo</option>
                                    <option value="inativo" {{ old('status', $product->status) == 'inativo' ? 'selected' : '' }}>Inativo</option>
                                    <option value="descontinuado" {{ old('status', $product->status) == 'descontinuado' ? 'selected' : '' }}>Descontinuado</option>
                                </select>
                                @error('status')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="space-y-4">
                                <div class="flex items-center p-4 bg-gray-50 rounded-lg">
                                    <input id="active"
                                        name="active"
                                        type="checkbox"
                                        value="1"
                                        {{ old('active', $product->active) ? 'checked' : '' }}
                                        class="h-4 w-4 text-red-600 focus:ring-red-500 border-gray-300 rounded">
                                    <label for="active" class="ml-3 block text-sm font-medium text-gray-700">
                                        Produto ativo no sistema
                                    </label>
                                </div>

                                <div class="flex items-center p-4 bg-amber-50 rounded-lg">
                                    <input id="featured"
                                        name="featured"
                                        type="checkbox"
                                        value="1"
                                        {{ old('featured', $product->featured) ? 'checked' : '' }}
                                        class="h-4 w-4 text-amber-600 focus:ring-amber-500 border-gray-300 rounded">
                                    <label for="featured" class="ml-3 block text-sm font-medium text-gray-700">
                                        Produto em destaque
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Botões -->
                <div class="flex justify-end space-x-4">
                    <a href="{{ route('admin.estoque.show', $product) }}"
                        class="px-6 py-2.5 bg-gray-100 text-gray-700 rounded-lg font-medium hover:bg-gray-200 transition-all">
                        Cancelar
                    </a>
                    <button type="submit"
                        class="px-6 py-2.5 bg-gradient-to-r from-red-600 to-red-700 text-white rounded-lg font-medium hover:from-red-700 hover:to-red-800 transition-all shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                        Atualizar Produto
                    </button>
                </div>
            </form>

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

        function removeCurrentImage() {
            if (confirm('Tem certeza que deseja remover a imagem atual?')) {
                document.getElementById('remove-current-image').value = '1';
                event.target.closest('.mb-4').style.display = 'none';
            }
        }

        let specificationIndex = {
            {
                $product - > specifications ? count($product - > specifications) : 0
            }
        };

        function addSpecification() {
            const container = document.getElementById('specifications-container');
            if (!container) {
                console.error('Container not found');
                return;
            }

            const specDiv = document.createElement('div');
            specDiv.className = 'flex gap-4 items-start p-4 bg-gray-50 rounded-lg border border-gray-200';
            specDiv.id = 'spec-' + specificationIndex;

            specDiv.innerHTML = `
                <div class="flex-1">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Nome da Especificação</label>
                    <input type="text"
                        name="specifications_keys[]"
                        placeholder="Ex: Tempo de Voo"
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all">
                </div>
                <div class="flex-1">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Valor</label>
                    <input type="text"
                        name="specifications_values[]"
                        placeholder="Ex: 34 minutos"
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all">
                </div>
                <div class="pt-8">
                    <button type="button"
                        onclick="removeSpecification(${specificationIndex})"
                        class="p-2.5 bg-red-50 text-red-600 rounded-lg hover:bg-red-100 transition-all">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                    </button>
                </div>
            `;

            container.appendChild(specDiv);
            specificationIndex++;
        }

        function removeSpecification(index) {
            const element = document.getElementById('spec-' + index);
            if (element) {
                element.remove();
            }
        }
    </script>
</x-app-layout>