@extends('layouts.app-master')

@section('title', 'Cooking recipes | create')

@section('content')
    <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
        <h1 class="display-4 fw-normal">Create new Cooking recipe</h1>
        <p class="fs-5 text-body-secondary">Discover new recipes and cooking techniques every week with our cooking lessons.</p>
    </div>

    <div class="p-5 rounded">
    <div class="container">
        <h1>Create Room Offer</h1>
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('cooking-recipes.store') }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="name">Name:</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="description">Description:</label>
                        <textarea name="description" id="description" class="form-control" required></textarea>
                    </div>
                    <div class="form-group mb-3">
                        <label for="duration">Duration (minutes):</label>
                        <input type="number" name="duration" id="duration" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="people">People:</label>
                        <input type="number" name="people" id="people" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="picture">Picture:</label>
                        <input type="file" name="picture" id="picture" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="difficulty">Difficulty:</label>
                        <input type="range" name="difficulty" id="difficulty" class="form-range " min="1" max="10" step="1" required>
                    </div>

                    <div id="steps"></div>
                    <div class="text-center mb-3">
                        <button class="btn btn-secondary w-100" onclick="addStep()">Add step</button>
                    </div>

                    <div id="ingredients"></div>
                    <div class="text-center mb-3">
                        <button class="btn btn-secondary w-100" onclick="addIngredient()">Add ingredient</button>
                    </div>
                    <button type="submit" class="btn btn-primary w-100 mt-4">Create</button>
                </form>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
<script type="text/javascript" src="{{ secure_asset('assets/js/cooking-recipes/create.js') }}"></script>
@endsection