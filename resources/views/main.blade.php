@extends('layouts.app')
@section('links')
    <link rel="stylesheet" href="{{asset('asset/css/main.page.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
          integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
@endsection
@if(session('success'))
    <livewire:dialog message="{{session('success')}}">
@endif
@section('content')


    <nav class=" fixed shadow-md w-1/5 h-full py-6 px-5 flex flex-column gap-4">
        <div class="flex items-center gap-3">
            <div class="profile-img" style="background-image: url({{asset('asset/imags/profile-img.png')}})"></div>
            <h1 class="text-xl">ByeWind</h1>
        </div>
        <div class="">
            <div class="flex gap-2 items-center mb-1 cursor-pointer">
                <div class="h-4 w-1.5 rounded-2xl bg-black opacity-0"></div>
                <img src="{{asset('asset/imags/IdentificationCard.svg')}}">
                <span>Account</span>
            </div>
            <div class="flex gap-2 items-center cursor-pointer">
                <div class="h-4 w-1.5 rounded-2xl bg-black opacity-0"></div>
                <img width="20" height="20" src="https://img.icons8.com/material-two-tone/24/duplicate.png"
                     alt="duplicate" class="opacity-70"/>
                <span>Create Project</span>
            </div>
        </div>

        <div>
            <p class="text-gray-400">My Projects</p>
            <div class="">
                <div class="flex gap-2 mb-1 cursor-pointer items-center">
                    <div class="h-4 w-1.5 rounded-2xl bg-black opacity-0"></div>
                    <img src="{{asset('asset/imags/IdentificationCard.svg')}}">
                    <span>Account</span>
                </div>
                <div class="flex gap-2 mb-1 items-center">
                    <div class="h-4 w-1.5 rounded-2xl bg-black opacity-0"></div>
                    <img src="{{asset('asset/imags/IdentificationCard.svg')}}">
                    <span>Account</span>
                </div>
                <div class="flex gap-2 mb-1 items-center">
                    <div class="h-4 w-1.5 rounded-2xl bg-black opacity-0"></div>
                    <img src="{{asset('asset/imags/IdentificationCard.svg')}}">
                    <span>Account</span>
                </div>
                <div class="flex gap-2  mb-1 items-center">
                    <div class="h-4 w-1.5 rounded-2xl bg-black opacity-0"></div>
                    <img src="{{asset('asset/imags/IdentificationCard.svg')}}">
                    <span>Account</span>
                </div>
            </div>
        </div>

        <div>
            <p class="text-gray-400">Sheared With Me</p>
            <div class="">
                <div class="flex gap-2 mb-1 items-center">
                    <div class="h-4 w-1.5 rounded-2xl bg-black opacity-0"></div>
                    <img src="{{asset('asset/imags/IdentificationCard.svg')}}">
                    <span>Account</span>
                </div>
                <div class="flex gap-2 mb-1 items-center">
                    <div class="h-4 w-1.5 rounded-2xl bg-black opacity-0"></div>
                    <img src="{{asset('asset/imags/IdentificationCard.svg')}}">
                    <span>Account</span>
                </div>
                <div class="flex gap-2 mb-1 items-center">
                    <div class="h-4 w-1.5 rounded-2xl bg-black opacity-0"></div>
                    <img src="{{asset('asset/imags/IdentificationCard.svg')}}">
                    <span>Account</span>
                </div>
                <div class="flex gap-2 mb-1 items-center bg-gray-100">
                    <div class="h-4 w-1.5 rounded-2xl bg-black"></div>
                    <img src="{{asset('asset/imags/IdentificationCard.svg')}}">
                    <span>Account</span>
                </div>
            </div>
        </div>
        <form class="flex gap-2 mb-1 pl-3 items-center bg-gray-100 rounded-lg no-underline text-black" method="POST" action="{{ route('logout') }}" >
            @csrf
            <img width="20" height="20" src="https://img.icons8.com/material-two-tone/24/logout-rounded-left.png"
                 alt="logout-rounded-left" class="opacity-80"/>
            <button type="submit">Logout</button>
        </form>
    </nav>
    <main class="pl-4 pt-2.5">
        <div class="flex h-max w-full items-center justify-between pr-4 mb-2 ">
            <img src="{{asset('asset/imags/Logo.png')}}" alt="" srcset="">
            <div class="bg-gray-100 w-max h-6 mr-36 pl-4 pr-1 gap-2 flex items-center rounded-2xl">
                <i class="fa-solid fa-magnifying-glass text-gray-400"></i>
                <input type="text" class="bg-transparent w-full search-input" placeholder="Search">
            </div>
            <div class="flex gap-2">
                <img width="24" height="24" src="https://img.icons8.com/material-two-tone/24/insert-row-below.png"
                     alt="insert-row-below" class="opacity-70"/>
                <div class="w-1 h-5 bg-gray-200 rounded-2xl"></div>
                <img width="24" height="24" src="https://img.icons8.com/material-two-tone/24/bell--v1.png"
                     alt="bell--v1" class="opacity-70"/>
            </div>
        </div>

        <div class="w-full flex justify-between pr-8 ml-3">
            <div class="flex gap-2 items-center w-max">
                <h1 class="font-bold text-xl">Acount</h1>
                <div class="w-1 h-5 bg-gray-200 rounded-2xl"></div>
                <div class="flex gap-2 items-center h-full">
                    <img src="{{asset('asset/imags/profile-img.png')}}" alt="" srcset="">
                    <img src="{{asset('asset/imags/profile-img.png')}}" alt="" srcset="">
                    <img src="{{asset('asset/imags/profile-img.png')}}" alt="" srcset="">
                </div>
                <div
                    class="border border-gray-400 rounded-2xl flex items-center gap-2 text-sm px-2 py-0.5 text-gray-400">
                    <i class="fa-solid fa-plus text-xs"></i>
                    <span class="">invite</span>
                </div>
            </div>
            <select name="" id="" class="p-1.5 rounded text-sm border border-gray-300 bg-transparent text-gray-400">
                <option value="">Mine</option>
            </select>
        </div>

        <div class="h-full w-full flex justify-around mt-9">
            <div class="border rounded-lg h-max p-2">
                <h2 class="font-bold text-lg">To Do</h2>
                <div class="w-full h-full bg-gray-200 rounded-xl py-2">
                    <div class="rounded-xl m-2 p-3 bg-white w-72" id="card">
                        <img src="https://placehold.co/600x400/png" class="rounded-xl">
                        <p class="font-bold my-2">My First Tast</p>
                        <p class="w-full text-gray-500 my-2">Lorem ipsum dolor sit amet, consectetur adipisicing
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
                        <p class="w-full text-gray-500 my-2">Lorem ipsum dolor sit amet, consectetur adipisicing
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
                        <p class="w-full text-gray-500 my-2">Lorem ipsum dolor sit amet, consectetur adipisicing
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

    </main>

@endsection
