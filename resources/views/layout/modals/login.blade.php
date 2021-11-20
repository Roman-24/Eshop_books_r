<div class="modal fade" id="login" aria-hidden="true">
    <div class="modal-dialog">
{{--        <x-auth-card>--}}

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <form class="modal-content" method="POST" action="{{ route('login') }}">
            @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Prihlásenie</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- Email Address -->
                <div class="modal-body">
                    <label for="email" :value="__('Email')">Email</label>
                    <input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus />

                <!-- Password -->
                    <label for="password" :value="__('Password')">Heslo</label>
                    <input id="password" class="form-control"
                             type="password"
                             name="password"
                             required autocomplete="current-password" />
                </div>

                <div class="modal-footer">
                    @if (Route::has('password.request'))
                        <a class="form-small-link" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif

                    <!-- Remember Me -->
                    <div>
                        <label for="remember_me">
                            <input id="remember_me" type="checkbox" name="remember">
                            <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </label>
                    </div>

                    <button class="btn btn-primary">
                        {{ __('Log in') }}
                    </button>
                </div>
            </form>
{{--        </x-auth-card>--}}
    </div>
</div>
