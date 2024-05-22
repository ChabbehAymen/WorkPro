@extends('layouts.app')
@section('links')
    <script src="{{asset('asset/js/createTask.page.js')}}" defer></script>
    <link rel="stylesheet" href="{{asset('asset/css/createTask.page.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.1/dist/quill.snow.css" rel="stylesheet"/>
@endsection
@section('content')

    @if($errors->createTask->first())
        <livewire:dialog message="{{$errors->createTask->first()}}">
            @endif

    <main class=" h-full w-full pt-2.5 flex overflow-hidden">
        <livewire:nav-bar selectedID="{{$id}}"></livewire:nav-bar>
        <div class="pl-4 w-full">
            <livewire:header
                addIcon="https://img.icons8.com/material-two-tone/24/insert-row-below.png"></livewire:header>
            <div class="flex w-full h-full">
                <form class="w-full h-full flex gap-2 relative" method="post" action="{{route('task.create', [$id])}}" enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="description" hidden="hidden">
                    <div class="h-96 w-full mr-3">
                        <input class="form-control border font-bold text-lg mb-3" name="title" placeholder="Title">
                        <h1 class="mb-2">Description</h1>
                        <div class="w-full" id="editor"></div>
                    </div>
                    <div class="right-side-form py-1 px-2">
                        <div class="w-max img-container">
                            <label class="bg-gray-100 text-center rounded-t cursor-pointer">
                                Add Image
                                <div class="img-placeholder w-full rounded"></div>
                                <input id="img-input" class="form-control text-sm" type="file" name="img" hidden="hidden">
                            </label>
                            <button class="btn bg-black text-white w-full submit-btn" type="button"> Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.1/dist/quill.js"></script>
@endsection
