@extends('layouts.partials.html-head')
{{-- @routes --}}

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

        @auth
            @if (auth()->user()->role_name() == 'driver')
                @include('layouts.partials.navbar-driver')
            @elseif (auth()->user()->role_name() == 'presta')
                @include('layouts.partials.navbar-presta')
            @else
                @include('layouts.partials.navbar')
            @endif
        @else
            @include('layouts.partials.navbar')
        @endauth

        @include('layouts.partials.messages')

        <main class="container">
            @yield('content')
        </main>

        @include('layouts.partials.footer')
    </body>


    @yield('scripts')
@endsection