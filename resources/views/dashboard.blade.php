@extends('layouts.app')
@section('title')
    Profile: {{$user->username}}
@endsection
@section('content')

<div class="flex justify-center">
    <div class="w-full md:w-8/12 lg:6/12 flex flex-col items-center md:flex-row">
        <div class="w-8/12 lg:w-6/12 px-5">
            <img src="{{ $user->image ? asset('profiles').'/'.$user->image : asset('img/usuario.svg')}}" alt="user">
        </div>
        <div class="md:w-8/12 lg:w-6/12 px-5 flex flex-col items-center md:justify-center md:items-start py-10 md:py-10">
            <div class="flex items-center gap-2">
                <p class="text-gray-700 text-2xl">{{$user->username}}</p>

                @auth
                    @if ($user->id === auth()->user()->id)
                        <a href="{{ route('profile.index') }}" class="text-gray-500 hover:text-gray-600 cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                            </svg>
                        </a>
                    @endif
                @endauth
            </div>
            <p class="text-gray-800 text-am mb-3 font-bold">            
                <span class="font-normal">{{$user->followers->count()}} @choice('Follower|Followers', $user->followers->count())</span> 
            </p>
            <p class="text-gray-800 text-am mb-3 font-bold">            
                <span class="font-normal">{{$user->followings->count()}} Following</span> 
            </p>
            <p class="text-gray-800 text-am mb-3 font-bold">            
                <span class="font-normal">{{$user->posts->count()}} @choice('Post|Posts', $user->posts->count())</span> 
            </p>

            @auth
                @if ($user->id !== auth()->user()->id)
                    @if (!$user->following(auth()->user()))
                        <form
                            action="{{ route('users.follow', $user) }}"
                            method="POST">
                            @csrf
                            <input
                                type="submit"
                                class="bg-blue-600 text-white uppercase rounded-lg px-3 py-1 text-xs font-bold cursor-pointer"
                                value="Follow"
                            />
                        </form>
                    @else
                        <form
                            action="{{ route('users.unfollow', $user) }}"
                            method="POST">
                            @csrf
                            @method('DELETE')
                            <input
                                type="submit"
                                class="bg-red-600 text-white uppercase rounded-lg px-3 py-1 text-xs font-bold cursor-pointer"
                                value="Unfollow"
                            />
                        </form>
                    @endif
                @endif
            @endauth
        </div>
    </div>
</div>

<section class="container mx-auto mt-10">
    <h2 class="text-4xl text-center font-black my-10">Posts</h2>
    <x-list-posts :posts="$posts"/>

</section>

@endsection