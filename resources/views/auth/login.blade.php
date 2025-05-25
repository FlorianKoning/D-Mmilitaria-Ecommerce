<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label class="text-gray-900" for="email" :value="__('Email Address')" />
            <x-text-input id="email" class="bg-[#F3F5F7] border-[#F3F5F7]/80  block mt-1 w-full text-gray-900" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label class="text-gray-900" for="password" :value="__('Password')" />

            <x-text-input id="password" class="bg-[#F3F5F7] border-[#F3F5F7]/80  block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex items-center justify-between mt-4">
            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-black shadow-sm" name="remember">
                    <span class="ms-2 text-sm text-gray-900">{{ __('Remember Me') }}</span>
                </label>
            </div>

            <div>
                <a class="underline text-sm text-gray-900 hover:text-navBackground rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 mr-3" href="{{ route('password.request') }}">
                {{ __('Forgot password?') }}
                </a>

                <a class="underline text-sm text-gray-900 hover:text-navBackground rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('register') }}">
                {{ __('No account?') }}
                </a>

                <x-primary-button class="ms-3 bg-navBackground hover:bg-navBackground/90 focus:bg-navBackground active:bg-navBackground">
                    {{ __('Log in') }}
                </x-primary-button>
            </div>
        </div>
    </form>
</x-guest-layout>
