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
                <script>window.location = "/driver";</script>
            @endif
        @endauth

        
        @include('layouts.partials.navbar')
        @include('layouts.partials.messages')

        @yield('content')

        @include('layouts.partials.footer')
    </body>


    @yield('scripts')
@endsection