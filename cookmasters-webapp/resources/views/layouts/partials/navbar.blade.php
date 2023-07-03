<header class="p-3">
    <style>
        .nav-item.active .nav-link {
            color: #FF4500;
        }
        .navbar {
            border-radius: 10px;
        }
    </style>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="{{ asset('images/cookmaster-logo.png') }}" width="45" height="45" alt="Cook Master logo">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item {{ (request()->is('home')) ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('home') }}">Accueil</a>
                    </li>
                    <!-- Additional navigation items... -->
                    <li class="nav-item">
                        <a class="nav-link" href="#">Recettes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Boutique</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Événements</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Formations</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Panier</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Messagerie</a>
                    </li>
                    <li class="nav-item {{ (request()->is('about-us')) ? 'active' : '' }}">
                        <a class="nav-link" href="/about-us">À propos</a>
                    </li>
                    <li class="nav-item {{ (request()->is('contact')) ? 'active' : '' }}">
                        <a class="nav-link" href="/contact">Contact</a>
                    </li>
                    @auth
                    @if (auth()->user()->role_name() == 'admin')
                    <li class="nav-item {{ (request()->is('admin')) ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.index') }}">Admin</a>
                    </li>
                    @endif
                    @endauth
                </ul>
            </div>
        </nav>
    </div>
</header>
