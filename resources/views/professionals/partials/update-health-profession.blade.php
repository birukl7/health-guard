<section class="w-full">
    @php
        $name_array = explode(" ",Auth::user()->name);
        $user = Auth::user();
        $oldSpecialization = old('specialization', $user->healthProfessionalProfile->specialization ?? '');

        $oldGender = old('gender', $user->healthProfessionalProfile->gender ?? '');

        $oldPrice = old('price', $user->healthProfessionalProfile->price ?? '');

        $oldExperience = old('years_of_experience', $user->healthProfessionalProfile->years_of_experience ?? '');

        $oldIssues = $issues->pluck('name')->toArray() ?? [];

    @endphp
    <header>
        <h2 class="text-lg font-medium text-gray-900 ">
            {{ __('Finish Up your profession Profile') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 py-3">
            {{ __('Fill out the information below.') }}
        </p>
    </header>

    <form method="POST" action="{{route('professionals.update', ['professional' => $user->id ])}}" class="mt-6 space-y-6">
        @csrf
        @method('PUT')
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
            <textarea id="age" name="about" type="text" class="mt-1 block w-full"  autocomplete="about">
                {{ trim(old('about', $user->healthProfessionalProfile->about)) }}
            </textarea>
            <x-input-error :messages="$errors->get('about')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="gender" :value="__('Gender')" />
            <select id="gender" name="gender" class="mt-1 block w-full" autocomplete="gender">
                <option value="">Select Gender</option>
                <option value="Female" {{ $oldGender == 'Female' ? 'selected' : '' }}>Female</option>
                <option value="Male" {{ $oldGender == 'Male' ? 'selected' : '' }}>Male</option>
                <option value="Other" {{ $oldGender == 'Other' ? 'selected' : '' }}>Other</option>
            </select>
            <x-input-error :messages="$errors->get('gender')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="description" :value="__('Description (3000 characters )*')" />
            <x-input-label for="description" :value="__('Tip: Rezise the text box to write more')" />
            <textarea id="description" name="description" type="text" class="mt-1 block w-full" autocomplete="about" >
               {{ old('name', $user->healthProfessionalProfile->description) }}
            </textarea>
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="age" :value="__('Date of Birth')" />
            <input id="age" name="date_of_birth" type="date" class="mt-1 block w-full" value="{{ old('name', $user->healthProfessionalProfile->date_of_birth) }}"autocomplete="Date of birth" />
            <x-input-error :messages="$errors->get('date_of_birth')" class="mt-2" />
        </div> 

        <div>
        <x-input-label for="specialization" :value="__('Specialiazation')" />
          <select id="specialization" name="specialization" class="mt-1 block w-full" autocomplete="specialization">
            <option value="">Select Specialization</option>
            <option value="Clinical Psychology" {{ $oldSpecialization == 'Clinical Psychology' ? 'selected' : '' }}>Clinical Psychology</option>
            <option value="Counseling Psychology" {{ $oldSpecialization == 'Counseling Psychology' ? 'selected' : '' }}>Counseling Psychology</option>
            <option value="School Psychology" {{ $oldSpecialization == 'School Psychology' ? 'selected' : '' }}>School Psychology</option>
            <option value="Forensic Psychology" {{ $oldSpecialization == 'Forensic Psychology' ? 'selected' : '' }}>Forensic Psychology</option>
            <option value="Industrial-Organizational Psychology" {{ $oldSpecialization == 'Industrial-Organizational Psychology' ? 'selected' : '' }}>Industrial-Organizational Psychology</option>
            <option value="Health Psychology" {{ $oldSpecialization == 'Health Psychology' ? 'selected' : '' }}>Health Psychology</option>
            <option value="Neuropsychology" {{ $oldSpecialization == 'Neuropsychology' ? 'selected' : '' }}>Neuropsychology</option>
            <option value="Developmental Psychology" {{ $oldSpecialization == 'Developmental Psychology' ? 'selected' : '' }}>Developmental Psychology</option>
            <option value="Social Psychology" {{ $oldSpecialization == 'Social Psychology' ? 'selected' : '' }}>Social Psychology</option>
            <option value="Experimental Psychology" {{ $oldSpecialization == 'Experimental Psychology' ? 'selected' : '' }}>Experimental Psychology</option>
            <option value="Cognitive Psychology" {{ $oldSpecialization == 'Cognitive Psychology' ? 'selected' : '' }}>Cognitive Psychology</option>
            <option value="Environmental Psychology" {{ $oldSpecialization == 'Environmental Psychology' ? 'selected' : '' }}>Environmental Psychology</option>
          </select>
          <x-input-error :messages="$errors->get('specialization')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="affialation" :value="__('Affilated Hospital')" />
            <x-text-input id="affiliation" name="hospital_affiliation" type="text" class="mt-1 block w-full" :value="old('hospital_affiliation', $user->healthProfessionalProfile->hospital_affiliation)" autocomplete="affiliation" />
            <x-input-error :messages="$errors->get('hospital_affiliation')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="Phone number" :value="__('Contact Number')" />
            <x-text-input id="contact_name" type="text" class="mt-1 inline w-16" :value=" +251" disabled autocomplete="emergency" />
            <x-text-input id="phone_number" name="phone_number" type="text" class="mt-1 inline-block w-80" :value="old('name', $user->healthProfessionalProfile->phone_number)"  autocomplete="phone number" />
            <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
        </div>

        <div>
            @php
               // dd($user->healthProfessionalProfile->location);
            @endphp
            <x-input-label for="location" :value="__('Location (City)')" />
            <input id="location" name="location" type="text" class="mt-1 block w-full" list="cityList" value="{{old('location', $user->healthProfessionalProfile->location) }}"  autocomplete="city">
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
            <x-input-label for="linkedin link" :value="__('Your Linkedin link')" />
            <x-text-input id="linkedin" name="linkedin" type="text" class="mt-1 block w-full" :value="old('name', $user->healthProfessionalProfile->linkedin)"  autocomplete="linkedin" />
            <x-input-error :messages="$errors->get('linkedin')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="facebook" :value="__('Your facebook link (optional)')" />
            <x-text-input id="facebook" name="facebook" type="text" class="mt-1 block w-full" :value="old('name', $user->healthProfessionalProfile->facebook)"  autocomplete="facebook" />
            <x-input-error :messages="$errors->get('facebook')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="instagram" :value="__('Your instagram link (optional)')" />
            <x-text-input id="instagram" name="instagram" type="text" class="mt-1 block w-full" :value="old('name', $user->healthProfessionalProfile->instagram)"  autocomplete="instagram" />
            <x-input-error :messages="$errors->get('instagram')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="twitter" :value="__('Your twitter link (optional)')" />
            <x-text-input id="twitter" name="twitter" type="text" class="mt-1 block w-full" :value="old('name', $user->healthProfessionalProfile->twitter)"  autocomplete="twitter" />
            <x-input-error :messages="$errors->get('twitter')" class="mt-2" />
        </div>

        <div>
          <x-input-label for="price" :value="__('Service')" />
          <select name="price" id="price" class="mt-1 block w-full">
              <option value="free" {{ $oldPrice === 'free' ? 'selected' : '' }}>Free (Volunteerism)</option>
              <option value="paid" {{ $oldPrice === 'paid' ? 'selected' : '' }}>Paid (coming soon)</option>
          </select>
          <x-input-error :messages="$errors->get('price')" class="mt-2" />
        </div>


      <div>
        <x-input-label for="years_of_experience" :value="__('Years of Experience')" />
        <select name="years_of_experience" id="years_of_experience" class="mt-1 block w-full">
            <option value="0-1" {{ $oldExperience === '0-1' ? 'selected' : '' }}>0-1 years</option>
            <option value="2-5" {{ $oldExperience === '2-5' ? 'selected' : '' }}>2-5 years</option>
            <option value="5-7" {{ $oldExperience === '5-7' ? 'selected' : '' }}>5-7 years</option>
            <option value="7-10" {{ $oldExperience === '7-10' ? 'selected' : '' }}>7-10 years</option>
            <option value="10+" {{ $oldExperience === '10+' ? 'selected' : '' }}>10+ years</option>
        </select>
        <x-input-error :messages="$errors->get('years_of_experience')" class="mt-2" />
    </div>


    <div>
      <x-input-label for="issues" :value="__('Psychological issues you\'ve consulted before')" />
      <input type="checkbox" id="issue_depression" name="issues[]" value="Depression" {{ in_array('Depression', $oldIssues) ? 'checked' : '' }}>
      <label for="issue_depression">Depression</label><br>
      
      <input type="checkbox" id="issue_anxiety" name="issues[]" value="Anxiety Disorders" {{ in_array('Anxiety Disorders', $oldIssues) ? 'checked' : '' }}>
      <label for="issue_anxiety">Anxiety Disorders</label><br>
      
      <input type="checkbox" id="issue_substance" name="issues[]" value="Substance Abuse and Addiction" {{ in_array('Substance Abuse and Addiction', $oldIssues) ? 'checked' : '' }}>
      <label for="issue_substance">Substance Abuse and Addiction</label><br>
      
      <input type="checkbox" id="issue_ptsd" name="issues[]" value="Post-Traumatic Stress Disorder (PTSD)" {{ in_array('Post-Traumatic Stress Disorder (PTSD)', $oldIssues) ? 'checked' : '' }}>
      <label for="issue_ptsd">Post-Traumatic Stress Disorder (PTSD)</label><br>
      
      <input type="checkbox" id="issue_eating" name="issues[]" value="Eating Disorders" {{ in_array('Eating Disorders', $oldIssues) ? 'checked' : '' }}>
      <label for="issue_eating">Eating Disorders</label><br>
      
      <input type="checkbox" id="issue_personality" name="issues[]" value="Personality Disorders" {{ in_array('Personality Disorders', $oldIssues) ? 'checked' : '' }}>
      <label for="issue_personality">Personality Disorders</label><br>
      
      <input type="checkbox" id="issue_relationship" name="issues[]" value="Relationship Issues" {{ in_array('Relationship Issues', $oldIssues) ? 'checked' : '' }}>
      <label for="issue_relationship">Relationship Issues</label><br>
      
      <input type="checkbox" id="issue_stress" name="issues[]" value="Stress Management" {{ in_array('Stress Management', $oldIssues) ? 'checked' : '' }}>
      <label for="issue_stress">Stress Management</label><br>
      
      <input type="checkbox" id="issue_grief" name="issues[]" value="Grief and Loss" {{ in_array('Grief and Loss', $oldIssues) ? 'checked' : '' }}>
      <label for="issue_grief">Grief and Loss</label><br>
      
      <input type="checkbox" id="issue_self_esteem" name="issues[]" value="Self-Esteem and Identity Issues" {{ in_array('Self-Esteem and Identity Issues', $oldIssues) ? 'checked' : '' }}>
      <label for="issue_self_esteem">Self-Esteem and Identity Issues</label><br>
    </div>


        <div class="flex items-center gap-4 py-4">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">update</button>
        </div>
    </form>
</section>
