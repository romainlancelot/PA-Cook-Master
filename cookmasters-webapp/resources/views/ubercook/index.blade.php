@extends('layouts.app-master')

@section('title', 'Ubercook')

@section('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
@endsection

@section('content')
    <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
        <h1 class="display-4 fw-normal">Commander un plat</h1>
        <p class="fs-5 text-body-secondary">Explorez notre collection de recettes de cuisine et découvrez de nouveaux plats savoureux.</p>
        @if (auth()->user()->subscriptionPlan->name == 'Free' && auth()->user()->role_name() == 'user')
            <p class="fs-5 text-body-secondary">
                Passez à l'abonnement premium et bénéficiez de 10% de réduction sur tous les plats.<br>
                <a href="{{ route('subscription-plans.index') }}">Découvrez nos abonnements</a>
            </p>
        @endif
    </div>
    <table class="table table-striped table-hover display" id="recipes-table">
        <thead>
            <th scope="col">Image</th>
            <th scope="col">Nom</th>
            <th scope="col">Description</th>
            <th scope="col">Temps de préparation</th>
            <th scope="col">Prix</th>
            <th scope="col">Note moyenne</th>
            <th scope="col">Actions</th>
        </thead>
        <tbody>
            @foreach ($recipes as $recipe)
                <tr>
                    <td scope="row">
                        @if ($recipe->image)
                            <img src="{{ secure_asset($recipe->image) }}" alt="{{ $recipe->name }}" class="img-fluid" width="100">
                        @else
                            No image
                        @endif
                    </td>
                    <td>{{ $recipe->name }}</td>
                    <td>{{ $recipe->description }}</td>
                    <td>{{ $recipe->cooking_time }} minutes</td>
                    <td>{{ $recipe->price }}€</td>
                    <td>@if ($recipe->averageRating() != null) {{ $recipe->averageRating() }}/5 @else Aucun avis @endif</td>
                    <td>
                        <a href="{{ route('ubercook.show', $recipe->id) }}" class="btn btn-primary">Voir le plat</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="my-5"></div>

    @section('scripts')
        <script type="text/javascript" src="{{ secure_asset('assets/js/ubercook/dataTables.js') }}"></script>
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    @endsection

@endsection
