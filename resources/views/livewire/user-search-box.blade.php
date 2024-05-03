<div
    class="z-10 w-96 h-72 bg-white fixed top-0 left-0 p-4 -mt-80 shadow-lg flex flex-col gap-3 rounded-lg searchUsersBox"
    style="margin-left: 40%">
    <img width="15" height="15" src="https://img.icons8.com/material-two-tone/24/cancel--v1.png" alt="cancel--v1"
         class=" opacity-80 absolute right-0 top-0 m-3 cursor-pointer hover:opacity-50" id="cancel-search-popup"/>
    <input type="text" class="form-control border-black mt-3" placeholder="Search For Users">
    <div class="overflow-y-auto">
        <h1 class="text-gray-400">Users</h1>
        @foreach($users as $user)
            <livewire:user-invetation-row userId="{{$user->id}}" userName="{{$user->user_name}}" profileImg="{{$user->profile_img}}" projectId="{{$projectId}}"></livewire:user-invetation-row>
        @endforeach


    </div>
</div>
