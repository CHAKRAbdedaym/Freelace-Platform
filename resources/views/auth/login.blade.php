<x-guest-layout :title="$title = 'Login | ' . config('app.name')">
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="max-w-md mx-auto p-6 bg-white shadow-lg rounded-lg">
        @csrf

        <!-- Email or Username -->
        <div>
            <x-input-label for="email" :value="__('Email or Username')" class="text-gray-700" />
            <x-text-input id="email" class="block mt-1 w-full border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                            type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-600" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" class="text-gray-700" />
            <x-text-input id="password" class="block mt-1 w-full border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                            type="password" name="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-red-600" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center text-gray-700">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ms-2 text-sm">{{ __('Remember me') }}</span>
            </label>
        </div>

        <!-- Login Button -->
        <div class="flex items-center justify-between mt-6">
            <x-primary-button class="w-full py-2">
                {{ __('Log in') }}
            </x-primary-button>
        </div>

        <!-- Forgot Password Link -->
        <div class="mt-4 text-sm text-center">
            @if (Route::has('password.request'))
                <a class="text-indigo-600 hover:text-indigo-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
        </div>

        <!-- 'Not Registered?' Link -->
        <div class="mt-6 text-center">
            <a class="text-sm text-gray-600 hover:text-gray-800" href="{{ route('register') }}">
                {{ __("Don't have an account? Register here.") }}
            </a>
        </div>
    </form>
</x-guest-layout>
