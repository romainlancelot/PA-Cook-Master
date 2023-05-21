@extends('layouts.admin-master')
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('title', 'Admin')

@section('content')
    <h1>Gestion des abonnements</h1>

    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newPlan">
        Créer un nouvel abonnement
    </button>
    <div class="modal modal-lg fade" id="newPlan" tabindex="-1" aria-labelledby="newPlanLabel" aria-hidden="true">
        <form action="{{ route('admin.subscriptions-plans.add') }}" method="POST">
            @csrf
            @method('PUT')
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="newPlanLabel">Ajouter un nouvel abonnement</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" for="name">Nom</span>
                                    <input type="text" class="form-control" id="name" name="name">
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" for="price">Prix</span>
                                    <input type="number" class="form-control" id="price" name="price">
                                    <span class="input-group-text" for="price">€/mois</span>
                                </div>                        
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="input-group">
                                <span class="input-group-text" for="duration">Duration</span>
                                <input type="number" class="form-control" id="duration" name="duration">
                                <span class="input-group-text" for="duration">mois</span>
                            </div>
                            <small class="text-muted">0 pour un abonnement à vie</small>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary">Ajouter</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <table class="table shadow-sm">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Duration</th>
                <th scope="col">Price</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($subscriptions_plans as $plan)
                <tr>
                    <th scope="row">{{ $loop->index + 1 }}</th>
                    <td>{{ $plan->subscription_name }}</td>
                    <td>{{ $plan->subscription_duration }}</td>
                    <td>{{ $plan->subscription_price }}</td>
                    <td>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#planUpdate{{ $loop->index+1 }}">
                            Modifier
                        </button>
                        <div class="modal modal-lg fade" id="planUpdate{{ $loop->index+1 }}" tabindex="-1" aria-labelledby="planUpdate{{ $loop->index+1 }}Label" aria-hidden="true">
                            <form action="{{ route('admin.subscriptions-plans.update', $plan->subscription_id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="planUpdate{{ $loop->index+1 }}Label">Modifier l'abonnement "{{ $plan->subscription_name }}"</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" for="name">Nom</span>
                                                        <input type="text" class="form-control" id="name" name="name" value="{{ $plan->subscription_name }}">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" for="price">Prix</span>
                                                        <input type="text" class="form-control" id="price" name="price" value="{{ $plan->subscription_price }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" for="duration">Duration</span>
                                                <input type="text" class="form-control" id="duration" name="duration" value="{{ $plan->subscription_duration }}">
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
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#planDelete{{ $loop->index+1 }}">
                            Supprimer
                        </button>
                        <div class="modal modal-lg fade" id="planDelete{{ $loop->index+1 }}" tabindex="-1" aria-labelledby="planDelete{{ $loop->index+1 }}Label" aria-hidden="true">
                            <form action="{{ route('admin.subscriptions-plans.delete', $plan->subscription_id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="planDelete{{ $loop->index+1 }}Label">Supprimer l'abonnement "{{ $plan->subscription_name }}" ?</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>
                                                Etes-vous sûr de vouloir supprimer l'abonnement {{ $plan->subscription_name }} ?<br>
                                                <span class="fw-bold text-danger">Attention :</span> Cette action est irréversible !
                                            </p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                            <button type="submit" class="btn btn-danger">Supprimer</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        <tbody>
        </tbody>
        
@endsection