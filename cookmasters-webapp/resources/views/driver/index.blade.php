@extends('layouts.app-master')

@section('title', 'Cooker')

@section('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
@endsection

@section('content')
    <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
        <h1 class="display-4 fw-normal">Plats préparés et prêts à être livrés</h1>
        <p class="fs-5 text-body-secondary">Séléctionnez un plat à livrer et en informer l'utilisateur.</p>
    </div>
    <table class="table table-striped table-hover display" id="recipes-table">
        <thead class="align-middle text-center">
            <th scope="col">#</th>
            <th scope="col">Image</th>
            <th scope="col">Nom</th>
            <th scope="col">Temps de livraison estimé</th>
            <th scope="col">Adresse de livraison</th>
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
                                <img src="{{ secure_asset($transaction->cookingRecipe->image) }}" alt="{{ $transaction->cookingRecipe->name }}" class="img-fluid" width="100">
                            @else
                                No image
                            @endif
                        </td>
                        <td>{{ $transaction->cookingRecipe->name }}</td>
                        @if ($loop->first)
                        <td rowspan="{{ count($tr) }}">
                            {{-- <a href="https://www.google.com/maps/dir/?api=1&origin={{ $transaction->cookingRecipe->user->address->line1 }} {{ $transaction->cookingRecipe->user->address->line2 }} {{ $transaction->cookingRecipe->user->address->city }} {{ $transaction->cookingRecipe->user->address->postal_code }} {{ $transaction->cookingRecipe->user->address->country }}&destination={{ $transaction->address->line1 }} {{ $transaction->address->line2 }} {{ $transaction->address->city }} {{ $transaction->address->postal_code }} {{ $transaction->address->country }}&travelmode=driving" target="_blank" class="btn btn-primary">Voir dans google maps</a> --}}
                        </td>
                        <td rowspan="{{ count($tr) }}">
                            {{ $transaction->address->line1 }}
                            @if ($transaction->address->line2)
                                <br>{{ $transaction->address->line2 }}
                            @endif
                            <br>{{ $transaction->address->city }}, {{ $transaction->address->postal_code }}
                            <br>{{ $transaction->address->country }}
                            <br><a class="btn btn-primary mt-2" href="https://www.google.com/maps/search/?api=1&query={{ $transaction->address->line1 }} {{ $transaction->address->line2 }} {{ $transaction->address->city }} {{ $transaction->address->postal_code }} {{ $transaction->address->country }}" target="_blank">Voir dans google maps</a>
                        </td>
                        @endif
                        <td>{{ $transaction->created_at->diffForHumans() }}</td>
                        @if ($loop->first)
                        <td rowspan="{{ count($tr) }}">
                            @if ($transaction->in_preparation != null && $transaction->in_delivery == null)
                                <form action="{{ route('driver.update', $transaction->created_at) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="in_delivery" value="{{ now() }}">
                                    <button type="submit" class="btn btn-primary">Prendre en charge la livraison</button>
                                </form>
                            @elseif ($transaction->in_delivery != null && $transaction->delivered_at == null)
                                <form action="{{ route('driver.update', $transaction->created_at) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="delivered_at" value="{{ now() }}">
                                    <button type="submit" class="btn btn-success">Changer le statut à livré</button>
                                </form>
                            @else
                                Plat livré à {{ $transaction->delivered_at->format('d/m/Y H:i') }}
                            @endif
                            <a href="{{ route('chat.show', $transaction->user->username) }}" class="btn btn-primary mt-2">Contacter le client</a>
                            <br>tel. client : <a href="tel:{{ $transaction->phone }}">{{ $transaction->phone }}</a>
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
