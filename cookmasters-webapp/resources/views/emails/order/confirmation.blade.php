@extends('layouts.email')

@section('content')

    <h1>Confirmation de commande</h1>
    <h3>Bonjour {{ $transaction[0]->user->firstname }},</h3>

    <img class="my-3" src="{{ secure_asset('images/cookmaster-logo.png') }}" alt="Logo" class="img-fluid" height="100" width="100">

    <p>Nous vous confirmons la prise en compte de votre commande du {{ $transaction[0]->created_at->format('d/m/Y à H:i') }}.</p>

    <table class="table table-bordered my-3">
        <thead>
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Unit Price</th>
                <th>Total Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transaction as $item)
                @if ($item['equipment'] != null)        @php $item_model = $item['equipment']       @endphp @endif
                @if ($item['cookingRecipe'] != null)    @php $item_model = $item['cookingRecipe']   @endphp @endif
                <tr>
                    <td>{{ $item_model->name }}</td>
                    <td>{{ $item['quantity'] }}</td>
                    <td>{{ $item_model->price }} €</td>
                    <td>{{ $item_model->price * $item['quantity'] }} €</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <h4 class="mb-5">Total: {{ $subtotal }} €</h4>

    <p>Vous pouvez suivre l'avancement de votre commande sur votre compte en cliquant sur le lien suivant : <a href="{{ route('account.show') }}">Suivre ma commande</a></p>
    <p>En cas de problème, n'hésitez pas à nous contacter à l'adresse suivante : <a href="mailto:{{ config('mail.from.address') }}">{{ config('mail.from.address') }}</a></p>
    <p>A bientôt sur <a href="{{ route('home') }}">Cookmasters</a> !</p>

@endsection