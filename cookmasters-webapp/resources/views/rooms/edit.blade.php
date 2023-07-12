@extends('layouts.app-master')

@section('title', 'Update Room')
@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Update Room</h1>
    <form action="{{ route('rooms.update', $room->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Room Name -->
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Nom de la salle :</label>
            <div class="col-sm-10">
                <input type="text" name="name" id="name" value="{{ $room->name }}" class="form-control">
            </div>
        </div>

        <!-- Is Active -->
        <div class="form-group row">
            <label for="is_active" class="col-sm-2 col-form-label">Disponible pour location :</label>
            <div class="col-sm-10">
                <input type="checkbox" name="is_active" id="is_active" class="form-check-input" {{ $room->is_active ? 'checked' : '' }}>
            </div>
        </div>

        <!-- Room Address -->
        <div class="form-group row">
            <label for="address" class="col-sm-2 col-form-label">Address :</label>
            <div class="col-sm-10">
                <input type="text" name="address" id="address" value="{{ $room->address }}" class="form-control">
            </div>
        </div>

        <!-- Room City -->
        <div class="form-group row">
            <label for="city" class="col-sm-2 col-form-label">Ville:</label>
            <div class="col-sm-10">
                <input type="text" name="city" id="city" value="{{ $room->city }}" class="form-control">
            </div>
        </div>

        <!-- Room Postal Code -->
        <div class="form-group row">
            <label for="postal_code" class="col-sm-2 col-form-label">Code postale :</label>
            <div class="col-sm-10">
                <input type="text" name="postal_code" id="postal_code" value="{{ $room->postal_code }}" class="form-control">
            </div>
        </div>

        <!-- Room Description -->
        <div class="form-group row">
            <label for="description" class="col-sm-2 col-form-label">Description :</label>
            <div class="col-sm-10">
                <textarea name="description" id="description" class="form-control">{{ $room->description }}</textarea>
            </div>
        </div>

        <!-- Room Capacity -->
        <div class="form-group row">
            <label for="capacity" class="col-sm-2 col-form-label">Capacite de la Salle :</label>
            <div class="col-sm-10">
                <input type="number" name="capacity" id="capacity" value="{{ $room->capacity }}" class="form-control">
            </div>
        </div>

        <!-- Room Price -->
        <div class="form-group row">
            <label for="price" class="col-sm-2 col-form-label">Le prix à l'heure :</label>
            <div class="col-sm-10">
                <input type="number" name="price" id="price" value="{{ $room->price }}" class="form-control">
            </div>
        </div>

        <!-- Room Minimum Reservation Hours -->
        <div class="form-group row">
            <label for="minimum_reservation_hours" class="col-sm-2 col-form-label">Le nombre minimum de reservation par heure :</label>
            <div class="col-sm-10">
                <input type="number" name="minimum_reservation_hours" id="minimum_reservation_hours" value="{{ $room->minimum_reservation_hours }}" class="form-control">
            </div>
        </div>

        <!-- Room Maximum People -->
        <div class="form-group row">
            <label for="max_people" class="col-sm-2 col-form-label">Le nombre maximum de personnes autorisées :</label>
            <div class="col-sm-10">
                <input type="number" name="max_people" id="max_people" value="{{ $room->max_people }}" class="form-control">
            </div>
        </div>

        <!-- Room Caution -->
        <div class="form-group row">
            <label for="caution" class="col-sm-2 col-form-label">Le Caution:</label>
            <div class="col-sm-10">
                <input type="number" name="caution" id="caution" value="{{ $room->caution }}" class="form-control">
            </div>
        </div>

        <!-- Availability Days -->
        <div class="form-group row">
            <label for="availability_days" class="col-sm-2 col-form-label">Jours disponibles :</label>
            <div class="col-sm-10">
                @php $availability_days = json_decode($room->availability_days, true); @endphp
                @for ($i = 1; $i <= 7; $i++)
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="availability_days[]" id="availability_days_{{ $i }}" value="{{ $i }}" {{ in_array($i, $availability_days ?? []) ? 'checked' : '' }}>
                        <label class="form-check-label" for="availability_days_{{ $i }}">
                            @if ($i == 1) {
                              Lundi
                            }
                            @endif
                            @if ($i == 2) {
                              Mardi
                            }
                            @endif
                            @if ($i == 3) {
                              Mercreudi
                            }
                            @endif
                            @if ($i == 4) {
                              Jeudi
                            }
                            @endif
                            @if ($i == 5) {
                              Vendredi
                            }
                            @endif
                            @if ($i == 6) {
                              Samedi
                            }
                            @endif
                            @if ($i == 7) {
                                Dimanche
                            }
                            @endif
                        </label>
                    </div>
                @endfor
            </div>
        </div>

        <!-- Reservation Hours -->
        <div class="form-group row">
            <label for="reservation_hours" class="col-sm-2 col-form-label">Horraires de réservation:</label>
            <div class="col-sm-10">
                @php $reservation_hours = json_decode($room->reservation_hours, true); @endphp
                @for ($i = 1; $i <= 24; $i++)
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="reservation_hours[]" id="reservation_hours_{{ $i }}" value="{{ $i }}" {{ in_array($i, $reservation_hours ?? []) ? 'checked' : '' }}>
                        <label class="form-check-label" for="reservation_hours_{{ $i }}">
                            {{ $i }}h:00
                        </label>
                    </div>
                @endfor
            </div>
        </div>

        <!-- Allow More People -->
        <div class="form-group row">
            <label for="allow_more_people" class="col-sm-2 col-form-label">autorisées plus de personnes que le nombre maximal autorisées:</label>
            <div class="col-sm-10">
                <input type="checkbox" name="allow_more_people" id="allow_more_people" class="form-check-input" {{ $room->allow_more_people ? 'checked' : '' }}>
            </div>
        </div>

        <button type="submit" class="btn btn-primary mt-4">Update</button>
    </form>
</div>
@endsection
