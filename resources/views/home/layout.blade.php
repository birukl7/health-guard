<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://kit.fontawesome.com/ee4b6626a1.js" crossorigin="anonymous"></script>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Truculenta:opsz,wght@12..72,100..900&display=swap"
    rel="stylesheet">
  @vite('resources/css/app.css')
  <style>
    html {
      scroll-behavior: smooth;
    }
  </style>
  <title>Health Guard</title>
</head>

<body class="font-GTpro bg-custom-vvlgary">
  @php
  $user = Auth::user();
  @endphp
  <div class="flex flex-col md:flex-row max-w-screen-2xl mx-auto my-0">
    
    @if(session()->has('success'))
      <div class="fixed bottom-0 right-0 mb-4 mr-4 bg-green-500 text-white px-4 py-2 rounded-lg flex items-center">
          <div class="mr-2">
              {{ session('success') }}
          </div>
          <button class="text-white" onclick="this.parentElement.style.display='none'">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
              </svg>
          </button>
      </div>
  @endif


    <header
      class="pr-3 w-full flex md:inline-block gap-x-4 md:gap-x-0 justify-start items-center md:w-80 pt-10 pl-1 md:pl-0 bg-custom-graish header-js transition-all  duration-200 ease-in-out fixed top-0 bottom-0  z-50">

      <div
        class="flex items-center gap-x-4 fixed md:static right-0 left-0 top-0 px-3 pt-3 pb-3 bg-white  md:bg-inherit z-20 md:z-0 md:block md:p-0 shadow-lg md:shadow-none">
        <div class='w-7 h-1 mr-1  bg-slate-100 dark:bg-slate-900 rounded-full relative after:bg-slate-100 after:dark:bg-slate-900 after:block after:w-full after:absolute after:top-2 after:h-1 after:rounded-full
                before:bg-slate-100 before:dark:bg-slate-900 before:block before:w-full before:absolute before:bottom-2 before:h-1 before:rounded-full cursor-pointer before:transition-all  before:ease-in-out before:duration-200 after:transition-all after:ease-in-out after:duration-200
                md:hidden' onClick="toggleMobileNav
                ()" id='hamburger'></div>

        <div class="flex items-center gap-x-5 m-4 z-20">
          <a href="/">
            <span class="flex w-60 js-logo">
              <h1 class="text-3xl text-custom-blue font-bold">H</h1>
              <h1 class="text-3xl text-custom-blue font-bold guard-js">ealth-Guard.</h1>
            </span>
          </a>


          <button class="hidden md:inline-block px-3 py-1 bg-custom-vlgray rounded-lg nav-toggle-js"><i
              class="fa-solid fa-less-than text-sm font-light" style="font-size: 8px;"></i></button>
        </div>
      </div>
      @php
      $bg = 'bg-custom-vlgray border-r-2 border-custom-blue';

      @endphp
      <nav
        class=" md:block  fixed bottom-0 top-20 shadow-xl md:shadow-none bg-white md:bg-inherit right-40 p-5 pt-8  md:p-0 left-full z-10 md:static  transition-all duration-200"
        id="nav-bar">
        <span class="text-custom-lgray text-sm capitalize mx-4">General</span>
        <ul id="general-nav">

            <a href="/" class="">
              <li class="hover:bg-custom-vlgray hover:border-r-2 rounded-xl rounded-tr-none rounded-br-none cursor-pointer  py-5 pl-6 {{ Request::path() === '/' ? $bg : '' }}  my-1"><div><i class="fa-solid fa-house mr-4"></i><span class="">Home</span></div></li>
            </a>

            <a href="/pychologists" class="">
              <li class="hover:bg-custom-vlgray hover:border-r-2 rounded-xl rounded-tr-none rounded-br-none cursor-pointer {{ Request::is('pychologists*') ? $bg : '' }} py-5 pl-6   my-1 "><div><i class="mr-4 fa-solid fa-user-doctor " ></i><span class="">Pyschologists</span></div></li>
            </a>

          <a href="/dashboard">
            <li class="hover:bg-custom-vlgray cursor-pointer rounded-xl rounded-tr-none rounded-br-none  py-5 pl-6  my-1 {{ Request::is('dashboard*') ? $bg : '' }}
              {{ Request::is('depressions*') ? $bg : '' }}">
              <div><i class="mr-4 fa-solid fa-table-cells-large"></i><span>Dashboard</span></div>
            </li>
          </a>




          <a href="{{route('posts.index')}}">
            <li
              class="hover:bg-custom-vlgray cursor-pointer rounded-xl rounded-tr-none rounded-br-none  py-5 pl-6  my-1 {{ Request::routeIs('blogs.*') ? $bg : '' }} {{ Request::routeIs('posts.*') ? $bg : '' }}">
              <div><i class="mr-4 fa-regular fa-pen-to-square"></i><span>Blog</span></div>
            </li>
          </a>
        </ul>


        <div class="mt-10">
          <span class="text-custom-lgray text-sm capitalize mx-4">Tools</span>
          @auth
          <ul>
            <a href="/chatify/{{Auth::user()->id}}">
              <li
                class="hover:bg-custom-vlgray cursor-pointer rounded-xl rounded-tr-none rounded-br-none  py-5 pl-6  my-1 {{ Request::is('chatify/' . Auth::user()->id) ? $bg : '' }}">
                <div><i class="fa-regular fa-comments mr-4"></i><span>Chat</span></div>
              </li>
            </a>

              <a href="{{route('notifications.index')}}">
                <li class="hover:bg-custom-vlgray cursor-pointer rounded-xl rounded-tr-none rounded-br-none  py-5 pl-6  my-1 {{ Request::is('notifications*') ? $bg : '' }}"><div><i class="fa-regular fa-bell mr-4"></i><span>Notification</span></div></li>
              </a>

            @if(!$user->hasRole('health_professional'))
            <a href="{{route('students.create')}}">
              <li class="hover:bg-custom-vlgray cursor-pointer rounded-xl rounded-tr-none rounded-br-none  py-5 pl-6  my-1  {{ Request::is('students*') ? $bg : '' }}
                {{ Request::is('depressions*') ? $bg : '' }}
                {{ Request::is('alcohols*') ? $bg : '' }}
                {{ Request::is('professionals*') ? $bg : '' }}">
                <div><i class="fa-regular fa-user mr-4"></i><span>Profile</span></div>
              </li>
            </a>
            @else
            <a href="{{route('professionals.create')}}">
              <li class="hover:bg-custom-vlgray cursor-pointer rounded-xl rounded-tr-none rounded-br-none  py-5 pl-6  my-1  {{ Request::is('students*') ? $bg : '' }}
                {{ Request::is('depressions*') ? $bg : '' }}
                {{ Request::is('alcohols*') ? $bg : '' }} {{ Request::is('professionals*') ? $bg : '' }}">
                <div><i class="fa-regular fa-user mr-4"></i><span>Profile</span></div>
              </li>
            </a>
            @endif


            <a href="{{route('profile.edit')}}">
              <li
                class="hover:bg-custom-vlgray cursor-pointer rounded-xl rounded-tr-none rounded-br-none  py-5 pl-6  my-1 {{ Request::routeIs('profile.edit') ? $bg : '' }}">
                <div><i class="fa-solid fa-gear mr-4"></i><span>Settings</span></div>
              </li>
            </a>
          </ul>
        </div>

        <form action="{{route('logout')}}" method="Post">
          @method('post')
          @csrf
          <ul>
            <a href="{{route('logout')}}" onclick="event.preventDefault();
            this.closest('form').submit();">
              <li class="hover:bg-custom-vlgray cursor-pointer  py-5 pl-6 rounded-xl my-1">
                <div><i class="fa-solid fa-arrow-right-from-bracket fa-rotate-180 mr-4"></i><span>Log out</span></div>
              </li>
            </a>
          </ul>
        </form>
        @else
        <ul class="mt-10 flex flex-col justify-center items-center">
          <div class="text-xs text-custom-lgray mb-5 text-center">
            Sign Up to acces tools
          </div>
          <a href="{{ route('register') }}"
            class="rounded-md px-3 py-2  bg-custom-blue text-white hover:outline hover:outline-1 hover:text-black hover:bg-transparent transition-all duration-150 ease-in-out">
            Sign Up
          </a>
        </ul>
        @endauth

      </nav>

    </header>

    <div class="pt-8 pl-custom-5 md:pt-0 md:w-full js-main-container ">
      @yield('content')
    </div>
  </div>
  <script src="{{asset('script/navBar.js')}}"></script>
</body>

</html>