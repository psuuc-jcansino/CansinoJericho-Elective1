<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="max-w-md mx-auto bg-white dark:bg-gray-900 p-8 rounded-lg shadow-md border border-red-600 dark:border-red-500 space-y-6">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" class="text-red-700 dark:text-red-400 font-semibold" />
            <x-text-input
                id="email"
                class="block mt-1 w-full rounded-md border border-gray-300 dark:border-gray-700 focus:border-red-600 dark:focus:border-red-400 focus:ring-1 focus:ring-red-600 dark:focus:ring-red-400 bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100"
                type="email"
                name="email"
                :value="old('email')"
                required
                autofocus
                autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-600 dark:text-red-400" />
        </div>

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Password')" class="text-red-700 dark:text-red-400 font-semibold" />
            <x-text-input
                id="password"
                class="block mt-1 w-full rounded-md border border-gray-300 dark:border-gray-700 focus:border-red-600 dark:focus:border-red-400 focus:ring-1 focus:ring-red-600 dark:focus:ring-red-400 bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100"
                type="password"
                name="password"
                required
                autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-600 dark:text-red-400" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center cursor-pointer">
                <input
                    id="remember_me"
                    type="checkbox"
                    class="rounded border-gray-300 dark:bg-gray-900 dark:border-gray-700 text-red-600 shadow-sm focus:ring-red-500 dark:focus:ring-red-600 dark:focus:ring-offset-gray-800"
                    name="remember">
                <span class="ms-2 text-sm text-gray-700 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <!-- Actions -->
        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
            <a
                href="{{ route('password.request') }}"
                class="underline text-sm text-gray-700 dark:text-gray-400 hover:text-red-700 dark:hover:text-red-400 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 dark:focus:ring-offset-gray-800">
                {{ __('Forgot your password?') }}
            </a>
            @endif

            <x-primary-button class="ms-3 bg-red-600 hover:bg-red-700 focus:ring-red-500 dark:bg-red-500 dark:hover:bg-red-600">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>