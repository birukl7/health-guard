<x-custom.layout>

@php
   $createdAtCarbon = Carbon\Carbon::parse($blog->created_at); 
   $created = $createdAtCarbon->diffForHumans();
@endphp
<x-custom.section>

    <div class="p-6">
        <div class="rounded-lg overflow-hidden bg-cover bg-center bg-no-repeat mb-4"
            style="background-image: url('{{asset('storage/post-image/'.$blog->image)}}'); height: 300px;"></div>

        <div class="text-custom-lgray mb-4">
            <i class="fa-regular fa-clock mx-2"></i>
            <span class="mr-1">{{$blog->duration}}</span><span>mins-read</span>
        </div>

        <h3 class="font-bold text-xl mb-2">
            {{$blog->title}}
        </h3>


        <div class="flex items-center gap-x-4">
            <div class="w-10 h-10 rounded-full overflow-hidden">
                <img src="{{asset('storage/users-avatar/'.$blog->healthProfessionalProfile->user->avatar)}}" alt="">
            </div>
            <div class="flex flex-col">
                <strong>{{$blog->healthProfessionalProfile->first_name}}</strong>
                <span class="text-custom-lgray text-sm">{{$created}}</span>
            </div>
        </div>
    </div>

    <div class="flex justify-between items-center">
       
        <div class="flex gap-x-3">
            <!-- Add any additional elements here if needed -->
        </div>
    </div>

    <div class="p-6">
        <div class="bg-gray-100 rounded-lg p-8 mb-6">
            <!-- Replace 'long_content' with your actual variable name -->
            <p class="text-lg text-gray-800 leading-relaxed">
                {{ $blog->description }}
            </p>
        </div>
    </div>
    @can('edit-post', $blog)
    <x-custom.button href="/posts/{{$blog->id}}/edit"
        >Edit Post
    </x-custom.button>

    {{-- <a href="/post/{{$blog->id}}" class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">Delete</a> --}}

    <x-danger-button class="ms-3" type="submit" form="deleteForm" >
        {{__('Delete Post')}}
    </x-danger-button>

    <form action="/posts/{{$blog->id}}" method="post" id="deleteForm" class="hidden">
        @csrf
        @method('DELETE') 
    </form>
@endcan
</x-custom.section>
</x-custom.layout>
