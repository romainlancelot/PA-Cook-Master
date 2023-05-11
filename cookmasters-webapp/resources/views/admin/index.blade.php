@extends('layouts.admin-master')

@section('title', 'Admin')

@section('content')
    <h1>Gestion des utilisateurs</h1>
    <div class="row">
        <div class="col">
            <h2>{{ auth()->user()->firstname }} {{ auth()->user()->lastname }}</h2><br>
            {{ auth()->user()->email }}
            {{ auth()->user()->username }}
        </div>
    </div>
        
@endsection