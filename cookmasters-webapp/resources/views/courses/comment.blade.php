@extends('layouts.app-master')

@section('title', "Cooking recipe | Comment")

@section('styles')
    <link rel="stylesheet" href="{{ secure_asset('assets/css/cooking-recipes.css') }}">
@endsection

@section('content')
    <div class="bg-light p-5 rounded">
        <div class="container">
            <div class="row mb-4">
                <div class="col-10">
                    <h1>Laissez un commentaire sur votre commande</h1>
                </div>
                <div class="col-2">
                    <a href="{{ route('cooking-recipes.index') }}" class="btn btn-secondary">Back</a>
                </div>
            </div>
            @foreach ($recipes as $recipe)
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">{{ $recipe->name }}</h5>
                        <div class="row">
                            <div class="col-md-8">
                                <p class="card-text">{{ $recipe->description }}</p>
                                <hr class="m-5">
                                <form action="{{ route('cooking-recipes.comment.create', $recipe->id) }}" method="POST">
                                    @csrf
                                    <div class="star-rating star-5 mb-3">
                                        <span class="star-rating star-5">
                                            <input type="radio" name="rating" value="1"><i></i>
                                            <input type="radio" name="rating" value="2"><i></i>
                                            <input type="radio" name="rating" value="3"><i></i>
                                            <input type="radio" name="rating" value="4"><i></i>
                                            <input type="radio" name="rating" value="5"><i></i>
                                        </span>
                                    </div>
                                    <div class="mb-3">
                                        <label for="comment" class="form-label">Commentaire</label>
                                        <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Publier</button>
                                </form>
                            </div>
                            @if ($recipe->image)
                                <div class="col-md-4">
                                    <img src="{{ secure_asset($recipe->image) }}" alt="{{ $recipe->name }}" class="img-fluid">
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
