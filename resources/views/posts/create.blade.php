@extends('layouts.app')

@section('title')
    Create a new Post
@endsection

@push('styles')
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush

@section('content')
    <div class="md:flex md:items-center justify-center">
        <div class="md:w-1/2 px-10">
            <form id="dropzone" class="dropzone border-dashed border-2 w-full h-96 rounded flex flex-col justify-center items-center" action="{{ route('image.store') }}" method="POST" enctype="multipart/form-data">@csrf</form>
        </div>
        <div class="md:w-1/2 p-10 bg-white rounded-lg shadow-xl mt-10 md:mt-0">
            <form action="{{ route('post.store') }}" method="POST" novalidate>
                @csrf()
                <div class="mb-5">
                    <lavel for="title" class="mb-2 block uppercase text-gray-500 font-bold">Title</lavel>
                    <input 
                        id="title"
                        name="title"
                        value="{{old('title')}}"
                        type="text"
                        placeholder="Post Title"
                        class="border p-3 w-full rounded-lg @error('title') border-red-600 @enderror" 
                    />
                    @error('title')
                        <p class="text-red-500 text-sm my-2">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <lavel for="description" class="mb-2 block uppercase text-gray-500 font-bold">Description</lavel>
                    <textarea 
                        id="description"
                        name="description"
                        placeholder="Post Description"
                        class="border p-3 w-full rounded-lg @error('description') border-red-600 @enderror" 
                    >{{old('description')}}</textarea>
                    @error('description')
                        <p class="text-red-500 text-sm my-2">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <input type="hidden" name="image" value="{{old('image')}}"/>
                    @error('image')
                        <p class="text-red-500 text-sm my-2">{{$message}}</p>
                    @enderror
                </div>

                <input type="submit" value="Create" class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg" />
            </form>
        </div>
    </div>
@endsection