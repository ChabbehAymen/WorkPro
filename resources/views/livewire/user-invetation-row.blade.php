<div>
    <div class="w-full flex items-center py-3 border-b user-row">
        <div class="w-full flex items-center gap-3">
            <img
                src="{{$profileImg !== 'unset'?asset("asset/imags/$profileImg"):asset('asset/imags/profile-img.png')}}">
            <h1 class="w-4/5 overflow-hidden text-ellipsis">{{$userName}}</h1>

        </div>
        @if($isInvited === 0)
        <a class="btn btn-dark bg-black text-xs" href="{{route('create.invitation', ['project_id'=>$projectId, 'user_id'=>$userId])}}"> Invite</a>
        @else
            <form action="{{route('delete.invitation', ['project_id'=>$projectId, 'user_id'=>$userId])}}" method="POST">
                @csrf
                @method('DELETE')
            <button class="btn text-black border rounded text-xs" type="submit"> Cancel</button>

            </form>
        @endif
    </div>
</div>
