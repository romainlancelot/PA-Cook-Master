@extends('layouts.app-master')

@section('title', "Cooking recipe | $recipe->name"))

@section('content')
    <div class="bg-light p-5 rounded">
        <div class="container">
            <div class="row">
                <div class="col-10">
                    <h1>Recipe {{ $recipe->name }}</h1>
                </div>
                <div class="col-2">
                    <a href="{{ route('cooking-recipes.index') }}" class="btn btn-secondary">Back</a>
                </div>
            </div>
            {{-- {{dd($recipe)}} --}}
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Description</h5>
                    <div class="row">
                        <div class="col-md-8">
                            <p class="card-text">{{ $recipe->description }}</p>
                            <hr class="m-5">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Cooking time</th>
                                        <th scope="col">People</th>
                                        <th scope="col">Difficulty</th>
                                        <th scope="col">Deliverable</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $recipe->cooking_time }} minutes</td>
                                        <td>{{ $recipe->people }}</td>
                                        <td>{{ $recipe->difficulty }} / 10</td>
                                        <td>@if ($recipe->deliverable) <i class="bi bi-check2-circle"></i> @else <i class="bi bi-x"></i> @endif</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        @if ($recipe->image)
                            <div class="col-md-4">
                                <img src="{{ asset($recipe->image) }}" alt="{{ $recipe->name }}" class="img-fluid">
                            </div>
                        @endif
                    </div>
                    <hr class="m-5">
                    <h4>Steps</h4>
                    <div class=card-text>
                        @if ($recipe->steps->isEmpty())
                            <p>No steps</p>
                        @else
                            <ol>
                                @foreach ($recipe->steps as $step)
                                    <li><strong>{{ $step->title }}</strong></li>
                                    @if ($step->description)
                                        <p>{{ $step->description }}</p>
                                    @endif
                                @endforeach
                            </ol>
                        @endif
                    </div>
                    <hr class="m-5">
                    <h4>Ingredients</h4>
                    @if ($recipe->ingredients->isEmpty())
                        <p>No ingredients</p>
                    @else
                        <ul>
                            @foreach ($recipe->ingredients as $ingredient)
                                <li>{{ $ingredient->name }} @if ($ingredient->pivot->quantity) - {{ $ingredient->pivot->quantity }} @endif</li>
                            @endforeach
                        </ul>
                    @endif                    
                </div>
            </div>
        </div>
    </div>
@endsection
