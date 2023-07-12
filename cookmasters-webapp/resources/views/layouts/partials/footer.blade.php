<footer class="container d-flex flex-wrap justify-content-between align-items-center py-3 border-top">
    <div class="col-md-4">
        <p class="mb-0 text-body-secondary">&copy; {{date('Y')}} Cookmasters, Inc</p><br>
        <div class="d-flex align-items-center">
            <p>{{ __('lang.choice') }} :</p>
            <select class="form-control" id="changeLang">
                <option value="en" {{ session()->get('locale') == 'en' ? 'selected' : '' }}>English</option>
                <option value="fr" {{ session()->get('locale') == 'fr' ? 'selected' : '' }}>France</option>
                <option value="es" {{ session()->get('locale') == 'es' ? 'selected' : '' }}>Espangol</option>
            </select>
        </div>
    </div>

    <a href="/" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
        <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
    </a>

    <ul class="nav col-md-4 justify-content-end">
        <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Home</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Features</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Pricing</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">FAQs</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">About</a></li>
    </ul>
</footer>

<script src="{{ secure_asset('assets/js/lang.js') }}"></script>
