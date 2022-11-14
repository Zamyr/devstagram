@extends('layouts.app')
@section('title')
Register
@endsection
@section('content')
<div class="md:flex md:justify-center md:gap-10 md:items-center p-5">
    <div class="md:w-6/12">
        <img src="{{ asset('img/registrar.jpg') }}" alt="register">
    </div>
    <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
        <form action="{{ route('register') }}" method="POST" novalidate>
            @csrf()
            <div class="mb-5">
                <lavel for="name" class="mb-2 block uppercase text-gray-500 font-bold">Name</lavel>
                <input 
                    id="name"
                    name="name"
                    value="{{old('name')}}"
                    type="text"
                    placeholder="Your name"
                    class="border p-3 w-full rounded-lg @error('name') border-red-600 @enderror" 
                />
                @error('name')
                    <p class="text-red-500 text-sm my-2">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-5">
                <lavel for="username" class="mb-2 block uppercase text-gray-500 font-bold">Username</lavel>
                <input 
                    id="username"
                    name="username"
                    value="{{old('username')}}"
                    type="text"
                    placeholder="Your Username"
                    class="border p-3 w-full rounded-lg @error('username') border-red-600 @enderror" 
                />
                @error('username')
                    <p class="text-red-500 text-sm my-2">{{$message}}</p>
                @enderror
            </div>
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
                <lavel for="password_confirmation" class="mb-2 block uppercase text-gray-500 font-bold">Repeat Password</lavel>
                <input 
                    id="password_confirmation"
                    name="password_confirmation"
                    type="password"
                    placeholder="Repeat Password"
                    class="border p-3 w-full rounded-lg @error('password') border-red-600 @enderror" 
                />
            </div>

            <input type="submit" value="Register" class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg" />
        </form>
    </div>
</div>
@endsection