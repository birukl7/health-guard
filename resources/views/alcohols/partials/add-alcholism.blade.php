<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 ">
            {{ __('Alcholism Assessment Questions') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 py-3">
            {{ __('Please note that the responses to these questions are confidential and will only be shared with health professionals with the student\'s consent.') }}
        </p>
    </header>

    <form method="POST" action="{{route('alcohols.store')}}">
        @csrf
        @method('POST')

        <div class="my-8">
            <x-input-label for="question_1" :value="__('1. Have you consumed alcohol in the past month?')" />
            <label class="block mt-2">
                <input type="radio" name="question_1" value="yes" class="mr-1" style="outline: none;">
                Yes
            </label>
            <label class="block mt-2">
                <input type="radio" name="question_1" value="no" class="mr-1" style="outline: none;">
                No
            </label>
            <x-input-error :messages="$errors->get('question_1')" class="mt-2" />
        </div>

        <div class="my-8">
            <x-input-label for="question_2" :value="__('2. On average, how many days per week do you consume alcohol?')" />
            <select id="question_2" name="question_2" class="mt-1 block w-full">
                <option value="0_days">0 days</option>
                <option value="1-2_days">1-2 days</option>
                <option value="3-4_days">3-4 days</option>
                <option value="5_or_more_days">5 or more days</option>
            </select>
            <x-input-error :messages="$errors->get('question_2')" class="mt-2" />
        </div>

        <div class="my-8">
            <x-input-label for="question_3" :value="__('3. When you drink alcohol, how many drinks do you typically have per occasion?')" />
            <select id="question_3" name="question_3" class="mt-1 block w-full">
                <option value="1-2_drinks">1-2 drinks</option>
                <option value="3-4_drinks">3-4 drinks</option>
                <option value="5_or_more_drinks">5 or more drinks</option>
            </select>
            <x-input-error :messages="$errors->get('question_3')" class="mt-2" />
        </div>

        <div class="my-8">
            <x-input-label for="question_4" :value="__('4. Have you experienced any negative consequences as a result of your drinking?')" />
            <label class="block mt-2">
                <input type="radio" name="question_4" value="yes" class="mr-1" style="outline: none;">
                Yes
            </label>
            <label class="block mt-2">
                <input type="radio" name="question_4" value="no" class="mr-1" style="outline: none;">
                No
            </label>
            <x-input-error :messages="$errors->get('question_4')" class="mt-2" />
        </div>

        <div class="my-8">
            <x-input-label for="question_5" :value="__('5. Do you feel guilty or regretful about your drinking behavior?')" />
            <label class="block mt-2">
                <input type="radio" name="question_5" value="yes" class="mr-1" style="outline: none;">
                Yes
            </label>
            <label class="block mt-2">
                <input type="radio" name="question_5" value="no" class="mr-1" style="outline: none;">
                No
            </label>
            <x-input-error :messages="$errors->get('question_5')" class="mt-2" />
        </div>

        <div class="my-8">
            <x-input-label for="question_6" :value="__('6. Have you ever failed to fulfill obligations or responsibilities due to drinking?')" />
            <label class="block mt-2">
                <input type="radio" name="question_6" value="yes" class="mr-1" style="outline: none;">
                Yes
            </label>
            <label class="block mt-2">
                <input type="radio" name="question_6" value="no" class="mr-1" style="outline: none;">
                No
            </label>
            <x-input-error :messages="$errors->get('question_6')" class="mt-2" />
        </div>

        <div class="my-8">
            <x-input-label for="question_7" :value="__('7. How often do you blackout or have memory lapses after drinking?')" />
            <select id="question_7" name="question_7" class="mt-1 block w-full">
                <option value="rarely">Rarely</option>
                <option value="sometimes">Sometimes</option>
                <option value="often">Often</option>
                <option value="always">Always</option>
            </select>
            <x-input-error :messages="$errors->get('question_7')" class="mt-2" />
        </div>

        <div class="my-8">
            <x-input-label for="question_8" :value="__('8. Have you ever tried to cut down or control your drinking, but failed?')" />
            <label class="block mt-2">
                <input type="radio" name="question_8" value="yes" class="mr-1" style="outline: none;">
                Yes
            </label>
            <label class="block mt-2">
                <input type="radio" name="question_8" value="no" class="mr-1" style="outline: none;">
                No
            </label>
            <x-input-error :messages="$errors->get('question_8')" class="mt-2" />
        </div>

        <div class="my-8">
            <x-input-label for="question_9" :value="__('9. Do you find yourself drinking in the morning or needing a drink to steady your nerves?')" />
            <label class="block mt-2">
                <input type="radio" name="question_9" value="yes" class="mr-1" style="outline: none;">
                Yes
            </label>
            <label class="block mt-2">
                <input type="radio" name="question_9" value="no" class="mr-1" style="outline: none;">
                No
            </label>
            <x-input-error :messages="$errors->get('question_9')" class="mt-2" />
        </div>

        <div class="my-8">
            <x-input-label for="question_10" :value="__('10. Has anyone expressed concern about your drinking behavior to you?')" />
            <label class="block mt-2">
                <input type="radio" name="question_10" value="yes" class="mr-1" style="outline: none;">
                Yes
            </label>
            <label class="block mt-2">
                <input type="radio" name="question_10" value="no" class="mr-1" style="outline: none;">
                No
            </label>
            <x-input-error :messages="$errors->get('question_10')" class="mt-2" />
        </div>

        <div class="mt-4">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Submit</button>
        </div>
    </form>



</section>
