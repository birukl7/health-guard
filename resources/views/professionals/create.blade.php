@extends('home.layout')
@section('content')
<section class="bg-white rounded-2xl m-4 pt-10 p-7 w-full">

  @php
    $user = Auth::user();
    $text_color = 'text-custom-blue';
  @endphp

    <div class="flex justify-between items-center  px-8">

      <h2 class="flex items-center ml-5"><span class="font-bold text-3xl">Profile</span></h2>
    </div>
    <div class="flex flex-col justify-between items px-5 pr-10 pt-16 shadow-xl pb-10">

    @if(!$user->healthProfessionalProfile)
      <div class="flex items-center px-5 pr-10 pt-16 shadow-xl pb-10 mx-8 justify-between">
        <i class="fa-regular fa-bell fa-shake text-3xl"></i>
        <p class=" font-bold px-5 ">Finish up your account by creating necessary health professional account informations.</p>

        <a href="/professionals/create#form-add" class="px-3 py-2 bg-custom-blue text-white font-bold rounded-md" >
        Finish Up
        </a>
      </div>
    @else
      <div class="flex justify-between items-center px-5 pr-10 pt-16 shadow-xl pb-10 mx-8">
        <div class="flex items-center ">
        <i class="fa-regular fa-folder text-3xl iconic-js"></i>
          <p class=" font-bold px-5 ">Update health professional account you have filed.</p>
        </div>

        <button class="px-3 py-2 bg-custom-blue text-white font-bold rounded-md js-show-update-3" >
        Edit 
        </button>
      </div>



      <div class="max-w-xl h-0 overflow-hidden transition-all duration-200 ease-in-out my-10 mx-10" id="form-add-3">
        @include('professionals.partials.update-health-profession')
      </div>

      <script>
        let isOpened = false;
          const Icon = document.querySelector('.iconic-js')
          const cont3 = document.querySelector('#form-add-3');
          const topCont3 = document.querySelector('.js-show-update-3');
          topCont3.addEventListener('click', ()=>{
              cont3.classList.toggle('h-0')
              cont3.classList.toggle('overflow-hidden')
              if(!isOpened){
                Icon.classList.remove('fa-folder')
                Icon.classList.add('fa-folder-open')
                isOpened = !isOpened
              }else {
                Icon.classList.remove('fa-folder-open')
                Icon.classList.add('fa-folder')
                isOpened = !isOpened
              }
          })
      </script>
    @endif
<!-- 
    <div class="flex justify-between items-center px-5 pr-10 pt-6 shadow-xl pb-10 mx-8">
        <div class="flex items-center">
          <i class="fa-regular fa-bell fa-shake text-3xl"></i>
          <p class=" font-bold px-5 ">Manage expericnces </p>
        </div>

        <button class="px-3 py-2 bg-black text-white font-bold rounded-md js-show-update-3" >
        Manage Expericences 
        </button>
      </div> -->



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

    @if(!$user->healthProfessionalProfile)
      <div class="flex justify-between items-center px-5 pr-10 pt-16 shadow-xl pb-10 w-full" id="form-add">
        <div class="max-w-xl" id="form-add">
            @include('professionals.partials.add-health-profession')
        </div>
      </div>
      @endif

    
</section>
@endsection