<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 ">
            {{ __('Depression Assessment Questions') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 py-3">
            {{ __('Please note that the responses to these questions are confidential and will only be shared with health professionals with the student\'s consent.') }}
        </p>
    </header>

    <form method="POST" action="{{route('depressions.store')}}" class="">
    @csrf
    @method('POST')

      <div class="my-8">
          <x-input-label for="question_1" :value="__('1. In the past two weeks, have you experienced a persistent feeling of sadness or emptiness?')" />
          <label class="block mt-2">
              <input type="radio" name="question_1" value="yes" class="mr-1">
              Yes
          </label>
          <label class="block mt-2">
              <input type="radio" name="question_1" value="no" class="mr-1">
              No
          </label>
          <x-input-error :messages="$errors->get('question_1')" class="mt-2" />
      </div>

      <div class="my-8">
          <x-input-label for="question_2" :value="__('2. Have you noticed a significant decrease in interest or pleasure in activities that you used to enjoy?')" />
          <label class="block mt-2">
              <input type="radio" name="question_2" value="yes" class="mr-1">
              Yes
          </label>
          <label class="block mt-2">
              <input type="radio" name="question_2" value="no" class="mr-1">
              No
          </label>
          <x-input-error :messages="$errors->get('question_2')" class="mt-2" />
      </div>

      <div class="my-8">
          <x-input-label for="question_3" :value="__('3. How often have you experienced difficulties with concentration or making decisions in the past month?')" />
          <select id="question_3" name="question_3" class="mt-1 block w-full">
              <option value="rarely">Rarely</option>
              <option value="sometimes">Sometimes</option>
              <option value="often">Often</option>
              <option value="always">Always</option>
          </select>
          <x-input-error :messages="$errors->get('question_3')" class="mt-2" />
      </div>

      <div class="my-8">
          <x-input-label for="question_4" :value="__('4. Do you often feel tired or lack energy, even after a full night\'s sleep?')" />
          <label class="block mt-2">
              <input type="radio" name="question_4" value="yes" class="mr-1">
              Yes
          </label>
          <label class="block mt-2">
              <input type="radio" name="question_4" value="no" class="mr-1">
              No
          </label>
          <x-input-error :messages="$errors->get('question_4')" class="mt-2" />
      </div>

      <div class="my-8">
          <x-input-label for="question_5" :value="__('5. Have you experienced changes in your appetite or weight in the past month?')" />
          <select id="question_5" name="question_5" class="mt-1 block w-full">
              <option value="increased_appetite_weight_gain">Increased appetite/weight gain</option>
              <option value="decreased_appetite_weight_loss">Decreased appetite/weight loss</option>
              <option value="no_change">No change</option>
          </select>
          <x-input-error :messages="$errors->get('question_5')" class="mt-2" />
      </div>

      <div class="my-8">
          <x-input-label for="question_6" :value="__('6. Over the past month, how frequently have you had thoughts of worthlessness or guilt?')" />
          <select id="question_6" name="question_6" class="mt-1 block w-full">
              <option value="rarely">Rarely</option>
              <option value="sometimes">Sometimes</option>
              <option value="often">Often</option>
              <option value="always">Always</option>
          </select>
          <x-input-error :messages="$errors->get('question_6')" class="mt-2" />
      </div>

      <div class="my-8">
          <x-input-label for="question_7" :value="__('7. Have you noticed changes in your sleep pattern, such as difficulty falling asleep, staying asleep, or sleeping too much?')" />
          <label class="block mt-2">
              <input type="radio" name="question_7" value="yes" class="mr-1">
              Yes
          </label>
          <label class="block mt-2">
              <input type="radio" name="question_7" value="no" class="mr-1">
              No
          </label>
          <x-input-error :messages="$errors->get('question_7')" class="mt-2" />
      </div>

      <div class="my-8">
          <x-input-label for="question_8" :value="__('8. Have you experienced physical symptoms such as headaches, stomach aches, or other aches and pains without a clear physical cause in the past month?')" />
          <label class="block mt-2">
              <input type="radio" name="question_8" value="yes" class="mr-1">
              Yes
          </label>
          <label class="block mt-2">
              <input type="radio" name="question_8" value="no" class="mr-1">
              No
          </label>
          <x-input-error :messages="$errors->get('question_8')" class="mt-2" />
      </div>

      <div class="my-8">
          <x-input-label for="question_9" :value="__('9. How often do you feel irritable, restless, or easily annoyed?')" />
          <select id="question_9" name="question_9" class="mt-1 block w-full">
              <option value="rarely">Rarely</option>
              <option value="sometimes">Sometimes</option>
              <option value="often">Often</option>
              <option value="always">Always</option>
          </select>
          <x-input-error :messages="$errors->get('question_9')" class="mt-2" />
      </div>

      <div class="my-8">
          <x-input-label for="question_10" :value="__('10. In the past month, have you had thoughts of harming yourself or ending your life?')" />
          <label class="block mt-2">
              <input type="radio" name="question_10" value="yes" class="mr-1">
              Yes
          </label>
          <label class="block mt-2">
              <input type="radio" name="question_10" value="no" class="mr-1">
              No
          </label>
          <x-input-error :messages="$errors->get('question_10')" class="mt-2" />
      </div>

      <div class="mt-4">
          <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Submit</button>
      </div>
    </form>

</section>
