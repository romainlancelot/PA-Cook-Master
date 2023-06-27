@extends('layouts.app-master')

@section('title', 'Account')

@section('content')
    <h1>{{ auth()->user()->firstname }} {{ auth()->user()->lastname }}</h1><br>

    <h2>Informations personnelles</h2>

    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-3 border-end">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                    <img class="rounded-circle mt-5" width="150px" src="@if (auth()->user()->image != null) {{ secure_asset(auth()->user()->image) }} @else {{ secure_asset('images/users/default.png') }} @endif">
                    <span class="font-weight-bold">{{ auth()->user()->firstname }} {{ auth()->user()->lastname }}</span>
                    <span class="text-black-50">{{ auth()->user()->email }}</span>
                    <span></span>
                </div>
                <div class="mt-5 text-center">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#profilePicture">Modifier la photo de profil</button>
                </div>

            </div>
            <div class="col-md-5 border-end">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Profile Settings</h4>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6"><label class="labels">Firstname</label><input type="text" class="form-control" placeholder="firstname" value="{{ auth()->user()->firstname }}" disabled></div>
                        <div class="col-md-6"><label class="labels">Lastname</label><input type="text" class="form-control" value="{{ auth()->user()->lastname }}" placeholder="lastname" disabled></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12"><label class="labels">Username</label><input type="text" class="form-control" placeholder="username" value="{{ auth()->user()->username }}" disabled></div>
                        <div class="col-md-12"><label class="labels">Email</label><input type="text" class="form-control" placeholder="email" value="{{ auth()->user()->email }}" disabled></div>
                    </div>
                    <div class="mt-5 text-center">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#userUpdate">Modifier</button><br>
                    </div>
                    <div class="mt-2 text-center">
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#changePassword">Changer de mot de passe</button>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteAccount">Supprimer mon compte</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center experience">
                        <h4 class="text-right">Abonnement</h4>
                    </div><br>
                    <div class="col-md-12"><label class="labels">Current Plan</label><input type="text" class="form-control" placeholder="current plan" value="{{ auth()->user()->subscriptionPlan()->value('name') }}" disabled></div>
                    <div class="col-md-12"><label class="labels">Price</label><input type="text" class="form-control" placeholder="price" value="{{ auth()->user()->subscriptionPlan()->value('price') }}€/mois" disabled></div>
                    <div class="col-md-12"><label class="labels">Duration</label><input type="text" class="form-control" placeholder="duration" value="@if (auth()->user()->subscriptionPlan()->value('duration') == 0) Abonnement à vie @else {{ auth()->user()->subscriptionPlan()->value('duration') }} mois @endif" disabled></div>
                    @if ($subscription != null)
                        @foreach ($subscription as $sub)
                            <div class="col-md-12"><label class="labels">Subscribed since</label><input type="text" class="form-control" placeholder="subscribed since" value="{{ date('d/m/Y', $sub->start_date) }}" disabled></div>
                            <div class="col-md-12"><label class="labels">Last billing</label><input type="text" class="form-control" placeholder="last billing" value="{{ date('d/m/Y', $sub->current_period_start) }}" disabled></div>
                            <div class="col-md-12"><label class="labels">Next billing</label><input type="text" class="form-control" placeholder="next billing" value="{{ date('d/m/Y', $sub->current_period_end) }}" disabled></div>
                            <div class="col-md-12"><label class="labels">Status</label><input type="text" class="form-control" placeholder="status" value="{{ $sub->status }}" disabled></div>
                        @endforeach
                    @endif
                    <div class="mt-5 text-center">
                        <a href="{{ route('subscription-plans.index') }}" class="btn btn-primary">Voir les abonnements disponibles</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>

    <div class="modal fade" id="profilePicture" tabindex="-1" aria-labelledby="profilePictureLabel" aria-hidden="true">
        <form action="{{ route('account.update.profile-picture') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="profilePictureLabel">Modifier la photo de profil de {{ auth()->user()->firstname }} {{ auth()->user()->lastname }}</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="text-center">
                            <img class="rounded-circle" width="150px" src="@if (auth()->user()->image != null) {{ secure_asset(auth()->user()->image) }} @else {{ secure_asset('images/users/default.png') }} @endif" class="img-fluid" alt="{{ auth()->user()->firstname }} {{ auth()->user()->lastname }}">
                        </div>
                        <div class="input-group mb-3 mt-3">
                            <input type="file" class="form-control" id="image" name="image" accept="image/png, image/jpeg, image/jpg">
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="removeImage" value="true" id="removeImage">
                            <label class="form-check-label" for="removeImageDefault">
                                Supprimer la photo de profil
                            </label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dprimaryismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary">Modifier</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

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