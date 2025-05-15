<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="text-3xl font-extrabold text-red-600 dark:text-red-400">
                {{ __('Dashboard') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-100 dark:bg-gray-900 min-h-screen">
        <div class="max-w-4xl mx-auto px-6">
            <div class="bg-white dark:bg-gray-800 border border-red-500 dark:border-red-400 shadow-xl rounded-2xl p-8">
                <div class="text-center">
                    <h3 class="text-2xl font-semibold text-gray-800 dark:text-white mb-2">
                        🎉 Welcome back!
                    </h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-6">
                        {{ __("You're successfully logged in. Let's get things done!") }}
                    </p>
                    <a href="{{ route('profile.edit') }}"
                        class="inline-block px-6 py-2 bg-red-600 text-white font-semibold rounded-full hover:bg-red-700 transition">
                        Go to Profile
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>