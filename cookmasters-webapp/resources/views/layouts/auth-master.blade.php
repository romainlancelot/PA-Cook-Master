@extends('layouts.partials.html-head')

@section('styles')
<link href="{!! url('assets/css/signin.css') !!}" rel="stylesheet">
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

    <body class="text-center">

        <main class="container form-signin">
            @yield('content')
        </main>

    </body>
@endsection