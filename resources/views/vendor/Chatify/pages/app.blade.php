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
  <title>Health Guard</title>
</head>
<body class="font font-GTpro bg-custom-vvlgary">
  <div class="flex flex-col md:flex-row max-w-screen-2xl  mx-auto my-0">

    <header class="pr-3 w-full flex md:inline-block gap-x-4 md:gap-x-0 justify-start items-center md:w-80 pt-10 pl-1 md:pl-0 bg-custom-graish header-js transition-all  duration-200 ease-in-out">

        <div class="flex items-center gap-x-4 fixed md:static right-0 left-0 top-0 px-3 pt-3 pb-3 bg-white  md:bg-inherit z-20 md:z-0 md:block md:p-0 shadow-lg md:shadow-none">
          <div class='w-7 h-1 mr-1  bg-slate-100 dark:bg-slate-900 rounded-full relative after:bg-slate-100 after:dark:bg-slate-900 after:block after:w-full after:absolute after:top-2 after:h-1 after:rounded-full 
                before:bg-slate-100 before:dark:bg-slate-900 before:block before:w-full before:absolute before:bottom-2 before:h-1 before:rounded-full cursor-pointer before:transition-all  before:ease-in-out before:duration-200 after:transition-all after:ease-in-out after:duration-200 
                md:hidden' onClick="toggleMobileNav
                ()" id='hamburger'></div>

            <div class="flex items-center gap-x-5 m-4 z-20">
              <a href="/">
                <span class="flex w-60 js-logo"><h1 class="text-3xl text-custom-blue font-bold">H</h1><h1 class="text-3xl text-custom-blue font-bold guard-js">ealth-Guard.</h1></span>
              </a>


              <button class="hidden md:inline-block px-3 py-1 bg-custom-vlgray rounded-lg nav-toggle-js"><i class="fa-solid fa-less-than text-sm font-light" style="font-size: 8px;" ></i></button>
            </div>
        </div>

        <nav class=" md:block  fixed bottom-0 top-20 shadow-xl md:shadow-none bg-white md:bg-inherit right-40 p-5 pt-8  md:p-0 left-full z-10 md:static  transition-all duration-200" id="nav-bar">
          <span class="text-custom-lgray text-sm capitalize mx-4">General</span>
          <ul>
            <a href="/" class=" ">
              <li class="hover:bg-custom-vlgray cursor-pointer  py-5 pl-6 rounded-xl my-1"><div><i class="mr-4 fa-solid fa-user-doctor"></i><span>Pyschologists</span></div></li>
            </a>

            <a href="/dashboard">
              <li class="hover:bg-custom-vlgray cursor-pointer  py-5 pl-6 rounded-xl my-1"><div><i class="mr-4 fa-solid fa-table-cells-large"></i><span>Dashboard</span></div></li>
            </a>
            

            <a href="">
              <li class="hover:bg-custom-vlgray cursor-pointer  py-5 pl-6 rounded-xl my-1"><div><i class="mr-4 fa-solid fa-building-columns"></i><span>Education</span></div></li>
            </a>

            <a href="{{route('blogs.index')}}">
              <li class="hover:bg-custom-vlgray cursor-pointer  py-5 pl-6 rounded-xl my-1"><div><i class="mr-4 fa-regular fa-pen-to-square"></i><span>Blog</span></div></li>
            </a>
          </ul>

        
          <div class="mt-10">
            <span class="text-custom-lgray text-sm capitalize mx-4">Tools</span>
            @auth
            <ul>
              <a href="/chatify/{{Auth::user()->id}}">
                <li class="hover:bg-custom-vlgray cursor-pointer  py-5 pl-6 rounded-xl my-1"><div><i class="fa-regular fa-comments mr-4"></i><span>Chat</span></div></li>
              </a>

        
              <a href="{{route('profile.edit')}}">
                <li class="hover:bg-custom-vlgray cursor-pointer  py-5 pl-6 rounded-xl my-1"><div><i class="fa-solid fa-gear mr-4"></i><span>Settings</span></div></li>
              </a>
            </ul>
          </div>

        

            <ul>
            <a href="{{route('logout')}}" onclick="event.preventDefault();
            this.closest('form').submit();">
              <li class="hover:bg-custom-vlgray cursor-pointer  py-5 pl-6 rounded-xl my-1"><div><i class="fa-solid fa-arrow-right-from-bracket fa-rotate-180 mr-4"></i><span>Log out</span></div></li>
            </a>
          </ul>
          @else
          <ul class="mt-10 flex flex-col justify-center items-center">
            <div class="text-xs text-custom-lgray mb-5 text-center">
              Sign Up to acces tools
            </div>
            <a
                href="{{ route('register') }}"
                class="rounded-md px-3 py-2  bg-custom-blue text-white hover:outline hover:outline-1 hover:text-black hover:bg-transparent transition-all duration-150 ease-in-out"
            >
                Sign Up
            </a>
          </ul>
          @endauth

        </nav>

    </header>

    <div class=" md:pt-0 md:w-full js-main-container">

    <section class="bg-white rounded-2xl m-4 mt-0   w-full">
    <p class="p-5 pt-0 font-bold text-custom-lgray"><span class="text-red-700 text-3xl">*</span> Please add to persons to favorite list inorder to access them fastly.</p>

        @include('Chatify::layouts.headLinks')

        <div class="messenger">
            {{-- ----------------------Users/Groups lists side---------------------- --}}
            <div class="messenger-listView {{ !!$id ? 'conversation-active' : '' }}">
                {{-- Header and search bar --}}
                <div class="m-header">
                    <nav>
                        <a href="#"><i class="fas fa-inbox"></i> <span class="messenger-headTitle">Messages</span> </a>
                        {{-- header buttons --}}
                        <nav class="m-header-right">
                            <a href="#"><i class="fas fa-cog settings-btn"></i></a>
                            <a href="#" class="listView-x"><i class="fas fa-times"></i></a>
                        </nav>
                    </nav>
                    {{-- Search input --}}
                    <input type="text" class="messenger-search" placeholder="Search" />
                    {{-- Tabs --}}
                    {{-- <div class="messenger-listView-tabs">
                        <a href="#" class="active-tab" data-view="users">
                            <span class="far fa-user"></span> Contacts</a>
                    </div> --}}
                </div>
                {{-- tabs and lists --}}
                <div class="m-body contacts-container">
                {{-- Lists [Users/Group] --}}
                {{-- ---------------- [ User Tab ] ---------------- --}}
                <div class="show messenger-tab users-tab app-scroll" data-view="users">
                    {{-- Favorites --}}
                    <div class="favorites-section">
                        <p class="messenger-title"><span>Favorites</span></p>
                        <div class="messenger-favorites app-scroll-hidden"></div>
                    </div>
                    {{-- Saved Messages --}}
                    <p class="messenger-title"><span>Your Space</span></p>
                    {!! view('Chatify::layouts.listItem', ['get' => 'saved']) !!}
                    {{-- Contact --}}
                    <p class="messenger-title"><span>All Messages</span></p>
                    <div class="listOfContacts" style="width: 100%;height: calc(100% - 272px);position: relative;"></div>
                </div>
                    {{-- ---------------- [ Search Tab ] ---------------- --}}
                <div class="messenger-tab search-tab app-scroll" data-view="search">
                        {{-- items --}}
                        <p class="messenger-title"><span>Search</span></p>
                        <div class="search-records">
                            <p class="message-hint center-el"><span>Type to search..</span></p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- ----------------------Messaging side---------------------- --}}
            <div class="messenger-messagingView">
                {{-- header title [conversation name] amd buttons --}}
                <div class="m-header m-header-messaging">
                    <nav class="chatify-d-flex chatify-justify-content-between chatify-align-items-center">
                        {{-- header back button, avatar and user name --}}
                        <div class="chatify-d-flex chatify-justify-content-between chatify-align-items-center">
                            <a href="#" class="show-listView"><i class="fas fa-arrow-left"></i></a>
                            <div class="avatar av-s header-avatar" style="margin: 0px 10px; margin-top: -5px; margin-bottom: -5px;">
                            </div>
                            <a href="#" class="user-name">{{ config('chatify.name') }}</a>
                        </div>
                        {{-- header buttons --}}
                        <nav class="m-header-right">
                            <a href="#" class="add-to-favorite"><i class="fas fa-star"></i></a>
                            <a href="/"><i class="fas fa-home"></i></a>
                            <a href="#" class="show-infoSide"><i class="fas fa-info-circle"></i></a>
                        </nav>
                    </nav>
                    {{-- Internet connection --}}
                    <div class="internet-connection">
                        <span class="ic-connected">Connected</span>
                        <span class="ic-connecting">Connecting...</span>
                        <span class="ic-noInternet">No internet access</span>
                    </div>
                </div>

                {{-- Messaging area --}}
                <div class="m-body messages-container app-scroll">
                    <div class="messages">
                        <p class="message-hint center-el"><span>Please select a chat to start messaging</span></p>
                    </div>
                    {{-- Typing indicator --}}
                    <div class="typing-indicator">
                        <div class="message-card typing">
                            <div class="message">
                                <span class="typing-dots">
                                    <span class="dot dot-1"></span>
                                    <span class="dot dot-2"></span>
                                    <span class="dot dot-3"></span>
                                </span>
                            </div>
                        </div>
                    </div>

                </div>
                {{-- Send Message Form --}}
                @include('Chatify::layouts.sendForm')
            </div>
            {{-- ---------------------- Info side ---------------------- --}}
            <div class="messenger-infoView app-scroll">
                {{-- nav actions --}}
                <nav>
                    <p>User Details</p>
                    <a href="#"><i class="fas fa-times"></i></a>
                </nav>
                {!! view('Chatify::layouts.info')->render() !!}
            </div>
        </div>

        @include('Chatify::layouts.modals')
        @include('Chatify::layouts.footerLinks')
    </section>
    </div>
  </div>
  <script src="{{asset('script/navBar.js')}}"></script>
</body>
</html>









