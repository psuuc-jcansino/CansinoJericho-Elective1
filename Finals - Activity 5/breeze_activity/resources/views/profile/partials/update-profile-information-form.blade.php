<section class="max-w-xl mx-auto bg-white dark:bg-gray-800 p-8 rounded-xl shadow-lg border border-red-500 dark:border-red-400">
    <header class="mb-6">
        <h2 class="text-2xl font-semibold text-red-700 dark:text-red-400">
            {{ __('Profile Information') }}
        </h2>
        <p class="mt-2 text-gray-600 dark:text-gray-300">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="POST" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="POST" action="{{ route('profile.update') }}" class="space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Name')" class="text-red-700 dark:text-red-400" />
            <x-text-input
                id="name"
                name="name"
                type="text"
                class="mt-1 block w-full rounded-md border border-gray-300 dark:border-gray-600 focus:border-red-600 dark:focus:border-red-400 focus:ring-1 focus:ring-red-600 dark:focus:ring-red-400 bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100"
                :value="old('name', $user->name)"
                required
                autofocus
                autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" class="text-red-700 dark:text-red-400" />
            <x-text-input
                id="email"
                name="email"
                type="email"
                class="mt-1 block w-full rounded-md border border-gray-300 dark:border-gray-600 focus:border-red-600 dark:focus:border-red-400 focus:ring-1 focus:ring-red-600 dark:focus:ring-red-400 bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100"
                :value="old('email', $user->email)"
                required
                autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
            <div class="mt-3 text-sm text-yellow-600 dark:text-yellow-400">
                {{ __('Your email address is unverified.') }}
                <button form="send-verification" class="underline ml-1 hover:text-red-700 dark:hover:text-red-400 rounded focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 dark:focus:ring-offset-gray-800">
                    {{ __('Click here to re-send the verification email.') }}
                </button>

                @if (session('status') === 'verification-link-sent')
                <p class="mt-2 font-semibold text-green-600 dark:text-green-400">
                    {{ __('A new verification link has been sent to your email address.') }}
                </p>
                @endif
            </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button class="bg-red-600 hover:bg-red-700 focus:ring-red-500 dark:bg-red-500 dark:hover:bg-red-600">
                {{ __('Save') }}
            </x-primary-button>

            @if (session('status') === 'profile-updated')
            <p
                x-data="{ show: true }"
                x-show="show"
                x-transition
                x-init="setTimeout(() => show = false, 2000)"
                class="text-sm text-gray-600 dark:text-gray-400">
                {{ __('Saved.') }}
            </p>
            @endif
        </div>
    </form>
</section>