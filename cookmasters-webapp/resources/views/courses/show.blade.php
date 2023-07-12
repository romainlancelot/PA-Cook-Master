@extends('layouts.app-master')

@section('title', "Cooking recipe | $course->name"))

@section('content')
    <div class="bg-light p-5 rounded">
        <div class="container">
            <div class="row">
                <div class="col-10">
                    <h1>Formation: {{ $course->name }}</h1>
                </div>
                <div class="col-2">
                    <a href="{{ route('courses.index') }}" class="btn btn-secondary">Back</a>
                </div>
            </div>
            {{-- {{dd($recipe)}} --}}
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Description</h5>
                    <div class="row">
                        <div class="col-md-8">
                            <p class="card-text">{{ $course->description }}</p>
                            <hr class="m-5">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Durée</th>
                                        <th scope="col">Difficulté</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $course->duration() }} minutes</td>
                                        <td>{{ $course->difficulty }} / 10</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @if ($course->registered())
                        <a href="{{ route('courses.module', [$course->id, $course->currentModule($course)]) }}" class="btn btn-primary w-100">Continuer</a>
                    @else
                        <form action="{{ route('courses.register') }}" method="POST">
                            @csrf
                            <input type="hidden" name="course_id" value="{{ $course->id }}">
                            <button type="submit" class="btn btn-primary w-100">S'inscrire</button>
                        </form>
                    @endif
                    <hr class="m-5">
                    <h4>Modules</h4>
                    <div class=card-text>
                        @if ($course->modules->isEmpty())
                            <p>Aucun module</p>
                        @else
                            <ol>
                                @foreach ($course->modules as $module)
                                    <li><strong>{{ $module->name }}</strong> (temps estimé: {{ $module->duration->format('H:i:s') }})</li>
                                    <p>{{ $module->introduction }}</p>
                                @endforeach
                            </ol>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
