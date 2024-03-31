<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
 
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://kit.fontawesome.com/ee4b6626a1.js" crossorigin="anonymous"></script>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Truculenta:opsz,wght@12..72,100..900&display=swap" rel="stylesheet">
  @vite('resources/css/app.css')
  <title>Document</title>
</head>
<body class="font font-GTpro bg-custom-vvlgary">
  <div class="flex max-w-screen-2xl mx-auto my-0">
    <header class="pr-3 w-80 pt-10 bg-custom-graish">
      <div class="flex items-center gap-x-5 m-4 ">
        <h1 class="text-3xl text-custom-blue  font-bold ">Health-Guard.</h1> 
        <button class="px-3 py-1 bg-custom-vlgray rounded-lg"><i class="fa-solid fa-less-than text-sm font-light" style="font-size: 8px;"></i></button>
      </div>

      <nav>
        <span class="text-custom-lgray text-sm capitalize mx-4">General</span>
        <ul>
          <a href="" class=" ">
            <li class="hover:bg-custom-vlgray cursor-pointer  py-5 pl-6 rounded-xl my-1"><span><i class="mr-4 fa-solid fa-user-doctor"></i><span>Pyschologists</span></span></li>
          </a>
          <li class="hover:bg-custom-vlgray cursor-pointer  py-5 pl-6 rounded-xl my-1"><span><i class="mr-4 fa-solid fa-table-cells-large"></i><span>Dashboard</span></span></li>
          <li class="hover:bg-custom-vlgray cursor-pointer  py-5 pl-6 rounded-xl my-1"><span><i class="fa-regular fa-calendar mr-4"></i><span>Calender</span></span></li>
          <li class="hover:bg-custom-vlgray cursor-pointer  py-5 pl-6 rounded-xl my-1"><span><i class="mr-4 fa-solid fa-building-columns"></i><span>Education</span></span></li>
          <li class="hover:bg-custom-vlgray cursor-pointer  py-5 pl-6 rounded-xl my-1"><span><i class="mr-4 fa-regular fa-pen-to-square"></i><span>Blog</span></span></li>
        </ul>

        <div class="mt-10">
          <span class="text-custom-lgray text-sm capitalize mx-4">Tools</span>
          <ul>
            <li class="hover:bg-custom-vlgray cursor-pointer  py-5 pl-6 rounded-xl my-1"><span><i class="fa-regular fa-comments mr-4"></i><span>Chat</span></span></li>
            <li class="hover:bg-custom-vlgray cursor-pointer  py-5 pl-6 rounded-xl my-1"><span><i class="fa-solid fa-gear mr-4"></i><span>Settings</span></span></li>
          </ul>
        </div>


        <ul>
          <li class="hover:bg-custom-vlgray cursor-pointer  py-5 pl-6 rounded-xl my-1"><span><i class="fa-solid fa-arrow-right-from-bracket fa-rotate-180 mr-4"></i><span>Log out</span></span></li>
        </ul>
      </nav>

    </header>

    <main class="flex-1 p-4 pt-5 bg-white mt-10 rounded-3xl">
    <!-- The welcome part -->
      <div class="flex justify-between">

        <h1 class="text-4xl font-bold">Welcome, Sarah!</h1>
        <div class="flex gap-x-3">
          <div class="relative py-2 px-3 bg-white outline outline-1 rounded-full outline-custom-lgray">
            <i class="fa-regular fa-bell"></i>
            <div class="w-2 h-2 absolute bg-red-700 rounded-full top-0 right-0"></div>
          </div>

          <div class="w-10 h-10 rounded-full overflow-hidden">
            <img src="{{asset('images/michael-dam.jpg')}}" alt="">
          </div>
        </div>
      </div>

      <div class="bg-custom-vvlgray bg-custom-graish p-6 mt-10 rounded-xl relative pb-20"> 
        <p>
          Find the best psychologist for yourself Our specialists will help uou to find the best decisions for solving your problems!.
        </p>
        <div class="absolute bg-white p-5 rounded-xl flex sh shadow-lg  top-24 right-5 left-5" >

          <div class="flex flex-1 flex-col items-start gap-y-3 justify-between">
            <span class="text- text-custom-lgray text-sm">Type of counseling</span>
            <select name="counseling" class="outline-none border-none focus:outline-none p-0 w-full"  id="">
              <option value="counseling1">All types</option>
              <option value="counseling1">All types</option>
            </select>
          </div>

          <div class="flex flex-1 flex-col items-start gap-y-3 justify-between border-l-2 pl-3  border-custom-vlgray">
            <span class="text- text-custom-lgray text-sm">City</span>
            <select name="counseling" class="outline-none border-none focus:outline-none p-0 w-full"  id="">
              <option value="counseling1">All Cities</option>
              <option value="counseling1">All types</option>
            </select>
          </div>

          <div class="flex flex-1 flex-col items-start gap-y-3 justify-between border-l-2 pl-3  border-custom-vlgray">
            <span class="text- text-custom-lgray text-sm">Age</span>
            <select name="counseling" class="outline-none border-none focus:outline-none p-0 w-full"  id="">
              <option value="counseling1">35+</option>
              <option value="counseling1">30+</option>
            </select>
          </div>

          <div class="flex flex-1 flex-col items-start gap-y-3 justify-between border-l-2 pl-3  border-custom-vlgray">
            <span class="text- text-custom-lgray text-sm">Gender</span>
            <select name="counseling" class="outline-none border-none focus:outline-none p-0 w-full"  id="">
              <option value="counseling1">All</option>
              <option value="counseling1">Male</option>
              <option value="counseling1">Female</option>
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

      <section class="mt-28 pl-5">
        <div class="flex items-center justify-between my-5 mb-10">
          <h2 class="text-2xl font-bold ">Best for you</h2>
          <button class="bg-custom-vlgray px-6 py-2 rounded-full flex justify-between items-center gap-x-4"><span>See all</span> &gt;</button>
        </div>

        <!-- grid for pychologists card -->
        <div class="grid  grid-cols-3 gap-x-5 gap-y-6">

          <div class="shadow- shadow-xl  rounded-xl p-2 px-5">
            <div class="flex items-start gap-x-6">

              <div>
                <div class="w-10 h-10 rounded-full overflow-hidden">
                  <img src="{{asset('images/michael-dam.jpg')}}" alt="">
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

          <div class="shadow- shadow-xl  rounded-xl p-2 px-5">
            <div class="flex items-start gap-x-6">

              <div>
                <div class="w-10 h-10 rounded-full overflow-hidden">
                  <img src="{{asset('images/michael-dam.jpg')}}" alt="">
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

          <div class="shadow- shadow-xl  rounded-xl p-2 px-5">
            <div class="flex items-start gap-x-6">

              <div>
                <div class="w-10 h-10 rounded-full overflow-hidden">
                  <img src="{{asset('images/michael-dam.jpg')}}" alt="">
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

          <div class="shadow- shadow-xl  rounded-xl p-2 px-5">
            <div class="flex items-start gap-x-6">

              <div>
                <div class="w-10 h-10 rounded-full overflow-hidden">
                  <img src="{{asset('images/michael-dam.jpg')}}" alt="">
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


          <div class="shadow- shadow-xl  rounded-xl p-2 px-5">
            <div class="flex items-start gap-x-6">

              <div>
                <div class="w-10 h-10 rounded-full overflow-hidden">
                  <img src="{{asset('images/michael-dam.jpg')}}" alt="">
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

          <div class="shadow- shadow-xl  rounded-xl p-2 px-5">
            <div class="flex items-start gap-x-6">

              <div>
                <div class="w-10 h-10 rounded-full overflow-hidden">
                  <img src="{{asset('images/michael-dam.jpg')}}" alt="">
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

          
        </div>
        
      </section>

      <section class="p-3 rounded-xl bg-custom-graish mt-10 flex justify-start h-auto">
        <div class="w-custom-4  rounded-xl overflow-hidden">
          <img src="{{asset('images/zachary-nelson.jpg')}}" alt="">
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

        <div class="grid grid-cols-2 gap-x-3 gap-y-4">
            <div>
              <div class="overflow-hidden rounded-xl  w-custom-4 h-60 ">
                <img src="{{asset('images/daniel-mingook-kim.jpg')}}" alt="">
              </div>
              <div class="p-3">
                <h3 class="font-bold my-3">Mindfulness meditation</h3>
                <p class="text-sm pl-1.5">Mindfulness meditation originates from Buddhist teachings and is the most popylar meditation technique in the West. </p>
              </div>
            </div>

            <div>
              <div class="overflow-hidden rounded-xl  w-custom-4 h-60 ">
                <img src="{{asset('images/colton-sturgeon.jpg')}}" alt="">
              </div>
              <div class="p-3">
                <h3 class="font-bold my-3">Spritual meditation</h3>
                <p class="text-sm pl-1.5">Mindfulness meditation originates from Buddhist teachings and is the most popylar meditation technique in the West. </p>
              </div>
            </div>
        </div>

      </section>
    </main>
    
    <footer>

    </footer>
  </div>
</body>
</html>