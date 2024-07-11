@props(['href'=> '/'])

<a href="{{ $href }}">
  <button type="submit" class="px-7 py-3 hover:outline hover:outline-1 hover:outline-blackhover:text-black  bg-custom-blue 
  text-white rounded-full hover:shadow-lg 
  hover:bg-transparent hover:text-black hover:px-10 transition-all duration-500 ease-in-out mt-3 md:mt-0 sm:mt-3 w-80">{{$slot}}</button>
</a>