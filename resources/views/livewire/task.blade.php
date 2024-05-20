<div class="rounded-xl m-2 p-3 bg-white w-72" id="card">
    @if ($img != 'none')
    <img src="https://placehold.co/600x400/png" class="rounded-xl">
    @endif
    <h1 class="font-bold my-2">{{$title}}</h1>

    <p class="w-full text-gray-500 my-2">{{html_entity_decode($discreption)}}</p>
    <div class="my-2 flex items-center justify-between">
        <button class="bg-black text-white rounded-xl px-3 py-1">Details</button>
        <div class="flex h-max items center">
            {{-- @if () --}}
            <img src="{{asset('asset/imags/profile-img.png')}}" alt="" srcset="">
            <img src="{{asset('asset/imags/profile-img.png')}}" alt="" srcset="">
            {{-- @endif --}}
        </div>
    </div>
</div>
