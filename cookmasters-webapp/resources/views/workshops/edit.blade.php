@extends('layouts.app-master')

@section('content')
<h1>Modifier l'atelier : {{ $workshop->title }}</h1>
<form action="{{ route('workshops.update', $workshop) }}" method="POST" enctype="multipart/form-data">
@csrf
@method('PUT')
<div class="form-group">
<label for="title">Titre</label>
<input type="text" class="form-control" id="title" name="title" value="{{ $workshop->title }}" required>
</div>
<div class="form-group">
<label for="description">Description</label>
<textarea class="form-control" id="description" name="description" required>{{ $workshop->description }}</textarea>
</div>
<div class="form-group">
<label for="image">Image</label>
<input type="file" class="form-control" id="image" name="image">
<small class="form-text text-muted">Laissez vide si vous ne voulez pas changer l'image.</small>
</div>
<div class="form-group">
<label for="price">Prix</label>
<input type="number" class="form-control" id="price" name="price" value="{{ $workshop->price }}" required>
</div>
<div class="form-group">
<label for="duration">Durée</label>
<input type="text" class="form-control" id="duration" name="duration" value="{{ $workshop->duration }}" required>
</div>
<!-- Add other fields as necessary -->
<button type="submit" class="btn btn-primary">Enregistrer</button>
</form>
@endsection