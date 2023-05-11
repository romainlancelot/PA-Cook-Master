@extends('layouts.app-master')

@section('title', 'Account')

@section('content')
    <h1>Account</h1>
    <p class="lead">This is the account page.</p>
    <div class="row">
        <div class="col">
            <h2>{{ auth()->user()->firstname }} {{ auth()->user()->lastname }}</h2><br>
            {{ auth()->user()->email }}
            {{ auth()->user()->username }}
        </div>
    </div>
        
@endsection