@extends('home.layout')

@section('content')
<section class="bg-white rounded-2xl m-4 pt-10 p-7 w-full">
  <h2 class="font-bold text-3xl my-4 mb-6">Create Article</h2>

  <form action="{{ route('posts.store') }}" method="POST">

    @csrf
    <div class="mb-6">
      <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title</label>
      <input type="text" name="title" id="title" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('title') border-red-500 @enderror" placeholder="Enter title" required>
      @error('title')
      <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
      @enderror
    </div>

    <div class="mb-6">
      <label for="tag" class="block text-gray-700 text-sm font-bold mb-2">Tag</label>
      <input type="text" name="tag" id="tag" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('tag') border-red-500 @enderror" placeholder="Enter tag" required>
      @error('tag')
      <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
      @enderror
    </div>

    <div class="mb-6">
      <label for="read_minutes" class="block text-gray-700 text-sm font-bold mb-2">Read Minutes</label>
      <input type="text" name="read_minutes" id="read_minutes" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('read_minutes') border-red-500 @enderror" placeholder="Enter read minutes" required>
      @error('read_minutes')
      <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
      @enderror
    </div>

    <div class="mb-6">
      <label for="content" class="block text-gray-700 text-sm font-bold mb-2">Content</label>
      <textarea name="content" id="content" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('content') border-red-500 @enderror" placeholder="Enter content" rows="6" required></textarea>
      @error('content')
      <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
      @enderror
    </div>

    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Submit</button>
  </form>
</section>
@endsection
