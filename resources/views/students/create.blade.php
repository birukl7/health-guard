@extends('home.layout')
@section('content')
<section class="bg-white rounded-2xl m-4 pt-10 p-7 w-full">
    @php
        $user = Auth::user();
        $text_color = 'text-custom-blue';
    @endphp
    <div class="flex justify-between items-center px-8">
        <p><a href="/dashboard" class="hover:text-custom-blue underline {{ Request::is('dashboard*') ? $text_color : '' }}">Dashboard</a><span class="px-3">&gt;</span><a href="/students/create" class="hover:text-custom-blue underline {{ Request::is('students*') ? $text_color : '' }}">Student</a></p>
        <a class="bg-custom-blue text-white hover:bg-transparent hover:text-black hover:outline hover:outline-1 transition-all duration-300 ease-in-out px-6 py-2 rounded-full flex justify-start  items-center gap-x-4 w-40" href="/dashboard">&lt;<span>Go Back</span></a>
    </div>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

        @if($user->studentProfile)
            <div class="p-4 sm:p-8 bg-white  shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('students.partials.student-info-from')
                </div>
            </div>
        @else
            <div class="p-4 sm:p-8 bg-white  shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('students.partials.student-update-info')
                </div>
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
                        @if(!$user->alcoholUserTracker)
                            <a href="">
                                <button class="bg-custom-blue hover:bg-transparent hover:text-black hover:outline hover:outline-1 transition-all duration-200 ease-in-out text-white w-40 p-3 text-sm rounded-full mt-5"><span>Alcholism</span> &gt;</button>
                            </a>
                        @endif
                        @if(!$user->drugUseTracker)
                            <a href="">
                                <button class="bg-custom-blue hover:bg-transparent hover:text-black hover:outline hover:outline-1 transition-all duration-200 ease-in-out text-white w-40 p-3 text-sm rounded-full mt-5"><span>Drug</span> &gt;</button>
                            </a>
                        @endif
                    </div>
  
                </div>
            </section>
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