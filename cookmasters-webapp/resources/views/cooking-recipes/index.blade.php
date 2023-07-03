@extends('layouts.app-master')

@section('title', 'Cooking recipes')

@section('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
@endsection

@section('content')
    <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
        <h1 class="display-4 fw-normal">Cooking Recipes</h1>
        <p class="fs-5 text-body-secondary">Explore our collection of cooking recipes and discover new tasty meals.</p>
        @if (auth()->user()->subscriptionPlan->name == 'Free' && auth()->user()->role_name() == 'user')
            <p class="fs-5 text-body-secondary">
                You can only see recipes cookmasters and users have shared.<br>
                <a href="{{ route('subscription-plans.index') }}">Upgrade your subscription plan</a> to see recipes from our chefs.
            </p>
        @endif
    </div>
    @if (auth()->user()->role_name() == 'admin')
        <a class="btn btn-primary mb-5" href="{{ route('cooking-recipes.create') }}">Create new Cooking recipe</a>
    @endif
    <table class="table table-striped table-hover display" id="recipes-table">
        <thead>
            <th scope="col">Image</th>
            <th scope="col">Nom</th>
            <th scope="col">Description</th>
            <th scope="col">Temps de préparation</th>
            <th scope="col">Personnes</th>
            <th scope="col">Difficulté</th>
            <th scope="col">Certification</th>
            <th scope="col">Actions</th>
        </thead>
        <tbody>
            @foreach ($recipes as $recipe)
                @if (auth()->user()->subscriptionPlan->name == 'Free' && $recipe->user->role_name() == 'presta' && auth()->user()->role_name() == 'user')
                    @continue
                @endif
                <tr>
                    <td scope="row">
                        @if ($recipe->image)
                            <img src="{{ asset($recipe->image) }}" alt="{{ $recipe->name }}" class="img-fluid" width="100">
                        @else
                            No image
                        @endif
                    </td>
                    <td>{{ $recipe->name }}</td>
                    <td>{{ $recipe->description }}</td>
                    <td>{{ $recipe->cooking_time }} minutes</td>
                    <td>{{ $recipe->people }}</td>
                    <td>{{ $recipe->difficulty }} / 10</td>
                    <td>
                        @if ($recipe->user->role_name() == 'presta')
                            <span class="badge bg-success">Chef cuisinier</span>
                        @elseif ($recipe->user->role_name() == 'admin')
                            <span class="badge bg-primary">Personnel cookmasters</span>
                        @else
                            <span class="badge bg-warning">Non certifié</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('cooking-recipes.show', $recipe->id) }}" class="btn btn-primary">Voir la recette</a>
                        @if (auth()->user()->role_name() == 'admin' || auth()->user()->role_name() == 'presta')
                            <a href="{{ route('cooking-recipes.edit', $recipe->id) }}" class="btn btn-secondary">Modifier</a>
                            <form action="{{ route('cooking-recipes.destroy', $recipe->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">Supprimer</button>
                            </form>
                        @endif
                    </td>
                    </div>
                </div>
            @endforeach
        </tbody>
    </table>

    @section('scripts')
        <script type="text/javascript" src="{{ secure_asset('assets/js/cooking-recipes/dataTables.js') }}"></script>
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    @endsection

@endsection
