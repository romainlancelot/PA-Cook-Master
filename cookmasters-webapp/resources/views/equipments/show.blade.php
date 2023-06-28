@extends('layouts.app-master')

@section('title', $equipment->name)

@section('content')
<style>
.img-select {
    cursor: pointer;
}

.img-select:hover {
    opacity: 0.7;
}
.description-box {
    padding: 10px;
    margin-bottom: 15px;
    max-height: 200px;
    overflow-y: auto;
    border-radius: 5px;
    word-wrap: break-word;
}

.form-control {
    border-radius: 10px;
    border: 1px solid #ccc;
}
    
.details-box {
    padding: 10px;
    margin-bottom: 15px;
    max-height: 200px;
    overflow-y: auto;
    border-radius: 5px;
    word-wrap: break-word;
}
</style>
<div class="container equipment my-5">
    <div class="row">
        <div class="col-md-2">
            <div class="row">
                @php
                    $photos = json_decode($equipment->photos);
                @endphp
                @foreach($photos as $photo)
                    <div class="col-12 mb-4">
                        <img class="img-fluid img-thumbnail img-select" style="width: 80px; height: 80px; object-fit: cover;" src="{{ asset('storage/images/'.$photo) }}" alt="{{ $equipment->name }}">
                    </div>
                @endforeach
            </div>
        </div>

        <div class="col-md-4">
            @if(count($photos) > 0)
                <img id="main-image" class="img-fluid img-thumbnail" style="width: 300px; height: 300px; object-fit: cover;" src="{{ asset('storage/images/'.$photos[0]) }}" alt="{{ $equipment->name }}">
            @endif
        </div>

        <div class="col-md-6">
            <div class="description-box">
                <p>{{ $equipment->name }}</p>
            </div>
        <h4>Prix : € {{ $equipment->price }}</h4>
        <p>Disponibilité : @if($equipment->availablequantity > 0) En stock @else Non disponible @endif</p>
        <input type="number" style="margin-bottom: 15px;" class="form-control" id="quantity" placeholder="Quantité">
        @if($equipment->availablequantity > 0)
            <div style="align-items: center;">
                <button type="button" class="btn btn-primary">Ajouter au panier</button>
                <button type="button" class="btn btn-success">Acheter maintenant</button>
            </div>
        @endif
        </div>

        
    </div>
    <div class="row mt-5">
        <div class="col-md-12">
            <h2>Détails du produit</h2>
            <div class="details-box">
                <p>{{ $equipment->description }}</p>
            </div>
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
