<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"> <!-- Déclaration de type de document HTML avec la langue définie dynamiquement -->
<head>
    <meta charset="utf-8"> <!-- Définit l'encodage des caractères en UTF-8 -->
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Assure que le site est responsive -->

    <title>{{ config('app.name', 'Laravel') }}</title> <!-- Définit le titre de la page avec le nom de l'application Laravel -->

    <!-- Styles -->
    <!-- Lien vers le fichier CSS de Bootstrap hébergé sur un CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Scripts -->
    <!-- Lien vers le fichier JS de Bootstrap hébergé sur un CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    <div id="app"> <!-- Conteneur principal de l'application -->
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm"> <!-- Barre de navigation avec Bootstrap -->
            <div class="container"> <!-- Conteneur pour centrer le contenu -->
                <a class="navbar-brand" href="{{ url('/') }}"> <!-- Lien vers la page d'accueil -->
                    {{ config('app.name', 'Laravel') }} <!-- Nom de l'application affiché dans la barre de navigation -->
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}"> <!-- Bouton pour la navigation responsive -->
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent"> <!-- Conteneur des éléments de la barre de navigation -->
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto"> <!-- Liste d'éléments de navigation à gauche (vide ici) -->
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto"> <!-- Liste d'éléments de navigation à droite -->
                        <!-- Authentication Links -->
                        @guest <!-- Vérifie si l'utilisateur est invité (non authentifié) -->
                            @if (Route::has('login')) <!-- Vérifie si la route de connexion existe -->
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a> <!-- Lien vers la page de connexion -->
                                </li>
                            @endif

                            @if (Route::has('register')) <!-- Vérifie si la route d'enregistrement existe -->
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a> <!-- Lien vers la page d'enregistrement -->
                                </li>
                            @endif
                        @else <!-- Si l'utilisateur est authentifié -->
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <!-- Affiche le nom de l'utilisateur connecté -->
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown"> <!-- Menu déroulant à droite -->
                                    <a class="dropdown-item" href="{{ route('logout') }}" <!-- Lien pour se déconnecter -->
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }} <!-- Texte du lien de déconnexion -->
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none"> <!-- Formulaire de déconnexion -->
                                        @csrf <!-- Token CSRF pour la protection contre les attaques CSRF -->
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4"> <!-- Conteneur principal pour le contenu de la page, avec un padding vertical -->
            @yield('content') <!-- Placeholder pour le contenu spécifique à chaque vue -->
        </main>
    </div>
</body>
</html>