@extends('layouts.app')
@section('links')
<link rel="stylesheet" href="{{asset('asset/css/edit.page.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="{{asset('asset/js/edit.page.js')}}" defer></script>
<!-- Add the theme's stylesheet -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.bubble.css" />
<link href="https://cdn.jsdelivr.net/npm/quill@2.0.1/dist/quill.snow.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>
@endsection
@section('content')
<main class="flex flex-col">
    @if ($data->img!== 'none')
    <div class="task-img-holder rounded" style="background-image: url('{{asset($data->img)}}');"></div>
    @endif
    <form action="{{route('task.edit', [$data->id])}}" method="post" class="flex flex-col">
        @csrf
        <div class="w-full flex items-center justify-between">
            <input class="font-bold text-3xl" value="{{$data->title}}" name="title" disabled>
            @if ($data->user_id === auth()->id())
            <i class="fa-solid fa-pen"></i>
            @endif
        </div>
        <input type="text" value="{{$data->description}}" name="description" hidden>
        <div class="w-full" id="editor"></div>
        <button type="submit" class="btn bg-black text-white w-max self-end hidden">Post</button>
    </form>
</main>

@endsection