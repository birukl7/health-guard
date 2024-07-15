<x-custom.layout>


    <main class=" md:w-full bg-white rounded-2xl m-4 pt-10 p-7 w-full ">
    <!-- The welcome part -->
      <div class="flex justify-between sticky top-0 z-10 bg-white py-7">

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
          
          <form action="/search" method="POST" class="flex">
            @method('POST')
            @csrf
            <input type="search" name="search" class=" right-full mr-3 rounded-xl  border-none  transition-all duration-400 ease-in-out bg-custom-vvlgary p-0  py-0 focus:outline-none w-0" placeholder="search" id="search-bar">
            <div class="relative py-2 px-3 bg-white outline outline-1 rounded-full outline-custom-lgray cursor-pointer" id="search-contain">
            <i class="fa-solid fa-magnifying-glass rotate"></i> 
          </div>
          </form>

          



          <script>
            const searchContain = document.querySelector('#search-contain')
            const searchBar = document.querySelector('#search-bar')
            let isSearchBarClicked = false
            searchContain.addEventListener('click', ()=>{
              if(isSearchBarClicked){
                searchBar.classList.remove('w-80')
                searchBar.classList.add('w-0')
                searchBar.classList.add('border-none')
                searchBar.classList.add('p-0')
                isSearchBarClicked = !isSearchBarClicked
              }else{
                searchBar.classList.remove('w-0')
                searchBar.classList.remove('p-0')
                searchBar.classList.remove('border-none')
                searchBar.classList.add('w-80')
                isSearchBarClicked = !isSearchBarClicked

              }
              
            })
          </script>

         

          <a href="{{route('notifications.index')}}">
            <div class="relative py-2 px-3 bg-white outline outline-1 rounded-full outline-custom-lgray">
              <i class="fa-regular fa-bell"></i>
              
              <div class="w-4 flex justify-center items-center h-4 absolute bg-red-700 rounded-full top-0 right-0 text-xs text-white"></div>
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

        <form action="/filter" method="POST">
          @csrf 
          @method('POST')
          <div class="absolute  bg-white p-5 rounded-xl flex flex-col md:flex-row gap-y-5 md:gap-0 shadow-lg  top-24 right-5 left-5" >

            <div class="flex flex-1 flex-col items-start gap-y-3 pl-3 md:pl-0 justify-between">
              <span class="text- text-custom-lgray text-sm">Type of Specialization</span>
              <select name="specialization" class="outline-none border-none focus:outline-none p-0 w-full"  id="">
                <option value="all">All Type</option>
                <option value="Clinical Psychology">Clinical Psychology</option>
                <option value="Counseling Psychology">Counseling Psychology</option>
                <option value="School Psychology">School Psychology</option>
                <option value="Forensic Psychology">Forensic Psychology</option>
                <option value="Industrial-Organizational Psychology">Industrial-Organizational Psychology</option>
                <option value="Health Psychology">Health Psychology</option>
                <option value="Neuropsychology">\Neuropsychology</option>
                <option value="Developmental Psychology">Developmental Psychology</option>
                <option value="Social Psychology">Social Psychology</option>
                <option value="Experimental Psychology">Experimental Psychology</option>
                <option value="Congnitive Psychology">Congnitive Psychology</option>
                <option value="Environmental Psychology">Environmental Psychology</option>
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
                    <option value="Milan">
                    <option value="Seoul">
                    <option value="Busan">
                    <option value="Rome">
                    <option value="Guadalajara">
                    <option value="Mexico City">
                    <option value="Chiang Mai">
                    <!-- Add more options for other cities as needed -->
                </datalist>
            </div>

            <div class="flex flex-1 flex-col items-start gap-y-3 justify-between md:border-l-2 pl-3  border-custom-vlgray">
              <span class="text- text-custom-lgray text-sm">Experience</span>
              <select name="experience" class="outline-none border-none focus:outline-none p-0 w-full"  id="">
                <option value="all">All</option>
                <option value="0-1">0-1</option>
                <option value="2-5">2-5</option>
                <option value="5-7">5-7</option>
                <option value="7-10">7-10</option>
                <option value="10+">10+</option>
              </select>
            </div>

            <div class="flex flex-1 flex-col items-start gap-y-3 justify-between md:border-l-2 pl-3  border-custom-vlgray">
              <span class="text- text-custom-lgray text-sm">Gender</span>
              <select name="gender" class="outline-none border-none focus:outline-none p-0 w-full"  id="">
                <option value="All">All</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
              </select>
            </div>

            <div>
              <button class=" bg-custom-vlgray p-5 rounded-xl" type="submit">
                <i class="fa-solid fa-magnifying-glass"></i>
              </button>
            </div>

          </div>
        </form>



        <div>

        </div>
      </div>

      <section class=" mt-96 md:mt-28 pl-5">
        <div class="flex items-center justify-between my-5 mb-10">
          <h2 class="text-2xl font-bold ">Best for you</h2>
          @if( Request::is('pychologists'))
          <a href="/pychologists/all" class="bg-custom-vlgray px-6 py-2 rounded-full flex justify-between items-center gap-x-4 cursor-pointer"><span class="js-see-all">See all</span> &gt;</a>
          @elseif( Request::is('pychologists/all'))
          <a href="/pychologists" class="bg-custom-vlgray px-6 py-2 rounded-full flex justify-between items-center gap-x-4 cursor-pointer"><span class="js-see-all">See Less</span> &gt;</a>
          @endif
        </div>

        <!-- grid for pychologists card -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-x-5 gap-y-6" id="pychologist-card-contanier">
        @php
          if (!function_exists('generateRandomDecimal')) {
              function generateRandomDecimal()
              {
                  return number_format(mt_rand(0, 500) / 100, 1); // Generating random number between 0 and 500, then dividing by 100
              }
          }

          if (!function_exists('getColorClass')) {
              function getColorClass($decimal)
              {
                  if ($decimal < 2.5) {
                      return 'bg-red-500';
                  } else {
                      return 'bg-green-500';
                  }
              }
          }

          // Arrays to store decimal numbers and their associated color classes
          $decimals = [];
          $colors = [];

          // Generate random numbers and associate color classes for each doctor
          if(isset($doctors)){
            foreach ($doctors as $doctor) {
              $randomDecimal = generateRandomDecimal();
              $decimals[] = $randomDecimal;
              $colors[] = getColorClass($randomDecimal);
            }
          }else {
            foreach ($results as $result) {
              $randomDecimal = generateRandomDecimal();
              $decimals[] = $randomDecimal;
              $colors[] = getColorClass($randomDecimal);
            }
          }

          $i = 0;
        @endphp

        @php
          $i = 0;
         // dd($doctors);
        @endphp

        {{-- @if($doctors)
          <p>Result Not Found</p>
        @endif --}}
        
        @if(isset($doctors))
          @foreach ($doctors as $doctor)
              @include('home.partials.doctor-card', [
                  'doctor' => $doctor,
                  'decimal' => $decimals[$i],
                  'color' => $colors[$i]
              ])
              @php
              $i++;
              @endphp
          @endforeach
        @else
          @foreach ($results as $result)
              @include('home.partials.doctor-card', [
                  'doctor' => $result,
                  'decimal' => $decimals[$i],
                  'color' => $colors[$i]
              ])
              @php
              $i++;
              @endphp
          @endforeach
        @endif
          
        </div>
          <div class=" mt-4">{{$doctors->links()}}</div>

      </section>

      <x-custom.footer></x-custom.footer>
      <script src="{{asset('script/homeCards.js')}}"></script>
    </main>
</x-layout>