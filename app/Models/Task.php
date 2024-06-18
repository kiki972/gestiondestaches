<?php

// Déclare le namespace de la classe pour l'organisation et l'autoloading
namespace App\Models; //Définit le namespace pour cette classe, permettant une meilleure organisation et l'autoloading par Composer.

// On importe les classes nécessaires
use Illuminate\Database\Eloquent\Factories\HasFactory; // Importe le trait HasFactory pour permettre la génération de fabriques (factories) pour les modèles.
use Illuminate\Database\Eloquent\Model; // Importe la classe Model, qui est la classe de base pour tous les modèles Eloquent de Laravel.

// On crée une classe Task qui étend la classe Model de Laravel
class Task extends Model
{
    // Utilise le trait HasFactory pour permettre la génération de fabriques pour les modèles (factories)
    use HasFactory;

    // Si le nom de la table n'est pas le pluriel du modèle, définissez-le explicitement
    // Par défaut, Laravel assume que la table associée à ce modèle est 'tasks'
    // protected $table = 'tasks';

    // Si vous souhaitez protéger certaines colonnes contre l'assignation massive
    // Vous pouvez spécifier ces colonnes dans le tableau $guarded
    // Cela signifie que toutes les colonnes sauf celles-ci peuvent être massivement assignées
    // protected $guarded = [];

    // Si vous préférez utiliser la liste blanche pour les assignations massives
    // Définissez les colonnes autorisées pour l'assignation massive avec le tableau $fillable
    protected $fillable = ['title', 'description', 'status'];
}

