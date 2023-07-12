@extends('layouts.app-master')

@section('title', 'Cooking recipes | edit')

@section('content')
    <div class="bg-light p-5 rounded">
        <div class="container">
            <div class="row">
                <div class="col-10">
                    <h1>Edit cooking recipe: {{ $recipe->name }}</h1>
                </div>
                <div class="col-2">
                    <a href="{{ route('cooking-recipes.index') }}" class="btn btn-secondary">Back</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('cooking-recipes.update', $recipe->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-10">
                                <div class="form-group">
                                    <label for="name">Name:</label>
                                    <input type="text" name="name" id="name" class="form-control" value="{{ $recipe->name }}" required>
                                </div>
                            </div>
                            <div class="col-2 d-flex align-items-center">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="{{ $recipe->deliverable }}" name="deliverable" id="flexCheckDeliverable" @if ($recipe->deliverable) checked @endif>
                                    <label class="form-check-label" for="flexCheckDeliverable">
                                        Deliverable
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea name="description" id="description" class="form-control" required>{{ $recipe->description }}</textarea>
                        </div>
                        <div class="row">
                            @if ($recipe->image)
                                <div class="col-md-8">
                            @else
                                <div class="col-md-12">
                            @endif
                                <div class="form-group">
                                    <label for="cooking_time">Cooking time (minutes):</label>
                                    <input type="number" name="cooking_time" id="cooking_time" class="form-control" value="{{ $recipe->cooking_time }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="people">People:</label>
                                    <input type="number" name="people" id="people" class="form-control" value="{{ $recipe->people }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="image">Image:</label>
                                    <input type="file" accept="image/*" name="image" id="image" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                @if ($recipe->image)
                                    <img src="{{ secure_asset($recipe->image) }}" alt="{{ $recipe->name }}" class="img-fluid">
                                @endif
                            </div>
                        <div class="form-group">
                            <label for="difficulty">Difficulty:</label>
                            <input type="range" name="difficulty" id="difficulty" class="form-range " min="1" max="10" step="1" value="{{ $recipe->difficulty }}" required>
                        </div>
                        <hr>
                        <div class="form-group">
                            <h5>Steps:</h5>
                            <div id="steps">
                                @foreach ($recipe->steps as $step)
                                    <div class="row mb-3">
                                        <div class="col-md-10 mb-3">
                                            <label for="steps_{{ $loop->iteration }}_title">Step {{ $loop->iteration }}</label>
                                            <input type="text" name="steps[{{ $loop->iteration }}][title]" id="steps_{{ $loop->iteration }}_title" class="form-control" value="{{ $step->title }}" required>
                                            <label for="steps_{{ $loop->iteration }}_description">Description</label>
                                            <textarea name="steps[{{ $loop->iteration }}][description]" id="steps_{{ $loop->iteration }}_description" class="form-control">{{ $step->description }}</textarea>
                                        </div>
                                        <div class="col-md-2">
                                            <button class="btn btn-danger w-100" type="button" onclick="removeStep(this)">Remove</button>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="text-center mb-3">
                                <button class="btn btn-secondary w-100" type="button" onclick="addStep()">Add step</button>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            <h5>Ingredients:</h5>
                            <div id="ingredients">
                                @foreach ($recipe->ingredients as $ingredient)
                                    <div class="row mb-3">
                                        <div class="col-md-10">
                                            <label for="ingredient_{{ $loop->iteration }}_name">Ingredient {{ $loop->iteration }}</label>
                                            <input type="text" name="ingredients[{{ $loop->iteration }}][name]" id="ingredient_{{ $loop->iteration }}_name" class="form-control" value="{{ $ingredient->name }}" required>
                                            <label for="ingredient_{{ $loop->iteration }}_quantity">Quantity</label>
                                            <input type="text" name="ingredients[{{ $loop->iteration }}][quantity]" id="ingredient_{{ $loop->iteration }}_quantity" class="form-control" value="{{ $ingredient->pivot->quantity }}">
                                        </div>
                                        <div class="col-md-2">
                                            <button class="btn btn-danger w-100" type="button" onclick="removeIngredient(this)">Remove</button>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="text-center mb-3">
                                <button class="btn btn-secondary w-100" type="button" onclick="addIngredient()">Add ingredient</button>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script type="text/javascript" src="{{ secure_asset('assets/js/cooking-recipes/create.js') }}"></script>
@endsection
