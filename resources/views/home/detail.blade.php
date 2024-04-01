@extends('home.layout')
@section('content')
<section class="bg-white rounded-2xl m-4 pt-10 p-7 w-full">
  <div class="flex justify-between">

    <button class="text-custom-blue flex items-center gap-x-5">&lt; <span>Back</span></button>

    <div class="flex gap-x-3">

      <div class=" py-2 px-3 bg-white outline outline-1 rounded-full outline-custom-lgray">
      <i class="fa-solid fa-magnifying-glass"></i>
      </div>

      <div class="relative py-2 px-3 bg-white outline outline-1 rounded-full outline-custom-lgray">
        <i class="fa-regular fa-bell"></i>
        <div class="w-2 h-2 absolute bg-red-700 rounded-full top-0 right-0"></div>
      </div>

      <div class="w-10 h-10 rounded-full overflow-hidden">
        <img src="{{asset('images/michael-dam.jpg')}}" alt="">
      </div>
    </div>
  </div>

  <div class="my-10 flex gap-x-10 justify-between">

    <div class="flex flex-col items-center shadow-lg p-5 px-20">

      <div class="rounded-full overflow-hidden w-52 h-52 bg-cover bg-center bg-no-repeat" style="background-image: url('{{asset('images/daniel-mingook-kim.jpg')}}');">
      </div>

      <div class="bg-green-600 inline-block text-white text-sm px-2 mt-7 rounded-full my-5">
        <i class="fa-solid fa-star" style="color: #ffffff;font-size:12px"></i>
        <span style="font-size: 12px;">5.0</span>
      </div>

      <div class="flex justify-center gap-x-4 my-5">
        <button class=" bg-custom-vlgray p-5 rounded-xl"><i class="fa-solid fa-video"></i></button>
        <button class=" bg-custom-vlgray p-5 rounded-xl"><i class="fa-brands fa-rocketchat"></i></button>
        <button class=" bg-custom-vlgray p-5 rounded-xl"><i class="fa-solid fa-phone"></i></button>
      </div>


      <div class="flex flex-col items-center gap-y-4">
        <strong class="text-xl font-bold pt-8">Free</strong>
        <span class="text-sm  text-custom-lgray">Online/Offline</span>
        <button class="bg-custom-blue text-white text-sm rounded-full px-3 py-3">
          Book Consultation
        </button>
      </div>

    </div>

    <div class="p-5" >
      <h1 class="text-2xl font-bold">Dr. Nick Willford</h1>
      <p class="text-custom-lgray">Licensed Professional Counselor</p>
      <div>
        <span class="flex items-center gap-x-4 my-3 text-custom-gray mb-3"><i class="fa-solid fa-location-dot"></i> <span>Asela, Oromia</span></span>

        <h2 class="font-bold pt-3">Specialities</h2>

        <div class="my-6 flex gap-x-3 flex-wrap gap-y-3">
          <button class=" text-sm  bg-custom-graish py-1 px-4 rounded-full">Abuse</button>
          <button class=" text-sm bg- bg-custom-graish py-1 px-4 rounded-full">Depression</button>
          <button class=" text-sm bg- bg-custom-graish py-1 px-4 rounded-full">PTSD</button>
        </div>

        <h2 class="font-bold">Issuses</h2>
        <div class="my-6 flex gap-x-3 flex-wrap gap-y-3">
          <button class=" text-sm  bg-custom-graish py-1 px-4 rounded-full">Abuse</button>
          <button class=" text-sm bg- bg-custom-graish py-1 px-4 rounded-full">Depression</button>
          <button class=" text-sm bg- bg-custom-graish py-1 px-4 rounded-full">PTSD</button>
        </div>

        <h2 class="font-bold pt-3">Qualifications</h2>
        <strong><span class="font font-normal">License: </span><span class=" text-custom-lgray">Colorado</span></strong>

        <h2 class="pt-5 pb-2 font-bold">Experience</h2>
        <div class="text-custom-lgray"><span>10</span>years/ <span>1000</span>+ consultations</div>

        <h2 class="py-5 font-bold">About</h2>
        <p class="te text-custom-lgray text-sm pl-2">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum beatae asperiores fuga nihil hic alias, facere soluta perferendis provident ea. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Libero quibusdam tenetur consequuntur magni iusto incidunt blanditiis aperiam sit exercitationem impedit.
        </p>
        <button class="text-custom-blue py-3"><span>Learn more</span> <i class="fa-solid fa-angle-down"></i></button>

          

      </div>
    </div>
  </div>

  <div>

    <div class="flex items-center justify-between my-5 mb-10">
      <h2 class="flex items-center gap-x-4 ml-5"><span class="font-bold text-3xl my-4 mb-6">Publications</span><span class="px-2 py-1 bg-custom-vlgray rounded-full">12</span></h2>
      <button class="bg-custom-vlgray px-6 py-2 rounded-full flex justify-between items-center gap-x-4"><span>See all</span> &gt;</button>
    </div>


    <div class="grid grid-cols-3 gap-x-8">

    @php 
     for($x = 0; $x < 3; $x++ ){
      echo '
      <div class="bg-white p-6 rounded-xl shadow-xl">
        <div class="rounded-lg overflow-hidden w-80 h-44 bg-cover bg-center bg-no-repeat relative" style="background-image: url('.asset('images/daniel-mingook-kim.jpg').');">
          <span class="text-sm bg-white p-2 rounded-lg absolute bottom-0 left-0 m-1">Daily life</span>
        </div>

        <div class="text-custom-lgray my-4" style="font-size: 13px;">
          <i class="fa-regular fa-clock mx-2"></i>
          <span class="mr-1">5</span><span>mins-read</span>
        </div>

        <h3 class="font-bold my-3 ">
          The Positive Role of Consistency in Daily Life
        </h3>

        <p class="text-custom-lgray">
        Consistency in your daily life can be difficult to achieve. There are so many demands on Lorem ipsum, 
        </p>

        <div class="flex items-center gap-x-4 p-4 ">
          <div class="w-10 h-10 rounded-full overflow-hidden">
            <img src="'.asset('images/michael-dam.jpg').'" alt="">
          </div>
          <div class="flex flex-col">
            <strong>Dr. Nick Wilford</strong>
            <span class="text-custom-lgray text-sm">June 22, 21</span>
          </div>
        </div>
      </div>
      ';
     }
    @endphp

    </div>

    <div class="flex items-center justify-between my-10 mb-10">
      <h2 class="flex items-center gap-x-4 ml-5"><span class="font-bold text-3xl my-4 mb-6">Reviews</span><span class="px-2 py-1 bg-custom-vlgray rounded-full">12</span></h2>
      <button class="bg-custom-vlgray px-6 py-2 rounded-full flex justify-between items-center gap-x-4"><span>See all</span> &gt;</button>
    </div>

    <div class="grid grid-cols-2 gap-x-5">

    @php 
     for($x = 0; $x < 3; $x++ ){
      echo '
      <div class="shadow-xl rounded-xl p-5">
        <div class="flex justify-between items-center w-full">

          <div class="flex items-center gap-x-4 p-4 ">
            <div class="w-12 h-12 rounded-full overflow-hidden">
              <img src="'.asset('images/michael-dam.jpg').'" alt="">
            </div>
            <div class="flex flex-col">
              <strong>Biruk Lemma</strong>
              <span class="text-custom-lgray text-sm">student</span>
            </div>
          </div>

          <div class="bg-green-600 text-white text-sm px-2 mt-4 rounded-full">
            <i class="fa-solid fa-star" style="color: #ffffff;font-size:12px"></i>
            <span style="font-size: 12px;">5.0</span>
          </div>

        </div>

        <div>
          <p class="text-custom-lgray px-5">Dr. Nick wilfors is a great psycologist! I highly recommend his consultations! I became calm and confident aftger just one session! Thanks a lot!</p>
        </div>
      </div>
      ';
     }
    @endphp


    </div>
  </div>
  <script src="{{asset('script/navBar.js')}}"></script>
</section>
@endsection