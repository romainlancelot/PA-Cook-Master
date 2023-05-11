@extends('layouts.admin-master')

@section('title', 'Admin')

@section('content')
    <h1>Gestion des utilisateurs</h1>
    
    <table class="table shadow-sm">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Prénom</th>
                <th scope="col">Nom</th>
                <th scope="col">Pseudo</th>
                <th scope="col">Email</th>
                <th scope="col">Rôle</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <th scope="row">{{ $loop->index + 1 }}</th>
                    <td>{{ $user->firstname }}</td>
                    <td>{{ $user->lastname }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
                    <td>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#user{{ $loop->index+1 }}">
                            Modifier
                        </button>
                        <div class="modal modal-lg fade" id="user{{ $loop->index+1 }}" tabindex="-1" aria-labelledby="user{{ $loop->index+1 }}Label" aria-hidden="true">
                            <form action="{{ route('admin.users.edit', $user->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="user{{ $loop->index+1 }}Label">Modifier le profil de {{ $user->firstname }} {{ $user->lastname }}</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" for="firstname">Prénom</span>
                                                        <input type="text" class="form-control" id="firstname" name="firstname" value="{{ $user->firstname }}">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" for="lastname">Nom</span>
                                                        <input type="text" class="form-control" id="lastname" name="lastname" value="{{ $user->lastname }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" for="username">Pseudo</span>
                                                <input type="text" class="form-control" id="username" name="username" value="{{ $user->username }}">
                                            </div>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" for="email">Email</span>
                                                <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
                                            </div>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" for="role">Rôle</span>
                                                <select class="form-select" aria-label="Default select example" id="role" name="role">
                                                    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                                    <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
                                                </select>
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
                        <a href="{{ route('admin.users.delete', $user->id) }}" class="btn btn-danger">Supprimer</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
        
@endsection