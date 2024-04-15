@extends('home.layout')
@section('content')

<section class="bg-white rounded-2xl m-4 pt-10 p-7 w-full">
@php
  $basicPercent = 1;
  $relaxPercent = 1;
  $reliefPercent = 1;

  if(isset($depression)){
    $basicPercent = $depression->score;
  }

  if(isset($alcohol)){
    $relaxPercent = $alcohol->score;
  }

  if(isset($drug)){
    $reliefPercent = $drug->score; // changed to $drug
  }

  $basicDeg = (string) $basicPercent * (9/5);
  $basicDegValue = (string) $basicDeg . 'deg';

  $relaxDeg = (string) $relaxPercent * (9/5);
  $relaxDegValue = (string) $relaxDeg . 'deg';

  $reliefDeg = (string) $reliefPercent * (9/5);
  $reliefDegValue = (string) $reliefDeg . 'deg';
@endphp
  @php
    $user = Auth::user();
  @endphp
  <style>

    .circle-wrap {
      width: 150px;
      height: 150px;
      background: #fefcff;
      border-radius: 50%;
      border: 1px solid #cdcbd0;
    }

    .circle-wrap-tri {
      width: 150px;
      height: 150px;
      background: #fefcff;
      border-radius: 50%;
      border: 1px solid #cdcbd0;
    }

    .circle-wrap-bi {
      width: 150px;
      height: 150px;
      background: #fefcff;
      border-radius: 50%;
      border: 1px solid #cdcbd0;
    }

    .circle-wrap .circle .mask,
    .circle-wrap .circle .fill {
      width: 150px;
      height: 150px;
      position: absolute;
      border-radius: 50%;
    }

    .circle-wrap-tri .circle-tri .mask-tri,
    .circle-wrap-tri .circle-tri .fill-tri {
      width: 150px;
      height: 150px;
      position: absolute;
      border-radius: 50%;
    }

    .circle-wrap-bi .circle-bi .mask-bi,
    .circle-wrap-bi .circle-bi .fill-bi {
      width: 150px;
      height: 150px;
      position: absolute;
      border-radius: 50%;
    }

    .circle-wrap .circle .mask {
      clip: rect(0px, 150px, 150px, 75px);
    }

    .circle-wrap-tri .circle-tri .mask-tri {
      clip: rect(0px, 150px, 150px, 75px);
    }

    .circle-wrap-bi .circle-bi .mask-bi {
      clip: rect(0px, 150px, 150px, 75px);
    }

    .circle-wrap .inside-circle {
      width: 122px;
      height: 122px;
      border-radius: 50%;
      /* background: #d2eaf1; */
      line-height: 120px;
      text-align: center;
      margin-top: 14px;
      margin-left: 14px;
      color: black;
      position: absolute;
      z-index: 40;
      font-weight: 700;
      font-size: 1.5em;
    }

    .circle-wrap-tri .inside-circle-tri {
      width: 122px;
      height: 122px;
      border-radius: 50%;
      /* background: #d2eaf1; */
      line-height: 120px;
      text-align: center;
      margin-top: 14px;
      margin-left: 14px;
      color: black;
      position: absolute;
      z-index: 40;
      font-weight: 700;
      font-size: 1.5em;
    }

    .circle-wrap-bi .inside-circle-bi {
      width: 122px;
      height: 122px;
      border-radius: 50%;
      /* background: #d2eaf1; */
      line-height: 120px;
      text-align: center;
      margin-top: 14px;
      margin-left: 14px;
      color: black;
      position: absolute;
      z-index: 40;
      font-weight: 700;
      font-size: 1.5em;
    }

    /* color animation */

    /* 3rd progress bar */
    .mask .fill {
      clip: rect(0px, 75px, 150px, 0px);
      background-color: rgb(37, 197, 34);
    }

    .mask-tri .fill-tri {
      clip: rect(0px, 75px, 150px, 0px);
      background-color: rgb(256, 68, 68);
    }

    .mask-bi .fill-bi {
      clip: rect(0px, 75px, 150px, 0px);
      background-color: rgb(202, 138, 4);
    }

    .mask.full,
    .circle .fill {
      animation: fill ease-in-out 3s;
      transform: rotate({{$basicDegValue}});
    }

    .mask-tri.full-tri,
    .circle-tri .fill-tri {
      animation: fillt ease-in-out 3s;
      transform: rotate({{$relaxDegValue}});
    }

    .mask-bi.full-bi,
    .circle-bi .fill-bi {
      animation: fillb ease-in-out 3s;
      transform: rotate({{$reliefDegValue}});
    }

    @keyframes fill{
      0% {
        transform: rotate(0deg);
      }
      100% {
        transform: rotate({{$basicDegValue}});
      }
    }

    @keyframes fillt{
      0% {
        transform: rotate(0deg);
      }
      100% {
        transform: rotate({{$relaxDegValue}});
      }
    }

    @keyframes fillb{
      0% {
        transform: rotate(0deg);
      }
      100% {
        transform: rotate({{$reliefDegValue}});
      }
    }


