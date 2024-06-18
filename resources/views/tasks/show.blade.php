@extends('layouts.app') <!-- Étend le layout principal 'app' -->

@section('content') <!-- Définit le contenu de la section 'content' dans le layout -->
    <div class="container"> <!-- Conteneur principal -->
        <div class="row"> <!-- Ligne de grille Bootstrap -->
            <div class="col-md-12"> <!-- Colonne qui occupe toute la largeur sur les écrans moyens et plus grands -->
                <div class="card"> <!-- Carte Bootstrap pour afficher les détails de la tâche -->
                    <div class="card-header bg-primary text-white"> <!-- En-tête de la carte avec un fond bleu et du texte blanc -->
                        Détails de la Tâche
                    </div>
                    <div class="card-body"> <!-- Corps de la carte -->
                        <h5 class="card-title">{{ $task->title }}</h5> <!-- Titre de la tâche -->
                        <p class="card-text">{{ $task->description }}</p> <!-- Description de la tâche -->
                        <span class="badge badge-primary">{{ $task->status }}</span> <!-- Statut de la tâche sous forme de badge -->
                    </div>
                    <div class="card-footer"> <!-- Pied de la carte -->
                        <!-- Lien vers le formulaire de modification de la tâche -->
                        <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-primary">Modifier</a>
                         <!-- Formulaire pour supprimer la tâche -->
                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="d-inline">
                            @csrf <!-- Token CSRF pour la protection contre les attaques CSRF -->
                            @method('DELETE') <!-- Indique que le formulaire doit être traité comme une requête DELETE -->
                            <button type="submit" class="btn btn-danger">Supprimer</button> <!-- Bouton pour soumettre le formulaire de suppression -->
                        </form>
                        <!-- Lien pour retourner à la liste des tâches -->
                        <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Retour à la liste</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection