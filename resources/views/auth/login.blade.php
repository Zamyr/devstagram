@extends('layouts.app')
@section('title')
Login
@endsection
@section('content')
<div class="md:flex md:justify-center md:gap-10 md:items-center p-5">
    <div class="md:w-6/12">
        <img src="{{ asset('img/login.jpg') }}" alt="register">
    </div>
    <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
        <form action="{{ route('login') }}" method="POST" novalidate>
            @csrf()
            
            <div class="mb-5">
                <lavel for="email" class="mb-2 block uppercase text-gray-500 font-bold">Email</lavel>
                <input 
                    id="email"
                    name="email"
                    value="{{old('email')}}"
                    type="email"
                    placeholder="Your Email"
                    class="border p-3 w-full rounded-lg @error('email') border-red-600 @enderror" 
                />
                @error('email')
                    <p class="text-red-500 text-sm my-2">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-5">
                <lavel for="password" class="mb-2 block uppercase text-gray-500 font-bold">Password</lavel>
                <input 
                    id="password"
                    name="password"
                    type="password"
                    placeholder="Password"
                    class="border p-3 w-full rounded-lg @error('password') border-red-600 @enderror" 
                />
                @error('password')
                    <p class="text-red-500 text-sm my-2">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-5">
                <input id='remember' type="checkbox" name="remember">
                    <label for="remember" class="text-gray-500 text-sm">Remember</label>
                </input>
            </div>

            <input type="submit" value="Login" class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-4 text-white rounded-lg" />
            @if (session('message'))
                <p class="text-red-500 text-sm mt-4 text-center">{{session('message')}}</p>
            @endif
        </form>
    </div>
</div>
@endsection