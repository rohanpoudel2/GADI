<x-guest-layout>
    @section('page-title')
        Login
    @endsection
    <!-- Session Status -->
    <x-auth-session-status :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="login-form-items">
        @csrf

        <!-- Email Address -->
        <div class="form-item">
            <x-text-input id="email" placeholder="Your Email" type="email" name="email" :value="old('email')" required
                autofocus />
            <x-input-error :messages="$errors->get('email')" />
        </div>

        <!-- Password -->
        <div class="form-item">

            <x-text-input id="password" placeholder="Your Password" type="password" name="password" required
                autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" />
        </div>

        <!-- Remember Me -->
        <div class="form-item">
            <label for="remember_me" items-center">
                <input id="remember_me" type="checkbox" name="remember" class="input-checkbox">
                <span>{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="form-item">
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="forgot-password">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
            <x-primary-button>
                <div class="login-button">
                    {{ __('Log in') }}
                </div>
            </x-primary-button>
        </div>
        <a href="{{ route('register') }}" class="forgot-password">
            Already have an account ?
        </a>
    </form>
</x-guest-layout>
