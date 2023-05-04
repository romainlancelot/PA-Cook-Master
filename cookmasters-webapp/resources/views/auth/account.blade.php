@extends('layouts.auth-master')

@section('title', 'Account')

@section('content')
    <h1>Account</h1>
    <p class="lead">This is the account page.</p>
    <ul>
        <li>Name : {{ auth()->user()->name }}</li>
        <li>Email : {{ auth()->user()->email }}</li>
        <li>Username : {{ auth()->user()->username }}</li>
    </ul>
    
        
@endsection