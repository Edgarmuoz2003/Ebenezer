<div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="w-100" style="max-width: 400px;">
        <x-guest-layout>
            <x-authentication-card>
                <x-slot name="logo">
                    <div class="text-center"> <!-- Centra el logo -->
                        <x-authentication-card-logo />
                    </div>
                </x-slot>

                <x-validation-errors class="mb-4" />

                @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-success">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="email" class="form-label">{{ __('Email') }}</label>
                        <input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">{{ __('Password') }}</label>
                        <input id="password" class="form-control" type="password" name="password" required autocomplete="current-password" />
                    </div>

                    <div class="mb-3 form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember_me" />
                        <label class="form-check-label" for="remember_me">{{ __('Remember') }}</label>
                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-primary" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary">{{ __('Login') }}</button>
                    </div>
                </form>
            </x-authentication-card>
        </x-guest-layout>
    </div>
</div>

<!-- Livewire Scripts -->
@livewireScripts
