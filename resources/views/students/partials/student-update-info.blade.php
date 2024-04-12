<section>
  @php 
    $user = Auth::user();
  @endphp
    <header>
        <h2 class="text-lg font-medium text-gray-900 ">
            {{ __('Student Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 ">
            {{ __("Update your student account's profile information.") }}
        </p>
    </header>


    <form method="post" action="{{route('students.update', ['student' => Auth::user()->id])}}" class="mt-6 space-y-6">
        @csrf
        @method('PUT')
        <div>
            <x-input-label for="first_name" :value="__('First name')" />
            <x-text-input id="first_name" name="first_name" type="text" class="mt-1 block w-full" :value="old('name', $user->studentProfile->first_name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('first_name')" />
        </div>

        <div>
            <x-input-label for="last_name" :value="__('Last name')" />
            <x-text-input id="last_name" name="last_name" type="text" class="mt-1 block w-full" :value="old('last_name', $user->studentProfile->last_name)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('last_name')" />
        </div>

        <div>
            <x-input-label for="date_of_birth" :value="__('Date of Birth')" />
            <x-text-input id="date_of_birth" name="date_of_birth" type="date" class="mt-1 block w-full" :value="old('email', $user->studentProfile->date_of_birth)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('date_of_birth')" />
        </div>

        <div>
            <x-input-label for="address" :value="__('Address')" />
            <x-text-input id="address" name="address" type="text" class="mt-1 block w-full" :value="old('address', $user->studentProfile->address)" required autocomplete="address" />
            <x-input-error class="mt-2" :messages="$errors->get('address')" />
        </div>

        <div>
            <x-input-label for="emergency_contact_name" :value="__('Emergency contact name')" />
            <x-text-input id="emergency_contact_name" name="emergency_contact_name" type="text" class="mt-1 block w-full" :value="old('address', $user->studentProfile->emergency_contact_name)" required autocomplete="address" />
            <x-input-error class="mt-2" :messages="$errors->get('emergency_contact_name')" />
        </div>

        <div>
            <x-input-label for="emergency_contact_number" :value="__('Emergency contact number')" />
            <x-text-input id="emergency_contact_number" name="emergency_contact_number" type="text" class="mt-1 block w-full" :value="old('address', $user->studentProfile->emergency_contact_number)" required autocomplete="address" />
            <x-input-error class="mt-2" :messages="$errors->get('emergency_contact_number')" />
        </div>

        <div class="flex items-center gap-4 py-4">
            <x-primary-button>{{ __('Update') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
