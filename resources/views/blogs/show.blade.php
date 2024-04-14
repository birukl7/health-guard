@extends('home.layout')

@section('content')
@php
   use Carbon\Carbon;
   $createdAtCarbon = Carbon::parse($blog->created_at); 
   $created = $createdAtCarbon->diffForHumans();
@endphp
<section class="bg-white rounded-2xl m-4 pt-10 p-7 w-full">

    <div class="p-6">
        <div class="rounded-lg overflow-hidden bg-cover bg-center bg-no-repeat mb-4"
            style="background-image: url('{{asset('images/daniel-mingook-kim.jpg')}}'); height: 300px;"></div>

        <div class="text-custom-lgray mb-4">
            <i class="fa-regular fa-clock mx-2"></i>
            <span class="mr-1">{{$blog->read_minutes}}</span><span>mins-read</span>
        </div>

        <h3 class="font-bold text-xl mb-2">
            {{$blog->title}}
        </h3>


        <div class="flex items-center gap-x-4">
            <div class="w-10 h-10 rounded-full overflow-hidden">
                <img src="{{asset('images/michael-dam.jpg')}}" alt="">
            </div>
            <div class="flex flex-col">
                <strong>{{$blog->user->name}}</strong>
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
                {{ $blog->content }}
            </p>
        </div>
    </div>
</section>
@endsection
