<x-guest-layout>
    @section('page-title')
        Register
    @endsection
    <form method="POST" action="{{ route('register') }}" class="login-form-items">
        @csrf

        <!-- Name -->
        <div class="form-item">
            <x-text-input id="name" placeholder="Name" type="text" name="name" :value="old('name')" required
                autofocus />
            <x-input-error :messages="$errors->get('name')" />
        </div>

        <!-- Email Address -->
        <div class="form-item">
            <x-text-input id="email" placeholder="Email" type="email" name="email" :value="old('email')" required />
            <x-input-error :messages="$errors->get('email')" />
        </div>

        <!-- Password -->
        <div class="form-item">
            <x-text-input id="password" placeholder="Password" type="password" name="password" required
                autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" />
        </div>

        <!-- Confirm Password -->
        <div class="form-item">
            <x-text-input id="password_confirmation" placeholder="Confirm Password" type="password"
                name="password_confirmation" required />

            <x-input-error :messages="$errors->get('password_confirmation')" />
        </div>

        <div class="form-item">
            <a href="{{ route('login') }}" class="forgot-password">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button>
                <div class="login-button">
                    {{ __('Register') }}
                </div>
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
