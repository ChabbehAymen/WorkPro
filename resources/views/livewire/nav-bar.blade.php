<nav class="shadow-md w-max overflow-hidden py-6 px-5 flex flex-column gap-4">
    <div class="flex items-center gap-3">
        <div class="profile-img" style="background-image: url({{asset('asset/imags/profile-img.png')}})"></div>
        <h1 class="text-md">{{auth()->user()->user_name}}</h1>
    </div>
    <div class="">
        <a class="flex gap-2 items-center mb-1 cursor-pointer" href="{{route('home')}}">
            <div class="h-4 w-1.5 rounded-2xl bg-black opacity-0"></div>
            <img width="20" height="20" src="https://img.icons8.com/material-two-tone/24/home--v2.png" alt="home--v2" class="opacity-70"/>
            <span>Home</span>
        </a>
        <div class="flex gap-2 items-center mb-1 cursor-pointer">
            <div class="h-4 w-1.5 rounded-2xl bg-black opacity-0"></div>
            <img src="{{asset('asset/imags/IdentificationCard.svg')}}">
            <span>Account</span>
        </div>
        <div class="flex gap-2 items-center cursor-pointer">
            <div class="h-4 w-1.5 rounded-2xl bg-black opacity-0"></div>
            <img width="20" height="20" src="https://img.icons8.com/material-two-tone/24/duplicate.png"
                 alt="duplicate" class="opacity-70"/>
            <span>Create Project</span>
        </div>
    </div>

    <div>
        <p class="text-gray-400">My Projects</p>
        <div class="">
            @foreach($projects as $project)
                <a class="flex gap-2 mb-1 @if($selectedID === $project->id) bg-gray-100 @endif rounded-lg items-center" href="{{route('main', ['id'=>$project->id])}}">
                    <div class="h-4 w-1.5 rounded-2xl bg-black @if($selectedID !== $project->id) opacity-0 @endif"></div>
                    <img src="{{asset('asset/imags/IdentificationCard.svg')}}">
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
                    <div class="flex gap-2 mb-1 items-center">
                        <div class="h-4 w-1.5 rounded-2xl bg-black opacity-0"></div>
                        <img src="{{asset('asset/imags/IdentificationCard.svg')}}">
                        <span>{{$project->title}}</span>
                    </div>
                @endforeach
            </div>

        @endif
    </div>
    <div class="flex gap-2 mb-1 pl-3 items-center rounded-lg no-underline text-black absolute bottom-5 w-40 ">
        <img width="20" height="20" src="https://img.icons8.com/material-two-tone/24/logout-rounded-left.png"
             alt="logout-rounded-left" class="opacity-80"/>
        <a type="submit" href="{{ route('logout') }}">Logout</a>
    </div>
</nav>
