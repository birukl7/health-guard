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

    @php
        echo ($user->studentProfile->first_name);
    @endphp
    <form method="post" action="{{ route('students.update', ['student' => Auth::user()->id]) }}" class="mt-6 space-y-6">
        @csrf
        @method('PUT')
        <div>
            <x-input-label for="first_name" :value="__('First name')" />
            <input id="first_name" name="first_name" type="text" class="mt-1 block w-full" value="{{ old('first_name', $user->studentProfile->first_name) }}" required autofocus autocomplete="name" />
            @error('first_name')
                <span class="text-red-600">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <x-input-label for="last_name" :value="__('Last name')" />
            <input id="last_name" name="last_name" type="text" class="mt-1 block w-full" value="{{ old('last_name', $user->studentProfile->last_name) }}" required autocomplete="username" />
            @error('last_name')
                <span class="text-red-600">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <x-input-label for="date_of_birth" :value="__('Date of Birth')" />
            <input id="date_of_birth" name="date_of_birth" type="date" class="mt-1 block w-full" value="{{ old('date_of_birth', $user->studentProfile->date_of_birth) }}" required autocomplete="username" />
            @error('date_of_birth')
                <span class="text-red-600">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <x-input-label for="address" :value="__('Address')" />
            <input id="address" name="address" type="text" class="mt-1 block w-full" value="{{ old('address', $user->studentProfile->address) }}" required autocomplete="address" />
            @error('address')
                <span class="text-red-600">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <x-input-label for="emergency_contact_name" :value="__('Emergency contact name')" />
            <input id="emergency_contact_name" name="emergency_contact_name" type="text" class="mt-1 block w-full" value="{{ old('emergency_contact_name', $user->studentProfile->emergency_contact_name) }}" required autocomplete="address" />
            @error('emergency_contact_name')
                <span class="text-red-600">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <x-input-label for="emergency_contact_number" :value="__('Emergency contact number')" />
            <input id="emergency_contact_number" name="emergency_contact_number" type="text" class="mt-1 block w-full" value="{{ old('emergency_contact_number', $user->studentProfile->emergency_contact_number) }}" required autocomplete="address" />
            @error('emergency_contact_number')
                <span class="text-red-600">{{ $message }}</span>
            @enderror
        </div>

        <div class="flex items-center gap-4 py-4">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">{{ __('Update') }}</button>

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
