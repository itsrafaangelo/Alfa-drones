<section>
    <header class="mb-6">
        <h2 class="text-xl font-semibold text-gray-900">
            Atualizar Senha
        </h2>
        <p class="mt-2 text-sm text-gray-600">
            Certifique-se de que sua conta está usando uma senha longa e aleatória para permanecer segura.
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="space-y-6">
        @csrf
        @method('put')

        <div>
            <label for="update_password_current_password" class="block text-sm font-medium text-gray-700 mb-2">
                Senha Atual
            </label>
            <input id="update_password_current_password"
                name="current_password"
                type="password"
                class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all @error('current_password', 'updatePassword') border-red-500 @enderror"
                autocomplete="current-password">
            @error('current_password', 'updatePassword')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="update_password_password" class="block text-sm font-medium text-gray-700 mb-2">
                Nova Senha
            </label>
            <input id="update_password_password"
                name="password"
                type="password"
                class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all @error('password', 'updatePassword') border-red-500 @enderror"
                autocomplete="new-password">
            @error('password', 'updatePassword')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="update_password_password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">
                Confirmar Senha
            </label>
            <input id="update_password_password_confirmation"
                name="password_confirmation"
                type="password"
                class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all @error('password_confirmation', 'updatePassword') border-red-500 @enderror"
                autocomplete="new-password">
            @error('password_confirmation', 'updatePassword')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center gap-4 pt-4">
            <button type="submit"
                class="px-6 py-2.5 bg-gradient-to-r from-red-600 to-red-700 text-white rounded-lg font-medium hover:from-red-700 hover:to-red-800 transition-all shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                Salvar
            </button>

            @if (session('status') === 'password-updated')
            <p x-data="{ show: true }"
                x-show="show"
                x-transition
                x-init="setTimeout(() => show = false, 2000)"
                class="text-sm text-green-600 font-medium">
                Senha atualizada!
            </p>
            @endif
        </div>
    </form>
</section>