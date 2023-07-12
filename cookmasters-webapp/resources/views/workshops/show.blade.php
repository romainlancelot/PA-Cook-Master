@extends('layouts.app-master')

@section('content')
<div class="container">
<section class="diaporama">
    <div class="row">
        <div class="col-md-12">
            <div class="image-wrapper" style="position: relative;">
                <img src="{{ asset('storage/workshops/' .$workshop->photos ) }}" style="oppacity: 0.5em; width: 1920px; height: 420px; border-radius: 20px;" alt="Mon Image" class="img-fluid">
                <div style="position: absolute; top: 80%; left: 50%; transform: translate(-50%, -50%); text-align: center;">
                    <h1 style="color: white; text-shadow: 2px 2px 4px #000000;">Ateliers culinaires</h1>
                    <h3 style="color: white; text-shadow: 2px 2px 4px #000000;"> ---- Paris ---- </h3>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="title m-5">    
    <div class="col-md-12">
        <h1 style="text-align:center; font-family: 'Georgia', serif;color: #5d4740;">  {{ $workshop->title }} </h1>
    </div>
</section>


</section class="ateliers">
    <div calss="row">
        <h4 class="col-md-12" style="font-family: 'Georgia', serif;color: #5d4740; ">
        Durée : {{ $workshop->sessions->first()->duration }}
        </h4>
        <h4 class="col-md-12" style="font-family: 'Georgia', serif;color: #5d4740;">
        Horaires :  {{  $workshop->sessions->first()->start }}
        </h4>
    </div>
</section>


<div class="container m-5" >
    @php
    $description = json_decode($workshop->description);
    @endphp
    <div class="row">
        @foreach($description as $paragraph)
        <div class="col-md-12 m4">
            <p  style="font-family: 'Georgia', serif;color: #5d4740; ">
                {{ $paragraph }}
            </p>    
        </div>
        @endforeach
    </div>
</div>


<section class="inscription m-5">    
    <div class="col-md-12">
        <h1 style="text-align:center; font-family: 'Georgia', serif;color: #5d4740;"> S'inscrire à cet atelier : </h1>
    </div>

    <div calss="row">
        <h4 class="col-md-12" style="font-family: 'Georgia', serif;color: #5d4740; ">
        Prix : {{ $workshop->price }} €
        </h4>
        <h4 class="col-md-12" style="font-family: 'Georgia', serif;color: #5d4740; ">
        Durée : {{ $workshop->sessions->first()->duration }}
        </h4>
        <h4 class="col-md-12" style="font-family: 'Georgia', serif;color: #5d4740;">
        Horaires :  {{  $workshop->sessions->first()->start }}
        </h4>
        <h4 class="col-md-12" style="font-family: 'Georgia', serif;color: #5d4740; ">
        @php
        $nbInscrits = $workshop->sessions->first()->users->count();
        $nbPlaces = $workshop->sessions->first()->max_people - $workshop->sessions->first()->users->count();
        @endphp
        Places restantes : {{ $nbPlaces }}
        </h4>
    </div>
    <form>
        <div class="row mt-4">
            <div class="col-md-6">
                <label for="dropdown1" style="font-family: 'Georgia', serif; color: #5d4740;">Date de cours:</label>
                <select class="form-select" id="dropdown1">
                    <option selected>Choisir une date de cours...</option>

                    @foreach($workshop->sessions as $session)
                    <option value="{{ $session->start }}">{{ $session->start }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <label for="dropdown2" style="font-family: 'Georgia', serif; color: #5d4740;">Nombres de places :</label>
                <select class="form-select" id="dropdown2">
                    <option selected>Choisir une le nombres de place...</option>
                    @for($i = 1; $i <= $nbPlaces; $i++)
                        <option value="{{ $i }}">{{ $i }} Places</option>
                    @endfor
                </select>
            </div>
        </div>
        
        <div class="text-center mt-4">
            <button class="btn btn-primary" type="submit" style="font-family: 'Georgia', serif; background-color: #5d4740; color: #ffffff;">AJOUTER AU PANIER</button>
        </div>
    </form>


    <section class="title m-5">    
    <div class="col-md-12">
        <h1 style="text-align:center; font-family: 'Georgia', serif;color: #5d4740;">  Le Chef vous propose aussi :</h1>
    </div>

    <style>
.line {
  width: 100%;
  text-align: center;
  border-bottom: 2px solid #888;
  line-height: 0.1em;
  margin: 50px 0 30px; /* Ajout d'un espace supplémentaire en bas */
}

.line .title {
  background: #fff;
  font-size: 1.5em;
  color: #666; /* Text color for paragraph text within the card body */
  text-shadow: 1px 1px 1px #ccc;
  font-weight: bold;
  box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
}
</style>

<style>
    .card {
        transition: 0.3s;
        text-decoration: none; /* Remove underline from links */
        color: inherit; /* Card text color */
    }

    .card:hover {
        cursor: pointer;
    }

    .card:hover #main-image {
        opacity: 0.7; /* Make the image a bit transparent upon hover */
    }

    .card-title {
        color: #4a4a4a; /* Card title color */
        font-weight: bold; /* Card title font weight */
    }

    .card-body p {
        color: #666; /* Text color for paragraph text within the card body */
    }
