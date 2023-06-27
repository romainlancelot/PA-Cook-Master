@extends('layouts.app-master')

@section('title', $equipment->name)

@section('content')

<div class="container my-5">
    <div class="row">
        <div class="col-md-2">
            <div class="row">
                @php
                    $photos = json_decode($equipment->photos);
                @endphp
                @foreach($photos as $photo)
                    <div class="col-12 mb-2">
                        <img class="img-fluid img-thumbnail img-select" style="width: 50px; height: 50px; object-fit: cover;" src="{{ asset('storage/images/'.$photo) }}" alt="{{ $equipment->name }}">
                    </div>
                @endforeach
            </div>
        </div>

        <div class="col-md-4">
            @if(count($photos) > 0)
                <img id="main-image" class="img-fluid" style="width: 300px; height: 300px; object-fit: cover;" src="{{ asset('storage/images/'.$photos[0]) }}" alt="{{ $equipment->name }}">
            @endif
        </div>

        <div class="col-md-6">
            <h1>{{ $equipment->name }}</h1>
            <p>{{ $equipment->description }}</p>
            <h4>Prix : € {{ $equipment->price }}</h4>
            <p>Disponibilité : @if($equipment->availablequantity > 0) En stock @else Non disponible @endif</p>
            @if($equipment->availablequantity > 0)
                <button type="button" class="btn btn-primary">Ajouter au panier</button>
            @endif
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-12">
            <h2>Détails du produit</h2>
            <p>{{ $equipment->description }}</p>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-12">
            <h2>Avis des clients</h2>
            <!-- Ici, vous pouvez ajouter des avis de clients -->
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-12">
            <h2>Produits similaires</h2>
            <!-- Ici, vous pouvez ajouter des produits similaires -->
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
$(document).ready(function() {
    $('.img-select').click(function() {
        let image_src = $(this).attr('src');
        $('#main-image').attr('src', image_src);
    });
});
</script>
@endsection
