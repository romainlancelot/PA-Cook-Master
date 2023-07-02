<!-- resources/views/reservations/create.blade.php -->
@extends('layouts.app')

@section('content')
<h1>Réserver la salle {{ $room->name }}</h1>
@if($errors->any())
<h4>{{$errors->first()}}</h4>
@endif
<form method="POST" action="{{ route('reservations.store', $room) }}">
    @csrf

    <div class="form-group">
        <label for="start_date">Date de début</label>
        <input type="date" id="start_date" name="start_date" required>
    </div>

    <div class="form-group">
        <label for="end_date">Date de fin</label>
        <input type="date" id="end_date" name="end_date" required>
    </div>

    <button type="submit">Réserver</button>
</form>
@endsection
