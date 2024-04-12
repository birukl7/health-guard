@extends('home.layout')
@section('content')
<section class="bg-white rounded-2xl m-4 pt-10 p-7 w-full">
  <section class="p-3 rounded-xl bg-custom-graish mt-10 flex justify-start h-auto">
    <div class="w-custom-4  rounded-xl overflow-hidden">
      <img src="{{asset('images/zachary.jpg')}}" alt="">
    </div>
    <div class="flex flex-col py-20 px-28">
      <p class="font-semibold">Learn university life psychology now and teach your friend always to be happy!</p>
      <button class="bg-black text-white w-40 p-3 text-sm rounded-full mt-5"><span>Learn More</span> &gt;</button>
    </div>
  </section>


@endsection