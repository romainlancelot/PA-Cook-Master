@extends('layouts.app-master')

@section('title', 'Home')
@section('content')
    <div class="bg-light p-5 rounded">
        @auth
        <h1>{{ __('index.title') }}</h1>
        <p class="lead">Only authenticated users can access this section.</p>
        @endauth

        @guest
        <h1>{{ __('index.title') }}</h1>
        <p class="lead">{{ __('index.description') }}</p>
        @endguest
    </div>
@endsection