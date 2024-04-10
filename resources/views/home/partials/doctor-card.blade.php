<div class="shadow- shadow-xl  rounded-xl p-2 px-5">
    <div class="flex items-start gap-x-6">

        <div>
            <div class="w-10 h-10 rounded-full overflow-hidden">
                <img src="{{asset('images/michael-dam.jpg')}}" alt="">
            </div>
            <div class="bg-green-600 text-white text-sm px-2 mt-4 rounded-full">
                <i class="fa-solid fa-star" style="color: #ffffff;font-size:12px"></i>
                <span style="font-size: 12px;">5.0</span>
            </div>
        </div>

        <div class="flex flex-col">
            <a href="{{route('health_professional', ['id' => $doctor->id])}}"><strong class="text-xl">{{ $doctor->name }}</strong></a>
            <span class="text-custom-lgray my-1 mb-4">{{ $doctor->email }}</span>
            <span class="text-custom-lgray my-1 mb-4">Clinical phychologist</span>
            <span class="te text-custom-gray mb-3"><i class="fa-solid fa-location-dot"></i> <span>Asela,
                    Oromia</span></span>
            <span class="text-sm text-custom-lgray"><span>10</span>yrs of exp.</span>
            <span class="text-sm text-custom-lgray">1000<span>+</span> Contributions
            </span>
        </div>


    </div>

    <div class="my-6 flex gap-x-3 flex-wrap gap-y-3">
        <button class=" text-sm  bg-custom-graish py-1 px-4 rounded-full">Abuse</button>
        <button class=" text-sm bg- bg-custom-graish py-1 px-4 rounded-full">Depression</button>
        <button class=" text-sm bg- bg-custom-graish py-1 px-4 rounded-full">PTSD</button>
    </div>

    <div class="flex justify-between mb-5">
        <div class="flex flex-col">
            <span class="font-bold">Free</span>
            <span class="text-sm  text-custom-lgray">Online/Offline</span>
        </div>
        <div class="bg-custom-blue text-white text-sm rounded-full px-3 py-3">
            Book Consultation
        </div>
    </div>
</div>