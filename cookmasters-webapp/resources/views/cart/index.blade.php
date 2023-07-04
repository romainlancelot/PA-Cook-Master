@extends('layouts.app-master')

@section('title', 'Cart')

@section('content')
    <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
        <h1 class="display-4 fw-normal">Cart</h1>
        <p class="fs-5 text-body-secondary">Finalize your order</p>
    </div>

    <div class="row">
        <div class="col-md-8">
            @if(count($cart) > 0)
                <div class="card">
                    <div class="card-body">
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th scope="col">Product</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Unit Price</th>
                                    <th scope="col">Total Price</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cart as $item)
                                    <tr>
                                        <td>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    {{-- <img src="{{ asset('storage/images/'.$item['equipment']->options->photo) }}" alt="{{ $item['equipment']->name }}" class="img-fluid"> --}}
                                                </div>
                                                <div class="col-md-9">
                                                    <p>{{ $item['equipment']->name }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <form action="{{ route('cart.update', $item['equipment']->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <input type="number" name="quantity" id="quantity" value="{{ $item['quantity'] }}" class="form-control" min="1" max="10">
                                                <button type="submit" class="btn btn-outline-secondary btn-sm mt-2">Update</button>
                                            </form>
                                        </td>
                                        <td>{{ $item['equipment']->price }} €</td>
                                        <td>{{ $item['equipment']->price * $item['quantity'] }} €</td>
                                        <td>
                                            <form action="{{ route('cart.destroy', $item['equipment']->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-end">
                            <h4>Total: {{ $subtotal }} €</h4>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-end mt-3">

                    <form action="{{ route('cart.clear') }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger btn me-3">Clear Cart</button>
                    </form>
                    
                    <form action="{{ route('cart.checkout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-success btn">Checkout</button>
                    </form>
                </div>
            @else
                <div class="card">
                    <div class="card-body">
                        <p class="text-center">Your cart is empty</p>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
