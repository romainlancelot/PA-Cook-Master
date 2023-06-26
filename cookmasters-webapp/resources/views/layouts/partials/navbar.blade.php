<header class="p-3 bg-dark text-white">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>
            </a>
            
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="{{ route('home.index') }}" class="nav-link px-2 text-secondary">Accueil</a></li>
                <li><a href="#" class="nav-link px-2 text-white">Recettes</a></li>
                <li><a href="roomequipments" class="nav-link px-2 text-white">Boutique</a></li>
                <li><a href="#" class="nav-link px-2 text-white">Événements</a></li>
                <li><a href="#" class="nav-link px-2 text-white">Formations</a></li>
                <li><a href="#" class="nav-link px-2 text-white">Panier</a></li>
                <li><a href="#" class="nav-link px-2 text-white">Messagerie</a></li>
                <li><a href="/about-us" class="nav-link px-2 text-white">À propos</a></li>
                <li><a href="/contact" class="nav-link px-2 text-white">Contact</a></li>
            </ul>

            @auth
            @if (auth()->user()->role_name() == 'admin')
            <div class="text-end">
                <a href="{{ route('admin.index') }}" class="btn btn-outline-light me-2">Admin</a>
            </div>
        </div>
    </div>
</header>
