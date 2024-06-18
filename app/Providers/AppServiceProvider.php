<?php

// Déclare le namespace de la classe pour l'organisation et l'autoloading
namespace App\Providers; // Définit le namespace pour cette classe, ce qui permet une meilleure organisation et l'autoloading par Composer.

// On importe les classes nécessaires
use Illuminate\Support\ServiceProvider; // Importe la classe de base des fournisseurs de services.
use Illuminate\Support\Facades\Schema; // Importe la façade Schema, qui permet de manipuler les schémas de base de données.

// On crée la classe AppServiceProvider qui étend la classe ServiceProvider
class AppServiceProvider extends ServiceProvider
{
    /**
     * Enregistre tous les services d'application.
     * Cette méthode est utilisée pour lier les classes dans le conteneur de services.
     * Dans cet exemple, elle est vide car aucun service supplémentaire n'est enregistré.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     * Démarre tous les services d'application.
     * Cette méthode est utilisée pour initialiser des éléments une fois que tous les services ont été enregistrés.
     */
    public function boot(): void
    {
        // Définit la longueur par défaut des colonnes de type string à 191 caractères
        // Cela est souvent nécessaire pour éviter des problèmes de compatibilité avec les index MySQL.
        Schema::defaultStringLength(191);
    }
}
