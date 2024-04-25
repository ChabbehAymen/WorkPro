@extends('layouts.app')
@section('content')
<main class="w-full h-full">
    <h1 class="absolute font-bold m-6">WorPro</h1>
    <div class="flex items-end justify-center">
        <div class="w-full h-full ">
            <form class="shadow-lg border rounded px-6 py-14 h-full ml-36 flex flex-column" style="width: 55%;">
                <p class="font-light mb-4" >Welcome!</p>
                <h1 class="font-bold text-2xl mb-6" >Sign in</h1>
                <label for="">User Email</label>
                <input type="text" placeholder="Enter your Email" class="border border-black rounded p-2 mb-4"  name="" id="">
                <label for="">Password</label>
                <div class="border border-black rounded mb-4">
                    <input type="text" placeholder="Enter your Password" class="rounded p-2" >
                </div>
                <input type="submit" value="Login" class="bg-black text-white rounded p-2" >
            </form>
        </div>
        <img src="http://localhost/PFE/in_imgs/login-img.png" class="w-full">

    </div>
    <div class="absolute bottom-24 flex items-center p-2 rounded-3xl gap-4" style="background-color: #f2f2f2;left: 60%;">
        <div class="absolute bg-black text-white rounded-3xl px-6 z-0 py-1">
            <button class="text-black">login</button>
        </div>
        <div class=" px-6 z-0 py-1 z-10">
            <button class="text-white">login</button>
        </div>
        <div class=" px-6 z-0 py-1 z-10">
            <button class="text-black">Register</button>
        </div>
    </div>
</main>
@endsection