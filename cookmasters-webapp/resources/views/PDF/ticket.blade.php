<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Ticket</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    </head>
    <body class="h-100 w-100 m-0 p-0">
        <div class="container-fluid">
            <h1>Cookmasters</h1>
            <div class="row">
                <div class="col-6">
                    <h5>To:</h5>
                    <p>{{ $transaction[0]->user->firstname }} {{ $transaction[0]->user->lastname }}</p>
                    <p>{{ $transaction[0]->user->email }} {{ $transaction[0]->user->phone }}</p>
                    @if ($transaction[0]->user->address)
                    <p>{{ $transaction[0]->user->address }}</p>
                    <p>{{ $transaction[0]->user->city }}, {{ $transaction[0]->user->state }}, {{ $transaction[0]->user->country }}</p>
                    <p>{{ $transaction[0]->user->zip_code }}</p>
                    @endif
                </div>
            </div>

            <hr>

            <ol>
                @foreach($transaction as $item)
                    @if ($item['equipment'] != null)        @php $item_model = $item['equipment']       @endphp @endif
                    @if ($item['cookingRecipe'] != null)    @php $item_model = $item['cookingRecipe']   @endphp @endif
                    <li>
                        {{ $item_model->name }}<br>
                        {{ $item['quantity'] }} x {{ $item_model->price }} €<br>
                        sous tot. {{ $item_model->price * $item['quantity'] }} €
                    </li>
                @endforeach
            </ol>

            <hr>

            <div class="d-flex justify-content-end">
                <h4>Total: {{ $subtotal }} €</h4>
                <small>Date: {{ $transaction[0]->created_at }}</small>
            </div>
    </body>
</html>