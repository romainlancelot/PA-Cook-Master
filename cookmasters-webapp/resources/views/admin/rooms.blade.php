@extends('layouts.admin-master')
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('title', 'Admin')

@section('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
@endsection


@section('content')
    <h1 class="mt-3 mb-5">Gestion des salles</h1>
    
    <table class="table table-striped table-hover display" id="rooms-table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nom</th>
                <th scope="col">Adresse</th>
                <th scope="col">Ville</th>
                <th scope="col">Capacité</th>
                <th scope="col">Prix</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rooms as $room)
                <tr>
                    <th scope="row">{{ $loop->index + 1 }}</th>
                    <td>{{ $room->name }}</td>
                    <td>{{ $room->address }}</td>
                    <td>{{ $room->city }}</td>
                    <td>{{ $room->capacity }}</td>
                    <td>{{ $room->price }}</td>
                    <td>
                        <a href="{{ route('rooms.edit', $room->id) }}" class="btn btn-primary">
                            Modifier
                        </a>
                        <a href="{{ route('rooms.destroy', $room->id) }}" class="btn btn-danger">
                            Supprimer
                        </a>
                        <a href="{{ route('rooms.show', $room->id) }}" class="btn btn-info">
                            Voir les détails
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h3 style="text-align:center;" class="p-5">Consulter les reservation de tous les salles</h3>
    <div id='calendar'></div>
<script>
let reservations = @json($reservations);

document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'timeGridWeek',
        events: reservations
    });
    calendar.render();
});

</script>

    @section('scripts')
    <script type="text/javascript" src="{{ secure_asset('assets/js/admin/rooms/dataTables.js') }}"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    @endsection

@endsection
