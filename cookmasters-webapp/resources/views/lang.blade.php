@extends('layouts.app-master')

@section('title', 'Home')
@section('content')
    <div class="container">
        <h1>{{ __('lang.title') }}</h1>
        <div class="row">
            <div class="col-md-2 col-md-offset-6 text-right">
                <strong>{{ __('lang.choice') }} : </strong>
            </div>
            <div class="col-md-4">
                <select class="form-control" id="changeLang">
                    <option value="en" {{ session()->get('locale') == 'en' ? 'selected' : '' }}>English</option>
                    <option value="fr" {{ session()->get('locale') == 'fr' ? 'selected' : '' }}>France</option>
                </select>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script type="text/javascript">
        var url = "{{ route('changeLang') }}";
        document.getElementById("changeLang").onchange = function() {
            window.location.href = url + "?lang=" + this.value;
        };
    </script>
@endsection