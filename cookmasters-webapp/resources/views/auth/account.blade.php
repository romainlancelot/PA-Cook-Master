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
    
    <h2>Abonnement</h2>
    <div class="row">
        <div class="col">
            <h3>Abonnement</h3>
            <p>Vous êtes abonné à :</p>
            @if (auth()->user()->subscription_plan_id == null)
                <p>Vous n'avez aucun abonnement en cours.</p>
                <a href="{{ route('subscription-plans.index') }}" class="btn btn-primary">Souscrire à un abonnement</a>
            @else
                {{ auth()->user()->subscription_plan_id->name }}
                {{ auth()->user()->subscription_plan_id->price }}€/mois
                {{ auth()->user()->subscription_plan_id->duration }} mois
            @endif
        </div>
        

@endsection