@extends('layouts.home-master')

@section('title', 'Home')
@section('content')
    <div id="carousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselHome" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselHome" data-bs-slide-to="1" aria-label="Slide 1"></button>
        </div>
        <div class="carousel-inner">
            <style> 
                .ad-1 {
                    background: linear-gradient(to bottom,rgba(0,0,0, 0),
                    rgba(0,0,0, 100)),
                    url({{ asset('images/index/index1.jpg') }}) no-repeat center center fixed;
                }
                .ad-2 {
                    background: linear-gradient(to bottom,rgba(0,0,0, 0),
                    rgba(0,0,0, 100)),
                    url({{ asset('images/index/index2.jpg') }}) no-repeat center center fixed;
                }
            </style>
            <div class="carousel-item active ad-1">
                <div class="carousel-caption">
                    <h4>Cookmasters</h4>
                    <p>Learn to cook with the best chefs in the world.</p>
                </div>
            </div>
            <div class="carousel-item ad-2">
                <div class="carousel-caption">
                    <h4>Discover our events</h4>
                    <p>Find an event in your city and enjoy it with your friends.</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

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