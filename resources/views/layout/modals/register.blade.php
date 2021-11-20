<div class="modal fade" id="register" aria-hidden="true">
    <div class="modal-dialog">
{{--        <x-auth-card>--}}

            <!-- Validation Errors -->
            <x-auth-validation-errors class="modal-header" :errors="$errors" />

            <form class="modal-content" method="POST" action="{{ route('register') }}">
            @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Registrácia</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

            <!-- Name -->
                <div class="modal-body">
                    <label for="name" :value="__('Name')">Meno</label>
                    <input id="name" class="form-control" type="text" name="name" :value="old('name')" required autofocus />

                <!-- Email Address -->
                    <label for="email" :value="__('Email')">Email</label>
                    <input id="email" class="form-control" type="email" name="email" :value="old('email')" required />

                <!-- Password -->
                    <label for="password" :value="__('Password')">Heslo</label>
                    <input class="form-control"
                             id="password"
                             type="password"
                             name="password"
                             required autocomplete="new-password" />

                <!-- Confirm Password -->
                    <label for="password_confirmation" :value="__('Confirm Password')">Potvrdenie hesla</label>
                    <input id="password_confirmation" class="form-control"
                             type="password"
                             name="password_confirmation" required />
                </div>

                <div class="modal-footer">
{{--                    <a class="btn btn-primary" href="{{ route('login') }}">--}}
{{--                        {{ __('Already registered?') }}--}}
{{--                    </a>--}}

                    <button class="btn btn-primary">
                        {{ __('Register') }}
                    </button>
                </div>
            </form>
{{--        </x-auth-card>--}}
    </div>
</div>
