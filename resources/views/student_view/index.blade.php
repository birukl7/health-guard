@extends('home.layout')
@section('content')
<section class="bg-white rounded-2xl m-4 pt-0 mt-0 p-7 w-full ">
@php
    $user = Auth::user();
    $text_color = 'text-custom-blue';
  @endphp

<div class=" sticky top-0 z-10 pt-10 bg-white right-0 left-0 " >
      <div class="flex justify-between items-center">
        <h2 class="flex items-center gap-x-4 ml-5"><span class="font-bold text-4xl my-4 mb-6">Student</span></h2>

        <div class="flex gap-x-3">
          <div class="w-10 h-10 rounded-full overflow-hidden">
              <a href="{{route('profile.edit')}}">
                <img src="{{asset('storage/users-avatar/'.$student->avatar)}}" alt="">
                </a>
          </div>
        </div>
      </div>

      <div class="col-span-4 sm:col-span-4">

<div class="bg-white shadow rounded-lg p-6">

    <div class="flex flex-col items-center">
          <img src="{{asset('storage/users-avatar/'.$student->avatar)}}"
              class="w-32 h-32 bg-gray-300 rounded-full mb-4 shrink-0">

          </img>
          <h1 class="text-xl font-bold">{{$student->name}}</h1>
          <p class="text-gray-700">{{$student->studentProfile->date_of_birth}}</p>

          <span class="te text-custom-gray mb-3"><i class="fa-solid fa-location-dot"></i>
              <span>{{$student->studentProfile->address}}</span>
          </span>

          <div class="mt-6 flex flex-wrap gap-4 justify-center">
              <a href="#"
                  class="bg-gray-300 hover:bg-gray-400 text-gray-700 py-2 px-4 rounded"><span><i class="fa-solid fa-phone mr-2"></i></span>+251-{{$student->studentProfile->emergency_contact_number}}
              </a>
          </div>

          <span class="text-sm text-custom-lgray">Emergency contact name</span>
          <span class="te text-custom-gray mb-3">
              <span>{{$student->studentProfile->emergency_contact_name}}</span>
          </span>

          <span class="text-sm text-custom-lgray flex flex-col items-center py-2"><span>Emergency Contact Number</span><span>+251-{{$student->studentProfile->emergency_contact_number}} &nbsp;</span></span>



      </div>
      <hr class="my-6 border-t border-gray-300">
      
    
          <form action="{{route('accept.offer', ['book'=> $notification->id])}}" method="post">
              @csrf
              @method('PUT')
              <input type="text" class="hidden" name="approval" value="accepted">
              <input type="number" class="hidden" name="id" value="{{$notification->id}}">
              @if($notification->approval == 'pending')
                      <button class="bg-custom-blue text-white text-sm hover:outline hover:outline-1 hover:bg-transparent hover:text-black rounded-full px-3 py-3 text-center w-full transition-all duration-200 ease-in-out" type="submit">
                          Accept offer
                      </button>
              @else
          </form>
            <a href="/chatify/{{Auth::user()->id}}" class="bg-custom-blue text-white text-sm hover:outline hover:outline-1 hover:bg-transparent hover:text-black rounded-full px-3 py-3 text-center w-full transition-all duration-200 ease-in-out" type="submit">
                Start Chat
            </a>
          @endif
      
      <!-- @if($notification)
          @if($notification->approval == 'pending')
              <button class="bg-custom-blue text-white text-sm hover:outline hover:outline-1 hover:bg-transparent hover:text-black rounded-full px-3 py-3 text-center w-full transition-all duration-200 ease-in-out cursor-not-allowed">
                  Pending
              </button> 
          @elseif($notification->approval == 'accepted')
              <p>Congrats, Your invitation is approved.</p>
              <button class="bg-custom-blue text-white text-sm hover:outline hover:outline-1 hover:bg-transparent hover:text-black rounded-full px-3 py-3 text-center w-full transition-all duration-200 ease-in-out cursor-not-allowed">
                  Have a chat
              </button>       
          @endif
      @endif -->
  </div>
  </div>
    </div>
</section>
@endsection