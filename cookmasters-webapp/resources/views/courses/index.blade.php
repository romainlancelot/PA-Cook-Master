@extends('layouts.app-master')

@section('title', 'Formations')

@section('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
@endsection

@section('content')
    <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
        <h1 class="display-4 fw-normal">Cooking Recipes</h1>
        <p class="fs-5 text-body-secondary">Explore our collection of cooking recipes and discover new tasty meals.</p>
        @if (auth()->user()->subscriptionPlan->name == 'Free' && auth()->user()->role_name() == 'user')
            <p class="fs-5 text-body-secondary">
                You can only see recipes cookmasters and users have shared.<br>
                <a href="{{ route('subscription-plans.index') }}">Upgrade your subscription plan</a> to see recipes from our chefs.
            </p>
        @endif
    </div>
    
    @if (isset($registered) && $registered->isNotEmpty())
        <hr>
        <h2 class="text-center mb-4">Formations en cours</h2>
        <table class="table table-striped table-hover display mb-5" id="recipes-table">
            <thead>
                <th scope="col">#</th>
                <th scope="col">Nom</th>
                <th scope="col">Description</th>
                <th scope="col">Durée</th>
                <th scope="col">Difficulté</th>
                <th scope="col">Progression</th>
                <th scope="col">Actions</th>
            </thead>
            <tbody>
                @foreach ($registered as $course)
                {{-- {{dd($course->course->name)}} --}}
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $course->course->name }}</td>
                        <td>{{ $course->course->description }}</td>
                        <td>{{ $course->course->duration() }}</td>
                        <td>{{ $course->difficulty }} / 5</td>
                        <td>{{ $course->progression() }}%</td>
                        <td>
                            {{$course->course->currentModule($course->course)}}
                            <a href="{{ route('courses.module', [$course->course->id, $course->course->currentModule($course->course)]) }}" class="btn btn-success">Continuer la formation</a>
                        </td>
                        </div>
                    </div>
                @endforeach
            </tbody>
        </table>
        <hr class="mb-4">
    @endif

    <h2 class="text-center mb-4">Formations disponibles</h2>
    <table class="table table-striped table-hover display" id="recipes-table">
        <thead>
            <th scope="col">#</th>
            <th scope="col">Nom</th>
            <th scope="col">Description</th>
            <th scope="col">Durée</th>
            <th scope="col">Difficulté</th>
            <th scope="col">Actions</th>
        </thead>
        <tbody>
            @foreach ($courses as $course)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $course->name }}</td>
                    <td>{{ $course->description }}</td>
                    <td>{{ $course->duration() }}</td>
                    <td>{{ $course->difficulty }} / 5</td>
                    <td>
                        <a href="{{ route('courses.show', $course->id) }}" class="btn btn-primary">Voir la formation</a>
                    </td>
                    </div>
                </div>
            @endforeach
        </tbody>
    </table>

    <div class="my-5"></div>

    @section('scripts')
        {{-- <script type="text/javascript" src="{{ secure_asset('assets/js/cooking-recipes/dataTables.js') }}"></script> --}}
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    @endsection

@endsection
