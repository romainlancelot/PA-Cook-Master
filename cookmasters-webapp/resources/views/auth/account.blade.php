@extends('layouts.app-master')

@section('title', 'Account')

@section('content')
    <h1>{{ auth()->user()->firstname }} {{ auth()->user()->lastname }}</h1><br>

    <h2>Informations personnelles</h2>
    <ul>
        <li>Email: {{ auth()->user()->email }}</li>
        <li>Username: {{ auth()->user()->username }}</li>
    </ul>

    <hr>
    <h2>Abonnement</h2>
    <div class="row">
        <div class="col">
            @if (auth()->user()->subscription_plan_id == null)
                <p>Vous n'avez aucun abonnement en cours.</p>
                <a href="{{ route('subscription-plans.index') }}" class="btn btn-primary">Voir les abonnements disponibles</a>
            @else
                <p>Vous êtes abonné à :</p>
                {{ auth()->user()->subscription_plan_id->name }}
                {{ auth()->user()->subscription_plan_id->price }}€/mois
                {{ auth()->user()->subscription_plan_id->duration }} mois
            @endif
        </div>
    </div>
        

@endsection