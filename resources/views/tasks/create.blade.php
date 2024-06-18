@extends('layouts.app') <!-- Étend le layout principal 'app' -->

@section('content') <!-- Définit le contenu de la section 'content' dans le layout -->
    <div class="container"> <!-- Conteneur principal -->
        <div class="row"> <!-- Ligne de grille Bootstrap -->
            <div class="col-md-12"> <!-- Colonne qui occupe toute la largeur sur les écrans moyens et plus grands -->
                <div class="card"> <!-- Carte Bootstrap pour le formulaire d'ajout d'une tâche -->
                    <div class="card-header bg-primary text-white"> <!-- En-tête de la carte avec un fond bleu et du texte blanc -->
                        Ajouter une nouvelle Tâche
                    </div>
                    <div class="card-body"> <!-- Corps de la carte -->
                        <!-- Formulaire pour ajouter une nouvelle tâche -->
                        <form action="{{ route('tasks.store') }}" method="POST">
                            @csrf <!-- Token CSRF pour la protection contre les attaques CSRF -->
                            
                            <!-- Champ pour le titre de la tâche -->
                            <div class="form-group">
                                <label for="title">Titre</label>
                                <input type="text" class="form-control" id="title" name="title" required> <!-- Champ de saisie du titre -->
                            </div>
                            
                            <!-- Champ pour la description de la tâche -->
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" id="description" name="description"></textarea> <!-- Champ de saisie de la description -->
                            </div>
                            
                            <!-- Champ pour le statut de la tâche -->
                            <div class="form-group">
                                <label for="status">Statut</label>
                                <select class="form-control" id="status" name="status" required> <!-- Menu déroulant pour le statut -->
                                    <option value="incomplete">Incomplète</option> <!-- Option pour le statut "Incomplète" -->
                                    <option value="complete">Complétée</option> <!-- Option pour le statut "Complétée" -->
                                </select>
                            </div>
                            
                            <!-- Boutons pour soumettre le formulaire ou annuler -->
                            <button type="submit" class="btn btn-primary">Enregistrer</button> <!-- Bouton pour soumettre le formulaire -->
                            <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Annuler</a> <!-- Lien pour retourner à la liste des tâches sans enregistrer -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection