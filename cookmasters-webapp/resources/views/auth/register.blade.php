@extends('layouts.app-master')

@section('title', 'Register')
@section('content')
    <div class="text-center mt-4">
        <form method="post" action="{{ route('register.perform') }}">

            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <img class="mb-4" src="{!! url('images/cookmaster-logo.png') !!}" alt="" width="72" height="57">
            
            <h1 class="h3 mb-3 fw-normal">{{ __('register.title') }}</h1>

            <div class="row">
                <div class="col">
                    <div class="form-group form-floating mb-3">
                        <input type="text" class="form-control" name="firstname" value="{{ old('firstname') }}" placeholder="firstname" required>
                        <label for="floatingName">{{ __('register.firstname') }}</label>
                        @if ($errors->has('firstname'))
                            <span class="text-danger text-left">{{ $errors->first('firstname') }}</span>
                        @endif
                    </div>
                </div>
                
                <div class="col">
                    <div class="form-group form-floating mb-3">
                        <input type="text" class="form-control" name="lastname" value="{{ old('lastname') }}" placeholder="lastname" required>
                        <label for="floatingName">{{ __('register.lastname') }}</label>
                        @if ($errors->has('lastname'))
                            <span class="text-danger text-left">{{ $errors->first('lastname') }}</span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="form-group form-floating mb-3">
                <input type="text" class="form-control" name="username" value="{{ old('username') }}" placeholder="Username" required>
                <label for="floatingName">{{ __('register.username') }}</label>
                @if ($errors->has('username'))
                    <span class="text-danger text-left">{{ $errors->first('username') }}</span>
                @endif
            </div>

            <div class="form-group form-floating mb-3">
                <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="name@example.com" required autofocus>
                <label for="floatingEmail">{{ __('register.email') }}</label>
                @if ($errors->has('email'))
                    <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                @endif
            </div>


            
            <div class="form-group form-floating mb-3">
                <input type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="Password" required>
                <label for="floatingPassword">{{ __('register.password') }}</label>
                @if ($errors->has('password'))
                    <span class="text-danger text-left">{{ $errors->first('password') }}</span>
                @endif
            </div>

            <div class="form-group form-floating mb-3">
                <input type="password" class="form-control" name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="Confirm Password" required>
                <label for="floatingConfirmPassword">{{ __('register.password_confirmation') }}</label>
                @if ($errors->has('password_confirmation'))
                    <span class="text-danger text-left">{{ $errors->first('password_confirmation') }}</span>
                @endif
            </div>

            <button class="btn btn-lg btn-primary" type="submit">{{ __('register.validate') }}</button>
            
        </form>
    </div>
@endsection