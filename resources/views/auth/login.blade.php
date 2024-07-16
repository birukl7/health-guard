<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="my-5">
        <x-input-label value="Demo Student Email: kebedek@gmail.com" />
        <x-input-label value="Demo Student Password: biruklemma" />
    </div>

    <div class="my-5">
        <x-input-label value="Demo Psychologist Email: derick86@example.net" />
        <x-input-label value="Demo Psychologist Password: biruklemma" />
    </div>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        04512247

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
         <div class="mt-4" x-data="{ show: true }">
            <span class="px-1 text-sm text-gray-600">Password</span>
            <div class="relative">


                <x-password-input name="password" required autocomplete="new-password" placeholder=""
                    x-bind:show="show" />

            @error('password')
            <div class="text-red-500"> {{ $message }} </div>
            @enderror
            </div>

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

         <!-- Google Sign-In Button -->
        <div class="mt-4">
            <a href="{{ route('auth.google') }}">
                <img src="https://developers.google.com/identity/images/btn_google_signin_dark_normal_web.png"
                    style="margin-left: 3em; height: 40px; border-radius: 12px">
            </a>
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded  border-gray-300  text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ms-2 text-sm text-gray-600 ">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900  rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 " href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
            @if (Route::has('register'))
                <a
                    href="{{ route('register') }}"
                    class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] outline outline-1 outline-black ml-3"
                >
                    Register
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
