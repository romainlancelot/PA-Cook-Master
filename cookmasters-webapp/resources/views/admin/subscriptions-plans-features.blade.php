@extends('layouts.admin-master')
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('title', 'Admin')

@section('content')
    <h1>Gestion des features</h1>

    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newFeature">
        Ajouter une feature
    </button>
    <div class="modal modal-lg fade" id="newFeature" tabindex="-1" aria-labelledby="newFeatureLabel" aria-hidden="true">
        <form action="{{ route('admin.subscriptions-plans.feature.add') }}" method="POST">
            @csrf
            @method('PUT')
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="newFeatureLabel">Ajouter une nouvelle feature</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <span class="input-group-text" for="name">Nom</span>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
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
                <th scope="col">Description</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($features as $feature)
                <tr>
                    <th scope="row">{{ $loop->index + 1 }}</th>
                    <td>{{ $feature->name }}</td>
                    <td>{{ $feature->description }}</td>
                    <td>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#featureUpdate{{ $loop->index+1 }}">
                            Modifier
                        </button>
                        <div class="modal modal-lg fade" id="featureUpdate{{ $loop->index+1 }}" tabindex="-1" aria-labelledby="featureUpdate{{ $loop->index+1 }}Label" aria-hidden="true">
                            <form action="{{ route('admin.subscriptions-plans.feature.update', $feature->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="featureUpdate{{ $loop->index+1 }}Label">Modifier la feature "{{ $feature->name }}"</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" for="name">Nom</span>
                                                <input type="text" class="form-control" id="name" name="name" value="{{ $feature->name }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="description" class="form-label">Description</label>
                                                <textarea class="form-control" id="description" name="description" rows="3">{{ $feature->description }}</textarea>
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
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#featureDelete{{ $loop->index+1 }}">
                            Supprimer
                        </button>
                        <div class="modal modal-lg fade" id="featureDelete{{ $loop->index+1 }}" tabindex="-1" aria-labelledby="featureDelete{{ $loop->index+1 }}Label" aria-hidden="true">
                            <form action="{{ route('admin.subscriptions-plans.feature.delete', $feature->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="featureDelete{{ $loop->index+1 }}Label">Supprimer l'abonnement "{{ $feature->name }}" ?</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>
                                                Etes-vous sûr de vouloir supprimer l'abonnement {{ $feature->name }} ?<br>
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
        </tbody>
    </table>
@endsection