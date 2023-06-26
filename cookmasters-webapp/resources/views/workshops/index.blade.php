@extends('layouts.app-master')

@section('content')
<h1>Liste des ateliers</h1>
<div class="row">
@foreach($workshops as $workshop)
<div class="col-md-4">
<div class="card mb-3">
<img src="{{ asset('storage/' . $workshop->image) }}" class="card-img-top" alt="{{ $workshop->title }}">
<div class="card-body">
<h5 class="card-title">{{ $workshop->title }}</h5>
<p class="card-text">{{ $workshop->description }}</p>
<a href="{{ route('workshops.show', $workshop) }}" class="btn btn-primary">Voir détails</a>
</div>
</div>
</div>
@endforeach
</div>
@endsection