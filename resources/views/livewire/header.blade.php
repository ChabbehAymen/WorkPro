<div class="flex h-max w-full items-center justify-between mb-2 header">
    @if(sizeof($notifications) > 0)
    <livewire:dialog message="You Have New Invitation"></livewire:dialog>
    @endif
    <img src="{{asset('asset/imags/Logo.png')}}" alt="" srcset="">
    <div class="bg-gray-100 w-max h-6 mr-36 pl-4 pr-1 gap-2 flex items-center search-div rounded-2xl">
        <i class="fa-solid fa-magnifying-glass text-gray-400"></i>
        <input type="text" class="bg-transparent w-full search-input tasks-search-input" placeholder="Search">
    </div>
    <div class="flex gap-2 items-center">
        @if ($projectCreator == auth()->id() || $projectCreator == 0)
        <button>
            <img width="20" height="20" src="{{$addIcon}}" alt="insert-row-below" class="opacity-70" id="create-icon" />
        </button>
        <div class="w-1 h-5 bg-gray-200 rounded-2xl spacer"></div>
        @endif
        <div class="dropdown w-max">
            <button class="" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <img width="20" height="20" src="https://img.icons8.com/material-two-tone/24/bell--v1.png" alt="bell--v1" class="opacity-70" />
            </button>
            <ul class="dropdown-menu w-96 h-40 overflow-hidden">
                <div class="overflow-y-auto h-full w-full">
                    @foreach($notifications as $noti)
                    <li class="w-full border-b pb-2 mb-2">
                        <div class="dropdown-item w-full h-max" type="">
                            <div class="w-full flex items-center gap-3 mb-2">
                                <span class="w-6 h-6 rounded-full header-profile-img" @if ($noti->profile_img === 'unset')
                                    style="background-image: url({{asset('asset/imags/profile-img.png')}})"
                                    @else style="background-image: url({{asset($noti->profile_img)}})"
                                    @endif ></span>
                                <div class="w-full">
                                    <h1 class="w-4/5 overflow-hidden text-ellipsis">{{$noti->user_name}}</h1>
                                    <h1 class=" form-text">Invites You To Collaborate in His Project</h1>
                                </div>

                            </div>
                            <div class="flex items-center w-full justify-center gap-4">
                                <form method="POST" action="{{route('create.collaborator', ['project_id'=>$noti->id, 'user_id'=>Auth::id()])}}">
                                    @csrf
                                    <button class="text-sm bg-black text-white px-1.5 rounded" type="submit">
                                        Accept
                                    </button>
                                </form>
                                <form method="POST" action="{{route('delete.invitation', ['project_id'=>$noti->id, 'user_id'=>Auth::id()])}}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-sm border px-1.5 rounded">Decline</button>

                                </form>
                            </div>
                        </div>
                    </li>
                    @endforeach
                    @if(sizeof($notifications) == 0)
                    <div class="w-full h-full flex items-center justify-center">
                        <h1>Noting to show here</h1>
                    </div>
                    @endif
                </div>
            </ul>

        </div>
        @if($withProfile !== null)
        <div class="dropdown w-max">
            <button class="btn " type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <div class="w-8 h-8 rounded-full header-profile-img" @if ($user->profile_img === 'unset')
                    style="background-image: url({{asset('asset/imags/profile-img.png')}})"
                    @else style="background-image: url({{asset($user->profile_img)}})"
                    @endif ></div>
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{route('profile')}}" type="button">Profile</a></li>
                <li><a class="dropdown-item" href="{{route('logout')}}">Logout</a></li>
            </ul>
        </div>
        @endif
    </div>
</div>