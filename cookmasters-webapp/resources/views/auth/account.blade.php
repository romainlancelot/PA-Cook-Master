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
                <ul>
                    <li>{{ auth()->user()->subscriptionPlan()->value('name') }}</li>
                    <li>{{ auth()->user()->subscriptionPlan()->value('price') }}€/mois</li>
                    <li>
                        @if (auth()->user()->subscriptionPlan()->value('duration') == 0)
                            Abonnement à vie
                        @else
                            {{ auth()->user()->subscriptionPlan()->value('duration') }} mois
                        @endif
                    </li>
            @endif
        </div>
    </div>

    @if ($invoices != null)
        <hr>
        <h2>Historique des commandes</h2>
        @foreach ($invoices as $invoice)
            <div class="list-group">
                <a href="#" class="list-group-item list-group-item-action" aria-current="true">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">List group item heading</h5>
                        <small>{{ $invoice->created_at }}</small>
                    </div>
                    <p class="mb-1">Some placeholder content in a paragraph.</p>
                    <small>And some small print.</small>
                </a>
                <a href="#" class="list-group-item list-group-item-action">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">List group item heading</h5>
                        <small class="text-body-secondary">3 days ago</small>
                    </div>
                    <p class="mb-1">Some placeholder content in a paragraph.</p>
                    <small class="text-body-secondary">And some muted small print.</small>
                </a>
                <a href="#" class="list-group-item list-group-item-action">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">List group item heading</h5>
                        <small class="text-body-secondary">3 days ago</small>
                    </div>
                    <p class="mb-1">Some placeholder content in a paragraph.</p>
                    <small class="text-body-secondary">And some muted small print.</small>
                </a>
            </div>
            {{dd($invoice)}}
        @endforeach
    @endif

@endsection