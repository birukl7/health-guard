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

    <form method="POST" action="/experiences/{{$experience->id}}" class="mt-6 space-y-6" enctype="multipart/form-data">
      @csrf
      @method('patch')
      <div>
        <x-input-label for="title" :value="__('Experience Title')" />
        <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" autocomplete="title" placeholder="Pyschologist..." :value="old('title', $experience->title)" />
        <x-input-error :messages="$errors->get('title')" class="mt-2" />
      </div>

      <div>
        <x-input-label for="description" :value="__('Experience Description')" />
        <textarea id="description" name="description" type="text" class="mt-1 block w-full" autocomplete="description">{{ old('description', $experience->description)}}</textarea>
        <x-input-error :messages="$errors->get('description')" class="mt-2" />
      </div>

      <div>
        <x-input-label for="company" :value="__('Experience Company')" />
        <x-text-input id="company" name="company" type="text" class="mt-1 block w-full" autocomplete="company" :value="old('company', $experience->company)" />
        <x-input-error :messages="$errors->get('company')" class="mt-2" />
      </div>

      <div>
        <x-input-label for="start_date" :value="__('Start Date')" />
        <input id="start_date" name="start_date" type="date" class="mt-1 block w-full" value="{{ old('start_date', $experience->start_date)}}" />
        <x-input-error :messages="$errors->get('start_date')" class="mt-2" />
      </div> 

      <div>
        <x-input-label for="end_date" :value="__('End Date')" />
        <input id="end_date" name="end_date" type="date" class="mt-1 block w-full" value="{{ old('end_date', $experience->end_date)}}" />
        <x-input-error :messages="$errors->get('end_date')" class="mt-2" />
      </div> 

      <div class="flex items-center gap-4 py-4">
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
        <button type="submit" class="bg-blue-900 text-white px-4 py-2 rounded-full mx-3" form="delete-form">Delete</button>
      </div>

    </form>
    <form method="POST" action="/experiences/{{$experience->id}}" id="delete-form">
      @csrf
      @method('DELETE')
    </form>
  </x-custom.section>
</x-custom.layout>