</style>


@if ($workshops->count() > 0)
<section class="container">
    <div class="col-md-12">
        <div class="row">
        @foreach ($workshops as $workshop)
            @php
                $photos = json_decode($workshop->photos)
            @endphp
                <div class="col-md-4 mb-4">
                        <a href="{{ route('workshops.show', $workshop->id) }}" class="card">
                            <div class="card shadow-sm h-100">
                                <div style="position: relative;">
                                    <img id="main-image" class="img-fluid" style="border-radius: 10px; width: 100%; height: auto; object-fit: cover;" src="{{ asset('storage/workshops/'.$workshop->photos) }}" alt="Equipment Name">
                                    <div style="position: absolute; bottom: 0; left: 0; background-color: rgba(0,0,0,0.6); color: white; padding: 5px;"> {{ $workshop->price }} €</div>
                                </div>
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title"> {{ $workshop->name }}</h5>
                                    <div class="mt-auto">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="btn-group row">
                                                <div class="col-md-12">
                                                    <p> <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#b0b2b5}</style><path d="M464 256A208 208 0 1 1 48 256a208 208 0 1 1 416 0zM0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z"/></svg>  Durée : {{ $workshops->first()->sessions->first()->duration }}</p>
                                                    <p> <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#959ca7}</style><path d="M159.3 5.4c7.8-7.3 19.9-7.2 27.7 .1c27.6 25.9 53.5 53.8 77.7 84c11-14.4 23.5-30.1 37-42.9c7.9-7.4 20.1-7.4 28 .1c34.6 33 63.9 76.6 84.5 118c20.3 40.8 33.8 82.5 33.8 111.9C448 404.2 348.2 512 224 512C98.4 512 0 404.1 0 276.5c0-38.4 17.8-85.3 45.4-131.7C73.3 97.7 112.7 48.6 159.3 5.4zM225.7 416c25.3 0 47.7-7 68.8-21c42.1-29.4 53.4-88.2 28.1-134.4c-4.5-9-16-9.6-22.5-2l-25.2 29.3c-6.6 7.6-18.5 7.4-24.7-.5c-16.5-21-46-58.5-62.8-79.8c-6.3-8-18.3-8.1-24.7-.1c-33.8 42.5-50.8 69.3-50.8 99.4C112 375.4 162.6 416 225.7 416z"/></svg>Prochain cours :  {{  $workshops->first()->sessions->first()->start }} </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
            @endforeach
        </div>
    </div>
</section>
@endif
</section>


</section>
@endsection