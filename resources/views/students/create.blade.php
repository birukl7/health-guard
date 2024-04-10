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


    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        @if($user->studentProfile)
         @else

            <div class="flex justify-between items-center px-5 pr-10 pt-16 shadow-xl pb-10">

                <div class="flex items-center">
                <i class="fa-regular fa-bell fa-shake text-3xl"></i>
                <p class=" font-bold px-5 ">Finish up your account by creating necessary student account informations.</p>
                </div>

                <a href="/students/create#form-add" class="px-3 py-2 bg-custom-blue text-white font-bold rounded-md" >
                Finish Up
                </a>
            </div>
        @endif
    
        @if(!$user->alcoholUseTracker || !$user->drugUseTracker || !$user->depressionTracker)
            <section class="p-3 rounded-xl bg-custom-graish mt-10 flex justify-start ">
                <div class="w-custom-4  rounded-xl h-full overflow-hidden">
                    <img src="{{asset('images/helena-lopes.jpg')}}" alt="">
                </div>
                <div class="flex flex-col py-20 px-28">
                    <p class="font-semibold">
                        what is your main concern right now?
                    </p>

                    <div class="flex flex-col"> 
                        @if(!$user->depressionTracker)
                            <a href="{{route('depressions.create')}}">
                                <button class="bg-custom-blue hover:bg-transparent hover:text-black hover:outline hover:outline-1 transition-all duration-200 ease-in-out text-white w-40 p-3 text-sm rounded-full mt-5"><span>Depression</span> &gt;</button>
                            </a>
                        @endif
                        <!-- <a href="{{route('depressions.update', ['depression' => Auth::user()->id])}}">
                                <button class="bg-custom-blue hover:bg-transparent hover:text-black hover:outline hover:outline-1 transition-all duration-200 ease-in-out text-white w-56 p-3 text-sm rounded-full mt-5"><span>Edit Depression questions</span> &gt;</button>
                            </a> -->

                       
                        @if(!$user->alcoholUseTracker)
                            <a href="{{route('alcohols.create')}}">
                                <button class="bg-custom-blue hover:bg-transparent hover:text-black hover:outline hover:outline-1 transition-all duration-200 ease-in-out text-white w-40 p-3 text-sm rounded-full mt-5"><span>Alcholism</span> &gt;</button>
                            </a>
                        @endif
                        @if(!$user->drugUseTracker)
                            <a href="{{route('drugs.create')}}">
                                <button class="bg-custom-blue hover:bg-transparent hover:text-black hover:outline hover:outline-1 transition-all duration-200 ease-in-out text-white w-40 p-3 text-sm rounded-full mt-5"><span>Drug</span> &gt;</button>
                            </a>
                        @endif
                    </div>
                </div>
            </section>
        @else
        <section class="p-3 rounded-xl bg-custom-graish mt-10 flex justify-start ">
                <div class="w-custom-4  rounded-xl h-full overflow-hidden">
                    <img src="{{asset('images/helena-lopes.jpg')}}" alt="">
                </div>
                <div class="flex flex-col py-20 px-28">
                    <p class="font-semibold">
                        Wanna do something?
                    </p>

                    <div class="flex flex-col"> 
                        <a href="{{route('depressions.create')}}">
                            <button class="bg-black hover:bg-transparent hover:text-black hover:outline hover:outline-1 transition-all duration-200 ease-in-out text-white w-40 p-3 text-sm rounded-xl mt-5"><span>Meditations</span> &gt;</button>
                        </a>
                        <a href="{{route('depressions.create')}}">
                            <button class="bg-black hover:bg-transparent hover:text-black hover:outline hover:outline-1 transition-all duration-200 ease-in-out text-white w-40 p-3 text-sm rounded-xl mt-5"><span>Read Blogs</span> &gt;</button>
                        </a>
                        <a href="{{route('depressions.create')}}">
                            <button class="bg-black hover:bg-transparent hover:text-black hover:outline hover:outline-1 transition-all duration-200 ease-in-out text-white w-40 p-3 text-sm rounded-xl mt-5"><span>Pycholigist</span> &gt;</button>
                        </a>
                    </div>
                </div>
            </section>
        @endif

        @if(!$user->studentProfile)
            <div class="p-4 sm:p-8 bg-white  shadow sm:rounded-lg pt-10 mt-28">
            <div class="flex justify-between items-center px-5 pr-10 pt-16 shadow-xl pb-10">

                <div class="max-w-xl" id="form-add">
                   @include('students.partials.student-info-from')
                </div>
            </div>
        @else
            <div class="flex justify-between items-center px-5 pr-10 pt-16 shadow-xl pb-10">

                <div class="flex items-center">
                <i class="fa-solid fa-folder-open text-3xl"></i>
                <p class=" font-bold px-5 ">Edit student profile you have created.</p>
                </div>

                <button class="px-3 py-2 bg-custom-blue text-white font-bold rounded-md js-show-update" >
                Edit Student Profile
                </button>
                </div>



                <div class="max-w-xl h-0 overflow-hidden transition-all duration-200 ease-in-out" id="form-add">
                   @include('students.partials.student-update-info')
                </div>
                <script>
                    const cont = document.querySelector('#form-add');
                    const topCont = document.querySelector('.js-show-update');
                    topCont.addEventListener('click', ()=>{
                        cont.classList.toggle('h-0')
                        cont.classList.toggle('overflow-hidden')
                        console.log('working...')
                    })
                </script>
        @endif

        @if($user->depressionTracker)
            <div class="flex justify-between items-center px-5 pr-10 pt-16 shadow-xl pb-10 ">

                <div class="flex items-center">
                <i class="fa-solid fa-folder text-3xl"></i>
                <p class=" font-bold px-5 ">Edit depression assesment questions you have filed.</p>
                </div>

                <button class="px-3 py-2 bg-custom-blue text-white font-bold rounded-md js-show-update-1" >
                Edit Depression Questions
                </button>
                </div>



                <div class="max-w-xl h-0 overflow-hidden transition-all duration-200 ease-in-out my-10 mx-10" id="form-add-1">
                @include('depressions.partials.update-depression')
                </div>
                <script>
                    const cont1 = document.querySelector('#form-add-1');
                    const topCont1 = document.querySelector('.js-show-update-1');
                    topCont1.addEventListener('click', ()=>{
                        cont1.classList.toggle('h-0')
                        cont1.classList.toggle('overflow-hidden')
                        console.log('working...')
                    })
                </script>
            @endif
        </div>
        

        @if($user->alcoholUseTracker)
            <div class="flex justify-between items-center px-5 pr-10 pt-16 shadow-xl pb-10 mx-8">

                <div class="flex items-center">
                <i class="fa-regular fa-bell fa-shake text-3xl"></i>
                <p class=" font-bold px-5 ">Edit alcoholism assesment questions you have filed.</p>
                </div>

                <button class="px-3 py-2 bg-custom-blue text-white font-bold rounded-md js-show-update-2" >
                Edit Alcoholims Questions
                </button>
            </div>



            <div class="max-w-xl h-0 overflow-hidden transition-all duration-200 ease-in-out my-10 mx-10" id="form-add-2">
                @include('alcohols.partials.update-alcholism')
            </div>
            <script>
                    const cont2 = document.querySelector('#form-add-2');
                    const topCont2 = document.querySelector('.js-show-update-2');
                    topCont2.addEventListener('click', ()=>{
                        cont2.classList.toggle('h-0')
                        cont2.classList.toggle('overflow-hidden')
                        console.log('working...')
                    })
            </script>
            
        @endif

        @if($user->drugUseTracker)
            <div class="flex justify-between items-center px-5 pr-10 pt-16 shadow-xl pb-10 mx-8">

                <div class="flex items-center">
                <i class="fa-regular fa-bell fa-shake text-3xl"></i>
                <p class=" font-bold px-5 ">Edit drug use assesment questions you have filed.</p>
                </div>

                <button class="px-3 py-2 bg-custom-blue text-white font-bold rounded-md js-show-update-3" >
                Edit drug addiction Questions
                </button>
            </div>



            <div class="max-w-xl h-0 overflow-hidden transition-all duration-200 ease-in-out my-10 mx-10" id="form-add-3">
                @include('drugs.partials.update-drug-info')
            </div>
            <script>
                    const cont3 = document.querySelector('#form-add-3');
                    const topCont3 = document.querySelector('.js-show-update-3');
                    topCont3.addEventListener('click', ()=>{
                        cont3.classList.toggle('h-0')
                        cont3.classList.toggle('overflow-hidden')
                        console.log('working...')
                    })
            </script>
            
        @endif
        
            <section class="p-3 rounded-xl bg-custom-graish mt-10 flex justify-start h-auto">
                <div class="w-custom-4  rounded-xl overflow-hidden">
                <img src="{{asset('images/zachary-nelson.jpg')}}" alt="">
                </div>
                <div class="flex flex-col py-20 px-28">
                <p class="font-semibold">Learn university life psychology now and teach your friend always to be happy!</p>
                <button class="bg-black text-white w-40 p-3 text-sm rounded-full mt-5"><span>Learn More</span> &gt;</button>
                </div>
            </section>
        </div>
    </div>

</section>
@endsection