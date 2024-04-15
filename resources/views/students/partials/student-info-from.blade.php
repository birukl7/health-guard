<section>
    @php
        $name_array = explode(" ",Auth::user()->name);
    @endphp
    <header>
        <h2 class="text-lg font-medium text-gray-900 ">
            {{ __('Finish Up Student Profile') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 py-3">
            {{ __('Fill out the information below.') }}
        </p>
    </header>

    <form method="POST" action="/students" class="mt-6 space-y-6">
    @csrf

        <div>
            <x-input-label for="add_first_name" :value="__('First name')" />
            <input id="add_first_name" name="first_name" type="text" class="mt-1 block w-full" autocomplete="first-name" value="{{$name_array[0]}}"/>
            <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="add_last_name" :value="__('Last name')" />
            @if(isset($name_array[1]))
                <input id="add_last_name" name="last_name" type="text" class="mt-1 block w-full" value="{{ old('last_name', $name_array[1]) }}" autocomplete="last-name" />
            @else
                <input id="add_last_name" name="last_name" type="text" class="mt-1 block w-full" value="{{ old('last_name') }}" autocomplete="last-name" />
            @endif
            <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="date_of_birth" :value="__('Date of Birth')" />
            <input id="date_of_birth" name="date_of_birth" type="date" class="mt-1 block w-full" autocomplete="date_of_birth" />
            <x-input-error :messages="$errors->get('date_of_birth')" class="mt-2" />
        </div> 

        <div>
            <x-input-label for="address" :value="__('Address (City)')" />
            <input id="address" name="address" type="text" class="mt-1 block w-full" list="cityList" autocomplete="city">
            <datalist id="cityList">
                <option value="Addis Ababa">
                <option value="Adama">
                <option value="Bahir Dar">
                <option value="Dire Dawa">
                <option value="Gondar">
                <option value="Hawassa">
                <option value="Jimma">
                <option value="Mekelle">
                <option value="Debre Markos">
                <option value="Harar">
                <option value="Arba Minch">
                <option value="Asella">
                <option value="Axum">
                <option value="Dilla">
                <option value="Gambella">
                <option value="Jijiga">
                <option value="Nekemte">
                <option value="Sodo">
                <option value="Wolaita Sodo">
                <option value="Woldiya">
                <option value="Bishoftu">
                <option value="Ambo">
                <option value="Shashamane">
                <option value="Adigrat">
                <option value="Dessie">
                <option value="Lalibela">
                <option value="Semera">
                <option value="Shire">
                <option value="Dese">
            </datalist>
            <x-input-error :messages="$errors->get('address')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="emergency_contact_name" :value="__('Emergency contact name')" />
            <input id="emergency_contact_name" name="emergency_contact_name" type="text" class="mt-1 block w-full" autocomplete="new-password" />
            <x-input-error :messages="$errors->get('emergency_contact_name')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="emergency_contact_number" :value="__('Emergency contact number')" />
            <input id="emergency_contact_number" name="emergency_contact_number" type="text" class="mt-1 block w-full" autocomplete="emergency" />
            <x-input-error :messages="$errors->get('emergency_contact_number')" class="mt-2" />
        </div>
        
        <div class="flex items-center gap-4 py-4">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Submit</button>
        </div>
    </form>

</section>
