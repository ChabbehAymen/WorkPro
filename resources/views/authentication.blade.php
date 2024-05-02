@extends('layouts.app')
@section('links')
    <link rel="stylesheet" href="{{asset('asset/css/login-page.css')}}">
    <script src="{{asset('asset/js/login.page.js')}}" defer></script>
@endsection

@section('content')
@if($errors->registration->first())
    <livewire:dialog message="{{$errors->registration->first()}}">
@elseif(session('success'))
        <livewire:dialog message="{{session('success')}}">
@endif
                    <main class="w-full h-full">
                        <h1 class="absolute font-bold m-6 text-sm">WorPro</h1>


                        <div class="flex items-end justify-center">
                            <div class="w-full h-full relative ">
                                <form class="absolute shadow-lg border rounded px-6 py-14 h-max ml-36 flex flex-column login-form"
                                      method="POST" action="{{route('login')}}">
                                    @csrf
                                    <p class="font-light mb-4">Welcome!</p>
                                    <h1 class="font-bold text-2xl mb-6">Sign in</h1>
                                    <label for="">User Email</label>
                                    <input type="text" placeholder="Enter your Email"
                                           class="border border-black rounded p-2 mb-4"
                                           id="email" name="email" required>
                                    <label for="">Password</label>
                                    <div class="border border-black rounded mb-2">
                                        <input type="text" placeholder="Enter your Password" class="rounded p-2"
                                               name="password"
                                               required>
                                    </div>
                                    <p class="mb-2 text-xs text-red-600 error-text"></p>
                                    <p class="mb-2 text-xs text-red-600 pass-error-text"></p>
                                    <button type="submit" class="bg-black text-white rounded p-2">LOGIN</button>
                                </form>

                                <form
                                        class="absolute shadow-lg border rounded px-6 py-10 h-max ml-36 flex flex-column bottom-6 register-form"
                                        method="POST" action="{{route('register')}}">
                                    @csrf
                                    @method('POST')
                                    <h1 class="font-bold text-2xl mb-6">Sign in</h1>
                                    <label for="">User Email</label>
                                    <input type="text" placeholder="Enter your Email"
                                           class="border border-black rounded p-2 mb-4"
                                           id="email" name="email" required>
                                    <label for="">User Name</label>
                                    <input type="text" placeholder="First And Last Name Recemanded"
                                           class="border border-black rounded p-2 mb-4" id="user_name" name="user_name"
                                           required>
                                    <label for="">Password</label>
                                    <div class="border border-black rounded mb-4">
                                        <input type="text" placeholder="Enter your Password" class="rounded p-2"
                                               name="password"
                                               required>
                                    </div>
                                    <p class="mb-2 text-xs text-red-600 error-text"></p>
                                    <p class="mb-2 text-xs text-red-600 pass-error-text"></p>
                                    <button type="submit" class="bg-black text-white rounded p-2">SIGN UP</button>
                                </form>
                            </div>
                            <img src="{{asset('asset/imags/login-img.png')}}" class="w-full">

                        </div>
                        <div class="absolute bottom-24 flex items-center p-2 rounded-3xl gap-4 btn-container">
                            <div class="absolute bg-black text-white rounded-3xl px-6 z-0 py-1 btn-highliter">
                                <button class="text-black">login</button>
                            </div>
                            <div class=" px-6 z-0 py-1 z-10 login-btn">
                                <button class="login">login</button>
                            </div>
                            <div class=" px-6 z-0 py-1 z-10 register-btn">
                                <button class="register">Register</button>
                            </div>
                        </div>
                    </main>
        @endsection
