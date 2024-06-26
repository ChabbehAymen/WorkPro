<div class=" w-full pb-5 flex overflow-auto justify-around gap-4 mt-9">
    @if(sizeof($tasks) > 0)
    <div class="border rounded-lg p-2 tasks-container">
        <h2 class="font-bold text-lg">To Do</h2>
        <div class="w-full bg-gray-200 rounded-xl py-2 ">
            @foreach($tasks as $task)
            @if($task->status === 0)
            <livewire:task task_id="{{$task->id}}" title="{{$task->title}}" date="{{$task->created_at}}" img="{{$task->img}}" state="{{$task->status}}"></livewire:task>
            @endif
            @endforeach
        </div>
    </div>
    <div class="border rounded-lg  p-2 tasks-container">
        <h2 class="font-bold text-lg">In progress</h2>
        <div class="w-full bg-gray-200 rounded-xl py-2 overflow-y-auto">
            @foreach($tasks as $task)
            @if($task->status === 1)
            <livewire:task task_id="{{$task->id}}" title="{{$task->title}}" date="{{$task->created_at}}" img="{{$task->img}}" state="{{$task->status}}"></livewire:task>
            @endif
            @endforeach
        </div>
    </div>
    <div class="border rounded-lg  p-2 tasks-container">
        <h2 class="font-bold text-lg">Completed</h2>
        <div class="w-full bg-gray-200 rounded-xl py-2 overflow-y-auto">
            @foreach($tasks as $task)
            @if($task->status === 2)
            <livewire:task task_id="{{$task->id}}" title="{{$task->title}}" date="{{$task->created_at}}" img="{{$task->img}}" state="{{$task->status}}"></livewire:task>
            @endif
            @endforeach
        </div>
    </div>
    @else
    <div class="w-full flex items-center justify-center mt-24">
        <div class="flex flex-col gap-2 items-center ">
            No Tasks Yet Create One
            <a class="bg-black text-white px-2 py1 rounded w-max" href="{{route('create.task', ['project_id'=>$projectId])}}">Create</a>
        </div>
    </div>
    @endif
</div>