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


</section>
@endsection