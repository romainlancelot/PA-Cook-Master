@extends('layouts.app-master')

@section('content')
<h1>Créer un nouvel atelier</h1>
<form action="{{ route('workshops.store') }}" method="POST" enctype="multipart/form-data">
@csrf
<div class="form-group">
<label for="title">Titre</label>
<input type="text" class="form-control" id="title" name="title" required>
</div>
<div class="form-group">
<label for="description">Description</label>
<textarea class="form-control" id="description" name="description" required></textarea>
</div>
<div class="form-group">
<label for="image">Image</label>
<input type="file" class="form-control" id="image" name="image" required>
</div>
<div class="form-group">
<label for="price">Prix</label>
<input type="number" class="form-control" id="price" name="price" required>
</div>
<div class="form-group">
<label for="duration">Durée</label>
<input type="text" class="form-control" id="duration" name="duration" required>
</div>
<div class="form-group">
<button type="button" class="btn btn-primary" id="addSession">Ajouter une session</button>
</div>
<!-- Add other fields as necessary -->
<button type="submit" class="btn btn-primary">Enregistrer</button>
</form>
@endsection

@section('scripts')
<script>
$(document).ready(function() {
// Add session input
$('#addSession').click(function() {
let sessionInput = '<div class="form-group">' +
'<label>Date de la session</label>' +
'<input type="datetime-local" class="form-control" name="session_date[]" required>' +
'</div>';
$('#sessionContainer').append(sessionInput);
});
});
</script>
@endsection