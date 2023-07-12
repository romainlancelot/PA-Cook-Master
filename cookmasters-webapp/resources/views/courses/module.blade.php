@extends('layouts.app-master')

@section('title', "Formation | $course->name"))

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
                <h2 class="mb-4">Module: {{ $module->name }}</h2>
                <video width="100%" controls>
                    <source src="{{ $module->video }}" type="video/mp4">
                    Your browser does not support HTML video.
                </video>
                <p>{{ $module->introduction }}</p>
                <hr class="m-4">
                <p>{{ $module->content }}</p>
                <hr class="m-4">
                <p>{{ $module->conclusion }}</p>

                <div class="row">
                    <div class="col-6">
                        @if ($module->previousModule($course))
                            <a href="{{ route('courses.module', [$course->id, $module->previousModule($course)]) }}" class="btn btn-primary w-100">Précédent</a>
                        @endif
                    </div>
                    <div class="col-6">
                        @if ($module->nextModule($course))
                            <a href="{{ route('courses.module', [$course->id, $module->nextModule($course)]) }}" class="btn btn-primary w-100">Suivant</a>
                        @endif
                    </div>                
            </div>
        </div>
    </div>
@endsection
