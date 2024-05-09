@extends('layouts.app')
@section('links')
    <script src="{{asset('asset/js/createTask.page.js')}}" defer></script>
    <link rel="stylesheet" href="{{asset('asset/css/createTask.page.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.1/dist/quill.snow.css" rel="stylesheet" />
@endsection
@section('content')
    <main class=" h-full w-full pt-2.5 flex overflow-hidden">
        <livewire:nav-bar selectedID="{{$id}}"></livewire:nav-bar>
        <div class="pl-4 w-full">
            <livewire:header
                addIcon="https://img.icons8.com/material-two-tone/24/insert-row-below.png"></livewire:header>
            <div class="flex w-full h-full">
                <form class="w-full h-full flex gap-2">
                    <div class="h-96 w-full mr-3">
                        <input class="form-control border-0 font-bold text-lg mb-3" placeholder="Title">
                        <h1 class="mb-2">Description</h1>
                        <div class="w-full h-full" id="editor"></div>
                    </div>
                    <div class="right-side-form py-1 px-2">
                        <div class="bg-gray-100 w-max">Add An Image</div>
                    </div>
                </form>
                <div></div>

            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.1/dist/quill.js"></script>
@endsection
