@extends('home.layout')
@section('content')
  <section class="bg-white rounded-2xl m-4 pt-0 mt-0 p-7 w-full ">
    @php
      $style = 'focus:outline-none border-b-2 border-blue-500 text-blue-700';
    @endphp
    <div class=" sticky top-0 z-10 pt-10 bg-white right-0 left-0 " >
      <div class="flex justify-between items-center">
        <h2 class="flex items-center gap-x-4 ml-5"><span class="font-bold text-4xl my-4 mb-6">Notifications</span></h2>

        <div class="flex gap-x-3">

          <!-- <div class=" py-2 px-3 bg-white outline outline-1 rounded-full outline-custom-lgray">
          <i class="fa-solid fa-magnifying-glass"></i>
          </div> -->

          <div class="w-10 h-10 rounded-full overflow-hidden">
              <a href="{{route('profile.edit')}}">
                <img src="{{asset('storage/users-avatar/'.Auth::user()->avatar)}}" alt="">
                </a>
          </div>
        </div>
      </div>

      <div class="container mx-auto text-center py-4">
        <button class="mx-2 pb-3 hover:text-blue-700 focus:outline-none {{ Request::is('notifications') ? $style : '' }}">All recently added</button>
        <button class="mx-2 pb-3  hover:text-blue-700 ">From Health-Guard</button>
        <button class="mx-2 pb-3 text-gray-500 hover:text-blue-700 focus:outline-none">New podcasts</button>
        <button class="mx-2 pb-3 text-gray-500 hover:text-blue-700 focus:outline-none">Students</button>
        <button class="mx-2 pb-3 text-gray-500 hover:text-blue-700 focus:outline-none">Pyschologists</button>
        <hr class="w-full h-1 mt-1" />
      </div>
    </div>
    @php
    
    @endphp

    <div class="flex flex-col gap-y-3 mt-4 ">
      @foreach ($notificationSend as $notifySend)
        @php
            $receiverUser = App\Models\User::findOrFail($notifySend->receiver_id);
            $createdAt = $notifySend->created_at->diffForHumans();
        @endphp
        <!-- Display information about $receiverUser or use it as needed -->
        <div class="bg-white p-4 rounded-lg shadow-lg max w-1/2 relative outline outline-1 outline-custom-lgray ml-12">
            <div class="flex items-center">
              <a href="health_professional/{{$receiverUser->id}}">
                <img src="{{asset('storage/users-avatar/'.$receiverUser->avatar)}}" alt="Profile Picture" class="w-12 h-12 rounded-full border-2 border-gray-300"/>
              </a>
              <div class="ml-4">
                <a href="/health_professional/{{$receiverUser->id}}">
                  <p class="text-gray-800 font-semibold">{{$receiverUser->name}}</p>
                </a>
                
              </div>
            </div>
            <p class="mt-2 ml-16 text-gray-800"><span>you</span> have invited {{$receiverUser->name}} for consultion,</p>

            <div class="absolute right-5 top-8 flex items-center flex-col">
              <span class="text-xs text-gray-500 mb-3">{{$createdAt}}</span>

                <form action="{{ route('notifications.destroy', ['notification' => $notifySend->id]) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button type="submit">
                      <span class="bg-green-500 text-white px-2 py-1 rounded-full text-xs mt-2">X</span>
                  </button>
              </form>
            </div>
        </div>
      @endforeach

      @foreach ($notificationReceive as $notifyReceive)
        @php
            $senderUser = App\Models\User::findOrFail($notifyReceive->sender_id);
            $createdAt = $notifyReceive->created_at->diffForHumans();
        @endphp
        <!-- Display information about $receiverUser or use it as needed -->
        <div class="bg-white p-4 rounded-lg shadow-lg max w-1/2 relative outline outline-1 outline-custom-lgray ml-12">
            <div class="flex items-center">
              <a href="student/{{$senderUser->id}}">
                <img src="{{asset('storage/users-avatar/'.$senderUser->avatar)}}" alt="Profile Picture" class="w-12 h-12 rounded-full border-2 border-gray-300"/>
              </a>
              <div class="ml-4">
                <a href="/student/{{$senderUser->id}}">
                  <p class="text-gray-800 font-semibold">{{$senderUser->name}}</p>
                </a>
                
              </div>
            </div>
            <p class="mt-2 ml-16 text-gray-800"><span>{{$senderUser->name}}</span> has invited you for consultion.</p>

            <div class="absolute right-5 top-8 flex items-center flex-col">
              <span class="text-xs text-gray-500 mb-3">{{$createdAt}}</span>

                <form action="{{ route('notifications.destroy', ['notification' => $notifyReceive->id]) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button type="submit">
                      <span class="bg-green-500 text-white px-2 py-1 rounded-full text-xs mt-2">X</span>
                  </button>
              </form>
            </div>
        </div>
      @endforeach

      

    </div>


  </section>
@endsection