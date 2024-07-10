@props(['href' => '/','active'=> false])
@php
  $bg = 'bg-custom-vlgray border-r-2 border-custom-blue';
@endphp
<a href={{$href}}>
  <li class="hover:bg-custom-vlgray hover:border-r-2 rounded-xl rounded-tr-none rounded-br-none cursor-pointer  py-5 pl-6 {{ $active ? $bg : '' }}  my-1">

    <div>
      {{$headings}}
      <span class="">{{$slot}}</span>
    </div>

  </li>
</a>