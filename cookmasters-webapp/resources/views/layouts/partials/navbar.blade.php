<header class="p-3">
    <style>
        .nav-item.active .nav-link {
            color: #FF4500;
        }
        .navbar {
            border-radius: 10px;
        }
    </style>
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="{{ asset('images/cookmaster-logo.png') }}" width="45" height="45" alt="Cook Master logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse d-lg-flex justify-content-lg-end" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuRecipes" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Nos plats
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuRecipes">
                            <li><a class="dropdown-item" href="{{ route('cooking-recipes.index') }}">Recettes</a></li>
                            <li><a class="dropdown-item" href="{{ route('ubercook.index') }}">Commander</a></li>
                            @auth
                                @if (auth()->user()->role_name() == 'presta')
                                    <li><a class="dropdown-item" href="{{ route('ubercooker.index') }}">Cuisiner</a></li>
                                @endif
                            @endauth
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('boutique.index') }}">Boutique</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('workshops.index') }}">Atelier</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Formations</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('services.index') }}">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('rooms.index') }}">Salles</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuChat" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Messagerie
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuChat">
                            <li><a class="dropdown-item" href="{{ route('chat.index') }}">Chat</a></li>
                            <li><a class="dropdown-item" href="{{ route('chat.index.video') }}">Vidéo</a></li>
                        </ul>
                    </li>
                    <li class="nav-item {{ (request()->is('about-us')) ? 'active' : '' }}">
                        <a class="nav-link" href="/about-us">À propos</a>
                    </li>
                    <li class="nav-item {{ (request()->is('contact')) ? 'active' : '' }}">
                        <a class="nav-link" href="/contact">Contact</a>
                    </li>
                    <span class="border-start mx-3"></span>
                    @guest
                        <li>
                            <a class="navbar-brand" href="{{ route('login') }}" alt="login">LOGIN</a>
                        </li>
                        <li>
                            <a class="navbar-brand text-end" href="{{ route('register') }}" alt="login">REGISTER</a>
                        </li>
                    @endguest
                    @auth
                        <li class="nav-item me-2">
                            <a class="nav-link" href="{{ route('cart.index') }}">
                                <i class="bi bi-bag" style="font-size: 1.5rem;"></i>
                                <span class="badge bg-danger">{{ session()->has('cart') ? count(session()->get('cart')) : 0 }}</span>
                            </a>
                        </li>
                        <div class="nav-item dropdown">
                            <a class="navbar-brand dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="{{ secure_asset(auth()->user()->image) }}" width="45" height="45" alt="account" class="rounded-circle">
                                ACCOUNT
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                                <li><a class="dropdown-item" href="{{ route('account.show') }}">MON COMPTE</a></li>
                                @if (auth()->user()->role_name() == 'admin')
                                    <li><a class="dropdown-item" href="{{ route('admin.index') }}">PAGE ADMIN</a></li>
                                @endif
                                <li><a class="dropdown-item" href="{{ route('subscription-plans.index') }}">ABONNEMENTS</a></li>
                                <li><a class="dropdown-item" href="{{ route('logout') }}">DECONNEXION</a></li>
                            </ul>
                        </div>
                    @endauth
                </ul>
            </div>
        </nav>
    </div>
</header>
