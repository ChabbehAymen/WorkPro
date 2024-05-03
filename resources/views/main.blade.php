@extends('layouts.app')
@section('links')
    <link rel="stylesheet" href="{{asset('asset/css/main.page.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
          integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <script src="{{asset('asset/js/main.page.js')}}" defer></script>
@endsection
@if(session('success'))
    <livewire:dialog message="{{session('success')}}">
        @endif
        @section('content')
            <livewire:user-search-box projectId="{{$project->id}}"></livewire:user-search-box>
            <main class=" h-full pt-2.5 flex overflow-hidden">
                <livewire:nav-bar selectedID="{{$project->id}}"></livewire:nav-bar>
                <div class="pl-4 overflow-hidden">
                    <livewire:header
                        addIcon="https://img.icons8.com/material-two-tone/24/insert-row-below.png"></livewire:header>

                    <div class="w-full flex justify-between pr-8 ml-3">
                        <div class="flex gap-2 items-center w-max">
                            <h1 class="font-bold text-xl">{{$project->title}}</h1>
                            <div class="w-1 h-5 bg-gray-200 rounded-2xl"></div>
                            <div class="flex gap-2 items-center h-full">
                                <div class="dropdown w-max">
                                    @if(sizeof($collabors)>0)
                                        <button class="btn flex gap-2" type="button" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                            @for($i =0; $i < sizeof($collabors); $i++)
                                                @if($i ==2)
                                                    @break
                                                @endif
                                                <img
                                                    src="{{$collabors[$i]->profile_img !== 'unset'?asset("asset/imags/$collabors[$i]->profile_img"):asset('asset/imags/profile-img.png')}}"
                                                    alt="" srcset="">
                                            @endfor
                                        </button>
                                    @endif
                                    <ul class="dropdown-menu dropdown-menu-end w-max px-2 overflow-hidden h-40">
                                        <div class="w-full h-full overflow-y-auto">
                                            @if($projectCreator != null)
                                            <li class="flex mb-2 py-2 border-b gap-2 items-center collabor-row">
                                                <div class="flex w-full gap-2 items-center">
                                                    <img
                                                        src="{{$projectCreator->profile_img !== 'unset'?asset("asset/imags/$projectCreator->profile_img"):asset('asset/imags/profile-img.png')}}"
                                                        alt="" srcset="">
                                                    <h1 class="w-4/5 overflow-hidden text-ellipsis">{{$projectCreator->user_name}}</h1>
                                                    <img width="20" height="20" src="https://img.icons8.com/material-two-tone/24/army-star.png" alt="army-star"/>
                                                </div>
                                            </li>
                                            @endif
                                            @foreach($collabors as $collabor)
                                                <li class="flex mb-2 py-2 border-b gap-2 items-center collabor-row">
                                                    <div class="flex w-full gap-2 items-center">
                                                        <img
                                                            src="{{$collabor->profile_img !== 'unset'?asset("asset/imags/$collabor->profile_img"):asset('asset/imags/profile-img.png')}}"
                                                            alt="" srcset="">
                                                        <h1 class="w-4/5 overflow-hidden text-ellipsis">{{$collabor->user_name}}</h1>
                                                    </div>
                                                    @if($project->user_id === Auth::id())
                                                        <form action="{{route('delete.collaboration', ['project_id'=>$project->id, 'user_id'=>$collabor->user_id])}}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                    <button type="submit" class=" btn btn-dark bg-black py-0 px-2"
                                                       style="font-size: 0.7rem;">Kick</button>
                                                        </form>
                                                    @endif
                                                </li>
                                            @endforeach
                                        </div>
                                    </ul>
                                </div>
                            </div>
                            @if($project->user_id === Auth::id())

                            <div
                                class="border border-gray-400 rounded-2xl cursor-pointer flex items-center gap-2 text-sm px-2 py-0.5 text-gray-400"
                                id="invite-btn">
                                <i class="fa-solid fa-plus text-xs"></i>
                                <span class="">invite</span>
                            </div>
                            @endif
                        </div>
                        <select name="" id=""
                                class="p-1.5 rounded text-sm border border-gray-300 bg-transparent text-gray-400">
                            <option value="">Mine</option>
                            <option value="">All</option>
                        </select>
                    </div>

                    <div class="h-full w-full flex justify-around gap-4 mt-9 mb-11 overflow-y-auto">
                        <div class="border rounded-lg h-max p-2">
                            <h2 class="font-bold text-lg">To Do</h2>
                            <div class="w-full h-full bg-gray-200 rounded-xl py-2 overflow-y-auto">
                                <div class="rounded-xl m-2 p-3 bg-white w-72" id="card">
                                    <img src="https://placehold.co/600x400/png" class="rounded-xl">
                                    <p class="font-bold my-2">My First Tast</p>
                                    <p class="w-full text-gray-500 my-2">Lorem ipsum dolor sit amet, consectetur
                                        adipisicing
                                        elit.
                                        Veritatis, ratione!</p>
                                    <div class="my-2 flex items-center justify-between">
                                        <button class="bg-black text-white rounded-xl px-3 py-1">Details</button>
                                        <div class="flex h-max items center">
                                            <img src="{{asset('asset/imags/profile-img.png')}}" alt="" srcset="">
                                            <img src="{{asset('asset/imags/profile-img.png')}}" alt="" srcset="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="border rounded-lg h-max p-2">
                            <h2 class="font-bold text-lg">In progress</h2>
                            <div class="w-full h-full bg-gray-200 rounded-xl py-2">
                                <div class="rounded-xl m-2 p-3 bg-white w-72" id="card">
                                    <img src="https://placehold.co/600x400/png" class="rounded-xl">
                                    <p class="font-bold my-2">My First Tast</p>
                                    <p class="w-full text-gray-500 my-2">Lorem ipsum dolor sit amet, consectetur
                                        adipisicing
                                        elit.
                                        Veritatis, ratione!</p>
                                    <div class="my-2 flex items-center justify-between">
                                        <button class="bg-black text-white rounded-xl px-3 py-1">Details</button>
                                        <div class="flex h-max items center">
                                            <img src="{{asset('asset/imags/profile-img.png')}}" alt="" srcset="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="border rounded-lg h-max p-2">
                            <h2 class="font-bold text-lg">Completed</h2>
                            <div class="w-full h-full bg-gray-200 rounded-xl py-2">
                                <div class="rounded-xl m-2 p-3 bg-white w-72" id="card">
                                    <p class="font-bold my-2">My First Tast</p>
                                    <p class="w-full text-gray-500 my-2">Lorem ipsum dolor sit amet, consectetur
                                        adipisicing
                                        elit.
                                        Veritatis, ratione!</p>
                                    <div class="my-2 flex items-center justify-between">
                                        <button class="bg-black text-white rounded-xl px-3 py-1">Details</button>
                                        <div class="flex h-max items center">
                                            <img src="{{asset('asset/imags/profile-img.png')}}" alt="" srcset="">
                                            <img src="{{asset('asset/imags/profile-img.png')}}" alt="" srcset="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
    @endsection
