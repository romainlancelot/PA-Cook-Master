<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Invoice</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    </head>
    <body>
        <div class="container-fluid">
            <h1>Invoice</h1>
            <div class="row">
                <div class="col-6">
                    <h5>From:</h5>
                    <p>Cookmasters</p>
                    <p>242 Rue du Faubourg Saint-Antoine</p>
                    <p>75012, Paris, France</p>
                </div>
                <div class="col-6">
                    <h5>To:</h5>
                    <p>{{ $user->firstname }} {{ $user->lastname }}</p>
                    <p>{{ $user->email }} {{ $user->phone }}</p>
                    @if ($user->address)
                    <p>{{ $user->address }}</p>
                    <p>{{ $user->city }}, {{ $user->state }}, {{ $user->country }}</p>
                    <p>{{ $user->zip_code }}</p>
                    @endif
                </div>
            </div>

            <table class="table table-bordered">
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

            <hr>

            <div class="d-flex justify-content-end">
                <h4>Total: {{ $subtotal }} €</h4>
                <small>Date: {{ $transaction[0]->created_at }}</small>
            </div>
    </body>
</html>