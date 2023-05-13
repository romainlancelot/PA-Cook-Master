@if(isset ($errors) && count($errors) > 0)
    <div class="container my-4 alert alert-warning alert-dismissible fade show" role="alert">
        <ul class="list-unstyled mb-0">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if(Session::get('success', false))
    <?php $data = Session::get('success'); ?>
    @if (is_array($data))
        @foreach ($data as $msg)
            <div class="container my-4 alert alert-success alert-dismissible fade show" role="alert">
                <i class="fa fa-check"></i>
                {{ $msg }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endforeach
    @else
        <div class="container my-4 alert alert-success alert-dismissible fade show" role="alert">
            <i class="fa fa-check"></i>
            {{ $data }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
@endif