<section class="w-full">
    @php
        $name_array = explode(" ",Auth::user()->name);
    @endphp
    <header>
        <h2 class="text-lg font-medium text-gray-900 ">
            {{ __('Finish Up your profession Profile') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 py-3">
            {{ __('Fill out the information below.') }}
        </p>
    </header>

    <form method="POST" action="/professionals" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf

         <div>
            <x-input-label for="add_first_name" :value="__('First name')" />
            <x-text-input id="add_first_name" name="first_name" type="text" class="mt-1 block w-full" autocomplete="first-name" :value="old('first_name', $name_array[0])"/>
            <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="add_last_name" :value="__('Last name')" />
            @if(isset($name_array[1]))
            <x-text-input id="add_last_name" name="last_name" type="text" class="mt-1 block w-full" :value="old('last_name', $name_array[1])" autocomplete="last-name" />
            @else
            <x-text-input id="add_last_name" name="last_name" type="text" class="mt-1 block w-full" :value="old('')" autocomplete="last-name" />
            @endif
            <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
        </div>



        <div>
            <x-input-label for="about" :value="__('About you')" />
            <textarea id="age" name="about" type="text" class="mt-1 block w-full" autocomplete="about"></textarea>
            <x-input-error :messages="$errors->get('about')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="description" :value="__('Description (3000 characters )*')" />
            <x-input-label for="description" :value="__('Tip: Rezise the text box to write more')" />
            <textarea id="description" name="description" type="text" class="mt-1 block w-full" autocomplete="about"></textarea>
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="age" :value="__('Date of Birth')" />
            <input id="age" name="date_of_birth" type="date" class="mt-1 block w-full" autocomplete="Date of birth" />
            <x-input-error :messages="$errors->get('date_of_birth')" class="mt-2" />
        </div> 

        <div>
            <x-input-label for="specialization" :value="__('Specialization')" />
            <select id="specialization" name="specialization" class="mt-1 block w-full" autocomplete="specialization">
                <option value="">Select Specialization</option>
                <option value="Clinical Psychology">Clinical Psychology</option>
                <option value="Counseling Psychology">Counseling Psychology</option>
                <option value="School Psychology">School Psychology</option>
                <option value="Forensic Psychology">Forensic Psychology</option>
                <option value="Industrial-Organizational Psychology">Industrial-Organizational Psychology</option>
                <option value="Health Psychology">Health Psychology</option>
                <option value="Neuropsychology">Neuropsychology</option>
                <option value="Developmental Psychology">Developmental Psychology</option>
                <option value="Social Psychology">Social Psychology</option>
                <option value="Experimental Psychology">Experimental Psychology</option>
                <option value="Cognitive Psychology">Cognitive Psychology</option>
                <option value="Environmental Psychology">Environmental Psychology</option>
            </select>
            <x-input-error :messages="$errors->get('specialization')" class="mt-2" />
        </div>


        <div>
            <x-input-label for="affialation" :value="__('Affilated Hospital')" />
            <x-text-input id="affialation" name="hospital_affiliation" type="text" class="mt-1 block w-full" autocomplete="affilation" />
            <x-input-error :messages="$errors->get('hospital_affiliation')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="Phone number" :value="__('Contact Number')" />
            <x-text-input id="contact_name" type="text" class="mt-1 inline w-16" :value=" +251" disabled autocomplete="emergency" />
            <x-text-input id="phone_number" name="phone_number" type="text" class="mt-1 inline-block w-80" autocomplete="phone number" />
            <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="location" :value="__('Location (City)')" />
            <input id="location" name="location" type="text" class="mt-1 block w-full" list="cityList" autocomplete="city">
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

        <!-- <div>
            <x-input-label for="license" :value="__('Upload a license (PDF, JPG, JPEG, PNG and less than 4Mb)')" />
            <input id="license" type="file" name="license" class="mt-1 inline w-full" />
            <x-input-error :messages="$errors->get('license')" class="mt-2" />
        </div> -->

        <div>
            <x-input-label for="linkedin link" :value="__('Your Linkedin link')" />
            <x-text-input id="linkedin" name="linkedin" type="text" class="mt-1 block w-full" autocomplete="linkedin" />
            <x-input-error :messages="$errors->get('linkedin')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="facebook" :value="__('Your facebook link (optional)')" />
            <x-text-input id="facebook" name="facebook" type="text" class="mt-1 block w-full" autocomplete="facebook" />
            <x-input-error :messages="$errors->get('facebook')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="instagram" :value="__('Your instagram link (optional)')" />
            <x-text-input id="instagram" name="facebook" type="text" class="mt-1 block w-full" autocomplete="instagram" />
            <x-input-error :messages="$errors->get('instagram')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="twitter" :value="__('Your twitter link (optional)')" />
            <x-text-input id="twitter" name="twitter" type="text" class="mt-1 block w-full" autocomplete="twitter" />
            <x-input-error :messages="$errors->get('twitter')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="price" :value="__('Service')" />
            <select name="price" id="price" class="mt-1 block w-full">
              <option value="free">Free (Volenteerism)</option>
              <option value="paid">Paid(coming soon)</option>
            </select>
            <x-input-error :messages="$errors->get('price')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="years_of_experience" :value="__('Years of Experience')" />
            <select name="years_of_experience" id="years_of_experience" class="mt-1 block w-full">
              <option value="0-1">0-1 years</option>
              <option value="2-5">2-5 years</option>
              <option value="5-7">5-7 years</option>
              <option value="7-10">7-10 years</option>
              <option value="10+">10+ years</option>
            </select>
            <x-input-error :messages="$errors->get('price')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="issues" :value="__('Psychological issues you\'ve consulted before')" />
            <input type="checkbox" id="issue_depression" name="issues[]" value="Depression"><br>
            <label for="issue_depression">Depression</label><br>
            <input type="checkbox" id="issue_anxiety" name="issues[]" value="Anxiety Disorders">
            <label for="issue_anxiety">Anxiety Disorders</label><br>
            <input type="checkbox" id="issue_substance" name="issues[]" value="Substance Abuse and Addiction">
            <label for="issue_substance">Substance Abuse and Addiction</label><br>
            <input type="checkbox" id="issue_ptsd" name="issues[]" value="Post-Traumatic Stress Disorder (PTSD)">
            <label for="issue_ptsd">Post-Traumatic Stress Disorder (PTSD)</label><br>
            <input type="checkbox" id="issue_eating" name="issues[]" value="Eating Disorders">
            <label for="issue_eating">Eating Disorders</label><br>
            <input type="checkbox" id="issue_personality" name="issues[]" value="Personality Disorders">
            <label for="issue_personality">Personality Disorders</label><br>
            <input type="checkbox" id="issue_relationship" name="issues[]" value="Relationship Issues">
            <label for="issue_relationship">Relationship Issues</label><br>
            <input type="checkbox" id="issue_stress" name="issues[]" value="Stress Management">
            <label for="issue_stress">Stress Management</label><br>
            <input type="checkbox" id="issue_grief" name="issues[]" value="Grief and Loss">
            <label for="issue_grief">Grief and Loss</label><br>
            <input type="checkbox" id="issue_self_esteem" name="issues[]" value="Self-Esteem and Identity Issues">
            <label for="issue_self_esteem">Self-Esteem and Identity Issues</label><br>
        </div>

        <div class="flex items-center gap-4 py-4">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Submit</button>
        </div>
    </form>
</section>
