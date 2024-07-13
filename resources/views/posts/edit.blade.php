<x-custom.layout>

  @php
    $oldIssues = $blog->postTags->pluck('name')->toArray() ?? [];
  @endphp

  <x-custom.section class="bg-white rounded-2xl m-4 pt-10 p-7 w-full">
    <h2 class="font-bold text-3xl my-4 mb-6">Create Article</h2>
  
    <form action="/posts/{{$blog->id}}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PATCH')
  
      <div class="mb-4">
        <x-input-label for="title" :value="__('Blog Title')" />
        <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" autocomplete="title" placeholder="Daily Activities to Avoid Addiction..." :value="old('title', $blog->title)" />
        <x-input-error :messages="$errors->get('title')" class="mt-2" />
      </div>

      <div class="mb-4">
        <x-input-label for="description" :value="__('Blog Content')" />
        <textarea id="description" name="description" type="text" class="mt-1 block w-full" autocomplete="description">{{old('description', $blog->description)}}</textarea>
        <x-input-error :messages="$errors->get('description')" class="mt-2" />
      </div>

      <div class="mb-4">
        <x-input-label for="duration" :value="__('Blog Duration')" />
        <x-text-input id="duration" name="duration" type="text" class="mt-1 block w-full" autocomplete="duration" placeholder="5 minutes..." :value="old('duration', $blog->duration)" />
        <x-input-error :messages="$errors->get('duration')" class="mt-2" />
      </div>

      <div class="mb-4">
        <x-input-label for="image" :value="__('Blog Image')" />
        <input id="image" name="image" type="file" class="mt-1 block w-full" autocomplete="image" />
        <x-input-error :messages="$errors->get('image')" class="mt-2" />
      </div>

      <div>
        <x-input-label for="issues" :value="__('Select a tag that applies to your post')" />
        <input type="checkbox" id="issue_depression" name="issues[]" value="Depression" {{in_array('Depression', $oldIssues) ? 'checked' : ''}}>
        <label for="issue_depression">Depression</label><br>
        
        <input type="checkbox" id="issue_drug" name="issues[]" value="Anxiety Disorders" value="Drugs" {{in_array('Drugs', $oldIssues) ? 'checked' : ''}}>
        <label for="issue_anxiety">Drugs</label><br>
        
        <input type="checkbox" id="issue_alcoholism" name="issues[]" value="Alcoholism"  {{in_array('Alcoholism', $oldIssues) ? 'checked' : ''}}>
        <label for="issue_substance">Alcoholism</label><br>
        
        <input type="checkbox" id="issue_pyschology" name="issues[]" value="Psychology" {{in_array('Psychology', $oldIssues) ? 'checked': ''}}>
        <label for="issue_ptsd">Psychology</label><br>
        
        <input type="checkbox" id="issue_others" name="issues[]" value="Others" {{in_array('Others', $oldIssues) ? 'checked': ''}} > <label for="issue_others">Others</label><br>
        
      </div>
  
      <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mt-5">Submit</button>
    </form>
  </x-custom.section>
  </x-custom.layout>
  