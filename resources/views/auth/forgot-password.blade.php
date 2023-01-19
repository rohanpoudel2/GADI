<x-guest-layout>
    <div>
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <div style="color:var(--primary-color)">
        <x-auth-session-status :status="session('status')" />
    </div>

    <form method="POST" action="{{ route('password.email') }}" class="login-form-items">
        @csrf

        <!-- Email Address -->
        <div class="form-item">
            <x-text-input id="email" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" />
        </div>

        <div class="form-item">
            <x-primary-button>
                <div class="login-button">
                    {{ __('Email Password Reset Link') }}
                </div>
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
