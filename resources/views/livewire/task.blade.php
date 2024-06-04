<div class="rounded-xl m-2 p-3 bg-white w-72" id="card">
    @if ($img != 'none')
    <img src="{{asset($img)}}" class="rounded-xl">
    @endif
    <div class="flex items-center w-full justify-between">
        <h1 class="font-bold my-2">{{$title}}</h1>
        <div class="dropdown">
            <button class="btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <img width="24" height="24" src="https://img.icons8.com/material-two-tone/24/more.png" alt="more" />
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item hover:bg-red-500" href="{{route('task.delete',['id'=>$task_id])}}">Delete</a></li>

                @if (intval($state) === 0)
                <li>
                    <form action="{{route('task.update.state', [$task_id])}}" method="post">
                        @csrf
                        <input value="1" name="status" hidden="hidden">
                        <input type="submit" class="btn w-full border-0 text-start hover:bg-gray-200" value="Send To  Doing It">
                    </form>
                </li>
                <li>
                    <form action="{{route('task.update.state', [$task_id])}}" method="post">
                        @csrf
                        <input value="2" name="status" hidden="hidden">
                        <input type="submit" class="btn w-full border-0 text-start hover:bg-gray-200" value="Complete It">
                    </form>
                </li>
                @elseif (intval($state) === 1)
                <li>
                    <form action="{{route('task.update.state', [$task_id])}}" method="post">
                        @csrf
                        <input value="0" name="status" hidden="hidden">
                        <input type="submit" class="btn w-full border-0 text-start hover:bg-gray-200" value="Send To  To Do">
                    </form>
                </li>
                <li>
                    <form action="{{route('task.update.state', [$task_id])}}" method="post">
                        @csrf
                        <input value="2" name="status" hidden="hidden">
                        <input type="submit" class="btn w-full border-0 text-start hover:bg-gray-200" value="Complete It">
                    </form>
                </li>
                @elseif (intval($state) === 2)
                <li>
                    <form action="{{route('task.update.state', [$task_id])}}" method="post">
                        @csrf
                        <input value="0" name="status" hidden="hidden">
                        <input type="submit" class="btn w-full border-0 text-start hover:bg-gray-200" value=" Send To To Do">
                    </form>
                </li>
                <li>
                    <form action="{{route('task.update.state', [$task_id])}}" method="post">
                        @csrf
                        <input value="1" name="status" hidden="hidden">
                        <input type="submit" class="btn w-full border-0 text-start hover:bg-gray-200" value="Still Doing It">
                    </form>
                </li>
                @endif
            </ul>
        </div>
    </div>

    <div class="w-full text-gray-500 my-2 description-holder">{{html_entity_decode($date)}}</div>
    <div class="my-2 flex items-center justify-between">
        <a class="btn bg-black text-white rounded-xl px-3 py-1" href="{{route('task.find', [$task_id])}}">Details</a>
        <div class="flex h-max items center">
            @if (sizeof($assignemts)>0)
            @foreach($assignemts as $assignemt)
            <img src="{{asset('asset/imags/profile-img.png')}}" alt="" srcset="">
            @endforeach
            @endif
        </div>
    </div>
</div>