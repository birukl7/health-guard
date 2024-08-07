<x-custom.layout>
<x-custom.section>
    @php
        $user = Auth::user();
    @endphp
    <div class="flex justify-between items-center">

        <h2 class="flex items-center gap-x-4 ml-5"><span class="font-bold text-4xl my-4 mb-6">Dashboard For Health
                Professional</span></h2>

        <div class="flex gap-x-3">

            <div class=" py-2 px-3 bg-white outline outline-1 rounded-full outline-custom-lgray">
                <i class="fa-regular fa-bell"></i>
            </div>

            <div class="relative py-2 px-3 bg-white outline outline-1 rounded-full outline-custom-lgray">
                <i class="fa-regular fa-bell"></i>
                <div class="w-2 h-2 absolute bg-red-700 rounded-full top-0 right-0"></div>
            </div>

            <div class="w-10 h-10 rounded-full overflow-hidden">
                <a href="{{route('profile.edit')}}">
                <img src="{{asset('storage/users-avatar/'.Auth::user()->avatar)}}" alt="">
                </a>
            </div>
        </div>
    </div>

    <p class="px-8">Here the information about your activity.</p>

    @if ($user->healthProfessionalProfile)
    @else
    <div class="flex justify-between items-center px-5 pr-10 pt-16">

        <div class="flex items-center">
          <i class="fa-regular fa-bell fa-shake text-3xl"></i>
          <p class=" font-bold px-5 ">Finish up your account by creating necessary healthProfessional account informations.</p>
        </div>
    
        <a href="{{ route('professionals.create') }}" class="px-3 py-2 bg-custom-blue text-white font-bold rounded-md" >
          Finish Up
        </a>
      </div>
    @endif

    <section class="p-3 rounded-xl bg-custom-graish mt-10 flex sm:flex-row flex-col justify-start h-auto">
        <div class="sm:w-custom-4  rounded-xl overflow-hidden">
            <img src="{{asset('images/zachary-nelson.jpg')}}" alt="">
        </div>
        <div class="flex flex-col sm:py-20 sm:px-28 p-7">
            <p class="font-semibold">Do you know blogging is a feature allowed for only health professionals?</p>
        </div>
    </section>


    @if(isset($user->healthProfessionalProfile))
        <div class="pt-8 md:pt-0 md:w-full js-main-container bg-white ">
            <div class="bg-gray-100">
                <div class="container mx-auto py-8">
                    <div class="grid grid-cols-4 sm:grid-cols-12 gap-6 px-4">
                        
                        <div class="col-span-4 sm:col-span-4">

                            <div class="bg-white shadow rounded-lg p-6">

                                <div class="flex flex-col items-center">
                                    <img src="{{asset('storage/users-avatar/'.$user->avatar)}}"
                                        class="w-32 h-32 bg-gray-300 rounded-full mb-4 shrink-0">

                                    </img>
                                    <h1 class="text-xl font-bold">           {{$user->healthProfessionalProfile->first_name}} {{$user->healthProfessionalProfile->last_name}}
                                    </h1>
                                    <p class="text-gray-700">{{$user->healthProfessionalProfile->specialization}}</p>

                                    <span class="te text-custom-gray mb-3"><i class="fa-solid fa-location-dot"></i>
                                        <span>{{$user->healthProfessionalProfile->location}}</span>
                                    </span>
                                    <span class="text-sm text-custom-lgray">works at</span>
                                    <span class="te text-custom-gray mb-3">
                                        <span>{{$user->healthProfessionalProfile->hospital_affiliation}}</span>
                                    </span>

                                    <span class="text-sm text-custom-lgray"><span>{{$user->healthProfessionalProfile->years_of_experience}} &nbsp;</span>yrs of exp.</span>
                                    {{-- <span class="text-sm text-custom-lgray">1<span>+</span> Contributions
                                    </span> --}}
                                    <div class="mt-6 flex flex-wrap gap-4 justify-center">
                                        <a href="mailto:{{$user->email}}" target="_blank"
                                            class="bg-custom-blue hover:bg-blue-400 text-white  py-2 px-4 rounded"><span><i class="fa-regular fa-envelope mr-2"></i></span>{{
                                            $user->email}}</a>
                                        <a href="tel:{{$user->healthProfessionalProfile->phone_number}}"
                                            class="bg-gray-300 hover:bg-gray-400 text-gray-700 py-2 px-4 rounded"><span><i class="fa-solid fa-phone mr-2"></i></span>+251-{{$user->healthProfessionalProfile->phone_number}}
                                        </a>
                                    </div>

                                </div>
                                <hr class="my-6 border-t border-gray-300">
                            </div>
                        </div>

                        @php 
                            $issues = $user->healthProfessionalProfile->tags;
                        @endphp

                        <div class="col-span-4 sm:col-span-8">
                            <div class="bg-white shadow rounded-lg p-6">
                                <div class="flex justify-between">
                                    <h2 class="text-xl font-bold mb-4">About Me</h2>
                                    <a href="/professionals/create"><i class="fa-regular fa-pen-to-square mr-2"></i>Edit</a>
                                </div>
                                    
                                <p class="text-gray-700"> {{$user->healthProfessionalProfile->about}}</p>

                                <h2 class="text-xl font-bold my-3">Issues to consult</h2>
                                    <div class="flex flex-wrap gap-x-5 gap-y-3 py-2">
                                        @if($issues)
                                            @foreach($issues as $issue)
                                            <button class="bg-custom-vlgray p-2 rounded-full text-custom-mgray px-4 cursor-not-allowed">
                                                {{$issue->name}}
                                            </button>
                                            @endforeach
                                        @else
                                            <p>This health Professional hasn't posted any issues.</p>
                                        @endif
                                    </div>


                                <h3 class="font-semibold text-center mt-3 -mb-2">
                                    Find me on
                                </h3>
                                <div class="flex justify-center items-center gap-6 my-6">
                                    @if($user->healthProfessionalProfile->linkedin)
                                        <a class="text-custom-blue hover:text-orange-600"
                                            aria-label="Visit TrendyMinds LinkedIn" href="{{$user->healthProfessionalProfile->linkedin}}" target="_blank">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="h-6">
                                                <path fill="currentColor"
                                                    d="M100.28 448H7.4V148.9h92.88zM53.79 108.1C24.09 108.1 0 83.5 0 53.8a53.79 53.79 0 0 1 107.58 0c0 29.7-24.1 54.3-53.79 54.3zM447.9 448h-92.68V302.4c0-34.7-.7-79.2-48.29-79.2-48.29 0-55.69 37.7-55.69 76.7V448h-92.78V148.9h89.08v40.8h1.3c12.4-23.5 42.69-48.3 87.88-48.3 94 0 111.28 61.9 111.28 142.3V448z">
                                                </path>
                                            </svg>
                                        </a>
                                    @endif
                                    @if($user->healthProfessionalProfile->youtube)
                                        <a class="text-custom-blue hover:text-orange-600"
                                            aria-label="Visit TrendyMinds YouTube" href="{{$user->healthProfessionalProfile->youtube ?: ''}}" target="_blank">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="h-6">
                                                <path fill="currentColor"
                                                    d="M549.655 124.083c-6.281-23.65-24.787-42.276-48.284-48.597C458.781 64 288 64 288 64S117.22 64 74.629 75.486c-23.497 6.322-42.003 24.947-48.284 48.597-11.412 42.867-11.412 132.305-11.412 132.305s0 89.438 11.412 132.305c6.281 23.65 24.787 41.5 48.284 47.821C117.22 448 288 448 288 448s170.78 0 213.371-11.486c23.497-6.321 42.003-24.171 48.284-47.821 11.412-42.867 11.412-132.305 11.412-132.305s0-89.438-11.412-132.305zm-317.51 213.508V175.185l142.739 81.205-142.739 81.201z">
                                                </path>
                                            </svg>
                                        </a>
                                    @endif
                                    @if($user->healthProfessionalProfile->facebook)
                                        <a class="text-custom-blue hover:text-orange-600"
                                            aria-label="Visit TrendyMinds Facebook" href="{{$user->healthProfessionalProfile->facebook}}" target="_blank">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="h-6">
                                                <path fill="currentColor"
                                                    d="m279.14 288 14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z">
                                                </path>
                                            </svg>
                                        </a>
                                    @endif
                                    @if($user->healthProfessionalProfile->instagram)
                                        <a class="text-custom-blue hover:text-orange-600"
                                            aria-label="Visit TrendyMinds Instagram" href="{{$user->healthProfessionalProfile->instagram}}" target="_blank">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="h-6">
                                                <path fill="currentColor"
                                                    d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z">
                                                </path>
                                            </svg>
                                        </a>
                                    @endif
                                    @if($user->healthProfessionalProfile->twitter)
                                        <a class="text-custom-blue hover:text-orange-600"
                                            aria-label="Visit TrendyMinds Twitter" href="{{$user->healthProfessionalProfile->twitter}}" target="_blank">
                                            <svg class="h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                <path fill="currentColor"
                                                    d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z">
                                                </path>
                                            </svg>
                                        </a>
                                    @endif
                                </div>

                                <h2 class="text-xl font-bold mt-6 mb-4">Description</h2>
                                <div>
                                    @if($user->healthProfessionalProfile->description)
                                    <p class="text-gray-700"> {{$user->healthProfessionalProfile->description}}</p>
                                    @else
                                        <p>This health Professional hasn't add a Description.</p>
                                    @endif


                                </div>

                                <x-custom.h2-heading>
                                    Experience
                                </x-custom.h2-heading>
                                <div>
                                    @if(isset($user->experiences) && count($user->experiences)>0)
                                        @foreach($user->experiences as $experience)
                                        <div class="mb-6">
                                            <div class="flex justify-between flex-wrap gap-2 w-full">
                                                <span class="text-gray-700 font-bold">{{$experience->title}}</span>
                                                <p>  
                                                    <span class="text-gray-700">{{\Carbon\Carbon::parse($experience->start_date)->format('M Y')}} - {{\Carbon\Carbon::parse($experience->end_date)->format('M Y')}}</span>
                                                    <a href="/experiences/{{$experience->id}}/edit" class="bg-custom-vlgray p-2 rounded-full text-custom-mgray px-4 ml-3">
                                                        Edit
                                                    </a>
                                                </p>
                                            </div>
                                            <p class="mt-2 mx-10">
                                            {{$experience->description}} 
                                            </p>
                                        </div>
                                        @endforeach
                                        
                                    @else
                                        <p class="mb-3">You haven't posted any experiences.</p>
                                    @endif

                                    @can('edit-experience', $user->healthProfessionalProfile)
                                        <x-custom.secondary-button href="/experiences/create"
                                            >Add Experience
                                        </x-custom.secondary-button>
                                    @endcan
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <x-custom.h2-heading>
            Blogs You Wrote
        </x-custom.h2-heading>
        @if (isset(Auth::user()->healthProfessionalProfile->posts) && count(Auth::user()->healthProfessionalProfile->posts)> 0)
        <div class="grid sm:grid-cols-2 grid-cols-1 ms:grid-cols-3 gap-x-3">
            @foreach (Auth::user()->healthProfessionalProfile->posts as $blog)
                <div class="bg-white p-6 rounded-xl shadow-xl my-5 relative">
                    <div class="rounded-lg overflow-hidden w-80 h-44 bg-cover bg-center bg-no-repeat relative"
                        style="background-image: url('{{asset('storage/post-image/'.$blog->image)}}');">
                        {{-- @if(isset($blog->postTags))
                            @foreach ($blog->postTags as $tag)
                                <span class="text-sm bg-white p-2 rounded-lg absolute bottom-0 left-0 m-1">{{$tag->name}}</span>
                            @endforeach
                        @endif --}}

                    </div>

                    <div class="text-custom-lgray my-4" style="font-size: 13px;">
                        <i class="fa-regular fa-clock mx-2"></i>
                        <span class="mr-1">{{$blog->duration}}</span><span>mins-read</span>
                    </div>

                    <a href="/posts/{{$blog->id}}">
                        <h3 class="font-bold my-3 ">
                        {{$blog->title}}
                        </h3>
                    </a>

                    <p class="text-custom-lgray line-clamp-3">
                        {{$blog->description}}
                    </p>

                    <div class="flex items-center gap-x-4 p-4 ">
                        <div class="w-10 h-10 rounded-full overflow-hidden">
                        <img src="{{asset('storage/users-avatar/'.$blog->healthProfessionalProfile->user->avatar)}}" alt="">
                        </div>
                        <div class="flex flex-col">
                        <strong>{{$blog->healthProfessionalProfile->first_name}}</strong>
                        {{-- <span class="text-custom-lgray text-sm">{{$created}}</span> --}}
                        </div>
                    </div>

                    {{-- <div>
                        <a class="bg-custom-vlgray p-2 rounded-full text-custom-mgray px-4 absolute top-3 right-3" href="/posts/{{$blog->id}}/edit">Edit</a>
                    </div> --}}
                </div>
            @endforeach
        </div>
        <x-custom.quaternary-button href="/posts/create">
            Add Blog
        </x-custom.quaternary-button>

        @else
            <p class="mb-5"> You haven't posted any Blog.</p>
            <x-custom.quaternary-button href="/posts/create">
                Add Blog
            </x-custom.quaternary-button>
        @endif
    @else 
        {{-- <div>
            <p class="text-center">Finish Health-Professional Account.</p>
            <x-custom.button>Finish</x-custom.button>
        </div> --}}
    @endif

    <script src="{{asset('script/navBar.js')}}"></script>
</x-custom.section>
</x-custom.layout>