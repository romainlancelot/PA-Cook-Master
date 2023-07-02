@extends('layouts.app-master')

@section('title', 'Cooking recipes')

@section('content')
    <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
        <h1 class="display-4 fw-normal">Cooking Recipes</h1>
        <p class="fs-5 text-body-secondary">Explore our collection of cooking recipes and discover new tasty meals.</p>
    </div>
    <a class="btn btn-primary" href="{{ route('cooking-recipes.create') }}">Create new Cooking recipe</a>

    @foreach ($recipes as $recipe)
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">{{ $recipe->name }}</h5>
                <p class="card-text">{{ $recipe->description }}</p>
                <a href="{{ route('cooking-recipes.show', $recipe->id) }}" class="btn btn-primary">View</a>
                <a href="{{ route('cooking-recipes.edit', $recipe->id) }}" class="btn btn-secondary">Edit</a>
                <form action="{{ route('cooking-recipes.destroy', $recipe->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    @endforeach

@endsection
