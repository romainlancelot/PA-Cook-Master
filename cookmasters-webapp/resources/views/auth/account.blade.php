@extends('layouts.app-master')

@section('title', 'Account')

@section('content')
    <h1>{{ auth()->user()->firstname }} {{ auth()->user()->lastname }}</h1><br>

    <h2>Informations personnelles</h2>
    <ul>
        <li>Email: {{ auth()->user()->email }}</li>
        <li>Username: {{ auth()->user()->username }}</li>
    </ul>
    
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#userUpdate">
        Modifier
    </button>
    <div class="modal modal-lg fade" id="userUpdate" tabindex="-1" aria-labelledby="userUpdateLabel" aria-hidden="true">
        <form action="{{ route('account.update') }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="userUpdateLabel">Modifier le profil de {{ auth()->user()->firstname }} {{ auth()->user()->lastname }}</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" for="firstname">Prénom</span>
                                    <input type="text" class="form-control" id="firstname" name="firstname" value="{{ auth()->user()->firstname }}">
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" for="lastname">Nom</span>
                                    <input type="text" class="form-control" id="lastname" name="lastname" value="{{ auth()->user()->lastname }}">
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" for="username">Pseudo</span>
                            <input type="text" class="form-control" id="username" name="username" value="{{ auth()->user()->username }}">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" for="email">Email</span>
                            <input type="email" class="form-control" id="email" name="email" value="{{ auth()->user()->email }}">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary">Modifier</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#changePassword">
        Changer de mot de passe
    </button>
    <div class="modal modal-lg fade" id="changePassword" tabindex="-1" aria-labelledby="changePasswordLabel" aria-hidden="true">
        <form action="{{ route('account.update.password') }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="changePasswordLabel">Modifier le mot de passe de {{ auth()->user()->firstname }} {{ auth()->user()->lastname }}</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p class="text-center mb-3">
                            Attention, vous allez être déconnecté après avoir modifié votre mot de passe.<br>
                            <b class="text-danger">Cette action est irréversible.</b>
                        </p>
                        <div class="input-group mb-3">
                            <span class="input-group-text" for="currentPassword">Ancien mot de passe</span>
                            <input type="password" class="form-control" id="currentPassword" name="currentPassword">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" for="newPassword">Nouveau mot de passe</span>
                            <input type="password" class="form-control" id="newPassword" name="newPassword"">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" for="newPasswordConfirmation">Confirmer le nouveau mot de passe</span>
                            <input type="password" class="form-control" id="newPasswordConfirmation" name="newPasswordConfirmation" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-danger">Modifier</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteAccount">
        Supprimer mon compte
    </button>
    <div class="modal modal-lg fade" id="deleteAccount" tabindex="-1" aria-labelledby="deleteAccountLabel" aria-hidden="true">
        <form action="{{ route('account.delete') }}" method="POST">
            @csrf
            @method('DELETE')
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="deleteAccountLabel">Supprimer le compte de {{ auth()->user()->firstname }} {{ auth()->user()->lastname }}</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p class="text-center mb-3">
                            Attention, votre compte sera supprimé ainsi que toutes les données qui y sont liées.<br>
                            <b class="text-danger">Cette action est irréversible.</b>
                        </p>
                        <div class="input-group mb-3">
                            <span class="input-group-text" for="password">Mot de passe</span>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

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
            @if ($subscription != null)
                @foreach ($subscription as $sub)
                    <li>Abonné depuis le {{ date('d/m/Y', $sub->start_date) }}</li>
                    <li>Dernière facturation : {{ date('d/m/Y', $sub->current_period_start) }}</li>
                    <li>Prochaine facturation : {{ date('d/m/Y', $sub->current_period_end) }}</li>
                    <li>Statut : {{ $sub->status }}</li>
                @endforeach
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