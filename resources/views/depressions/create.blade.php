@extends('home.layout')
@section('content')
<section class="bg-white rounded-2xl m-4 pt-10 p-7 w-full">
  @php
    $user = Auth::user();
    $text_color = 'text-custom-blue';
  @endphp
  <div class="flex justify-between items-center px-8">
    <p>
      <a href="{{route('students.create')}}" class="hover:text-custom-blue underline {{ Request::is('dashboard*') ? $text_color : '' }}">Profile</a>
      <span class="px-3">&gt;</span>
      <a href="{{route('depressions.create')}}" class="hover:text-custom-blue underline {{ Request::is('depressions*') ? $text_color : '' }}">Depression</a>
    </p>

    <a class="bg-custom-blue text-white hover:bg-transparent hover:text-black hover:outline hover:outline-1 transition-all duration-300 ease-in-out px-6 py-2 rounded-full flex justify-start  items-center gap-x-4 w-40" href="/students/create">&lt;<span>Go Back</span></a>
  </div>

  <div class="p-4 sm:p-8 bg-white  shadow sm:rounded-lg">
    @if(!$user->depressionTracker)
    <div class="max-w-xl">
      @include('depressions.partials.add-depression')
    </div>
    @else
    <div class="max-w-xl">
      @include('depressions.partials.update-depression')
    </div>
    @endif
  </div>



</section>
@endsection