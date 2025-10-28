<x-app-layout>
    <div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

            <!-- Header -->
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-gray-900">Perfil</h1>
                <p class="text-gray-600 mt-1">Gerencie suas informações pessoais e configurações de segurança</p>
            </div>

            <div class="space-y-6">
                <!-- Informações do Perfil -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-100">
                    <div class="p-8">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>

                <!-- Atualizar Senha -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-100">
                    <div class="p-8">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>

                <!-- Excluir Conta -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-100">
                    <div class="p-8">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>