<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 ">
            {{ __('Finish Up Student Profile') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 py-3">
            {{ __('Fill out the information below.') }}
        </p>
    </header>

    <form method="post" action="{{ route('students.store') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <x-input-label for="add_first_name" :value="__('First name')" />
            <x-text-input id="add_first_name" name="first_name" type="text" class="mt-1 block w-full" autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="add_last_name" :value="__('Last name')" />
            <x-text-input id="add_last_naem" name="last_name" type="text" class="mt-1 block w-full" autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="last_name" :value="__('New Password')" />
            <x-text-input id="last_name" name="last_name" type="password" class="mt-1 block w-full" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="date_of_birth" :value="__('Date of Birth')" />
            <x-text-input id="update_password_password_confirmation" name="date_of_birth" type="date" class="mt-1 block w-full" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="address" :value="__('Address')" />
            <x-text-input id="address" name="address" type="text" class="mt-1 block w-full" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- allergies -->
        <!-- <div>
            <x-input-label for="" :value="__('Allergies')" />
            <input type="checkbox" name="allergies[]" id="allergy1"><label for="allergy1">Pollen Allergy</label> <input type="checkbox" name="allergies[]" id="allergy2"><input type="checkbox" name="allergies[]" id="allergy3"><input type="checkbox" name="allergies[]" id="allergy4"><input type="checkbox" name="allegies[]" id="allergy5">
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div> -->

        <div>
            <x-input-label for="emergency_contact_name" :value="__('Emergency contact name')" />
            <x-text-input id="emergency_contact_name" name="emergency_contact_name" type="text" class="mt-1 block w-full" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="emergency_contact_number" :value="__('Emergency contact number')" />
            <x-text-input id="emergency_contact_name" name="emergency_contact_name" type="text" class="mt-1 block w-full" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>


        <div class="flex items-center gap-4 py-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
