<div id="project-card" class="relative rounded p-3 w-64 h-32">
    <div class="absolute z-0 back-img bg-blue-600 top-0 rounded left-0 h-full w-full"
         style="background-image: url('https://images.unsplash.com/photo-1673501040719-6cad2ab79c2e?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxjb2xsZWN0aW9uLXBhZ2V8NHw3ZzRtVzMtQm9ab3x8ZW58MHx8fHx8'); background-position: center"></div>
    <div class="relative z-10">
        <div class="w-full items-center flex justify-between">
            <h1 class="mb-2 text-lg font-semibold">{{$title}}</h1>
            <form method="post" action="{{$isShared==0?route('delete.project', ['id'=>$id]):route('delete.collaboration', ['project_id'=>$id, 'user_id'=>Auth::id()])}}" class="p-1 hover:bg-red-500 rounded">
                @csrf
                @method('DELETE')
                <button type="submit" wire:confirm="Are you sure you want to delete this project">
                    <img width="20" height="20" src="https://img.icons8.com/material-two-tone/24/waste.png" alt="waste"/>
                </button>
            </form>
        </div>
        <a class="bg-black text-white p-2 rounded" href="{{route('main', ['id'=>$id])}}">Tasks</a>
    </div>
</div>
