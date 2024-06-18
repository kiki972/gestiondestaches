@extends('layouts.app') <!-- Utilisation du layout 'app.blade.php' situé dans resources/views/layouts -->

@section('content')
    <div class="container"> <!-- Conteneur Bootstrap pour centrer le contenu -->
        <div class="row"> <!-- Ligne Bootstrap -->
            <div class="col-md-12"> <!-- Colonne Bootstrap qui occupe 12 colonnes sur les écrans moyens et plus -->
                <div class="card"> <!-- Carte Bootstrap pour encadrer le contenu -->
                    <div class="card-header"> <!-- En-tête de la carte -->
                        Modifier la Tâche <!-- Titre de l'en-tête -->
                    </div>
                    <div class="card-body"> <!-- Corps de la carte -->
                        <form action="{{ route('tasks.update', $task->id) }}" method="POST"> <!-- Formulaire pour mettre à jour la tâche, action vers la route tasks.update avec l'ID de la tâche -->
                            @csrf <!-- Token CSRF pour la protection contre les attaques CSRF -->
                            @method('PUT') <!-- Méthode PUT pour indiquer la mise à jour de la ressource -->

                            <div class="form-group"> <!-- Groupe de formulaire pour le champ titre -->
                                <label for="title">Titre</label> <!-- Libellé du champ titre -->
                                <input type="text" class="form-control" id="title" name="title" value="{{ $task->title }}" required> <!-- Champ texte pour le titre, pré-rempli avec la valeur actuelle de $task->title -->
                            </div>

                            <div class="form-group"> <!-- Groupe de formulaire pour le champ description -->
                                <label for="description">Description</label> <!-- Libellé du champ description -->
                                <textarea class="form-control" id="description" name="description">{{ $task->description }}</textarea> <!-- Champ textarea pour la description, pré-rempli avec la valeur actuelle de $task->description -->
                            </div>

                            <div class="form-group"> <!-- Groupe de formulaire pour le champ statut -->
                                <label for="status">Statut</label> <!-- Libellé du champ statut -->
                                <select class="form-control" id="status" name="status" required> <!-- Menu déroulant pour le statut, requis -->
                                    <option value="incomplete" {{ $task->status == 'incomplete' ? 'selected' : '' }}>Incomplète</option> <!-- Option pour statut incomplète, sélectionnée si $task->status est 'incomplete' -->
                                    <option value="complete" {{ $task->status == 'complete' ? 'selected' : '' }}>Complétée</option> <!-- Option pour statut complétée, sélectionnée si $task->status est 'complete' -->
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Enregistrer</button> <!-- Bouton de soumission du formulaire -->
                            <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Annuler</a> <!-- Lien pour annuler et retourner à la liste des tâches -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection <!-- Fin de la section content -->