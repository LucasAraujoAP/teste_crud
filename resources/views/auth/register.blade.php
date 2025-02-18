<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" onsubmit="return validateForm()">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <span id="name-error" class="text-red-500 text-sm mt-2 hidden">O nome é obrigatório.</span>
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <span id="email-error" class="text-red-500 text-sm mt-2 hidden">Insira um e-mail válido.</span>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <span id="password-error" class="text-red-500 text-sm mt-2 hidden">A senha deve ter pelo menos 8 caracteres.</span>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            <span id="password-confirm-error" class="text-red-500 text-sm mt-2 hidden">As senhas não coincidem.</span>
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>

    <script>
        function validateForm() {
            let isValid = true;

            // Validação do Nome
            const name = document.getElementById('name').value.trim();
            const nameError = document.getElementById('name-error');
            if (name === '') {
                nameError.classList.remove('hidden');
                isValid = false;
            } else {
                nameError.classList.add('hidden');
            }

            // Validação do E-mail
            const email = document.getElementById('email').value.trim();
            const emailError = document.getElementById('email-error');
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(email)) {
                emailError.classList.remove('hidden');
                isValid = false;
            } else {
                emailError.classList.add('hidden');
            }

            // Validação da Senha
            const password = document.getElementById('password').value.trim();
            const passwordError = document.getElementById('password-error');
            if (password.length < 8) {
                passwordError.classList.remove('hidden');
                isValid = false;
            } else {
                passwordError.classList.add('hidden');
            }

            // Validação da Confirmação de Senha
            const passwordConfirm = document.getElementById('password_confirmation').value.trim();
            const passwordConfirmError = document.getElementById('password-confirm-error');
            if (password !== passwordConfirm) {
                passwordConfirmError.classList.remove('hidden');
                isValid = false;
            } else {
                passwordConfirmError.classList.add('hidden');
            }

            return isValid; // Retorna true se o formulário for válido
        }
    </script>
</x-guest-layout>