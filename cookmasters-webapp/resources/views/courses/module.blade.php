@extends('layouts.app-master')

@section('title', "Formation | $course->name")

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
            <div class="progress my-4" role="progressbar" aria-label="Animated striped example" aria-valuenow="{{ $courses_regristrations->progression() }}" aria-valuemin="0" aria-valuemax="100">
                <div class="progress-bar progress-bar-striped progress-bar-animated" style="width: {{ $courses_regristrations->progression() }}%">{{ $courses_regristrations->progression() }}%</div>
            </div>
            <video class="mb-4" width="100%" controls>
                <source src="{{ $module->video }}" type="video/mp4">
                Your browser does not support HTML video.
            </video>
            <p>{{ $module->introduction }}</p>
            <hr class="m-4">
            <p>{{ $module->content }}</p>
            <hr class="m-4">
            <p>{{ $module->conclusion }}</p>

            <div class="row">
                <div class="col-3">
                    @if ($module->previousModule($course))
                        <a href="{{ route('courses.module', [$course->id, $module->previousModule($course)]) }}" class="btn btn-secondary w-100">Précédent</a>
                    @endif
                </div>
                <div class="col-6">
                    @foreach ($course->modules as $mod)
                        @if ($module->id == $mod->id)
                            <a href="{{ route('courses.module', [$course->id, $mod]) }}" class="btn btn-primary">{{ $loop->iteration }}</a>
                        @else
                            <a href="{{ route('courses.module', [$course->id, $mod]) }}" class="btn btn-secondary">{{ $loop->iteration }}</a>
                        @endif
                    @endforeach
                </div>
                <div class="col-3">
                    {{$course->lastModule()}} {{$courses_regristrations->courses_module_id }}
                    @if ($courses_regristrations->courses_module_id != $course->lastModule())
                        <form action="{{ route('courses.module.validate') }}" method="POST">
                            @csrf
                            <input type="hidden" name="course_id" value="{{ $course->id }}">
                            <input type="hidden" name="module_id" value="{{ $module->id }}">
                            <button type="submit" class="btn btn-success w-100">Valider le module</button>
                        </form>
                    @else
                        <a href="{{ route('courses.module', [$course->id, $module->nextModule($course)]) }}" class="btn btn-success w-100">Terminer</a>
                    @endif
                </div>                
            </div>
        </div>
    </div>
@endsection
