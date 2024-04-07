<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 ">
            Profile Picture
        </h2>

        <p class="mt-1 text-sm text-gray-600 ">
            Update your profile picture.
        </p>
    </header>


    <form method="post" action="{{ route('profile.picture') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Profile picture')" />
            
            <div class="bg-cover bg-center h-full rounded-full overflow-hidden w-28 my-10 border border-black" style="width: 200px;">
                <img src="{{asset('storage/users-avatar/'.Auth::user()->avatar)}}" class="w-full  object-fill" alt="">
            </div>

            <x-input-label for="image" :value="__('Upload an Image')" />

            <input type="file" id="image" class="my-3" name="avatar">

            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div class="flex items-center gap-4">
            <button class="px-3 py-3 bg-custom-blue text-white font-bold rounded-md" type="submit">save</button>
        </div>
    </form>
</section>
