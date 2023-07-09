@extends('layouts.partials.html-head')

@section('styles')
@endsection

@section('body')
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>

    <body>

        <main class="container">
            @yield('content')
        </main>

    </body>

@endsection