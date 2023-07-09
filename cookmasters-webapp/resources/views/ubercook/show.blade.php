@extends('layouts.app-master')

@section('title', "Ubercook | $recipe->name")

@section('content')
    <div class="bg-light p-5 rounded">
        <div class="container">
            <div class="row">
                <div class="col-10">
                    <h1>{{ $recipe->name }}</h1>
                </div>
                <div class="col-2">
                    <a href="{{ route('ubercook.index') }}" class="btn btn-secondary">Back</a>
                </div>
            </div>
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
                    {{-- <a href="{{ route('ubercook.index') }}" class="btn btn-success w-100 mt-3">Ajouter au panier</a> --}}
                    <form action="{{ route('cart.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="recipe_id" value="{{ $recipe->id }}">
                        <div class="row mt-3">
                            <div class="col-3">
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="quantity">Quantité</label>
                                    <input type="number" class="form-control" id="quantity" name="quantity" value="1">
                                </div>
                            </div>
                            <div class="col-9">
                                <button type="submit" class="btn btn-success w-100">Ajouter au panier</button>
                            </div>
                        </div>
                    </form>
                    <hr class="m-5">
                    <h4>Avis</h4>
                    <div class=card-text>
                        @if ($recipe->comments()->get()->isNotEmpty())
                            <div class="row">
                                @foreach ($recipe->comments()->get() as $comment)
                                    <div class="col-md-4 border border-1 rounded p-3">
                                        @for ($i = 0; $i < $comment->rating; $i++)
                                            <span class="text-warning">&#9733;</span>
                                        @endfor
                                        <blockquote>
                                            {{ $comment->body }}
                                        </blockquote>
                                        <hr>
                                        <cite><img src="{{ secure_asset($comment->user->image) }}" height="30" width="30" class="img-fluid rounded-circle"> - {{ $comment->user->lastname }} {{ $comment->user->firstname }} </cite>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p>Aucun avis pour le moment, soyez le premier à laisser un avis !</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
