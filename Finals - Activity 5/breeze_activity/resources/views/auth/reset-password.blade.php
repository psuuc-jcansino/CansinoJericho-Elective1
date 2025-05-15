<x-guest-layout>
    <form method="POST" action="{{ route('password.store') }}" class="max-w-md mx-auto bg-white dark:bg-gray-900 p-8 rounded-lg shadow-md border border-red-600 dark:border-red-500 space-y-6">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" class="text-red-700 dark:text-red-400 font-semibold" />
            <x-text-input
                id="email"
                class="block mt-1 w-full rounded-md border border-gray-300 dark:border-gray-700 focus:border-red-600 dark:focus:border-red-400 focus:ring-1 focus:ring-red-600 dark:focus:ring-red-400 bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100"
                type="email"
                name="email"
                :value="old('email', $request->email)"
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
                autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-600 dark:text-red-400" />
        </div>

        <!-- Confirm Password -->
        <div>
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-red-700 dark:text-red-400 font-semibold" />
            <x-text-input
                id="password_confirmation"
                class="block mt-1 w-full rounded-md border border-gray-300 dark:border-gray-700 focus:border-red-600 dark:focus:border-red-400 focus:ring-1 focus:ring-red-600 dark:focus:ring-red-400 bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100"
                type="password"
                name="password_confirmation"
                required
                autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-600 dark:text-red-400" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="bg-red-600 hover:bg-red-700 focus:ring-red-500 dark:bg-red-500 dark:hover:bg-red-600">
                {{ __('Reset Password') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>