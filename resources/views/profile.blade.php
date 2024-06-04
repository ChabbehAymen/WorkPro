@extends('layouts.app')
@section('links')
<link rel="stylesheet" href="{{asset('asset/css/profile.style.css')}}">
@endsection
@section('content')
@if ($user->profile_img === 'unset')
    <livewire:dialog message="You Should Update Your Profile Image">
@endif
<main class="flex h-full w-full">
    <livewire:nav-bar selectedID="{{0}}"></livewire:nav-bar>
    <form action="" method="post" class="flex flex-col p-4 gap-4 w-full">
        <div class="flex">
            <label class="" for="profile-img" @if ($user->profile_img === 'unset')
                style="background-image: url({{asset('asset/imags/profile-img.png')}})"
                @endif disabled>
                <input type="file" id="profile-img" name="" hidden>
            </label>
            <input type="text" value="{{$user->user_name}}" class="w-min bg-transparent font-bold text-xl" disabled>
        </div>
        <label for="" hidden>
            Your Old Password:
            <input type="password" class="">
        </label>
        <label for="" class="" hidden>
            New Passwrod:
            <input type="password" class="">
        </label>
        <p>Email: {{$user->email}}</p>
        <p>You Acount Crated At: {{$user->created_at}}</p>
        <button class="btn bg-black text-white w-full">Update</button>
    </form>
</main>
@endsection