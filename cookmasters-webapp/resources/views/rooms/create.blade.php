@extends('layouts.app-master')

@section('title', 'Create Room')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm bg-white rounded">
                <div class="card-header text-center">
                    <h3>Create a new room</h3>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('rooms.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Room Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control" id="address" name="address" required>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="capacity" class="form-label">Capacity</label>
                            <input type="number" class="form-control" id="capacity" name="capacity" required>
                        </div>

                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="number" class="form-control" id="price" name="price" required>
                        </div>

                        <div class="mb-3">
                            <label for="max_people" class="form-label">Max People</label>
                            <input type="number" class="form-control" id="max_people" name="max_people">
                        </div>


                        <div class="mb-3">
                            <label for="photos" class="form-label">Photos</label>
                            <input type="file" class="form-control" id="photos" name="photos[]" multiple>
                        </div>

                        <button type="submit" class="btn btn-primary">Create Room</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
