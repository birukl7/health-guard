<x-custom.layout>

  <x-custom.section class="bg-white rounded-2xl m-4 pt-10 p-7 w-full">
    <h2 class="font-bold text-3xl my-4 mb-6">Create Article</h2>
  
    <form action="{{ route('posts.update') }}" method="POST">
      @csrf
      @method('PATCH')
  
      <div class="mb-4">
        <x-input-label for="title" :value="__('Blog Title')" />
        <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" autocomplete="title" placeholder="Daily Activities to Avoid Addiction..." :value="old('title', $post->title)" />
        <x-input-error :messages="$errors->get('title')" class="mt-2" />
      </div>
  
      <div class="mb-4">
        <x-input-label for="description" :value="__('Blog Content')" />
        <textarea id="description" name="description" type="text" class="mt-1 block w-full" autocomplete="description">{{old('description', $post->description)}}</textarea>
        <x-input-error :messages="$errors->get('description')" class="mt-2" />
      </div>
  
      <div class="mb-4">
        <x-input-label for="duration" :value="__('Blog Title')" />
        <x-text-input id="duration" name="duration" type="text" class="mt-1 block w-full" autocomplete="duration" placeholder="5 minutes...":value="old('duration', $post->duration)" />
        <x-input-error :messages="$errors->get('duration')" class="mt-2" />
      </div>
  
      <div class="mb-4">
        <x-input-label for="image" :value="__('Blog Image')" />
        <x-text-input id="image" name="image" type="file" class="mt-1 block w-full" autocomplete="image" :value="old('image', $post->image)" />
        <x-input-error :messages="$errors->get('image')" class="mt-2" />
      </div>
  
      <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mt-5">Submit</button>
    </form>
  </x-custom.section>
  </x-custom.layout>
  