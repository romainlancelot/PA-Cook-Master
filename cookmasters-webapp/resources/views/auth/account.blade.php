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

    @if ($payments != null)
        <hr>
        <h2>Historique des commandes</h2>
        <div class="list-group mb-4">
            @foreach ($payments as $payment)
                @if ($payment['invoice'])
                    <a href="{{ $payment['invoice']->hosted_invoice_url }}" class="list-group-item list-group-item-action text-success">
                @else
                    <a href="#" class="list-group-item list-group-item-action text-warning">
                @endif
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">
                            {{ $payment['paymentIntent']->currency == 'eur' ? '€' : $payment['paymentIntent']->currency }} {{ $payment['paymentIntent']->amount / 100 }} | 
                            @if ($payment['paymentIntent']->status == 'succeeded')
                                {{ $payment['paymentIntent']->description }}
                            @else
                                Erreur lors du paiement
                            @endif
                        </h5>
                        <small>{{ date('d/m/Y (H:i)', $payment['paymentIntent']->created) }}</small>
                    </div>
                    <p class="mb-1">
                    </p>
                    <small>Status : {{ $payment['paymentIntent']->status }}</small>
                </a>
                {{-- {{dd($payment)}}} --}}
            @endforeach
        </div>
    @endif

@endsection