<section>
@php
        $name_array = explode(" ",Auth::user()->name);
    @endphp
    <header>
        <h2 class="text-lg font-medium text-gray-900 ">
            Finish Up Student Profile
        </h2>

        <p class="mt-1 text-sm text-gray-600 py-3">
            Fill out the information below.
        </p>
    </header>

    <form method="POST" action="{{ route('students.store') }}" class="mt-6 space-y-6">
        @csrf

         <div>
            <label for="add_first_name" class="block">First name</label>
            <input id="add_first_name" name="first_name" type="text" class="mt-1 block w-full" autocomplete="first-name" value="{{ old('first_name', $name_array[0]) }}" />
            <!-- Input error messages here -->
        </div>

        <div>
            <label for="add_last_name" class="block">Last name</label>
            <input id="add_last_name" name="last_name" type="text" class="mt-1 block w-full" value="{{ old('last_name', $name_array[1]) }}" autocomplete="last-name" />
            <!-- Input error messages here -->
        </div>

        <div>
            <label for="date_of_birth" class="block">Date of Birth</label>
            <input id="date_of_birth" name="date_of_birth" type="date" class="mt-1 block w-full" autocomplete="date_of_birth" />
            <!-- Input error messages here -->
        </div> 

        <div>
            <label for="address" class="block">Address (City)</label>
            <input id="address" name="address" type="text" class="mt-1 block w-full" list="cityList" autocomplete="city" />
            <datalist id="cityList">
                <!-- Options for cities -->
            </datalist>
            <!-- Input error messages here -->
        </div>

        <div>
            <label for="emergency_contact_name" class="block">Emergency contact name</label>
            <input id="emergency_contact_name" name="emergency_contact_name" type="text" class="mt-1 block w-full" autocomplete="new-password" />
            <!-- Input error messages here -->
        </div>

        <div>
            <label for="emergency_contact_number" class="block">Emergency contact number</label>
            <input id="contact_name" type="text" class="mt-1 inline w-16" value="+251" disabled autocomplete="emergency" />
            <input id="emergency_contact_number" name="emergency_contact_number" type="text" class="mt-1 inline-block w-80" autocomplete="emergency" />
            <!-- Input error messages here -->
        </div>
        <div class="flex items-center gap-4 py-4">
            <input type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
        </div>
    </form>
</section>
