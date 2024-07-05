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
                    {{ __('Esta es un área segura de la aplicación. Por favor, confirma tu contraseña antes de continuar.') }}
                </div>

                <x-validation-errors class="mb-4" />

                <form method="POST" action="{{ route('password.confirm') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="password" class="form-label">{{ __('Contraseña') }}</label>
                        <input id="password" class="form-control" type="password" name="password" required autocomplete="current-password" autofocus />
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary">{{ __('Confirmar') }}</button>
                    </div>
                </form>
            </x-authentication-card>
        </x-guest-layout>
    </div>
</div>

<!-- Livewire Scripts -->
@livewireScripts

