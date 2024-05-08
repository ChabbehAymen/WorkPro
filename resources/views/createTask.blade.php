@extends('layouts.app')
@section('links')
    <script src="{{asset('asset/js/createProject.page.js')}}" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.1/dist/quill.snow.css" rel="stylesheet" />
@endsection
@section('content')
    <main class=" h-full w-full pt-2.5 flex">
        <livewire:nav-bar selectedID="{{$id}}"></livewire:nav-bar>
        <div class="pl-4 w-full">
            <livewire:header
                addIcon="https://img.icons8.com/material-two-tone/24/insert-row-below.png"></livewire:header>
            <div class="flex w-full h-full">
                <div class="w-full h-full">
                    <form class="h-96">
                        <input class="form-control border-0 font-bold text-lg mb-3" placeholder="Title">
                        <h1 class="mb-2">Description</h1>
                        <div class="w-full h-full" id="editor"></div>
                    </form>
                </div>
                <div></div>

            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.1/dist/quill.js"></script>
@endsection
