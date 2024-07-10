@props(['href' =>'/'])

<a href="{{$href}}"
class="rounded-md px-3 py-2  bg-custom-blue text-white hover:outline hover:outline-1 hover:text-black hover:bg-transparent transition-all duration-150 ease-in-out">
 {{$slot}}
</a>