@extends('layouts.app')
@section('title')
    Welcome
@endsection
@section('content')
    <x-list-posts :posts="$posts"/>
@endsection
