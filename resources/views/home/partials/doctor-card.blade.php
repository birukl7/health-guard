@php
    if(Request::is('dashboard')){
        $pp = App\Models\User::where('id', $doctor->receiver_id)->first();
        $profile = $pp->healthProfessionalProfile;
    }else {
        $profile = $doctor->healthProfessionalProfile;
    }
@endphp

<div class="shadow- shadow-xl  rounded-xl p-2 px-5 relative" style="height: 460px;">
    <div class="flex items-start gap-x-6">

        <div>
            <div class="w-10 h-10 rounded-full overflow-hidden">
                @if(Request::is('dashboard'))
                    <img src="{{asset('storage/users-avatar/'.$pp->avatar)}}" alt="">
                @else
                    <img src="{{asset('storage/users-avatar/'.$doctor->avatar)}}" alt="">
                @endif
            </div>
            <div class=" text-white text-sm px-2 mt-4 rounded-full">
                <i class="fa-solid fa-star" style="color: #ffffff;font-size:12px"></i>
                <span style="font-size: 12px;"></span>
            </div>
        </div>

        <div class="flex flex-col">
            @if(Request::is('dashboard'))
                <a href="/health_professional/{{$profile->id}}"><strong class="text-xl">{{ $profile->first_name }} {{ $profile->last_name }}</strong></a>
            @else
                <a href="/health_professional/{{$profile->id}}"><strong class="text-xl">{{ $profile->first_name }} {{ $profile->last_name }}</strong></a>
            @endif
            <span class="text-custom-lgray my-1 mb-4">{{ $profile->email }}</span>
          
            <span class="te text-custom-gray mb-3"><i class="fa-solid fa-location-dot"></i> <span>{{$profile->location}}</span></span>
            <span class="text-sm text-custom-lgray"><span>{{$profile->years_of_experience}}</span>yrs of exp.</span>
            
            {{-- <span class="text-sm text-custom-lgray">1000<span>+</span> Contributions
            </span> --}}
        </div>


    </div>
    @php 
        $issues = $profile->tags;
    @endphp

    <div class="my-6 flex gap-x-3 flex-wrap gap-y-3">
        @foreach ($issues as $issue)
            
        <button class=" text-sm  bg-custom-graish py-1 px-4 rounded-full">{{$issue->name}}</button>
        @endforeach
    </div>
  

    <div class="flex justify-between mb-5 absolute bottom-2 right-5 left-5">
        <div class="flex flex-col">
            <span class="font-bold">Free</span>
            <span class="text-sm  text-custom-lgray">Online/Offline</span>
        </div>
        <a href="/health_professional/{{$profile->id}}">

            @if(Request::is('dashboard'))
                <div class="bg-custom-blue text-white text-sm rounded-full px-3 py-3">
                    See the Status
                </div>
            @else
                <div class="bg-custom-blue text-white text-sm rounded-full px-3 py-3">
                    Book Consultations
                </div>
            @endif
        </a>
    </div>
</div>