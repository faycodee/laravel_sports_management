<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Navigation Bar (Optional) -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
          @auth
            <a class="navbar-brand ms-3" href="{{route('sports.index')}}" >Sports App (Bienvenue {{ Auth::user()->name }})</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('sports.index') }}">Sports</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('equipes.index') }}">Équipes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('joueurs.index') }}">Joueurs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('matchs.index') }}">Matches</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('resultats.index') }}">Résultats</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('classements.index') }}">Classements</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Statistiques</a>
                    </li>
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            @method('delete')
                            <button class="nav-link btn btn-danger" type="submit">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
            @else
            <a class="navbar-brand ms-3" href="#">Sports App</a>
            <a class="btn btn-outline-secondary ms-auto" href="{{ route('login') }}">Login</a>
            @endauth
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mt-4">
        @yield('content')
    </div>

    <!-- Bootstrap JS CDN (with Popper.js) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>