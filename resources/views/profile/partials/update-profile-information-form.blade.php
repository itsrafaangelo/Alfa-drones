<section>
    <header class="mb-6">
        <h2 class="text-xl font-semibold text-gray-900">
            Informações do Perfil
        </h2>
        <p class="mt-2 text-sm text-gray-600">
            Atualize as informações do seu perfil e endereço de e-mail.
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="space-y-6">
        @csrf
        @method('patch')

        <div>
            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                Nome
            </label>
            <input id="name"
                name="name"
                type="text"
                value="{{ old('name', $user->name) }}"
                class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all @error('name') border-red-500 @enderror"
                required
                autofocus
                autocomplete="name">
            @error('name')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                E-mail
            </label>
            <input id="email"
                name="email"
                type="email"
                value="{{ old('email', $user->email) }}"
                class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all @error('email') border-red-500 @enderror"
                required
                autocomplete="username">
            @error('email')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
            <div class="mt-3 p-4 bg-yellow-50 border border-yellow-200 rounded-lg">
                <p class="text-sm text-yellow-800">
                    Seu endereço de e-mail não está verificado.

                    <button form="send-verification"
                        class="underline text-sm text-yellow-900 hover:text-yellow-700 font-medium">
                        Clique aqui para reenviar o e-mail de verificação.
                    </button>
                </p>

                @if (session('status') === 'verification-link-sent')
                <p class="mt-2 text-sm font-medium text-green-700">
                    Um novo link de verificação foi enviado para seu e-mail.
                </p>
                @endif
            </div>
            @endif
        </div>

        <div class="flex items-center gap-4 pt-4">
            <button type="submit"
                class="px-6 py-2.5 bg-gradient-to-r from-red-600 to-red-700 text-white rounded-lg font-medium hover:from-red-700 hover:to-red-800 transition-all shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                Salvar
            </button>

            @if (session('status') === 'profile-updated')
            <p x-data="{ show: true }"
                x-show="show"
                x-transition
                x-init="setTimeout(() => show = false, 2000)"
                class="text-sm text-green-600 font-medium">
                Salvo com sucesso!
            </p>
            @endif
        </div>
    </form>
</section>