<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Invoice</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <h1>Invoice</h1>
            <div class="row">
                <div class="col-md-6">
                    <h5>From:</h5>
                    <p>Cookmasters</p>
                    <p>242 Rue du Faubourg Saint-Antoine</p>
                    <p>75012, Paris, France</p>
                </div>
                <div class="col-md-6">
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
                    {{-- {{ dd($item->equipment) }}} --}}
                        <tr>
                            <td>{{ $item['equipment']->name }}</td>
                            <td>{{ $item['quantity'] }}</td>
                            <td>{{ $item['equipment']->price }} €</td>
                            <td>{{ $item['equipment']->price * $item['quantity'] }} €</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <hr>

            <div class="d-flex justify-content-end">
                <h4>Total: {{ $subtotal }} €</h4>
            </div>
    </body>
</html>