</style>

    <form action="" method="">
      <div class="fixed backdrop-blur-3xl right-60 top-0 bottom-0  left-60 z-50 hidden">
        <div class=" h-full flex items-center justify-center w-3/4 mx-auto my-auto">
          <button class="border border-1 p-2 border-black rounded-full px-3 text-xl hover:bg-custom-blue hover:text-white hover:border-white transition-all duration-150 ease-in-out"><i class="fa-solid fa-arrow-left fa-beat"></i></button>
          <div class="w-custom-8 h-custom-9 items-center justify-center flex flex-row  ">
            <div class="my-8 w-custom-8 h-custom-9">
              <x-input-label for="question_1" :value="__('1. Do you feel that chewing chat or smoking cigarettes has contributed to persistent feelings of sadness or emptiness?')" />
              <label class="block mt-2">
                  <input type="radio" name="question_1" value="yes" class="mr-1" style="outline: none;">
                  Yes
              </label>
              <label class="block mt-2">
                  <input type="radio" name="question_1" value="no" class="mr-1" style="outline: none;">
                  No
              </label>
              <x-input-error :messages="$errors->get('question_1')" class="mt-2" />
            </div>
          </div>
          <button class="border border-1 p-2 border-black rounded-full px-3 text-xl hover:bg-custom-blue hover:text-white hover:border-white transition-all duration-150 ease-in-out"><i class="fa-solid fa-arrow-right fa-beat"></i></button>
        </div>
      </div>
    </form>


  <div class="flex justify-between items-center">

    <h2 class="flex items-center gap-x-4 ml-5"><span class="font-bold text-4xl my-4 mb-6">Dashboard For Student</span></h2>

    <div class="flex gap-x-3">

      <div class=" py-2 px-3 bg-white outline outline-1 rounded-full outline-custom-lgray">
      <i class="fa-solid fa-magnifying-glass"></i>
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

  <p class="px-8 text-custom-lgray">Here the information about your activity and mental condition.</p>

  @if($user->studentProfile)
  @else

  <div class="flex justify-between items-center px-5 pr-10 pt-16">

    <div class="flex items-center">
      <i class="fa-regular fa-bell fa-shake text-3xl"></i>
      <p class=" font-bold px-5 ">Finish up your account by creating necessary student account informations.</p>
    </div>

    <a href="{{ route('students.create') }}" class="px-3 py-2 bg-custom-blue text-white font-bold rounded-md" >
      Finish Up
    </a>
  </div>
  @endif

  
  <div class="flex space-x-4 py-10">
    <!-- Card 1 -->
    <div class="bg-white rounded-lg p-4 shadow-lg flex items-center space-x-8 w-full relative">
      <img src="{{asset('images/john-schnobrich.jpg')}}" alt="" class="w-12 h-12 rounded-full">
      <div>
        <h3 class="text-xl font-bold">Quizzes</h3>
        <p><span class="text-green-500"><i class="fa-regular fa-circle-up"></i>&nbsp;higher on </span><span class="text-black">34.69</span>%</p>
        <p class="text-sm">Since last month</p>
        <p class="text-xl font-bold absolute right-4 top-16">2</p>
      </div>
    </div>

    <!-- Card 2 -->
    <div class="bg-white rounded-lg p-4 shadow-lg flex items-center  space-x-8 w-full relative">
      <img src="{{asset('images/charlesdeluvio.jpg')}}" alt="" class="w-12 h-12 rounded-full">
      <div>
        <h3 class="text-xl font-bold">Articles Read</h3>
        <p><span class="text-red-500"><i class="fa-regular fa-circle-down"></i>&nbsp;Lower by </span><span class="text-black">15.69</span>%</p>
        <p class="text-sm">Since last month</p>
        <p class="text-xl font-bold absolute right-4 top-16">2</p>
      </div>
    </div>

    <div class="bg-white rounded-lg p-4 shadow-lg flex items-center space-x-8 w-full relative">
      <img src="{{asset('images/benjamin-child.jpg')}}" alt="" class="w-12 h-12 rounded-full">
      <div>
        <h3 class="text-xl font-bold">Meditaions</h3>
        <p><span class="text-red-500"><i class="fa-regular fa-circle-down"></i>&nbsp;Lower by </span><span class="text-black">15.69</span>%</p>
        <p class="text-sm">Since last month</p>
        <p class="text-xl font-bold absolute right-4 top-16">2</p>
      </div>
    </div>

    <!-- Add more cards as needed -->
  </div>

  <h1 class="font-bold p-3 text-2xl">Today's Status</h1>
  <div class=" flex justify-around gap-x-20 py-8">
    <!-- cards -->
    <div class="flex flex-col items-center gap-y-8 shadow-xl p-3 px-10 rounded-md">
      <span class="text-xl">Basics</span>
      <div class="circle-wrap bg-green-200">
        <div class="circle">
          <div class="mask full">
            <div class="fill"></div>
          </div>
          <div class="mask half">
            <div class="fill"></div>
          </div>
          <div class="inside-circle bg-green-200" id="first"><span>{{$basicPercent}}</span>% </div>
        </div>
      </div>
    </div>

        <!-- cards -->
    <div class="flex flex-col items-center gap-y-8 shadow-xl p-3 rounded-md">
      <p class="text-xl">Relaxation</p>
      <div class="circle-wrap-tri">
        <div class="circle-tri">
          <div class="mask-tri full-tri">
            <div class="fill-tri bg-red-500"></div>
          </div>
          <div class="mask-tri half-tri">
            <div class="fill-tri"></div>
          </div>
          <div class="inside-circle-tri bg-red-200">{{$relaxPercent}}% </div>
        </div>
      </div>
    </div>

    <div class="flex flex-col items-center gap-y-8 shadow-xl p-3 rounded-md">
      <p class="text-xl">Relief from anxiety</p>
      <div class="circle-wrap-bi">
        <div class="circle-bi">
          <div class="mask-bi full-bi">
            <div class="fill-bi"></div>
          </div>
          <div class="mask-bi half-bi">
            <div class="fill-bi bg-yellow-600"></div>
          </div>
          <div class="inside-circle-bi bg-yellow-200"> {{$reliefPercent}}% </div>
        </div>
      </div>
    </div>

    <div class="max-w-sm mx-auto bg-custom-vlgray rounded-xl shadow-md overflow-hidden">
      <div class="p-4">
        <div class="flex items-center justify-between">
          <h2 class="text-xl font-bold">Reminders</h2>
          <span class="bg-red-500 text-white rounded-full p-1 text-xs">+5</span>
        </div>
        <div class="mt-4 border-b pb-4">
          <p>Always take care of yourself</p>
          <span class="text-gray-500 text-sm">5 of 12 tasks complete</span>
        </div>
        <div class="mt-4">
          <p>Be brave!</p>
          <span class="text-gray-500 text-sm">5 of 12 tasks complete</span>
        </div>
      </div>
    </div>

  </div>


  <div class="flex md:flex-row flex-col justify-start items-center " id="hero-section">
      <div id="hero-text" class=" flex items-center pt-36 md:pt-0">
      <div>
          <h1 class="text-6xl font-bold w-11/12 ">Take quizzes </h1>
          <p class="my-6 w-10/12 font-robotoCondensed">
              Incorporating this practice into your weekly routine enables you to effectively monitor your progress and recognize any changes or improvements.
          </p>

              <span class="">
              @if(Auth::user()->studentProfile)
              <a href="{{route('depressions.create')}}">
                      <button type="submit" class="px-7 py-3 hover:outline hover:outline-1 hover:outline-blackhover:text-black  bg-black 
                      text-white rounded-full hover:shadow-lg 
                      hover:bg-transparent hover:text-black hover:px-10 transition-all duration-500 ease-in-out mt-3 md:mt-0 sm:mt-3 w-80">Take Quizzes</button>
                  </a>
              @else 
                <a href="{{route('students.create')}}">
                      <button type="submit" class="px-7 py-3 hover:outline hover:outline-1 hover:outline-blackhover:text-black  bg-black 
                      text-white rounded-full hover:shadow-lg 
                      hover:bg-transparent hover:text-black hover:px-10 transition-all duration-500 ease-in-out mt-3 md:mt-0 sm:mt-3 w-80">Take Quizzes</button>
                  </a>
              @endif
                  <a href="#">
                      <button type="submit" class="px-7 py-3 outline outline-1 outline-white  bg-custom-blue 
                      text-white rounded-full hover:shadow-lg hover:px-10 transition-all duration-500 ease-in-out mt-3 md:mt-0 sm:mt-3">More about Quizzes</button>
                  </a>
              </span>
      </div>
      </div>
      <div id="hero-image bg-green" class="bg-green md:w-3/4  ">
          <img src="{{ asset('images/Online test-pana.png')}}" alt="" class="w-full " id="hero-image" >
      </div>
  </div>

  <div class="flex md:flex-row flex-col justify-start items-center " id="hero-section">
      <div id="hero-image bg-green" class="bg-green md:w-3/4  ">
          <img src="{{ asset('images/Publish article-pana.png')}}" alt="" class="w-full " id="hero-image" >
      </div>

      <div id="hero-text" class=" flex items-center pt-36 md:pt-0 ml-10">
        <div>
            <h1 class="text-6xl font-bold w-11/12 ">Read Articles</h1>
            <p class="my-6 w-10/12 font-robotoCondensed">Regularly reading articles is key to enhancing comprehension and retention. Over time, this practice sharpens your cognitive skills and expands your knowledge base.
            </p>
            
                <span class="">
                <a href="{{route('posts.index')}}">
                        <button type="submit" class="px-7 py-3 hover:outline hover:outline-1 hover:outline-blackhover:text-black  bg-black 
                        text-white rounded-full hover:shadow-lg 
                        hover:bg-transparent hover:text-black hover:px-10 transition-all duration-500 ease-in-out mt-3 md:mt-0 sm:mt-3 w-80">Read Articles</button>
                    </a>
                    <a href="">
                        <button type="submit" class="px-7 py-3 outline outline-1 outline-white  bg-custom-blue 
                        text-white rounded-full hover:shadow-lg hover:px-10 transition-all duration-500 ease-in-out mt-3 md:mt-0 sm:mt-3">More about Artcles</button>
                    </a>
                </span>
          
        </div>

      </div>
  </div>

  <div class="flex md:flex-row flex-col justify-start items-center " id="hero-section">
      <div id="hero-text" class=" flex items-center pt-36 md:pt-0">
      <div>
          <h1 class="text-6xl font-bold w-11/12 ">Is Addiction Your Big Concern? </h1>
          <p class="my-6 w-10/12 font-robotoCondensed">
              We have deep assesmental questions that may help you out coping addiction. weather it be a drug, alcholol or any depressional addicitions, we are here for you.
          </p>

              <span class="  justify-around items-start">
                <div class=" flex flex-col gap-y-3 gap-x-2 flex-wrap mb-5">
                  
                  <a href="{{route('students.create')}}">
                      <button type="submit" class="px-7 py-3 hover:outline hover:outline-1 hover:outline-blackhover:text-black  bg-black 
                      text-white rounded-full hover:shadow-lg 
                      hover:bg-transparent hover:text-black hover:px-10 transition-all duration-500 ease-in-out mt-3 md:mt-0 sm:mt-3 w-80">Addictions</button>
                  </a>
                  <a href="{{route('alcohols.create')}}">
                      <button type="submit" class="px-7 py-3 hover:outline hover:outline-1 hover:outline-blackhover:text-black  bg-black 
                      text-white rounded-full hover:shadow-lg 
                      hover:bg-transparent hover:text-black hover:px-10 transition-all duration-500 ease-in-out mt-3 md:mt-0 sm:mt-3 w-80">Alcoholism</button>
                  </a>
                  <a href="{{route('drugs.create')}}">
                      <button type="submit" class="px-7 py-3 hover:outline hover:outline-1 hover:outline-blackhover:text-black  bg-black 
                      text-white rounded-full hover:shadow-lg 
                      hover:bg-transparent hover:text-black hover:px-10 transition-all duration-500 ease-in-out mt-3 md:mt-0 sm:mt-3 w-80">Drug</button>
                  </a>
                  <a href="{{route('depressions.create')}}">
                      <button type="submit" class="px-7 py-3 hover:outline hover:outline-1 hover:outline-blackhover:text-black  bg-black 
                      text-white rounded-full hover:shadow-lg 
                      hover:bg-transparent hover:text-black hover:px-10 transition-all duration-500 ease-in-out mt-3 md:mt-0 sm:mt-3 w-80">Depression</button>
                  </a>
                </div>

                <a href="#" class="">
                    <button type="submit" class="px-7 py-3 outline outline-1 outline-white  bg-custom-blue 
                    text-white rounded-full hover:shadow-lg hover:px-10 transition-all duration-500 ease-in-out  md:mt-0 sm:mt-20  mt-10">More about Addiction
                </a>
                
              </span>
      </div>
      </div>
      <div id="hero-image bg-green" class="bg-green md:w-3/4  ">
          <img src="{{ asset('images/Credit assesment-amico.png')}}" alt="" class="w-full " id="hero-image" >
      </div>
  </div>

  
  <section class="p-3 rounded-xl my-12 bg-custom-graish mt-10 flex justify-start h-auto">
    <div class="w-custom-4  rounded-xl overflow-hidden">
      <img src="{{asset('images/zachary-nelson.jpg')}}" alt="">
    </div>
    <div class="flex flex-col py-20 px-28">
      <p class="font-semibold">sometimes school will be tough to live. what's the matter</p>
      <button class="bg-black text-white w-40 p-3 text-sm rounded-full mt-5"><span>Learn More</span> &gt;</button>
    </div>
  </section>

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
  <script src="{{asset('script/navBar.js')}}"></script>
</section>
@endsection
