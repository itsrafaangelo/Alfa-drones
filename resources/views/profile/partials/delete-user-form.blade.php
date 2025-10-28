<section class="space-y-6">
    <header>
        <h2 class="text-xl font-semibold text-gray-900">
            Excluir Conta
        </h2>
        <p class="mt-2 text-sm text-gray-600">
            Uma vez que sua conta for excluída, todos os recursos e dados serão permanentemente deletados. Antes de excluir sua conta, faça o download de qualquer informação que deseja manter.
        </p>
    </header>

    <button type="button"
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        class="px-6 py-2.5 bg-red-600 text-white rounded-lg font-medium hover:bg-red-700 transition-all shadow-lg hover:shadow-xl">
        Excluir Conta
    </button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-xl font-semibold text-gray-900">
                Tem certeza que deseja excluir sua conta?
            </h2>

            <p class="mt-3 text-sm text-gray-600">
                Uma vez que sua conta for excluída, todos os recursos e dados serão permanentemente deletados. Por favor, digite sua senha para confirmar que deseja excluir permanentemente sua conta.
            </p>

            <div class="mt-6">
                <label for="password" class="sr-only">Senha</label>
                <input id="password"
                    name="password"
                    type="password"
                    placeholder="Senha"
                    class="w-3/4 px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all @error('password', 'userDeletion') border-red-500 @enderror">
                @error('password', 'userDeletion')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-6 flex justify-end gap-3">
                <button type="button"
                    x-on:click="$dispatch('close')"
                    class="px-6 py-2.5 bg-gray-100 text-gray-700 rounded-lg font-medium hover:bg-gray-200 transition-all">
                    Cancelar
                </button>

                <button type="submit"
                    class="px-6 py-2.5 bg-red-600 text-white rounded-lg font-medium hover:bg-red-700 transition-all shadow-lg hover:shadow-xl">
                    Excluir Conta
                </button>
            </div>
        </form>
    </x-modal>
</section>