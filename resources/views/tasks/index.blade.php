@extends('layouts.app') <!-- Étend le layout principal 'app' -->

@section('content') <!-- Définit le contenu de la section 'content' dans le layout -->
    <div class="container"> <!-- Conteneur principal -->
        <div class="row"> <!-- Ligne de grille Bootstrap -->
            <div class="col-md-12"> <!-- Colonne qui occupe toute la largeur sur les écrans moyens et plus grands -->
                <div class="card"> <!-- Carte Bootstrap pour afficher les tâches -->
                    <div class="card-header bg-primary text-white"> <!-- En-tête de la carte avec un fond bleu et du texte blanc -->
                        Liste des Tâches
                        <!-- Lien vers la page de création d'une nouvelle tâche -->
                        <a href="{{ route('tasks.create') }}" class="btn btn-sm btn-light float-right">Ajouter une Tâche</a>
                    </div>
                    <div class="card-body"> <!-- Corps de la carte -->
                        @if (count($tasks) === 0) <!-- Vérifie s'il n'y a pas de tâches -->
                            <p class="text-center">Aucune tâche trouvée.</p> <!-- Message affiché si aucune tâche n'est trouvée -->
                        @else
                            <div class="list-group"> <!-- Groupe de listes Bootstrap -->
                                @foreach ($tasks as $task) <!-- Boucle sur chaque tâche -->
                                    <a href="{{ route('tasks.show', $task->id) }}" class="list-group-item list-group-item-action">
                                        {{ $task->title }}
                                        <!-- Affiche le statut de la tâche sous forme de badge -->
                                        <span class="badge badge-primary badge-pill">{{ $task->status }}</span>
                                    </a>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection