@extends('home.layout')
@section('content')
<section class="bg-white rounded-2xl m-4 pt-10 p-7 w-full overflow-hidden">


    <div class="flex flex-col h-screen items-center bg-no-repeat " style="background-image: url('{{ url('images/wave.png') }}');">
    <!-- Landing page         -->
    <div class="flex md:flex-row flex-col justify-start items-center h-screen" id="hero-section">
        <div id="hero-text" class=" flex items-center pt-36 md:pt-0">
        <div>
            <h1 class="text-6xl font-bold w-11/12 ">Break Free from Depression </h1>
            <p class="my-6 w-10/12 font-robotoCondensed">Take a step towards brighter days with Health-Guard by your side. Together, let's embark on a journey of self-discovery and resilience.
            </p>
           
                <span class="">
                <a href="{{ route('login') }}">
                        <button type="submit" class="px-7 py-3 hover:outline hover:outline-1 hover:outline-blackhover:text-black  bg-black 
                        text-white rounded-full hover:shadow-lg 
                        hover:bg-transparent hover:text-black hover:px-10 transition-all duration-500 ease-in-out mt-3 md:mt-0 sm:mt-3 w-80">Log In</button>
                    </a>
                    <a href="{{ route('register') }}">
                        <button type="submit" class="px-7 py-3 outline outline-1 outline-white  bg-custom-blue 
                        text-white rounded-full hover:shadow-lg hover:px-10 transition-all duration-500 ease-in-out mt-3 md:mt-0 sm:mt-3">sign up</button>
                    </a>
                </span>

                <p class="pt-5 ml-4 font-robotoCondensed "> &#183; Opportunities await here</p>
           
        </div>
        </div>
        <div id="hero-image bg-green" class="bg-green md:w-3/4  ">
            <img src="{{ asset('images/Depression.gif')}}" alt="" class="w-full " id="hero-image" >
        </div>
    </div>

            <!-- numbers -->
        <ul id="data" class="flex md:flex-row flex-col justify-around p-3 py-10 mt-5 sm:-mt-10 rounded-lg bg-slate-200 dark:bg-transparent ">
            <li class=" p-3 px-10 border-r-2 border-slate-700 text-black"> <div><strong class="text-3xl text-black "><span id="js-finish">4500</span>+</strong ><p class="text-black font-robotoCondensed">Finish Candidates</p></div></li>
            <li class=" p-3 px-10 border-r-2 border-slate-700 "> <div><strong class="text-3xl p"><span id="js-year">9</span>+</strong><p class="font-robotoCondensed">Years of Experience</p></div></li>
            <li class=" p-3 px-10 border-r-2 border-slate-700 "> <div><strong class="text-3xl p"><span id="js-excellence">350</span>+</strong><p class="font-robotoCondensed" >Excellence Awards</p></div></li>
            <li class=" p-3 px-10 border-r-2 border-slate-700 "> <div><strong class="text-3xl p"><span id="js-brand">40</span>+</strong><p class="font-robotoCondensed">Brand Partners</p></div></li>
        </ul>
    </div>

    <div class="flex md:flex-row flex-col justify-start items-center h-screen" id="hero-section">
        <div id="hero-image bg-green" class="bg-green md:w-3/4  ">
            <img src="{{ asset('images/Helping a partner.gif')}}" alt="" class="w-full " id="hero-image" >
        </div>

        <div id="hero-text" class=" flex items-center pt-36 md:pt-0">
        <div>
            <h1 class="text-6xl font-bold w-11/12 ">We're here to lift you up </h1>
            <p class="my-6 w-10/12 font-robotoCondensed">With its roots firmly grounded in psychology, Health-Guard seamlessly blends technology and human understanding to provide holistic support for mental well-being
            </p>

                <span class="">
                <a href="/pychologists">
                        <button type="submit" class="px-7 py-3 hover:outline hover:outline-1 hover:outline-blackhover:text-black  bg-black 
                        text-white rounded-full hover:shadow-lg 
                        hover:bg-transparent hover:text-black hover:px-10 transition-all duration-500 ease-in-out mt-3 md:mt-0 sm:mt-3 w-80">See our Pyschologists</button>
                    </a>
                    <a href="/register">
                        <button type="submit" class="px-7 py-3 outline outline-1 outline-white  bg-custom-blue 
                        text-white rounded-full hover:shadow-lg hover:px-10 transition-all duration-500 ease-in-out mt-3 md:mt-0 sm:mt-3">Chat with friend</button>
                    </a>
                </span>

                <p class="pt-5 ml-4 font-robotoCondensed "> &#183; Meet our pychologists</p>
       
        </div>
        </div>
    </div>

    <footer class="flex mb-10 mt-10 gap-x-16">
        <div class="w-60">
            <a href="/">
                <h1 class="font-bold text-2xl text-custom-blue mb-2">Health-Guard</h1>
            </a>
            <p class="mb-2 ">No more time spending looking for study materials. All is here</p>
            <address>
                <div class="font-semibold">
                    <a href="#">+251(34356856)</a>
                    <a href="#">mobile@number.com</a>
                </div>
            </address>
        </div>

        <ul class="mx-16">
            <li class="text-xl font-semibold mb-2">Quick Links</li>
            <li>Dashboard</li>
            <li>Profile</li>
            <li>Blog</li>
            <li>Setting</li>
        </ul>

        <ul class="mr-16">
            <li class="text-xl font-semibold mb-2">Resources</li>
            <li>Meditations</li>
            <li>Blogs</li>
            <li>Chats</li>
            <li>FAQs</li>
        </ul>

        <ul>
            <li class="text-xl font-semibold mb-2">Support</li>
            <li>Forums</li>
            <li>Documentation</li>
            <li>Terms</li>
            <li>Community</li>
        </ul>
    </footer>
</section>
@endsection