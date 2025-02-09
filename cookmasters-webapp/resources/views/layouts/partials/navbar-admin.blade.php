<header class="p-3 bg-dark text-white">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>
            </a>
            
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="{{ route('home') }}" class="nav-link px-2 text-secondary">Home</a></li>
                <li><a href="{{ route('admin.users')}}" class="nav-link px-2 text-white">Gestion des utilisateurs</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Abonnements
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('admin.subscriptions-plans')}}">Gestion des abonnements</a></li>
                        <li><a class="dropdown-item" href="{{ route('admin.subscriptions-plans.features')}}">Gestion des features</a></li>
                    </ul>
                  </li>
                <li><a href="{{ route('admin.rooms')}}" class="nav-link px-2 text-white">Gestion des Salles</a></li>
          
            </ul>

            <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
                <input type="search" class="form-control form-control-dark" placeholder="Search..." aria-label="Search">
            </form>
            
            @auth
            @if (auth()->user()->role_name() == 'admin')
            <div class="text-end">
                <a href="{{ route('admin.index') }}" class="btn btn-outline-light me-2">Admin</a>
            </div>
            @endif
            <div class="text-end">
                <a href="{{ route('account.show') }}" class="btn btn-outline-light me-2">{{auth()->user()->username}}</a>
                <a href="{{ route('logout.perform') }}" class="btn btn-outline-light me-2">Logout</a>
            </div>
            @endauth
            
            @guest
            <div class="text-end">
                <a href="{{ route('login') }}" class="btn btn-outline-light me-2">Login</a>
                <a href="{{ route('register') }}" class="btn btn-warning">Sign-up</a>
            </div>
            @endguest
        </div>
    </div>
</header>
