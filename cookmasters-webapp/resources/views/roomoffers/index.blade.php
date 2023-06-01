@extends('layouts.app-master')

@section('title', 'Room Offers')

@section('content')
    <div class="bg-light p-5 rounded">
        <div class="container">
            <h1>Room Offers</h1>
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('roomoffers.create') }}" class="btn btn-primary mb-3">Create Room Offer</a>
                </div>
                <div class="col-md-12">
                    @if ($roomoffers->isEmpty())
                        <p>No room offers available.</p>
                    @else
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Availabilities</th>
                                    <th>Duration</th>
                                    <th>Price</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roomoffers as $roomoffer)
                                    <tr>
                                        <td>{{ $roomoffer->name }}</td>
                                        <td>{{ $roomoffer->description }}</td>
                                        <td>{{ $roomoffer->availabilities }}</td>
                                        <td>{{ $roomoffer->duration }}</td>
                                        <td>{{ $roomoffer->price }}</td>
                                        <td>
                                            <a href="{{ route('roomoffers.show', $roomoffer->id) }}" class="btn btn-primary">Show</a>
                                            <a href="{{ route('roomoffers.edit', $roomoffer->id) }}" class="btn btn-secondary">Edit</a>
                                            <form action="{{ route('roomoffers.destroy', $roomoffer->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
