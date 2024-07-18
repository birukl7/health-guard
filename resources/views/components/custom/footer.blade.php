<footer class="flex flex-col sm:flex-row mb-10 mt-20 gap-x-16">

  <ul class="sm:w-60 ">
      <a href="/">
          <h1 class="font-bold text-3xl sm:text-2xl text-custom-blue mb-4">Health-Guard</h1>
      </a>
      <p class="mb-2 ">No more time spending looking for study materials. All is here</p>
      <address>
          <div class="font-semibold">
              <a href="#">+251(34356856)</a>
              <a href="#">mobile@number.com</a>
          </div>
      </address>
  </ul>

  <ul class="sm:mx-16 mt-10 sm:mt-0">
      <li class="text-xl font-semibold mb-2">Quick Links</li>
      <div class="ml-5 sm:ml-0">
        <li><a href="/dashboard" class=" hover:underline">Dashboard</a></li>
        @auth
        @if(Auth::user()->hasRole('student'))
            <li><a href="{{route('students.create')}}" class=" hover:underline">Profile</a></li>
        @elseif(Auth::user()->hasRole('health_professional'))
            <li><a href="{{route('professionals.create')}}" class=" hover:underline">Profile</a></li>
        @endif
        @endauth
        
        <li><a href="{{route('posts.index')}}/posts" class=" hover:underline">Blog</a></li>
        <li><a href="{{route('profile.edit')}}" class=" hover:underline">Setting</a></li>
      </div>
  </ul>

  <ul class="mr-16 mt-10 sm:mt-0">
      <li class="text-xl font-semibold mb-2">Resources</li>
      <div class="ml-5 sm:ml-0">
        <li><a href="#" class="hover:underline"></a>Meditations</li>
        <li><a href="{{route('posts.index')}}/posts" class=" hover:underline">Blog</a></li>
        @auth
        <li><a href="/chatify/{{Auth::user()->id}}" class="hover:underline">Chats</a></li>
        @else
        @endauth
        <li class="hover:underline">FAQs</li>
      </div>
  </ul>

  <ul class="mt-5 sm:mt-0">
      <li class="text-xl font-semibold mb-2">Support</li>
      <div class="ml-5 sm:ml-0">
        <li>Forums</li>
        <li>Documentation</li>
        <li>Terms and Privacy</li>
        <li>Community</li>
      </div>
  </ul>


</footer>
<div class="text-xs text-center mt-5 text-gray-400">@copyright 2024 Health-Guard</div>