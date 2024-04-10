<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 ">
            {{ __('Drug Usage Assessment Questions') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 py-3">
            {{ __('Please note that the responses to these questions are confidential and will only be shared with health professionals with the student\'s consent.') }}
        </p>
    </header>

    <form method="POST" action="{{route('drugs.store')}}">
        @csrf
        @method('POST')
      <div class="my-8">
          <x-input-label for="question_1" :value="__('1. Do you feel that chewing chat or smoking cigarettes has contributed to persistent feelings of sadness or emptiness?')" />
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
          <x-input-label for="question_2" :value="__('2. Have you noticed a significant increase in feelings of worthlessness or hopelessness since you started chewing chat or smoking cigarettes?')" />
          <label class="block mt-2">
              <input type="radio" name="question_2" value="yes" class="mr-1" style="outline: none;">
              Yes
          </label>
          <label class="block mt-2">
              <input type="radio" name="question_2" value="no" class="mr-1" style="outline: none;">
              No
          </label>
          <x-input-error :messages="$errors->get('question_2')" class="mt-2" />
      </div>

      <div class="my-8">
          <x-input-label for="question_3" :value="__('3. Do you find it harder to concentrate or make decisions after chewing chat or smoking cigarettes?')" />
          <label class="block mt-2">
              <input type="radio" name="question_3" value="yes" class="mr-1" style="outline: none;">
              Yes
          </label>
          <label class="block mt-2">
              <input type="radio" name="question_3" value="no" class="mr-1" style="outline: none;">
              No
          </label>
          <x-input-error :messages="$errors->get('question_3')" class="mt-2" />
      </div>

      <div class="my-8">
          <x-input-label for="question_4" :value="__('4. Have you experienced a decrease in interest or pleasure in activities that you used to enjoy after chewing chat or smoking cigarettes?')" />
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
          <x-input-label for="question_5" :value="__('5. Do you often feel tired, lacking energy, or lethargic after chewing chat or smoking cigarettes?')" />
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
          <x-input-label for="question_6" :value="__('6. Have you noticed changes in your appetite or weight since you started chewing chat or smoking cigarettes?')" />
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
          <x-input-label for="question_7" :value="__('7. Do you experience disruptions in your sleep patterns, such as difficulty falling asleep or staying asleep, after chewing chat or smoking cigarettes?')" />
          <label class="block mt-2">
              <input type="radio" name="question_7" value="yes" class="mr-1" style="outline: none;">
              Yes
          </label>
          <label class="block mt-2">
              <input type="radio" name="question_7" value="no" class="mr-1" style="outline: none;">
              No
          </label>
          <x-input-error :messages="$errors->get('question_7')" class="mt-2" />
      </div>

      <div class="my-8">
          <x-input-label for="question_8" :value="__('8. Have you noticed an increase in irritability, restlessness, or easily triggered emotions since you started chewing chat or smoking cigarettes?')" />
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
          <x-input-label for="question_9" :value="__('9. Have you experienced physical symptoms such as headaches, stomach aches, or other aches and pains since you started chewing chat or smoking cigarettes?')" />
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
          <x-input-label for="question_10" :value="__('10. In the past month, have you had thoughts of harming yourself or ending your life that you attribute to chewing chat or smoking cigarettes?')" />
          <label class="block mt-2">
              <input type="radio" name="question_10" value="yes" class="mr-1" style="outline: none;">
              Yes
          </label>
          <label class="block mt-2">
              <input type="radio" name="question_10" value="no" class="mr-1" style="outline: none;">
              No
          </label>
          <x-input-error :messages="$errors->get('question_1o')" class="mt-2" />
      </div>
      <div class="mt-4">
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Submit</button>
      </div>
    </form>



</section>
