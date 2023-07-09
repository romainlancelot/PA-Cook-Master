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
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('ubercook.index') }}">Plats commandés</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('chat.index') }}">Chat</a>
                    </li>
                    <span class="border-start mx-3"></span>
                    @auth
                        <div class="nav-item dropdown">
                            <a class="navbar-brand dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                ACCOUNT
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                                <li><a class="dropdown-item" href="{{ route('account.show') }}">MON COMPTE</a></li>
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
