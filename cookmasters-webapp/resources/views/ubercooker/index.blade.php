@extends('layouts.app-master')

@section('title', 'Cooker')

@section('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
@endsection

@section('content')
    <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
        <h1 class="display-4 fw-normal">Plats commandés par les utilisateurs</h1>
        <p class="fs-5 text-body-secondary">Séléctionnez un plat pour le préparer et en informer l'utilisateur.</p>
    </div>
    <table class="table table-striped table-hover display" id="recipes-table">
        <thead class="align-middle text-center">
            <th scope="col">#</th>
            <th scope="col">Image</th>
            <th scope="col">Nom</th>
            <th scope="col">Temps de préparation</th>
            <th scope="col">Quantité</th>
            <th scope="col">Prix</th>
            <th scope="col">Commandé il y a</th>
            <th scope="col">Actions</th>
        </thead>
        <tbody class="align-middle text-center">
            @foreach ($transactions as $tr)
                <tr>
                    <th scope="row" rowspan="{{ count($tr) }}">{{ $loop->iteration }}</th>
                    @foreach ($tr as $transaction)
                        @if (!$loop->first)
                            <tr>
                        @endif
                        <td>
                            @if ($transaction->cookingRecipe->image)
                                <img src="{{ asset($transaction->cookingRecipe->image) }}" alt="{{ $transaction->cookingRecipe->name }}" class="img-fluid" width="100">
                            @else
                                No image
                            @endif
                        </td>
                        <td>{{ $transaction->cookingRecipe->name }}</td>
                        <td>{{ $transaction->cookingRecipe->cooking_time }} minutes</td>
                        <td>{{ $transaction->quantity }}</td>
                        <td>{{ $transaction->cookingRecipe->price }}€</td>
                        <td>{{ $transaction->created_at->diffForHumans() }}</td>
                        @if ($loop->first)
                        <td rowspan="{{ count($tr) }}">
                            @if ($transaction->accepted_at == null)
                                <form action="{{ route('ubercooker.update', $transaction->created_at) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="accepted_at" value="{{ now() }}">
                                    <button type="submit" class="btn btn-primary">Accepter la commande</button>
                                </form>
                            @elseif ($transaction->in_preparation == null)
                                <form action="{{ route('ubercooker.update', $transaction->created_at) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="in_preparation" = value="{{ now() }}">
                                    <button type="submit" class="btn btn-success">Commencer la préparation</button>
                                </form>
                            @elseif ($transaction->in_preparation != null)
                                <a class="btn btn-info" href="{{ route('ubercooker.dlticket', $transaction->created_at) }}" role="button">Imprimer le ticket de livraison</a>
                            @endif
                        </td>
                        @endif
                    </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>

    <div class="my-5"></div>

    @section('scripts')
        {{-- <script type="text/javascript" src="{{ secure_asset('assets/js/ubercook/dataTables.js') }}"></script> --}}
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    @endsection

@endsection
