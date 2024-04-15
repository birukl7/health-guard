@extends('home.layout')
@section('content')
<section class="bg-white flex flex-col rounded-2xl m-4 pt-10 p-7 w-full">
    @php
    $user = Auth::user();
    $text_color = 'text-custom-blue';
    @endphp

    <div>
        <div class="flex justify-between items-center  px-8">
            <!-- <p><a href="/dashboard" class="hover:text-custom-blue underline {{ Request::is('dashboard*') ? $text_color : '' }}">Dashboard</a>
            <span class="px-3">&gt;</span>
            <a href="/students/create" class="hover:text-custom-blue underline {{ Request::is('students*') ? $text_color : '' }}">Student</a></p>
            <a class="bg-custom-blue text-white hover:bg-transparent hover:text-black hover:outline hover:outline-1 transition-all duration-300 ease-in-out px-6 py-2 rounded-full flex justify-start  items-center gap-x-4 w-40" href="/dashboard">&lt;<span>Go Back</span></a> -->
            <h2 class="flex items-center ml-5"><span class="font-bold text-3xl">Profile</span></h2>
        </div>


        <div class="py-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <!-- @if($user->healthProfessionalProfile)
                <p> $user->healthProfessionalProfile->age</p>
                <p> $user->healthProfessionalProfile->date_of_birth</p>
                <p> $user->healthProfessionalProfile->description </p>
                <p> $user->healthProfessionalProfile->about</p>
                @else
                @endif -->

                @if(!$user->studentProfile)
                <div class="flex justify-between items-center px-5 pr-10 pt-16 shadow-xl pb-10">

                    <div class="flex items-center">
                        <i class="fa-regular fa-bell fa-shake text-3xl"></i>
                        <p class=" font-bold px-5 ">Finish up your account by creating necessary student account
                            informations.</p>
                    </div>

                    <a href="/students/create#form-add" class="px-3 py-2 bg-custom-blue text-white font-bold rounded-md">
                        Finish Up
                    </a>
                </div>
                @endif
                
            </div>
        </div>

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
                        <button
                            class="bg-custom-blue hover:bg-transparent hover:text-black hover:outline hover:outline-1 transition-all duration-200 ease-in-out text-white w-40 p-3 text-sm rounded-full mt-5"><span>Depression</span>
                            &gt;</button>
                    </a>
                    @endif
                    @if(!$user->alcoholUseTracker)
                    <a href="{{route('alcohols.create')}}">
                        <button
                            class="bg-custom-blue hover:bg-transparent hover:text-black hover:outline hover:outline-1 transition-all duration-200 ease-in-out text-white w-40 p-3 text-sm rounded-full mt-5"><span>Alcholism</span>
                            &gt;</button>
                    </a>
                    @endif
                    @if(!$user->drugUseTracker)
                    <a href="{{route('drugs.create')}}">
                        <button
                            class="bg-custom-blue hover:bg-transparent hover:text-black hover:outline hover:outline-1 transition-all duration-200 ease-in-out text-white w-40 p-3 text-sm rounded-full mt-5"><span>Drug</span>
                            &gt;</button>
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
                        <button
                            class="bg-black hover:bg-transparent hover:text-black hover:outline hover:outline-1 transition-all duration-200 ease-in-out text-white w-40 p-3 text-sm rounded-xl mt-5"><span>Meditations</span>
                            &gt;</button>
                    </a>
                    <a href="{{route('posts.create')}}">
                        <button
                            class="bg-black hover:bg-transparent hover:text-black hover:outline hover:outline-1 transition-all duration-200 ease-in-out text-white w-40 p-3 text-sm rounded-xl mt-5"><span>Read
                                Blogs</span> &gt;</button>
                    </a>
                    <a href="{{ url()->previous() }}">
                        <button
                            class="bg-black hover:bg-transparent hover:text-black hover:outline hover:outline-1 transition-all duration-200 ease-in-out text-white w-40 p-3 text-sm rounded-xl mt-5"><span>Pycholigist</span>
                            &gt;</button>
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

                <div class="flex items-center js-icon">
                    <i class="fa-regular fa-folder text-3xl"></i>
                    <p class=" font-bold px-5 ">Edit profile you have created.</p>
                </div>

                <button class="px-3 py-2 bg-custom-blue text-white font-bold rounded-md js-show-update flex items-center gap-x-2">
                    <span>Edit Student Profile</span> <i class="fa-solid fa-angle-right"></i>
                </button>
            </div>

            <div class="max-w-xl h-0 overflow-hidden transition-all duration-200 ease-in-out " id="form-add">
                @include('students.partials.student-update-info')
            </div>
            <script>
                let isTogglede = false;
                const jsIcon = document.querySelector('.js-icon i');
                const cont = document.querySelector('#form-add');
                const angleIcon = document.querySelector('.js-show-update i')
                const topCont = document.querySelector('.js-show-update');
                topCont.addEventListener('click', ()=>{
                    cont.classList.toggle('h-0')
                    cont.classList.toggle('pt-10')
                    cont.classList.toggle('pl-10')
                    cont.classList.toggle('overflow-hidden')

                    if(!isTogglede){
                        jsIcon.classList.remove('fa-folder')
                        jsIcon.classList.add('fa-folder-open')
                        angleIcon.classList.remove('fa-angle-right')
                        angleIcon.classList.add('fa-angle-down')
                        isTogglede = !isToggled;
                    }else {
                        jsIcon.classList.add('fa-folder')
                        jsIcon.classList.remove('fa-folder-open')
                        angleIcon.classList.remove('fa-angle-down')
                        angleIcon.classList.add('fa-angle-right')
                        isTogglede = !isTogglede;
                    }
                
                })
            </script>
            @endif

            @if($user->depressionTracker)
            <div class="flex justify-between items-center px-5 pr-10 pt-16 shadow-xl pb-10 ">

                <div class="flex items-center js-icon-1">
                    <i class="fa-regular fa-folder text-3xl"></i>
                    <p class=" font-bold px-5 ">Edit depression assesment questions you have filed.</p>
                </div>

                <button class="px-3 py-2 bg-custom-blue text-white font-bold rounded-md js-show-update-1">
                    Edit Depression Questions
                </button>
            </div>

            <div class="max-w-xl h-0 overflow-hidden transition-all duration-200 ease-in-out" id="form-add-1">
                @include('depressions.partials.update-depression')
            </div>
            <script>
                let isTogglede1 = false;
                const jsIcon1 = document.querySelector('.js-icon-1 i');
                const cont1 = document.querySelector('#form-add-1');
                        const topCont1 = document.querySelector('.js-show-update-1');
                        topCont1.addEventListener('click', ()=>{
                            cont1.classList.toggle('h-0')
                            cont1.classList.toggle('overflow-hidden')
                            
                            cont1.classList.toggle('pt-10')
                            cont1.classList.toggle('pl-10')
                   
                            if(!isTogglede1){
                                jsIcon1.classList.remove('fa-folder')
                                jsIcon1.classList.add('fa-folder-open')
                                isTogglede1 = !isTogglede1;
                            }else {
                                
                                jsIcon1.classList.remove('fa-folder-open')
                                jsIcon1.classList.add('fa-folder')
                                isTogglede1 = !isTogglede1;
                            }
                        })
            </script>
            @endif
        </div>


        @if($user->alcoholUseTracker)
        <div class="flex justify-between items-center px-5 pr-10 pt-16 shadow-xl pb-10 mx-8">

            <div class="flex items-center js-icon-2">
                <i class="fa-regular fa-folder text-3xl"></i>
                <p class=" font-bold px-5 ">Edit alcoholism assesment questions you have filed.</p>
            </div>

            <button class="px-3 py-2 bg-custom-blue text-white font-bold rounded-md js-show-update-2">
                Edit Alcoholims Questions
            </button>
        </div>



        <div class="max-w-xl h-0 overflow-hidden transition-all duration-200 ease-in-out" id="form-add-2">
            @include('alcohols.partials.update-alcholism')
        </div>
        <script>
            let isTogglede2 = false;
            const jsIcon2 = document.querySelector('.js-icon-2 i');
            const cont2 = document.querySelector('#form-add-2');
            const topCont2 = document.querySelector('.js-show-update-2');
            topCont2.addEventListener('click', ()=>{
                cont2.classList.toggle('h-0')
                cont2.classList.toggle('overflow-hidden')
                
                cont2.classList.toggle('pt-10')
                cont2.classList.toggle('pl-10')
                    
                if(!isTogglede2){
                    jsIcon2.classList.remove('fa-folder')
                    jsIcon2.classList.add('fa-folder-open')
                    isTogglede2 = !isTogglede2;
                }else {
                    jsIcon2.classList.add('fa-folder')
                    jsIcon2.classList.remove('fa-folder-open')
                    isTogglede2 = !isTogglede2;
                }
            })
        </script>

        @endif

        @if($user->drugUseTracker)
        <div class="flex justify-between items-center px-5 pr-10 pt-16 shadow-xl pb-10 mx-8">

            <div class="flex items-center js-icon-3">
                <i class="fa-regular fa-folder text-3xl"></i>
                <p class=" font-bold px-5 ">Edit drug use assesment questions you have filed.</p>
            </div>

            <button class="px-3 py-2 bg-custom-blue text-white font-bold rounded-md js-show-update-3">
                Edit drug addiction Questions
            </button>
        </div>



        <div class="max-w-xl h-0 overflow-hidden transition-all duration-200 ease-in-out" id="form-add-3">
            @include('drugs.partials.update-drug-info')
        </div>
        <script>
            let isTogglede3 = false;
            const jsIcon3 = document.querySelector('.js-icon-3 i');
            const cont3 = document.querySelector('#form-add-3');
            const topCont3 = document.querySelector('.js-show-update-3');
            topCont3.addEventListener('click', ()=>{
                cont3.classList.toggle('h-0')
                cont3.classList.toggle('overflow-hidden')
                
                    cont3.classList.toggle('pt-10')
                    cont3.classList.toggle('pl-10')
                   
                if(!isTogglede3){
                    jsIcon3.classList.remove('fa-folder')
                    jsIcon3.classList.add('fa-folder-open')
                    isTogglede3 = !isTogglede3;
                }else {
                    jsIcon3.classList.add('fa-folder')
                    jsIcon3.classList.remove('fa-folder-open')
                    isTogglede3 = !isTogglede3;
                }
                
            })
        </script>

        @endif

        <section class="p-3 rounded-xl bg-custom-graish mt-10 flex justify-start h-auto">

            <div class="w-custom-4  rounded-xl overflow-hidden">
                <img src="{{asset('images/zachary-nelson.jpg')}}" alt="">
            </div>

            <div class="flex flex-col py-20 px-28">
                <p class="font-semibold">Learn university life psychology now and teach your friend always to be
                    happy!</p>
                <button class="bg-black text-white w-40 p-3 text-sm rounded-full mt-5"><span>Learn More</span>
                    &gt;</button>
            </div>
        </section>
    </div>
 
</section>
@endsection