<x-custom.layout>
  <x-custom.section>

    <header>
      <h2 class="text-lg font-medium text-gray-900 ">
          {{ __('Create an experience') }}
      </h2>

      <p class="mt-1 text-sm text-gray-600 py-3">
          {{ __('Fill out the information below.') }}
      </p>
    </header>

    <form method="POST" action="/experiences" class="mt-6 space-y-6" enctype="multipart/form-data">
      @csrf

      <div>
        <x-input-label for="title" :value="__('Experience Title')" />
        <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" autocomplete="title" placeholder="Pyschologist..."/>
        <x-input-error :messages="$errors->get('title')" class="mt-2" />
      </div>

      <div>
        <x-input-label for="description" :value="__('Experience Description')" />
        <textarea id="description" name="description" type="text" class="mt-1 block w-full" autocomplete="description"></textarea>
        <x-input-error :messages="$errors->get('description')" class="mt-2" />
      </div>

      <div>
        <x-input-label for="company" :value="__('Experience Company')" />
        <x-text-input id="company" name="company" type="text" class="mt-1 block w-full" autocomplete="company" />
        <x-input-error :messages="$errors->get('company')" class="mt-2" />
      </div>

      <div>
        <x-input-label for="start_date" :value="__('Start Date')" />
        <input id="start_date" name="start_date" type="date" class="mt-1 block w-full"  />
        <x-input-error :messages="$errors->get('start_date')" class="mt-2" />
      </div> 

      <div>
        <x-input-label for="end_date" :value="__('End Date')" />
        <input id="end_date" name="end_date" type="date" class="mt-1 block w-full"  />
        <x-input-error :messages="$errors->get('end_date')" class="mt-2" />
      </div> 

      <div class="flex items-center gap-4 py-4">
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Submit</button>
      </div>
    </form>
  </x-custom.section>
</x-custom.layout>