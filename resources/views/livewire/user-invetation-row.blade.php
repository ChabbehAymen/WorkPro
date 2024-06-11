<div>
    <div class="w-full flex items-center py-3 border-b user-row">
        <div class="w-full flex items-center gap-3">
            <img src="{{$profileImg !== 'unset'?asset(asset($profileImg)):asset('asset/imags/profile-img.png')}}" class=" w-10 h-10 user-profile-img">
            <h1 class="w-4/5 overflow-hidden text-ellipsis">{{$userName}}</h1>

        </div>
        @if($isInvited === 0 && $isCollaborating === 0)
        <form action="{{route('create.invitation', ['project_id'=>$projectId, 'user_id'=>$userId])}}" method="post">
            @csrf
            <button class="btn btn-dark bg-black text-xs" type="submit"> Invite</>
        </form>
        @elseif ($isInvited !== 0)
        <form action="{{route('delete.invitation', ['project_id'=>$projectId, 'user_id'=>$userId])}}" method="POST">
            @csrf
            <button class="btn text-black border rounded text-xs" type="submit"> Cancel</button>

        </form>
        @elseif ($isCollaborating !== 0)
        <button class="btn text-black border rounded text-xs" disabled> Invited!</button>
        @endif
    </div>
</div>