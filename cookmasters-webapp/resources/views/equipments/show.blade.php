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
.sctions {
    margin-top:55px;
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
                        <img class="img-fluid img-thumbnail img-select" style="width: 80px; height: 80px; object-fit: cover;" src="{{ secure_asset('storage/equipments/'.$photo) }}" alt="{{ $equipment->name }}">
                    </div>
                @endforeach
            </div>
        </div>

        <div class="col-md-4">
            @if(count($photos) > 0)
                <img id="main-image" class="img-fluid img-thumbnail" style="width: 300px; height: 300px; object-fit: cover;" src="{{ secure_asset('storage/equipments/'.$photos[0]) }}" alt="{{ $equipment->name }}">
            @endif
        </div>

        <div class="col-md-6">
            <div class="description-box">
                <p>{{ $equipment->name }}</p>
            </div>
            <div class="key_features">
                @php
                    $key_features = json_decode($equipment->key_features);
                @endphp
                <h4>Caractéristiques:</h4>
                <ul>
                    @foreach($key_features as $key_feature)
                        <li>{{ $key_feature }}</li>
                    @endforeach
                </ul>
            </div>
        <h4>Prix : € {{ $equipment->price }}</h4>
        <p>Disponibilité : @if($equipment->availablequantity > 0) En stock @else Non disponible @endif</p>
        @if($equipment->availablequantity > 0)
            <div style="align-items: center;">
            <form action="{{ route('cart.store') }}" method="POST">
                @csrf
                <label for="quantity">Quantité</label>
                <input type="number" style="margin-bottom: 15px;" class="form-control" id="quantity" name="quantity" value="1">
                <input type="hidden" name="equipment_id" value="{{ $equipment->id }}">
                <button type="submit" class="btn btn-success">Ajouter au panier</button>
            </form>
            {{-- <a href="#" type="button" class="btn btn-success">Acheter maintenant</a> --}}
            </div>
        @endif
        </div>
    </div>
</div>

<section class="container">
<div class="sctions">
    <div class="row">
      <div class="col-md-12">
        <h2>Déscription</h2>
      </div>
    </div>
    <div class="row">
        <div class="details-box col-md-6">
            <p>{{ $equipment->description }}</p>
        </div>
    </div>
</div>
</section>

<section class="container">
<div class="sctions">
    <div class="row">
      <div class="col-md-12">
        <h2>Dimension</h2>
      </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <p>Longueur : {{ $equipment->height }} </p>
        </div>
        <div class="col-md-4">
            <p>Largeur : {{ $equipment->width }} </p>
        </div>
        <div class="col-md-4">
            <p>Profondeur : {{ $equipment->depth }} </p>
        </div>
    </div>
</div>
</section>

<section class="container">
<div class="sctions">
    <div class="row">
      <div class="col-md-12">
        <h2>Manuals & Documents</h2>
      </div>
    </div>
    <div class="row">
        <div class="col-md-4 badge">
            <h4>
                <a href="{{ $equipment->manual_url }}" target="_blank">
                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M288 32c0-17.7-14.3-32-32-32s-32 14.3-32 32V274.7l-73.4-73.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0l128-128c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L288 274.7V32zM64 352c-35.3 0-64 28.7-64 64v32c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V416c0-35.3-28.7-64-64-64H346.5l-45.3 45.3c-25 25-65.5 25-90.5 0L165.5 352H64zm368 56a24 24 0 1 1 0 48 24 24 0 1 1 0-48z"/></svg>
                    Manuals</a>
            </h4>
        </div>
        <div class="col-md-4 badge">
            <h4>
                <a href="{{ $equipment->warranty_url }}" target="_blank">
                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M288 32c0-17.7-14.3-32-32-32s-32 14.3-32 32V274.7l-73.4-73.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0l128-128c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L288 274.7V32zM64 352c-35.3 0-64 28.7-64 64v32c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V416c0-35.3-28.7-64-64-64H346.5l-45.3 45.3c-25 25-65.5 25-90.5 0L165.5 352H64zm368 56a24 24 0 1 1 0 48 24 24 0 1 1 0-48z"/></svg>
                    Garantie</a>
            </h4>
        </div>
        <div class="col-md-4 badge">
            <h4>
                <a href="{{ $equipment->dimensional_guide_url }}" target="_blank">
                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M288 32c0-17.7-14.3-32-32-32s-32 14.3-32 32V274.7l-73.4-73.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0l128-128c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L288 274.7V32zM64 352c-35.3 0-64 28.7-64 64v32c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V416c0-35.3-28.7-64-64-64H346.5l-45.3 45.3c-25 25-65.5 25-90.5 0L165.5 352H64zm368 56a24 24 0 1 1 0 48 24 24 0 1 1 0-48z"/></svg>
                    Autre</a>
            </h4>
        </div>
    </div>
</div>
</section>


<section class="container">
<div class="sctions">
    <div class="row">
      <div class="col-md-12">
        <h2>Avis des clients</h2>
      </div>
    </div>
    <div class="row">
        @foreach ($comments as $comment)  
            <div class="col-md-4">
                <div class="testimonial-item">
                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/></svg>
                    <div class="rating">
                        @for ($i = 0; $i < $comment->rating; $i++)
                            <span>&#9733;</span>
                        @endfor
                    </div>
                    <blockquote>
                        {{ $comment->body }}
                    </blockquote>
                    <cite>- {{ $comment->lastname }} {{ $comment->firstname }} </cite>
                </div>
            </div>
        @endforeach
    </div>
    @auth
    <div class="row">
        <div class="col-md-12">
            <div class="text-center" style="margin: 10px;">
                @include('layouts.partials.commentForm')
            </div>
        </div>
    </div>
    @endauth

</div>
</section>
    


<section class="container">
<div class="sctions">
    <div class="row">
      <div class="col-md-12">
        <h2>Produits similaires</h2>
      </div>
    </div>
    <div class="row">
        @foreach ($equipments as $e)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm h-100">
                    @php
                    $photos = json_decode($e->photos);
                    @endphp
                    @if(count($photos) > 0)
                        <img id="main-image" class="img-fluid" style="border-radius: 10px; width: auto; height: 120px; object-fit: cover;" src="{{ secure_asset('storage/equipments/'.$photos[0]) }}" alt="{{ $e->name }}">
                    @endif
                    <div class="card-body d-flex flex-column"> <!-- Utilisation de flexbox pour l'alignement des éléments -->
                        <h5 class="card-title">{{$e->name}}</h5>
                        <div class="mt-auto"> <!-- Ajout de mt-auto pour coller les éléments restants en bas -->
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group row">
                                    <div class="col-md-6">
                                        <a href="{{ route('equipment.show', $e->id) }}" type="button" class="btn btn-sm btn-outline-secondary">Voir plus de détails</a> <!-- Nouveau bouton -->
                                    </div>
                                    <div class="col-md-6">
                                        <small class="text-muted"> {{$e->price}}€ Prix</small>
                                    </div>
                                </div>
                            </div>
                            @auth
                            @if (auth()->user()->role_name() == 'admin')
                            <a href="{{ route('equipments.destroy', $e->id) }}" class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $e->id }}').submit();">Delete</a>
                            <form id="delete-form-{{ $e->id }}" action="{{ route('equipments.destroy', $e->id) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                            <a href="{{ route('equipments.edit', $e->id) }}" class="btn btn-primary">Modifier</a>
                            @endif
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
</section>

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
