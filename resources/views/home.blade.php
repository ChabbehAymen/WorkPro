@extends('layouts.app')
@section('links')
    <script src="{{asset('asset/js/home.page.js')}}" defer></script>
    <link rel="stylesheet" href="{{asset('asset/css/home.page.css')}}">
@endsection
@if($errors->projectCreate->first())
    <livewire:dialog message="{{$errors->projectCreate->first()}}"></livewire:dialog>
@endif
@section('content')
    <main class="h-full w-full flex flex-col">
        <livewire:header addIcon="https://img.icons8.com/material-two-tone/24/duplicate.png"
                         withProfile="{{asset('asset/imags/profile-img.png')}}"></livewire:header>
        <div class="px-6 py-4 h-full w-full">
            <div class="h-max w-full mb-3">
                <h1 class="font-bold text-lg mb-1">My Projects</h1>
                <div class="flex flex-wrap gap-3 w-full h-max">
                    @if(sizeof($userProjects) > 0)
                        @foreach($userProjects as $project)
                            <livewire:project-card title="{{$project->title}}"
                                                   id="{{$project->id}}"></livewire:project-card>
                        @endforeach
                    @else
                        <div class="w-full flex flex-col gap-4 items-center h-max p-2">
                            <h1 class="w-max text-lg font-semibold text-gray-500">You Have No Projects Create One </h1>
                            <button class="bg-black text-white px-2 py-1 rounded-lg" id="create-btn">Create</button>
                        </div>
                    @endif
                </div>
            </div>
            @if(sizeof($collaborations) > 0 )
                <div>
                    <h1 class="font-bold text-lg">Sheared With Me</h1>
                    <div class="flex flex-wrap gap-3 w-full h-max">
                        @foreach($collaborations as $project)
                            <livewire:project-card title="{{$project->title}}"
                                                   id="{{$project->id}}" isShared="1"></livewire:project-card>
                        @endforeach

                    </div>
                </div>
            @endif
            <livewire:create-project-popup></livewire:create-project-popup>
        </div>
    </main>
@endsection
