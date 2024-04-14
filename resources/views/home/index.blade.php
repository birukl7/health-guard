@extends('home.layout')
@section('content')

    <main class=" md:w-full bg-white rounded-2xl m-4 pt-10 p-7 w-full">
    <!-- The welcome part -->
      <div class="flex justify-between">

        @auth
        <h1 class="text-4xl font-bold">Welcome, <span class="capitalize">
          @php
          echo (explode(' ',Auth::user()->name)[0]);
          @endphp
        </span>!</h1>
        @else
        <h1 class="text-4xl font-bold">Hi, there!</h1>
        @endauth

        <div class="flex gap-x-3">
        
        @if(Route::has('login'))
          @auth
          <a href="{{route('notifications.index')}}">
            <div class="relative py-2 px-3 bg-white outline outline-1 rounded-full outline-custom-lgray">
              <i class="fa-regular fa-bell"></i>
              
              <div class="w-2 h-2 absolute bg-red-700 rounded-full top-0 right-0"></div>
            </div>
          </a>


          <div class="w-10 h-10 rounded-full overflow-hidden">
            <a href="{{route('profile.edit')}}">
            <img src="{{asset('storage/users-avatar/'.Auth::user()->avatar)}}" alt="">
            </a>
          </div>
          @else
            <a
                href="{{ route('login') }}"
                class="rounded-md px-3 py-2 bg-custom-blue text-white hover:outline hover:outline-1 hover:text-black hover:bg-transparent transition-all duration-150 ease-in-out"
            >
                Log in
            </a>

              @if (Route::has('register'))
                <a
                    href="{{ route('register') }}"
                    class="rounded-md px-3 py-2  bg-custom-blue text-white hover:outline hover:outline-1 hover:text-black hover:bg-transparent transition-all duration-150 ease-in-out"
                >
                    Sign Up
                </a>
              @endif
            @endauth
          @endif
        </div>
      </div>

      <div class="bg-custom-vvlgray bg-custom-graish p-6 mt-10 rounded-xl relative pb-20"> 
        <p>
          Find the best psychologist for yourself Our specialists will help uou to find the best decisions for solving your problems!.
        </p>
        <div class="absolute  bg-white p-5 rounded-xl flex flex-col md:flex-row gap-y-5 md:gap-0 shadow-lg  top-24 right-5 left-5" >

          <div class="flex flex-1 flex-col items-start gap-y-3 pl-3 md:pl-0 justify-between">
            <span class="text- text-custom-lgray text-sm">Type of counseling</span>
            <select name="counseling" class="outline-none border-none focus:outline-none p-0 w-full"  id="">
              <option value="all">All Type</option>
              <option value="clinical">Clinical</option>
              <option value="depression">Depression</option>
              <option value="alcholism">Alcholism</option>
              <option value="drug">Drug</option>
            </select>
          </div>

          <div class="flex flex-1 flex-col items-start gap-y-3 justify-between md:border-l-2  pl-3  border-custom-vlgray">
            <span class="text- text-custom-lgray text-sm">City</span>
            <input type="text" list="cityOptions" name="city" class="outline-none border-none focus:outline-none p-0 w-11/12 outline outline-1 outline-custom-lgray rounded-md px-3 py-1" id="cityInput">
            <datalist id="cityOptions">
                <option value="addis ababa">
                <option value="adama">
                <option value="arba minch">
                <option value="bahir dar">
                <option value="bale robe"> 
                <option value="debre markos">
                <option value="dessie">
                <option value="dire dawa"> 
                <option value="gondar">
                <option value="hawassa">
                <option value="harar">
                <option value="jijiga">
                <option value="jimma">
                <option value="mekelle">
                <option value="nazarat">
                <option value="sodo">
                <option value="wolaita sodo"> 
                <option value="dilla">
                <option value="woldia">
                <!-- Add more options for other cities as needed -->
            </datalist>
          </div>

          <div class="flex flex-1 flex-col items-start gap-y-3 justify-between md:border-l-2 pl-3  border-custom-vlgray">
            <span class="text- text-custom-lgray text-sm">Age</span>
            <select name="counseling" class="outline-none border-none focus:outline-none p-0 w-full"  id="">
              <option value="all">All</option>
              <option value="65+">65+</option>
              <option value="50+">50+</option>
              <option value="40+">40+</option>
              <option value="35+">35+</option>
              <option value="25+">25+</option>
              <option value="20+">20+</option>
            </select>
          </div>

          <div class="flex flex-1 flex-col items-start gap-y-3 justify-between md:border-l-2 pl-3  border-custom-vlgray">
            <span class="text- text-custom-lgray text-sm">Gender</span>
            <select name="counseling" class="outline-none border-none focus:outline-none p-0 w-full"  id="">
              <option value="All">All</option>
              <option value="male">Male</option>
              <option value="female">Female</option>
              <option value="other">Other</option>
            </select>
          </div>

          <div>
            <button class=" bg-custom-vlgray p-5 rounded-xl">
              <i class="fa-solid fa-magnifying-glass"></i>
            </button>
          </div>

        </div>
        <div>

        </div>
      </div>

      <section class=" mt-96 md:mt-28 pl-5">
        <div class="flex items-center justify-between my-5 mb-10">
          <h2 class="text-2xl font-bold ">Best for you</h2>
          <button class="bg-custom-vlgray px-6 py-2 rounded-full flex justify-between items-center gap-x-4"><span>See all</span> &gt;</button>
        </div>

        <!-- grid for pychologists card -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-x-5 gap-y-6" id="pychologist-card-contanier">

        @foreach ($doctors as $doctor) 
          @include('home.partials.doctor-card', ['doctor' => $doctor])
        @endforeach

        {{-- @php 
          for($x = 0; $x < 6; $x++ ){
            echo '
            <div class="shadow- shadow-xl  rounded-xl p-2 px-5">
                  <div class="flex items-start gap-x-6">

                    <div>
                      <div class="w-10 h-10 rounded-full overflow-hidden">
                        <img src="'.asset('images/michael-dam.jpg').'" alt="">
                      </div>
                      <div class="bg-green-600 text-white text-sm px-2 mt-4 rounded-full">
                        <i class="fa-solid fa-star" style="color: #ffffff;font-size:12px"></i>
                        <span style="font-size: 12px;">5.0</span>
                      </div>
                    </div>

                    <div class="flex flex-col">
                      <strong class="text-xl">Dr. Sam Wallfolk</strong>
                      <span class="text-custom-lgray my-1 mb-4">Clinical phychologist</span>
                      <span class="te text-custom-gray mb-3"><i class="fa-solid fa-location-dot"></i> <span>Asela, Oromia</span></span>
                      <span class="text-sm text-custom-lgray"><span>10</span>yrs of exp.</span>
                      <span class="text-sm text-custom-lgray">1000<span>+</span> Contributions
                      </span>
                    </div>


                  </div>

                  <div class="my-6 flex gap-x-3 flex-wrap gap-y-3">
                    <button class=" text-sm  bg-custom-graish py-1 px-4 rounded-full">Abuse</button>
                    <button class=" text-sm bg- bg-custom-graish py-1 px-4 rounded-full">Depression</button>
                    <button class=" text-sm bg- bg-custom-graish py-1 px-4 rounded-full">PTSD</button>
                  </div>

                  <div class="flex justify-between mb-5">
                    <div class="flex flex-col">
                      <span class="font-bold">Free</span>
                      <span class="text-sm  text-custom-lgray">Online/Offline</span>
                    </div>
                    <div class="bg-custom-blue text-white text-sm rounded-full px-3 py-3">
                      Book Consultation
                    </div>
                  </div>
                </div>
            ';
          }
          @endphp        --}}
        </div>
        
      </section>

      <section class="p-3 rounded-xl bg-custom-graish mt-10 flex justify-start flex-col md:flex-row h-auto items-center">
        <div class=" w-full  rounded-xl overflow-hidden">
          <img src="{{asset('images/zachary-nelson.jpg')}}" class="mx-auto md:my-auto w-full" alt="">
        </div>
        <div class="flex flex-col py-20 px-28">
          <p class="font-semibold">Learn university life psychology now and teach your friend always to be happy!</p>
          <button class="bg-black text-white w-40 p-3 text-sm rounded-full mt-5"><span>Learn More</span> &gt;</button>
        </div>
      </section>

      <section class="p-3 rounded-xl bg-custom-graish mt-10 ">
        <div class="flex flex-col items-center">
          <p class="font-bold text-xl  align-middle my-7">Stay calm! Our meditation lessons will help you to relax. Try them now!</p>
          <button class="bg-black text-white w-40 p-3 text-sm rounded-full mb-8"><span>View Meditations</span> &gt;</button>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-3 gap-y-4">

            <div class="flex flex-col">
              <div class="overflow-hidden rounded-xl  w-full h-60 ">
                <img src="{{asset('images/daniel-mingook-kim.jpg')}}" alt="">
              </div>
              <div class="p-3">
                <h3 class="font-bold my-3">Mindfulness meditation</h3>
                <p class="text-sm pl-1.5">Mindfulness meditation originates from Buddhist teachings and is the most popylar meditation technique in the West. </p>
              </div>
            </div>

            <div class="flex flex-col">
              <div class="overflow-hidden rounded-xl  w-full h-60 ">
                <img src="{{asset('images/colton-sturgeon.jpg')}}" alt="">
              </div>
              <div class="p-3">
                <h3 class="font-bold my-3">Spritual meditation</h3>
                <p class="text-sm pl-1.5">Mindfulness meditation originates from Buddhist teachings and is the most popylar meditation technique in the West. </p>
              </div>
            </div>
        </div>
      </section>
      <script src="{{asset('script/homeCards.js')}}"></script>
    </main>
@endsection