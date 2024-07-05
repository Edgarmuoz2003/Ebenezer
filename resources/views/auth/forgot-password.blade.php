<div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="w-100" style="max-width: 400px;">
        <x-guest-layout>
            <x-authentication-card>
                <x-slot name="logo">
                    <div class="text-center">
                        <x-authentication-card-logo />
                    </div>
                </x-slot>

                <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
                    {{ __('Olvidaste tu Contraseña? No hay problema. danos tu email y te enviaremos un Link de recuperacion de Contraseña que te permitirá elegir una nueva.') }}
                </div>

                @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-success">
                        {{ session('status') }}
                    </div>
                @endif

                <x-validation-errors class="mb-4" />

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="email" class="form-label">{{ __('Email') }}</label>
                        <input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary">{{ __('Link de Recuperación') }}</button>
                    </div>
                </form>
            </x-authentication-card>
        </x-guest-layout>
    </div>
</div>

