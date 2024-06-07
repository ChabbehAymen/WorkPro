@extends('layouts.app')
@section('links')
<link rel="stylesheet" href="{{asset('asset/css/profile.style.css')}}">
<script src="{{asset('asset/js/profile.page.js')}}" defer></script>
@endsection
@section('content')
@if (session('error'))
<livewire:dialog message="{{session('error')}}"></livewire:dialog>
@elseif ($errors->profile->first())
<livewire:dialog message="{{$errors->profile->first()}}"></livewire:dialog>
@elseif ($user->profile_img === 'unset')
<livewire:dialog message="You Should Update Your Profile Image">
    @endif
    <main class="flex h-full w-full">
        <livewire:nav-bar selectedID="{{0}}"></livewire:nav-bar>
        <div class="flex flex-col p-4 gap-4 w-full content">

            <div class="flex profile-bg rounded relative mb-5">
                <button class="btn bg-black text-white w-max m-auto absolute right-0 text-sm">Update Profile</button>
                <div class="absolute profile-img" @if ($user->profile_img === 'unset')
                    style="background-image: url({{asset('asset/imags/profile-img.png')}})"
                    @else style="background-image: url({{asset($user->profile_img)}})"
                    @endif disabled>
                </div>
                <p class="bg-transparent font-bold text-xl h-min w-max self-end text-black user-name">{{$user->user_name}}</p>
            </div>
            <p>Email: {{$user->email}}</p>
            <p>You Acount Crated At: {{$user->created_at}}</p>
        </div>
    </main>
    <form action="{{route('profile.edite')}}" method="POST" enctype="multipart/form-data" class="absolute shadow rounded flex flex-col gap-3 bg-white p-2">
        @csrf
        <img width="15" height="15" src="https://img.icons8.com/material-two-tone/24/cancel--v1.png" alt="cancel--v1" class=" opacity-80 absolute right-0 top-0 m-3 cursor-pointer hover:opacity-50" id="cancel-btn" />
        <label class="self-center cursor-pointer img-placeholder" for="profile-img" @if ($user->profile_img === 'unset')
            style="background-image: url({{asset('asset/imags/profile-img.png')}})"
            @else style="background-image: url({{asset($user->profile_img)}})"
            @endif disabled>
            <input type="file" id="profile-img" name="profile_img" hidden>
        </label>
        <label for="" class="w-full">
            User Name <br>
            <input type="text" name="user_name" class="form-control w-full" value="{{$user->user_name}}">
        </label>
        <label for="" class="w-full">
            Your Password <br>
            <input type="password" name="old_password" class="form-control w-full" placeholder="******">
        </label>
        <label for="" class="w-full edit-password-input">
            New Passwrod <br>
            <input type="password" value="******" name="password" class="form-control w-full" placeholder="******">
        </label>
        <p class="form-text cursor-pointer edit-password">edit password</p>
        <button type="submit" class="btn bg-black text-white mt-3" disabled>Update</button>
    </form>
    @endsection