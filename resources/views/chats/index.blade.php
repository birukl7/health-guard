@extends('home.layout')
@section('content')
<section class=" rounded-2xl m-4 pt-10 p-7 pr-4 mr-0 w-full">

  <div class="grid gap-x-5" style="grid-template-columns: 65% 33%;">

    <div  class="bg-white shadow-2xl rounded-xl p-5 " style="height:auto;">

      <!-- Chats part -->
      <div class="flex justify-between items-center">

        <h2 class="flex items-center gap-x-4 ml-5"><span class="font-bold text-3xl my-4 mb-6">Chats</span></h2>

        <div class="flex gap-x-3">

          <!-- <div class=" py-2 px-3 bg-white outline outline-1 rounded-full outline-custom-lgray">
          <i class="fa-solid fa-magnifying-glass"></i>
          </div> -->

          <div class="relative py-2 px-4 bg-white outline outline-1 rounded-full outline-custom-lgray">
            <i class="fa-regular fa-bell"></i>
            <div class="w-2 h-2 absolute bg-red-700 rounded-full top-0 right-0"></div>
          </div>

          <div class="w-10 h-10 rounded-full overflow-hidden">
            <img src="{{asset('images/michael-dam.jpg')}}" alt="">
          </div>
        </div>
      </div>

      <!-- the person display -->
      <div class="flex items-center justify-between">
        <div class="flex items-center justify-center gap-x-4 p-4  px-0 bg-white rounded-xl w-auto  grow-0">
          <div class="relative">
            <div class="w-10 h-10 rounded-full overflow-hidden ">
              <img src="{{asset('images/michael-dam.jpg')}}" alt="">
            </div>

            <div class="bg-green-600 w-2 h-2 rounded-full absolute bottom-1 right-0 border"></div>
          </div>

          <div class="flex flex-col">
            <strong>Dr. Nick Wilford</strong>
            <span class="text-custom-lgray text-sm">last seen recently</span>
          </div>
        </div>
        <div>
          <button class="p-4 rounded-lg bg-custom-vlgray"><i class="fa-solid fa-magnifying-glass"></i></button>
          <button class="p-4 rounded-lg bg-custom-vlgray"><i class="fa-solid fa-phone"></i></button>
          <button class="p-4 rounded-lg bg-custom-vlgray"><i class="fa-solid fa-magnifying-glass"></i></button>
        </div>
      </div>

      <!-- container for chats -->
      <div class="relative p-5 pt-10">

      <!-- day separator -->

        <div class=" align-middle w-full flex justify-center text-custom-lgray py-3">yesterday
        </div>

        <!-- user chats -->
        <div class="flex justify-end my-2">
          <div class="flex gap-x-2 right-2" >
              <p class=" bg-custom-vvlgary rounded-tl-full rounded-bl-full rounded-br-full rounded-tr-none p-3  " >My fear of stairs is escalating</p>
              <div class="overflow-hidden rounded-full w-10 h-10">
                <img src="{{asset('images/michael-dam.jpg')}}" alt="">
              </div>
            </div>
        </div>

        <div class="flex justify-end my-2">
          <div class="flex gap-x-2 right-2" >
              <p class=" bg-custom-vvlgary rounded-tl-3xl rounded-bl-3xl rounded-br-3xl rounded-tr-none p-3 max-w-80 " >I'm so scared.</p>
              <div class="overflow-hidden rounded-full w-10 h-10">
                <img src="{{asset('images/michael-dam.jpg')}}" alt="">
              </div>
            </div>
        </div>
        <!-- time display -->
        <div class="flex justify-end text-sm">
          <span class="">2:14 <span>pm</span>
          </span>
        </div>

        <!-- another person chat -->
        <div class="flex justify-start my-2">
          <div class="flex gap-x-2 right-2" >
           <div class="overflow-hidden rounded-full w-10 h-10">
              <img src="{{asset('images/michael-dam.jpg')}}" alt="">
            </div>
            <p class=" bg-gray-500 rounded-tl-none rounded-bl-3xl rounded-br-3xl rounded-tr-3xl p-5  text-white max-w-80" >Let's rememnber out last practice. i'm going to record a voice message now, listne to it carefully.</p>
          </div>
        </div>

        <div class="flex justify-start my-2">
          <div class="flex gap-x-2 right-2" >
           <div class="overflow-hidden rounded-full w-10 h-10">
              <img src="{{asset('images/michael-dam.jpg')}}" alt="">
            </div>
            <p class=" bg-gray-500 rounded-tl-none rounded-bl-3xl rounded-br-3xl rounded-tr-3xl p-3  text-white max-w-80" >Don't be sacred.</p>
          </div>
        </div>

        <div class="flex justify-start text-sm">
          <span class="">8:14 <span>pm</span>
          </span>
        </div>

        <form action="">
          <div class="relative flex items-center mt-10">
            <div class="w-full mr-3">
              <input type="text" placeholder="Message..." class="w-full border-none bg-custom-vlgray rounded-full p-3 pl-8">
              
            </div>
            <button class="bg-custom-blue p-5 py-3 rounded-lg text-white "><i class="fa-regular fa-paper-plane"></i></button>
          </div>
          
        </form>






      </div>



    </div>

    <div class="bg-custom-vvlgary rounded-lg pr-2">

      <div class="flex justify-between items-center mt-4">
        <h2 class="flex items-center gap-x-4 ml-5"><span class="font-bold text-xl">Messages</span></h2>

        <div class="flex gap-x-3">
          <div class=" py-2 px-5 bg-custom-lgray rounded-lg  ">
            <i class="fa-solid fa-ellipsis-vertical"></i>
          </div>
        </div>

      </div>

      <div class="  mx-8 mr-10  flex my-8 w-11/12">
        <span class="relative w-full">
          <form action="">
            <input type="search" placeholder="Search for chats" class="rounded-full border-none shadow-lg w-full">

            <button type="submit"><i class="fa-solid fa-magnifying-glass text-custom-lgray absolute right-3 top-3"></i>
            </button>

          </form>
        </span>
      </div>

      <div class="flex flex-col mx-10 gap-y-3">

      @php 
        for($x = 0; $x < 10; $x++){
          echo '
          <div class="flex items-center justify-center gap-x-4 p-4  px-3 bg-white rounded-xl w-auto  grow-0">
            <div class="w-10 h-10 rounded-full overflow-hidden">
              <img src="'.asset('images/michael-dam.jpg').'" alt="">
            </div>

            <div class="flex flex-col">
              <strong>Dr. Nick Wilford</strong>
              <p class="text-custom-lgray text-sm">how are you? what are you doing</p>
            </div>


            <div class="flex flex-col items-center ml-3">
            <span class="text-xs text-custom-lgray mb-1">Nov</span>
            <span class="bg bg-green-200 text-green-700 p-1 px-2 rounded-full text-xs">2</span>
          </div>
        </div>
        ';
        }
      @endphp

      </div>

    </div>

  </div>
  <script src="{{asset('script/navBar.js')}}"></script>
</section>
@endsection