@extends('layouts.app-master')

@section('title', 'Video chat')


@section('content')
    <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
        <h1 class="display-4 fw-normal">Video chat</h1>
        <p class="fs-5 text-body-secondary">Chat with other cookmasters and share your recipes or tips.</p>
    </div>

    <div id="app">
        <video-chat></video-chat>
    </div>
    
@endsection
