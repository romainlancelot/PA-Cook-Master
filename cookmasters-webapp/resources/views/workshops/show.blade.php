@extends('layouts.app-master')

@section('content')
<div class="row">
<div class="col-md-6">
<h1>{{ $workshop->title }}</h1>
<img src="{{ asset('storage/' . $workshop->image) }}" class="img-fluid" alt="{{ $workshop->title }}">
<p>{{ $workshop->description }}</p>
<!-- Add other details as necessary -->
<a href="{{ route('workshops.edit', $workshop) }}" class="btn btn-primary">Modifier</a>
<form action="{{ route('workshops.destroy', $workshop) }}" method="POST" style="display:inline;">
@csrf
@method('DELETE')
<button type="submit" class="btn btn-danger">Supprimer</button>
</form>
</div>
<div class="col-md-6">
<h3>Session</h3>
<ul>
@foreach($workshop->sessions as $session)
<li>{{ $session->session_date }}</li>
@endforeach
</ul>
</div>
</div>
@endsection