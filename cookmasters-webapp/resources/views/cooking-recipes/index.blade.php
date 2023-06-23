@extends('layouts.app-master')

@section('title', 'Cooking recipes')

@section('content')
    <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
        <h1 class="display-4 fw-normal">Cooking Recipes</h1>
        <p class="fs-5 text-body-secondary">Explore our collection of cooking recipes and discover new tasty meals.</p>
    </div>
    <a class="btn btn-primary" href="{{ route('cooking-recipes.create') }}">Create new Cooking recipe</a>

    {{ $recipes }}
@endsection
