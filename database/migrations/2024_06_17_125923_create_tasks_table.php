<?php

// On importe les classes nécessaires pour les migrations de base de données
use Illuminate\Database\Migrations\Migration; // Importe la classe de base pour les migrations.
use Illuminate\Database\Schema\Blueprint; // Importe la classe utilisée pour définir les colonnes et les attributs de la table.
use Illuminate\Support\Facades\Schema; // Importe la façade Schema pour manipuler les schémas de base de données.

// On crée une nouvelle classe de migration pour créer la table 'tasks'
class CreateTasksTable extends Migration
{
    /**
     * Exécute les migrations.
     *
     * @return void
     */
    public function up()
    {
        // On définit la création de la table 'tasks'
        Schema::create('tasks', function (Blueprint $table) {
            // Ajoute une colonne auto-incrémentée 'id' de type big integer comme clé primaire
            $table->id();
            // Ajoute une colonne 'title' de type string (varchar)
            $table->string('title');
            // Ajoute une colonne 'description' de type texte, qui peut être nullable (peut contenir des valeurs nulles)
            $table->text('description')->nullable();
            // Ajoute une colonne 'status' de type string (varchar)
            $table->string('status');
            // Ajoute des colonnes 'created_at' et 'updated_at' pour enregistrer les dates de création et de mise à jour
            $table->timestamps(); // Cela ajoutera les colonnes 'created_at' et 'updated_at'
        });
    }

    /**
     * Annule les migrations.
     *
     * @return void
     */
    public function down()
    {
        // Supprime la table 'tasks' si elle existe
        Schema::dropIfExists('tasks');
    }
}

