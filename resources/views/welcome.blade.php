<x-custom.layout>
    <x-custom.section>
        <div class="flex flex-col h-screen items-center bg-no-repeat " style="background-image: url('{{ url('images/wave.png') }}');">
        <!-- Landing page         -->
        <div class="flex md:flex-row flex-col justify-start items-center h-screen" id="hero-section">
            <div id="hero-text" class=" flex items-center pt-36 md:pt-0">
            <div>
                <h1 class="text-6xl font-bold w-11/12 ">Break Free <span class=" text-blue-700">from</span>  Depression </h1>
    
                <p class="my-6 w-10/12 font-robotoCondensed">Take a step towards brighter days with Health-Guard by your side. Together, let's embark on a journey of self-discovery and resilience.
                </p>
               
                    <span class="">
                    @auth
                    @if( Auth::user()->hasRole('student'))
                        <a href="{{ route('login') }}">
                            <button type="submit" class="px-7 py-3 hover:outline hover:outline-1 hover:outline-blackhover:text-black  bg-custom-blue 
                            text-white rounded-full hover:shadow-lg 
                            hover:bg-transparent hover:text-black hover:px-10 transition-all duration-500 ease-in-out mt-3 md:mt-0 sm:mt-3 w-80">Go To Dashboard</button>
                        </a>
                    @elseif(Auth::user()->hasRole('health_professional'))
                        <div class="flex items-center ">
                            <p class="text-xs ml-4 font-robotoCondensed font-bold  w-40">You need to log out and create a student account.</p>
                            <form action="{{route('logout')}}" method="post">
                                @method('post')
                                @csrf
                                <a href="{{ route('logout') }}">
                                    <button type="submit" class="px-7 py-3 outline outline-1 outline-white  bg-custom-blue 
                                    text-white rounded-full hover:shadow-lg hover:px-10 transition-all duration-500 ease-in-out mt-3 md:mt-0 sm:mt-3">Log out</button>
                                </a>
                            </form>
                        </div>
                    @elseif(!Auth::user()->hasRole('health_professional'))
                    @endauth
                    @else
                        <x-custom.secondary-button :href="route('login')">
                            Log In
                        </x-custom.secondary-button>
                        <x-custom.tertiary-button :href="route('register')">sign up
                        </x-custom.tertiary-button>
                    @endif
                   
                    </span>
    
                    <p class="pt-5 ml-4 font-robotoCondensed "> &#183; Opportunities await here</p>
               
            </div>
    
            </div>
            <div id="hero-image bg-green" class="bg-green md:w-3/4  ">
                <img src="{{ asset('images/file.png')}}" alt="" class="w-full " id="hero-image" >
            </div>
        </div>
    
                <!-- numbers -->
            <ul id="data" class="flex md:flex-row flex-col justify-around p-3 py-10 mt-5 sm:-mt-10 rounded-lg bg-slate-200 dark:bg-transparent ">
                <li class=" p-3 px-10 border-r-2 border-slate-700 text-black"> <div><strong class="text-3xl text-black "><span id="js-finish">4500</span>+</strong ><p class="text-black font-robotoCondensed">Finish Candidates</p></div></li>
                <li class=" p-3 px-10 border-r-2 border-slate-700 "> <div><strong class="text-3xl p"><span id="js-year">9</span>+</strong><p class="font-robotoCondensed">Years of Experience</p></div></li>
                <li class=" p-3 px-10 border-r-2 border-slate-700 "> <div><strong class="text-3xl p"><span id="js-excellence">350</span>+</strong><p class="font-robotoCondensed" >Excellence Awards</p></div></li>
                <li class=" p-3 px-10 border-r-2 border-slate-700 "> <div><strong class="text-3xl p"><span id="js-brand">40</span>+</strong><p class="font-robotoCondensed">Brand Partners</p></div></li>
            </ul>
            
            <script>
                const numFinish = document.querySelector('#js-finish');
                const numYear = document.querySelector('#js-year');
                const numExcellence = document.querySelector('#js-excellence');
                const numBrand = document.querySelector('#js-brand');
    
                // Function to update numeric values gradually
                function changeNums() {
                    let number1 = 1;
                    let number2 = 1;
                    let number3 = 1;
                    let number4 = 1;
                    let finishNum = 500;
                    let yearsNum = 9;
                    let excellenceNum = 350;
                    let brandNum = 40;
    
                    // Interval functions to update each numeric value
                    let id1 = setInterval(() => {
                        numFinish.innerHTML = `${number1}`;
                        if (number1 >= finishNum) {
                            clearInterval(id1);
                        } else {
                            number1++;
                        }
                    }, -2);
    
                    let id2 = setInterval(() => {
                        numYear.innerHTML = `${number2}`;
                        if (number2 >= yearsNum) {
                            clearInterval(id2);
                        } else {
                            number2++;
                        }
                    }, 200);
    
                    let id3 = setInterval(() => {
                        numExcellence.innerHTML = `${number3}`;
                        if (number3 >= excellenceNum) {
                            clearInterval(id3);
                        } else {
                            number3++;
                        }
                    }, 3);
    
                    let id4 = setInterval(() => {
                        numBrand.innerHTML = `${number4}`;
                        if (number4 >= brandNum) {
                            clearInterval(id4);
                        } else {
                            number4++;
                        }
                    }, 50);
                }
    
                // Call the function to start updating numeric values
                changeNums();
            </script>
        </div>
    
        <div class="flex md:flex-row flex-col justify-start items-center show hero-section" id="hero-section">
            <div id="hero-image" class="bg-green md:w-3/4  ">
                <img src="{{ asset('images/Helping a partner.gif')}}" alt="" class="w-full " id="hero-image" >
            </div>
    
            <div id="hero-text" class=" flex items-center pt-36 md:pt-0">
            <div>
                <h1 class="text-6xl font-bold w-11/12 ">We're here to lift you up </h1>
                <p class="my-6 w-10/12 font-robotoCondensed">With its roots firmly grounded in psychology, Health-Guard seamlessly blends technology and human understanding to provide holistic support for mental well-being
                </p>
    
                    <span class="">
                        <x-custom.secondary-button href="/pychologists">
                            See our Pyschologists
                        </x-custom.secondary-button>
                        @auth

                        <x-custom.tertiary-button :href="'/chatify/'.Auth::user()->id">Chat with friend
                        </x-custom.tertiary-button>
                        @else
                            <x-custom.tertiary-button :href="route('register')">Chat with friend
                            </x-custom.tertiary-button>
                        @endauth
                    </span>
    
                    <p class="pt-5 ml-4 font-robotoCondensed "> &#183; Meet our pychologists</p>
           
            </div>
            </div>
        </div>
    
        <div class="flex md:flex-row flex-col justify-start items-center show hero-section" id="hero-section">
            <div id="hero-image bg-green" class="bg-green md:w-3/4  ">
                <img src="{{ asset('images/Doctors-pana.png')}}" alt="" class="w-full " id="hero-image" >
            </div>
    
            <div id="hero-text" class=" flex items-center pt-36 md:pt-0">
                <div>
                    <h1 class="text-6xl font-bold w-11/12 ">Are you a health professional? </h1>
                    <p class="my-6 w-10/12 font-robotoCondensed">With its roots firmly grounded in psychology, Health-Guard seamlessly blends technology and human understanding to provide holistic support for mental well-being
                    </p>
    
                        <span class="">
                        @auth
                        @if(Auth::user()->hasRole('health_professional'))
                            <a href="{{ route('login') }}">
                                <button type="submit" class="px-7 py-3 hover:outline hover:outline-1 hover:outline-blackhover:text-black  bg-custom-blue 
                                text-white rounded-full hover:shadow-lg 
                                hover:bg-transparent hover:text-black hover:px-10 transition-all duration-500 ease-in-out mt-3 md:mt-0 sm:mt-3 w-80">Go To Dashboard</button>
                            </a>
                        @elseif(Auth::user()->hasRole('student'))
                            <div class="flex items-center ">
                                <p class="text-xs ml-4 font-robotoCondensed font-bold  w-40">You need to log out and create a student health.</p>
                                <form action="{{route('logout')}}">
                                    <a href="{{ route('logout') }}">
                                        <button type="submit" class="px-7 py-3 outline outline-1 outline-white  bg-custom-blue 
                                        text-white rounded-full hover:shadow-lg hover:px-10 transition-all duration-500 ease-in-out mt-3 md:mt-0 sm:mt-3">Log out</button>
                                    </a>
                                </form>
                            </div>
                        @endauth
                        @else

                            <x-custom.secondary-button :href="route('dashboard')">
                                Create professional account
                            </x-custom.secondary-button>
                            
                            @auth
                                <x-custom.tertiary-button :href="'/chatify/'.Auth::user()->id">Chat with another professionals
                                </x-custom.tertiary-button>
                            @endauth
    
                        @endif
                        
    
    
                        </span>
    
                        <p class="pt-5 ml-4 font-robotoCondensed "> &#183; Meet our pychologists</p>
            
                </div>
            </div>
        </div>
    <x-custom.footer />
    </x-custom.section>

    <script>
        const observer = new IntersectionObserver((entries)=>{
            entries.forEach((entry)=>{
                console.log(entry)
                if(entry.isIntersecting){
                    entry.target.classList.add('show')
                } else{
                    entry.target.classList.remove('show')
                }
            })
        })
    
        const hiddenElements = document.querySelectorAll('.hero-section')
        hiddenElements.forEach((el)=> observer.observe(el))
        console.log(hiddenElements)
    
    </script>

</x-custom.layout>


