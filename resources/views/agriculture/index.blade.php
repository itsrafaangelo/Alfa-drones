<x-guest-public-layout>
    <div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

            <!-- Header -->
            <div class="mb-8 text-center">
                <h1 class="text-4xl font-bold text-gray-900">Agricultura de Precisão</h1>
                <p class="text-lg text-gray-600 mt-3 max-w-3xl mx-auto">
                    Soluções tecnológicas avançadas para otimizar sua produção agrícola com uso de drones, sensores e análise de dados
                </p>
            </div>

            <!-- Services Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($services as $service)
                <div class="bg-white rounded-xl shadow-sm hover:shadow-lg transition-all duration-300 overflow-hidden border border-gray-100 group">
                    <!-- Image Container -->
                    <div class="relative h-48 bg-gradient-to-br from-red-50 to-red-100 overflow-hidden">
                        <img src="{{ asset('images/' . $service['image']) }}"
                            alt="{{ $service['title'] }}"
                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                            onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                        <!-- Fallback icon se a imagem não existir -->
                        <div class="absolute inset-0 hidden items-center justify-center">
                            <svg class="w-24 h-24 text-red-200 group-hover:text-red-300 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="{{ $service['icon'] }}" />
                            </svg>
                        </div>
                        <!-- Overlay gradient -->
                        <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent"></div>
                    </div>

                    <!-- Content -->
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-red-600 transition-colors">
                            {{ $service['title'] }}
                        </h3>
                        <p class="text-gray-600 text-sm leading-relaxed">
                            {{ $service['description'] }}
                        </p>
                    </div>

                    <!-- Footer -->
                    <div class="px-6 pb-6">
                        @if($service['modal_id'])
                        <button data-modal="{{ $service['modal_id'] }}" class="modal-trigger w-full px-4 py-2.5 bg-gradient-to-r from-red-600 to-red-700 text-white rounded-lg font-medium hover:from-red-700 hover:to-red-800 transition-all shadow-md hover:shadow-lg transform hover:-translate-y-0.5 flex items-center justify-center space-x-2">
                            <span>Saiba Mais</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </button>
                        @else
                        <button class="w-full px-4 py-2.5 bg-gradient-to-r from-red-600 to-red-700 text-white rounded-lg font-medium hover:from-red-700 hover:to-red-800 transition-all shadow-md hover:shadow-lg transform hover:-translate-y-0.5 flex items-center justify-center space-x-2">
                            <span>Saiba Mais</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </button>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Modal GNSS -->
    <div id="gnss-modal" class="fixed inset-0 z-50 hidden overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <!-- Background overlay -->
        <div class="fixed inset-0 bg-gray-900 bg-opacity-75 transition-opacity" onclick="closeModal('gnss-modal')"></div>

        <!-- Modal Content -->
        <div class="flex min-h-screen items-center justify-center p-4">
            <div class="relative bg-white rounded-2xl shadow-2xl max-w-4xl w-full max-h-[90vh] overflow-y-auto transform transition-all">
                <!-- Close Button -->
                <button onclick="closeModal('gnss-modal')" class="absolute top-4 right-4 text-gray-400 hover:text-gray-600 transition-colors z-10">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>

                <!-- Modal Header -->
                <div class="bg-gradient-to-r from-red-600 to-red-700 px-8 py-6 rounded-t-2xl">
                    <h2 class="text-3xl font-bold text-white mb-2">Controle total do seu cultivo com mapeamento GNSS</h2>
                </div>

                <!-- Modal Body -->
                <div class="px-8 py-6 space-y-6">
                    <p class="text-gray-700 text-lg leading-relaxed">
                        Revolucione a gestão das suas áreas agrícolas com nosso serviço de mapeamento por GPS, uma solução que integra precisão milimétrica, inovação tecnológica e eficiência operacional para entregar um domínio total sobre o seu terreno. Com tecnologia de georreferenciamento de última geração, mapeamos cada detalhe da sua propriedade, desde os limites geográficos até variações topográficas, gerando mapas digitais interativos e análises inteligentes.
                    </p>

                    <p class="text-gray-700 text-lg leading-relaxed">
                        Além de visualizar fronteiras e contornos em alta definição, você terá acesso a dados geoespaciais estratégicos para tomar decisões assertivas, otimizar o uso do solo, reduzir custos e eliminar margens de erro.
                    </p>

                    <!-- Benefits Section -->
                    <div class="bg-gray-50 rounded-xl p-6 mt-6">
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Benefícios do mapeamento GNSS:</h3>

                        <div class="space-y-4">
                            <div class="flex items-start space-x-3">
                                <div class="flex-shrink-0 mt-1">
                                    <svg class="w-6 h-6 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900 mb-1">Otimize recursos</h4>
                                    <p class="text-gray-600">Mapeie áreas de manejo, irrigação e risco com precisão, reduzindo desperdícios.</p>
                                </div>
                            </div>

                            <div class="flex items-start space-x-3">
                                <div class="flex-shrink-0 mt-1">
                                    <svg class="w-6 h-6 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900 mb-1">Planeje sua lavoura com dados precisos</h4>
                                    <p class="text-gray-600">Defina semeadura, insumos e rotação de culturas usando geodados, cortando custos e aumentando produtividade.</p>
                                </div>
                            </div>

                            <div class="flex items-start space-x-3">
                                <div class="flex-shrink-0 mt-1">
                                    <svg class="w-6 h-6 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900 mb-1">Acompanhamento contínuo dos talhões</h4>
                                    <p class="text-gray-600">Monitore solo e lavoura em tempo real, possibilitando ação rápida para evitar perdas.</p>
                                </div>
                            </div>

                            <div class="flex items-start space-x-3">
                                <div class="flex-shrink-0 mt-1">
                                    <svg class="w-6 h-6 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900 mb-1">Tomada de decisões inteligentes</h4>
                                    <p class="text-gray-600">Integração de mapas e análises para investir com segurança e gerenciar de forma proativa.</p>
                                </div>
                            </div>

                            <div class="flex items-start space-x-3">
                                <div class="flex-shrink-0 mt-1">
                                    <svg class="w-6 h-6 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900 mb-1">Redução de impacto ambiental</h4>
                                    <p class="text-gray-600">Aplicação de insumos com exatidão, evitando excessos e preservando recursos naturais.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-gradient-to-r from-red-50 to-red-100 rounded-xl p-6 mt-6">
                        <p class="text-gray-800 text-lg leading-relaxed">
                            Aproveite a tecnologia de ponta do nosso serviço de mapeamento GNSS e transforme a maneira como você gerencia suas áreas de cultivo, elevando a eficiência e competitividade da sua propriedade.
                        </p>
                    </div>

                    <!-- CTA Button -->
                    <div class="flex justify-center pt-4">
                        <a href="{{ route('home') }}#contato" class="inline-flex items-center px-8 py-3 bg-gradient-to-r from-red-600 to-red-700 text-white rounded-lg font-semibold hover:from-red-700 hover:to-red-800 transition-all shadow-lg hover:shadow-xl transform hover:scale-105">
                            <span>Solicitar Orçamento</span>
                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Sensores -->
    <div id="sensors-modal" class="fixed inset-0 z-50 hidden overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <!-- Background overlay -->
        <div class="fixed inset-0 bg-gray-900 bg-opacity-75 transition-opacity" onclick="closeModal('sensors-modal')"></div>

        <!-- Modal Content -->
        <div class="flex min-h-screen items-center justify-center p-4">
            <div class="relative bg-white rounded-2xl shadow-2xl max-w-4xl w-full max-h-[90vh] overflow-y-auto transform transition-all">
                <!-- Close Button -->
                <button onclick="closeModal('sensors-modal')" class="absolute top-4 right-4 text-gray-400 hover:text-gray-600 transition-colors z-10">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>

                <!-- Modal Header -->
                <div class="bg-gradient-to-r from-red-600 to-red-700 px-8 py-6 rounded-t-2xl">
                    <h2 class="text-3xl font-bold text-white mb-2">Maximize a eficiência da sua produção agrícola com monitoramento inteligente do solo!</h2>
                </div>

                <!-- Modal Body -->
                <div class="px-8 py-6 space-y-6">
                    <p class="text-gray-700 text-lg leading-relaxed">
                        Nossa tecnologia de sensores acompanha em tempo real variáveis essenciais como umidade, temperatura e pH, garantindo um ambiente ideal para o desenvolvimento saudável das plantas. Com o monitoramento inteligente da Alfa Drone, você tem a certeza de que suas lavouras estão sendo tratadas de forma otimizada, sem desperdícios.
                    </p>

                    <!-- Benefits Section -->
                    <div class="bg-gray-50 rounded-xl p-6 mt-6">
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Benefícios do monitoramento com sensores:</h3>

                        <div class="space-y-4">
                            <div class="flex items-start space-x-3">
                                <div class="flex-shrink-0 mt-1">
                                    <svg class="w-6 h-6 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900 mb-1">Controle em tempo real das condições do solo</h4>
                                    <p class="text-gray-600">Monitoramento constante para garantir as melhores condições para suas culturas.</p>
                                </div>
                            </div>

                            <div class="flex items-start space-x-3">
                                <div class="flex-shrink-0 mt-1">
                                    <svg class="w-6 h-6 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900 mb-1">Precisão na medição de umidade, temperatura e pH do solo</h4>
                                    <p class="text-gray-600">Dados exatos das variáveis essenciais para o crescimento saudável das plantas.</p>
                                </div>
                            </div>

                            <div class="flex items-start space-x-3">
                                <div class="flex-shrink-0 mt-1">
                                    <svg class="w-6 h-6 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900 mb-1">Decisões assertivas para irrigação e aplicação de insumos</h4>
                                    <p class="text-gray-600">Informações precisas que permitem tomar decisões mais inteligentes e eficazes.</p>
                                </div>
                            </div>

                            <div class="flex items-start space-x-3">
                                <div class="flex-shrink-0 mt-1">
                                    <svg class="w-6 h-6 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900 mb-1">Redução de custos com insumos e água</h4>
                                    <p class="text-gray-600">Otimização dos recursos através de aplicação precisa apenas onde necessário.</p>
                                </div>
                            </div>

                            <div class="flex items-start space-x-3">
                                <div class="flex-shrink-0 mt-1">
                                    <svg class="w-6 h-6 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900 mb-1">Aumento da produtividade e saúde das plantas</h4>
                                    <p class="text-gray-600">Ambiente ideal para desenvolvimento máximo das culturas.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-gradient-to-r from-red-50 to-red-100 rounded-xl p-6 mt-6">
                        <p class="text-gray-800 text-lg leading-relaxed">
                            Com dados confiáveis na palma da sua mão, você pode tomar decisões precisas que aumentarão a produtividade e reduzirão desperdícios.
                        </p>
                    </div>

                    <!-- CTA Button -->
                    <div class="flex justify-center pt-4">
                        <a href="{{ route('home') }}#contato" class="inline-flex items-center px-8 py-3 bg-gradient-to-r from-red-600 to-red-700 text-white rounded-lg font-semibold hover:from-red-700 hover:to-red-800 transition-all shadow-lg hover:shadow-xl transform hover:scale-105">
                            <span>Solicitar Orçamento</span>
                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Drones -->
    <div id="drones-modal" class="fixed inset-0 z-50 hidden overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <!-- Background overlay -->
        <div class="fixed inset-0 bg-gray-900 bg-opacity-75 transition-opacity" onclick="closeModal('drones-modal')"></div>

        <!-- Modal Content -->
        <div class="flex min-h-screen items-center justify-center p-4">
            <div class="relative bg-white rounded-2xl shadow-2xl max-w-4xl w-full max-h-[90vh] overflow-y-auto transform transition-all">
                <!-- Close Button -->
                <button onclick="closeModal('drones-modal')" class="absolute top-4 right-4 text-gray-400 hover:text-gray-600 transition-colors z-10">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>

                <!-- Modal Header -->
                <div class="bg-gradient-to-r from-red-600 to-red-700 px-8 py-6 rounded-t-2xl">
                    <h2 class="text-3xl font-bold text-white mb-2">Maximize a eficiência da sua produção agrícola com uma análise aérea detalhada utilizando drones!</h2>
                </div>

                <!-- Modal Body -->
                <div class="px-8 py-6 space-y-6">
                    <p class="text-gray-700 text-lg leading-relaxed">
                        Com a captura de imagens aéreas de alta resolução, nossa tecnologia de drones oferece uma avaliação completa e detalhada da saúde da lavoura. Através dessa tecnologia, identificamos pontos de melhoria em tempo real e com alta precisão, permitindo um monitoramento eficaz de todo o seu cultivo.
                    </p>

                    <!-- Benefits Section -->
                    <div class="bg-gray-50 rounded-xl p-6 mt-6">
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Benefícios da análise aérea com drones:</h3>

                        <div class="space-y-4">
                            <div class="flex items-start space-x-3">
                                <div class="flex-shrink-0 mt-1">
                                    <svg class="w-6 h-6 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900 mb-1">Visão completa das lavouras</h4>
                                    <p class="text-gray-600">Identificando áreas que precisam de atenção imediata com uma visão panorâmica completa.</p>
                                </div>
                            </div>

                            <div class="flex items-start space-x-3">
                                <div class="flex-shrink-0 mt-1">
                                    <svg class="w-6 h-6 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900 mb-1">Monitoramento contínuo da saúde das plantas</h4>
                                    <p class="text-gray-600">Detecção precoce de pragas e doenças através de análise visual de alta precisão.</p>
                                </div>
                            </div>

                            <div class="flex items-start space-x-3">
                                <div class="flex-shrink-0 mt-1">
                                    <svg class="w-6 h-6 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900 mb-1">Avaliação precisa das condições do solo e das plantas</h4>
                                    <p class="text-gray-600">Imagens de alta resolução revelam detalhes essenciais para diagnóstico preciso.</p>
                                </div>
                            </div>

                            <div class="flex items-start space-x-3">
                                <div class="flex-shrink-0 mt-1">
                                    <svg class="w-6 h-6 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900 mb-1">Redução de custos operacionais</h4>
                                    <p class="text-gray-600">Soluções direcionadas e específicas baseadas em dados reais, eliminando gastos desnecessários.</p>
                                </div>
                            </div>

                            <div class="flex items-start space-x-3">
                                <div class="flex-shrink-0 mt-1">
                                    <svg class="w-6 h-6 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900 mb-1">Aumento da produtividade</h4>
                                    <p class="text-gray-600">Melhoria no uso de recursos como água e fertilizantes, maximizando resultados.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-gradient-to-r from-red-50 to-red-100 rounded-xl p-6 mt-6">
                        <p class="text-gray-800 text-lg leading-relaxed">
                            Com dados visuais completos e precisos, você pode tomar decisões inteligentes para otimizar cada hectare da sua produção agrícola, aumentar a produtividade e reduzir desperdícios. A análise aérea com drones é uma solução indispensável para o agricultor moderno.
                        </p>
                    </div>

                    <!-- CTA Button -->
                    <div class="flex justify-center pt-4">
                        <a href="{{ route('home') }}#contato" class="inline-flex items-center px-8 py-3 bg-gradient-to-r from-red-600 to-red-700 text-white rounded-lg font-semibold hover:from-red-700 hover:to-red-800 transition-all shadow-lg hover:shadow-xl transform hover:scale-105">
                            <span>Solicitar Orçamento</span>
                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Planejamento Amostral -->
    <div id="sampling-modal" class="fixed inset-0 z-50 hidden overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <!-- Background overlay -->
        <div class="fixed inset-0 bg-gray-900 bg-opacity-75 transition-opacity" onclick="closeModal('sampling-modal')"></div>

        <!-- Modal Content -->
        <div class="flex min-h-screen items-center justify-center p-4">
            <div class="relative bg-white rounded-2xl shadow-2xl max-w-4xl w-full max-h-[90vh] overflow-y-auto transform transition-all">
                <!-- Close Button -->
                <button onclick="closeModal('sampling-modal')" class="absolute top-4 right-4 text-gray-400 hover:text-gray-600 transition-colors z-10">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>

                <!-- Modal Header -->
                <div class="bg-gradient-to-r from-red-600 to-red-700 px-8 py-6 rounded-t-2xl">
                    <h2 class="text-3xl font-bold text-white mb-2">Garanta a coleta eficiente de amostras representativas das suas áreas de cultivo com um planejamento amostral bem estruturado!</h2>
                </div>

                <!-- Modal Body -->
                <div class="px-8 py-6 space-y-6">
                    <p class="text-gray-700 text-lg leading-relaxed">
                        Com um planejamento amostral estratégico, você terá acesso a análises confiáveis e decisões assertivas para otimizar os seus cultivos. Essa abordagem científica e personalizada oferece dados precisos para que você maximize a qualidade das suas amostras e, consequentemente, a produtividade de sua lavoura.
                    </p>

                    <!-- Benefits Section -->
                    <div class="bg-gray-50 rounded-xl p-6 mt-6">
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Benefícios do planejamento amostral:</h3>

                        <div class="space-y-4">
                            <div class="flex items-start space-x-3">
                                <div class="flex-shrink-0 mt-1">
                                    <svg class="w-6 h-6 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900 mb-1">Coleta eficiente de amostras representativas</h4>
                                    <p class="text-gray-600">Amostragem científica do solo e das plantas para garantir dados confiáveis.</p>
                                </div>
                            </div>

                            <div class="flex items-start space-x-3">
                                <div class="flex-shrink-0 mt-1">
                                    <svg class="w-6 h-6 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900 mb-1">Precisão nos dados para tomada de decisões assertivas</h4>
                                    <p class="text-gray-600">Informações precisas que fundamentam decisões estratégicas e eficazes.</p>
                                </div>
                            </div>

                            <div class="flex items-start space-x-3">
                                <div class="flex-shrink-0 mt-1">
                                    <svg class="w-6 h-6 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900 mb-1">Redução de erros de amostragem</h4>
                                    <p class="text-gray-600">Aumento da confiabilidade das análises através de metodologia estruturada.</p>
                                </div>
                            </div>

                            <div class="flex items-start space-x-3">
                                <div class="flex-shrink-0 mt-1">
                                    <svg class="w-6 h-6 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900 mb-1">Maximização da qualidade e quantidade da produção</h4>
                                    <p class="text-gray-600">Planejamento que resulta em melhores resultados produtivos e qualidade superior.</p>
                                </div>
                            </div>

                            <div class="flex items-start space-x-3">
                                <div class="flex-shrink-0 mt-1">
                                    <svg class="w-6 h-6 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900 mb-1">Otimização do uso de recursos</h4>
                                    <p class="text-gray-600">Aplicação eficiente de fertilizantes e irrigação baseada em dados reais.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-gradient-to-r from-red-50 to-red-100 rounded-xl p-6 mt-6">
                        <p class="text-gray-800 text-lg leading-relaxed">
                            O planejamento amostral é a chave para um cultivo mais produtivo e sustentável, permitindo um controle preciso das variáveis que impactam diretamente no crescimento da sua lavoura.
                        </p>
                    </div>

                    <!-- CTA Button -->
                    <div class="flex justify-center pt-4">
                        <a href="{{ route('home') }}#contato" class="inline-flex items-center px-8 py-3 bg-gradient-to-r from-red-600 to-red-700 text-white rounded-lg font-semibold hover:from-red-700 hover:to-red-800 transition-all shadow-lg hover:shadow-xl transform hover:scale-105">
                            <span>Solicitar Orçamento</span>
                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Variabilidade Espacial e Temporal -->
    <div id="variability-modal" class="fixed inset-0 z-50 hidden overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <!-- Background overlay -->
        <div class="fixed inset-0 bg-gray-900 bg-opacity-75 transition-opacity" onclick="closeModal('variability-modal')"></div>

        <!-- Modal Content -->
        <div class="flex min-h-screen items-center justify-center p-4">
            <div class="relative bg-white rounded-2xl shadow-2xl max-w-4xl w-full max-h-[90vh] overflow-y-auto transform transition-all">
                <!-- Close Button -->
                <button onclick="closeModal('variability-modal')" class="absolute top-4 right-4 text-gray-400 hover:text-gray-600 transition-colors z-10">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>

                <!-- Modal Header -->
                <div class="bg-gradient-to-r from-red-600 to-red-700 px-8 py-6 rounded-t-2xl">
                    <h2 class="text-3xl font-bold text-white mb-2">O mapeamento da variabilidade espacial e temporal oferece uma análise detalhada das lavouras!</h2>
                </div>

                <!-- Modal Body -->
                <div class="px-8 py-6 space-y-6">
                    <p class="text-gray-700 text-lg leading-relaxed">
                        Essa tecnologia permite identificar a variabilidade nas condições de cultivo, seja por diferença de solo, clima ou outros fatores. Com esses dados, você pode realizar intervenções direcionadas no momento e lugar certos, maximizando a produtividade e reduzindo desperdícios.
                    </p>

                    <!-- Benefits Section -->
                    <div class="bg-gray-50 rounded-xl p-6 mt-6">
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Benefícios do mapeamento da variabilidade espacial e temporal:</h3>

                        <div class="space-y-4">
                            <div class="flex items-start space-x-3">
                                <div class="flex-shrink-0 mt-1">
                                    <svg class="w-6 h-6 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900 mb-1">Identificação de áreas com diferentes necessidades</h4>
                                    <p class="text-gray-600">Mapeamento preciso de áreas que requerem recursos e cuidados específicos.</p>
                                </div>
                            </div>

                            <div class="flex items-start space-x-3">
                                <div class="flex-shrink-0 mt-1">
                                    <svg class="w-6 h-6 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900 mb-1">Avaliação precisa ao longo do tempo</h4>
                                    <p class="text-gray-600">Análise de como as condições mudam temporalmente, permitindo adaptação estratégica.</p>
                                </div>
                            </div>

                            <div class="flex items-start space-x-3">
                                <div class="flex-shrink-0 mt-1">
                                    <svg class="w-6 h-6 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900 mb-1">Decisões mais eficazes e direcionadas</h4>
                                    <p class="text-gray-600">Informações precisas sobre uso de insumos, irrigação e tratamentos específicos.</p>
                                </div>
                            </div>

                            <div class="flex items-start space-x-3">
                                <div class="flex-shrink-0 mt-1">
                                    <svg class="w-6 h-6 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900 mb-1">Redução de custos com abordagem eficiente</h4>
                                    <p class="text-gray-600">Aplicação inteligente de recursos apenas onde e quando necessário.</p>
                                </div>
                            </div>

                            <div class="flex items-start space-x-3">
                                <div class="flex-shrink-0 mt-1">
                                    <svg class="w-6 h-6 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900 mb-1">Aumento da produtividade e qualidade</h4>
                                    <p class="text-gray-600">Colheitas de melhor qualidade através de manejo diferenciado e preciso.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-gradient-to-r from-red-50 to-red-100 rounded-xl p-6 mt-6">
                        <p class="text-gray-800 text-lg leading-relaxed">
                            Com esses dados, sua lavoura se torna mais estratégica, permitindo planejar de maneira mais eficiente e inteligente, aproveitando ao máximo cada recurso e potencializando os resultados da sua colheita.
                        </p>
                    </div>

                    <!-- CTA Button -->
                    <div class="flex justify-center pt-4">
                        <a href="{{ route('home') }}#contato" class="inline-flex items-center px-8 py-3 bg-gradient-to-r from-red-600 to-red-700 text-white rounded-lg font-semibold hover:from-red-700 hover:to-red-800 transition-all shadow-lg hover:shadow-xl transform hover:scale-105">
                            <span>Solicitar Orçamento</span>
                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Aplicação em Taxa Variada -->
    <div id="variable-rate-modal" class="fixed inset-0 z-50 hidden overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <!-- Background overlay -->
        <div class="fixed inset-0 bg-gray-900 bg-opacity-75 transition-opacity" onclick="closeModal('variable-rate-modal')"></div>

        <!-- Modal Content -->
        <div class="flex min-h-screen items-center justify-center p-4">
            <div class="relative bg-white rounded-2xl shadow-2xl max-w-4xl w-full max-h-[90vh] overflow-y-auto transform transition-all">
                <!-- Close Button -->
                <button onclick="closeModal('variable-rate-modal')" class="absolute top-4 right-4 text-gray-400 hover:text-gray-600 transition-colors z-10">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>

                <!-- Modal Header -->
                <div class="bg-gradient-to-r from-red-600 to-red-700 px-8 py-6 rounded-t-2xl">
                    <h2 class="text-3xl font-bold text-white mb-2">Aplicação personalizada de insumos com tecnologia de taxa variada!</h2>
                </div>

                <!-- Modal Body -->
                <div class="px-8 py-6 space-y-6">
                    <p class="text-gray-700 text-lg leading-relaxed">
                        Utilizando drones de última geração, realizamos a distribuição precisa de insumos como fertilizantes e pesticidas, adequando a dosagem de acordo com a demanda específica de cada região do campo. Isso resulta em redução das perdas, maior economia e aumento da produtividade de forma estratégica.
                    </p>

                    <!-- Benefits Section -->
                    <div class="bg-gray-50 rounded-xl p-6 mt-6">
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Benefícios da aplicação em taxa variada:</h3>

                        <div class="space-y-4">
                            <div class="flex items-start space-x-3">
                                <div class="flex-shrink-0 mt-1">
                                    <svg class="w-6 h-6 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900 mb-1">Redução do desperdício de insumos</h4>
                                    <p class="text-gray-600">Aumento da eficiência no uso de recursos através de aplicação inteligente.</p>
                                </div>
                            </div>

                            <div class="flex items-start space-x-3">
                                <div class="flex-shrink-0 mt-1">
                                    <svg class="w-6 h-6 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900 mb-1">Aplicação personalizada</h4>
                                    <p class="text-gray-600">Ajuste da dosagem conforme a demanda específica do solo e das plantas.</p>
                                </div>
                            </div>

                            <div class="flex items-start space-x-3">
                                <div class="flex-shrink-0 mt-1">
                                    <svg class="w-6 h-6 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900 mb-1">Maior controle sobre a distribuição</h4>
                                    <p class="text-gray-600">Distribuição precisa dos insumos em áreas específicas que realmente necessitam.</p>
                                </div>
                            </div>

                            <div class="flex items-start space-x-3">
                                <div class="flex-shrink-0 mt-1">
                                    <svg class="w-6 h-6 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900 mb-1">Melhoria na saúde do solo e das plantas</h4>
                                    <p class="text-gray-600">Nutrição adequada sem excessos que possam prejudicar o ecossistema.</p>
                                </div>
                            </div>

                            <div class="flex items-start space-x-3">
                                <div class="flex-shrink-0 mt-1">
                                    <svg class="w-6 h-6 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900 mb-1">Aumento da produtividade sustentável</h4>
                                    <p class="text-gray-600">Maior produção com menor impacto ambiental através de manejo inteligente.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-gradient-to-r from-red-50 to-red-100 rounded-xl p-6 mt-6">
                        <p class="text-gray-800 text-lg leading-relaxed">
                            Com essa tecnologia inovadora, você transforma o manejo agrícola, maximizando os resultados e otimizando o uso de recursos, o que torna sua lavoura mais eficiente e sustentável.
                        </p>
                    </div>

                    <!-- CTA Button -->
                    <div class="flex justify-center pt-4">
                        <a href="{{ route('home') }}#contato" class="inline-flex items-center px-8 py-3 bg-gradient-to-r from-red-600 to-red-700 text-white rounded-lg font-semibold hover:from-red-700 hover:to-red-800 transition-all shadow-lg hover:shadow-xl transform hover:scale-105">
                            <span>Solicitar Orçamento</span>
                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function openModal(modalId) {
            const modal = document.getElementById(modalId);
            if (modal) {
                modal.classList.remove('hidden');
                document.body.style.overflow = 'hidden';
            }
        }

        function closeModal(modalId) {
            const modal = document.getElementById(modalId);
            if (modal) {
                modal.classList.add('hidden');
                document.body.style.overflow = 'auto';
            }
        }

        // Add click listeners to modal triggers
        document.addEventListener('DOMContentLoaded', function() {
            const triggers = document.querySelectorAll('.modal-trigger');
            triggers.forEach(trigger => {
                trigger.addEventListener('click', function() {
                    const modalId = this.getAttribute('data-modal');
                    if (modalId) {
                        openModal(modalId);
                    }
                });
            });
        });

        // Close modal on ESC key
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                const modals = document.querySelectorAll('[id$="-modal"]');
                modals.forEach(modal => {
                    if (!modal.classList.contains('hidden')) {
                        closeModal(modal.id);
                    }
                });
            }
        });
    </script>
</x-guest-public-layout>