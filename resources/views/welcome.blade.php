@extends('layouts.app')
@section('links')
<link rel="stylesheet" href="{{asset('asset/css/welcome.page.css')}}">
@endsection
@section('content')
<main class="pt-2 flex flex-col">
    <header class="w-full justify-around h-min flex items-center ">
        <h1 class="font-bold text-xl">WorkPro</h1>
        <a class="border border-white text-white rounded-0 px-4 py-1" href="{{route('auth')}}">Login</a>
    </header>
    <div class="m-auto">
            <h1 class="font-bold text-6xl text-center">Work at the speed of thought</h1>
            <p class="text-center">Keep everything in the same place—even if your team isn’t. WorkPro brings all your tasks,<br> teammates, and tools together</p>
        </div>
        <a class="btn mt-4 btn-dark rounded-0 px-9 m-auto" href="{{route('auth')}}">Sart Now</a>
</main>
@endsection