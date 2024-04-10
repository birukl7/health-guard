@extends('home.layout')
@section('content')
<section class="bg-white rounded-2xl m-4 pt-10 p-7 w-full">
  @php
      $user = Auth::user();
      $text_color = 'text-custom-blue';
  @endphp

    <div class="flex justify-between items-center  px-8">
      <!-- <p><a href="/dashboard" class="hover:text-custom-blue underline {{ Request::is('dashboard*') ? $text_color : '' }}">Dashboard</a>
      <span class="px-3">&gt;</span>
      <a href="/students/create" class="hover:text-custom-blue underline {{ Request::is('students*') ? $text_color : '' }}">Student</a></p>
      <a class="bg-custom-blue text-white hover:bg-transparent hover:text-black hover:outline hover:outline-1 transition-all duration-300 ease-in-out px-6 py-2 rounded-full flex justify-start  items-center gap-x-4 w-40" href="/dashboard">&lt;<span>Go Back</span></a> -->
      <h2 class="flex items-center ml-5"><span class="font-bold text-3xl">Profile</span></h2>
    </div>
    <div class="flex justify-between items-center px-5 pr-10 pt-16 shadow-xl pb-10">

    @if(!$user->healthProfessionalProfile)
      <div class="flex items-center">
        <i class="fa-regular fa-bell fa-shake text-3xl"></i>
        <p class=" font-bold px-5 ">Finish up your account by creating necessary health professional account informations.</p>
        </div>

        <a href="/students/create#form-add" class="px-3 py-2 bg-custom-blue text-white font-bold rounded-md" >
        Finish Up
        </a>
      </div>
    @endif

    <section class="p-3 rounded-xl bg-custom-graish mt-10 flex justify-start items-center">
      <div class="w-full  rounded-xl h-full overflow-hidden">
          <img src="{{asset('images/julia-taubitz.jpg')}}" alt="">
      </div>
      <div class="flex flex-col py-20 px-28">
          <p class="font-semibold">
            Empowering university and college students to overcome mental health obstacles, fostering resilience, and enabling academic success through personalized counseling and support.
          </p>

          <div class="my-3">
            <x-input-label  :value="__(' what things can a health professional do inorder to help students?')"/>
          </div>
          <ul class="flex flex-col w-1/2 list-disc ml-10"> 
            <li>
                <div class=" bg-transparent text-black w-40 text-sm rounded-md mt-5"><span> Depression assesment</span></d>

            </li>
            <li>
                <div class=" bg-transparent text-black w-40 text-sm rounded-md mt-5"><span>Students with addiction</span></d>
            </li>
            <li>
                <div class=" bg-transparent text-black w-40 text-sm rounded-md mt-5"><span>Writes blogs</span></d>
            </li>
            <li>
                <div class=" bg-transparent text-black w-40 text-sm rounded-md mt-5"><span>Give meditation courses</span></d>
            </li>
            <li>
                <div class=" bg-transparent text-black w-52 text-sm rounded-md mt-5"><span>Free(Voulenterism) or paid service</span></d>
            </li>
            <li>
                <div class=" bg-transparent text-black w-52 text-sm rounded-md mt-5"><span>Having chat with students and another health professionals</span></d>
            </li>
          </ul>
      </div>
  </section>
</section>
@endsection