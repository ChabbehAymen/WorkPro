<nav class="shadow-md overflow-hidden py-6 px-3.5 flex flex-col gap-4 z-10">
    <div class="flex items-center gap-3 user-profile-div">
        <div class="nav-profile-img w-8 h-8" @if (auth()->user()->profile_img === 'unset')
                    style="background-image: url({{asset('asset/imags/profile-img.png')}})"
                    @else style="background-image: url({{asset(auth()->user()->profile_img)}})"
                    @endif></div>
        <h1 class="text-md user-name w-full">{{auth()->user()->user_name}}</h1>
    </div>
    <div class="">
        <a class="flex gap-2 items-center mb-1 cursor-pointer" href="{{route('home')}}">
            <div class="h-4 w-1.5 rounded-2xl bg-black opacity-0"></div>
            <img width="20" height="20" src="https://img.icons8.com/material-two-tone/24/home--v2.png" alt="home--v2" class="opacity-70" />
            <span>Home</span>
        </a>
        <a class="flex ml-4 gap-2 " href="{{route('profile')}}">
            <img width="20" height="20"  src="{{asset('asset/imags/IdentificationCard.svg')}}">
            <div class="@if($selectedID === 0) bg-gray-100 @endif flex gap-2 mb-1 pr-3 rounded-lg items-center" >
                <div class="h-4 w-1.5 rounded-2xl bg-black " @if($selectedID !== 0) hidden @endif ></div>
                <span>Account</span>
            </div>
        </a>
    </div>

    <div>
        <p class="text-gray-400">My Projects</p>
        <div class="">
            @foreach($projects as $project)
            <a class="flex gap-2 mb-1 @if($selectedID === $project->id) bg-gray-100 @endif rounded-lg items-center" href="{{route('main', ['id'=>$project->id])}}">
                <div class="h-4 w-1.5 rounded-2xl bg-black @if($selectedID !== $project->id) opacity-0 @endif"></div>
                <span>{{$project->title}}</span>
            </a>
            @endforeach
        </div>
    </div>

    <div>
        @if(sizeof($collabs) > 0)
        <p class="text-gray-400">Sheared With Me</p>
        <div class="">
            @foreach($collabs as $project)
            <a class="flex gap-2 mb-1 @if($selectedID === $project->id) bg-gray-100 @endif rounded-lg items-center" href="{{route('main', ['id'=>$project->id])}}">
                <div class="h-4 w-1.5 rounded-2xl bg-black opacity-0"></div>
                <span>{{$project->title}}</span>
            </a>
            @endforeach
        </div>

        @endif
    </div>
    <div class="flex gap-2 mb-1 pl-3 items-center rounded-lg no-underline text-black absolute bottom-5 w-40 ">
        <img width="20" height="20" src="https://img.icons8.com/material-two-tone/24/logout-rounded-left.png" alt="logout-rounded-left" class="opacity-80" />
        <a type="submit" href="{{ route('logout') }}">Logout</a>
    </div>    
</nav>