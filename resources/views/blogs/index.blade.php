@php
use Carbon\Carbon;
@endphp

@extends('home.layout')
@section('content')
<section class="bg-white rounded-2xl m-4 pt-10 p-7 w-full">
  <div class="flex justify-between items-center">
    <h2 class="flex items-center gap-x-4 ml-5"><span class="font-bold text-3xl my-4 mb-6">Blog</span></h2>

    <div class="flex gap-x-3">
      <!-- "Create Post" button -->
      <a href="{{ route('posts.create') }}" class="rounded-md px-3 py-2 bg-custom-blue text-white hover:outline hover:outline-1 hover:text-black hover:bg-transparent transition-all duration-150 ease-in-out">Create Post</a>

      <!-- User authentication and profile links -->
      @if(Route::has('login'))
      @auth
      <div class="relative py-2 px-3 bg-white outline outline-1 rounded-full outline-custom-lgray">
        <i class="fa-regular fa-bell"></i>
        <div class="w-2 h-2 absolute bg-red-700 rounded-full top-0 right-0"></div>
      </div>

      <div class="w-10 h-10 rounded-full overflow-hidden">
        <a href="{{route('profile.edit')}}">
          <img src="{{asset('storage/users-avatar/'.Auth::user()->avatar)}}" alt="">
        </a>
      </div>
      @else
      <a href="{{ route('login') }}" class="rounded-md px-3 py-2 bg-custom-blue text-white hover:outline hover:outline-1 hover:text-black hover:bg-transparent transition-all duration-150 ease-in-out">Log in</a>

      @if (Route::has('register'))
      <a href="{{ route('register') }}" class="rounded-md px-3 py-2  bg-custom-blue text-white hover:outline hover:outline-1 hover:text-black hover:bg-transparent transition-all duration-150 ease-in-out">Register</a>
      @endif
      @endauth
      @endif
    </div>
  </div>

  <p class="px-6 w-3/4">Here is the information about your activity and mental condition. How to relieve stress? How to be patient? You will find everything here!</p>

  <div class="flex items-center justify-between my-5 mb-10">
    <h2 class="flex items-center gap-x-4 ml-5"><span class="font-bold text-2xl my-4 mb-6">Top categories</span><span class="px-2 py-1 bg-custom-vlgray rounded-full">3</span></h2>
    <button class="bg-custom-vlgray px-6 py-2 rounded-full flex justify-between items-center gap-x-4"><span>See all</span> &gt;</button>
  </div>

   @php
  $deps = $blogs->where('tag', 'LIKE', 'depression')->merge($blogs->where('tag', 'LIKE', 'Depression'));
  $alcs = $blogs->where('tag', 'LIKE', 'alcoholism')->merge($blogs->where('tag', 'LIKE', 'Alcoholism'));
  $drugs = $blogs->where('tag', 'LIKE', 'drugs')->merge($blogs->where('tag', 'LIKE', 'Drugs'));
  $dlifes = $blogs->where('tag', 'LIKE', 'daily life')->merge($blogs->where('tag', 'LIKE', 'Daily Life'));
  @endphp

  <!-- Category cards -->
  <div class="grid grid-cols-3 gap-x-8">
    <div class="flex items-center gap-x-5 p-4 shadow-xl rounded-xl py-6">
      <div class="w-16 h-16 rounded-full overflow-hidden border border-white  shadow-xl ">
        <img src="{{asset('images/Depression.jpg')}}" alt="">
      </div>
      <div class="flex flex-col">
        <strong class="font-bold text-xl">Depression</strong>
        <div class="text-custom-lgray text-sm pt-1">
          <i class="fa-regular fa-newspaper"></i>&nbsp;
          <span>{{count($deps)}}</span>
          <span>articles</span>
        </div>
      </div>
    </div>

    <div class="flex items-center gap-x-5 p-4 shadow-xl rounded-xl py-6">
      <div class="w-16 h-16 rounded-full overflow-hidden border border-white  shadow-xl ">
        <img src="{{asset('images/Credit assesment-amico.png')}}" alt="">
      </div>
       <div class="flex flex-col">
        <strong class="font-bold text-xl">Drugs</strong>
        <div class="text-custom-lgray text-sm pt-1">
          <i class="fa-regular fa-newspaper"></i>&nbsp;
          <span>{{count($drugs)}}</span>
          <span>articles</span>
        </div>
      </div>
    </div>

    <div class="flex items-center gap-x-5 p-4 shadow-xl rounded-xl py-6">
      <div class="w-16 h-16 rounded-full overflow-hidden border border-white  shadow-xl ">
        <img src="{{asset('images/Helping a partner.gif')}}" alt="">
      </div>
      <div class="flex flex-col">
        <strong class="font-bold text-xl">Alcoholism</strong>
        <div class="text-custom-lgray text-sm pt-1">
          <i class="fa-regular fa-newspaper"></i>&nbsp;
          <span>{{count($alcs)}}</span>
          <span>articles</span>
        </div>
      </div>
    </div>
  </div>

  <div class="flex items-center justify-between my-5 mb-10 mt-28">
    <h2 class="flex items-center gap-x-4 ml-5"><span class="font-bold text-2xl my-4 mb-6">Articles</span><span class="px-2 py-1 bg-custom-vlgray rounded-full">{{count($blogs)}}</span></h2>
    <button class="bg-custom-vlgray px-6 py-2 rounded-full flex justify-between items-center gap-x-4"><span>See all</span> &gt;</button>
  </div>

  <!-- Article cards -->
  <div class="grid grid-cols-3 gap-x-5 gap-y-8">
    @foreach ($blogs as $blog)
    @php
    $createdAtCarbon = Carbon::parse($blog->created_at);
    $created = $createdAtCarbon->diffForHumans();
    @endphp
    <div class="bg-white p-6 rounded-xl shadow-xl my-5">
      <div class="rounded-lg overflow-hidden w-80 h-44 bg-cover bg-center bg-no-repeat relative"
        style="background-image: url('{{asset('images/daniel-mingook-kim.jpg')}}');">
        <span class="text-sm bg-white p-2 rounded-lg absolute bottom-0 left-0 m-1">{{$blog->tag}}</span>
      </div>

      <div class="text-custom-lgray my-4" style="font-size: 13px;">
        <i class="fa-regular fa-clock mx-2"></i>
        <span class="mr-1">{{$blog->read_minutes}}</span><span>mins-read</span>
      </div>

      <a href="/posts/show/{{$blog->id}}">
        <h3 class="font-bold my-3 ">
          {{$blog->title}}
        </h3>
      </a>

      <p class="text-custom-lgray">
        Consistency in your daily life can be difficult to achieve. There are so many demands on Lorem ipsum,
      </p>

      <div class="flex items-center gap-x-4 p-4 ">
        <div class="w-10 h-10 rounded-full overflow-hidden">
          <img src="{{asset('storage/users-avatar/'.$blog->user->avatar)}}" alt="">
        </div>
        <div class="flex flex-col">
          <strong>{{$blog->user->name}}</strong>
          <span class="text-custom-lgray text-sm">{{$created}}</span>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</section>
@endsection
