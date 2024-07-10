@props(['href'=> '/'])

<a href="{{ $href }}">
  <button type="submit" class="px-7 py-3 outline outline-1 outline-white  bg-custom-blue 
  text-white rounded-full hover:shadow-lg hover:px-10 transition-all duration-500 ease-in-out mt-3 md:mt-0 sm:mt-3">{{$slot}}</button>
</a>