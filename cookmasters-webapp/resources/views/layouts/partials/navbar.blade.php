<link type="text/css" href="{{ secure_asset('assets/css/navbar.css') }}" rel="stylesheet">

<nav class="navbar navbar-expand-xxl navbar-dark fixed-top opacity">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('home.index') }}">
            <img src="{{ asset('images/cookmaster-logo.png') }}" alt="" class="d-inline-block align-text-top" style="width: 75px;">
        </a>
        <button
            class="navbar-toggler" 
            type="button" 
            data-bs-toggle="collapse" 
            data-bs-target="#navbarNav" 
            aria-controls="navbarNav" 
            aria-expanded="false" 
            aria-label="Toggle navigation"
            >
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="navbar-collapse collapse flex-column" id="navbarNav">
            <div class="container-fluid">
                <div class="row border-bottom">
                    <div class="col">
                        <ul class="navbar-nav me-auto" id="secondary-nav">
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('subscription-plans.index') }}">SUBSCRIPTION PLANS</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-auto">
                        @guest
                            <a class="navbar-brand text-end" href="{{ route('login.perform') }}" alt="login">LOGIN</a>
                            <a class="navbar-brand text-end" href="{{ route('register.perform') }}" alt="login">REGISTER</a>
                        @endguest
                        @auth
                            {{-- <a class="navbar-brand text-end" href="{{ route('account.show') }}" alt="login">ACCOUNT</a> --}}
                            <div class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-white" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    ACCOUNT
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                                    <li><a class="dropdown-item" href="{{ route('account.show') }}">MON COMPTE</a></li>
                                    @if (auth()->user()->role_name() == 'admin')
                                        <li><a class="dropdown-item" href="{{ route('admin.index') }}">PAGE ADMIN</a></li>
                                    @endif
                                    <li><a class="dropdown-item" href="{{ route('logout.perform') }}">DECONNEXION</a></li>
                                </ul>
                            </div>
                        @endauth
                    </div>
                </div>

                <div class="row" id="main-nav">
                    <div class="col">
                        <ul class="navbar-nav me-auto" id="main-nav">
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('subscription-plans.index') }}">SUBSCRIPTION PLANS</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('roomequipments.index')}}">ROOMS & EQUIPMENTS</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('roomoffers.index')}}">ROOM OFFERS</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('services.index')}}">SERVICES</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('calendar.index') }}">CALENDRIER</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-auto">
                        <a class="nav-link text-white" href="./search.php">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"></path>
                            </svg>
                            SEARCH
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>

@if ($_SERVER['REQUEST_URI'] !== '/')
    <div class="container-fluid mt-5 mb-5">&nbsp;</div>
@endif

<script type="text/javascript" src="{{ secure_asset('assets/js/navbar.js') }}"></script>
