<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
<x-guest-layout>
    <form method="POST" action="{{ route('registerPost') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                autofocus autocomplete="name" />

            @error('name')
            <div class="text-red-500"> {{ $message }} </div>
            @enderror
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" required
                autocomplete="username" />
            
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>


        <div class="mt-4" x-data="{ show: true }">
            <span class="px-1 text-sm text-gray-600">Password</span>
            <div class="relative">


                <x-password-input name="password" required autocomplete="new-password" placeholder=""
                    x-bind:show="show" />
            </div>

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>
        <div class="mt-4" x-data="{ show: true }">
            <span class="px-1 text-sm text-gray-600">Confirm Password</span>
            <div class="relative">


                <x-password-input id="password_confiramtion" name="password_confirmation" required
                    autocomplete="new-password" x-bind:show="show" />
            </div>

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>



        <!-- user-role -->
        <div class="mt-4">
            <x-input-label for="role_id" :value="__('User Role')" />

            <select id="role_id" name="role_id"
                class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                <option value="student" selected>Student</option>
                <option value="health_professional">Health Professional</option>
            </select>
        </div>

        <!-- Google Sign-In Button -->
        <div class="mt-4">
            <a href="{{ route('auth.google') }}">
                <img src="https://developers.google.com/identity/images/btn_google_signin_dark_normal_web.png"
                    style="margin-left: 3em; height: 40px; border-radius: 12px">
            </a>
        </div>
        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600  hover:text-gray-900  rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 "
                href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>