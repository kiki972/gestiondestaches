<?php

// On importe les classes nécessaires
use Illuminate\Support\Facades\Route; // Importe la façade Route pour définir les routes.
use App\Http\Controllers\TaskController; // Importe le contrôleur TaskController pour gérer les requêtes liées aux tâches.

/* 
 * Cette route est commentée. Elle définit une route GET pour la racine ('/')
 * qui retourne la vue 'welcome'.
 * Route::get('/', function () {
 *     return view('welcome');
 * });
 */

// Redirige la route racine ('/') vers '/tasks'
Route::redirect('/', '/tasks');

// Définit une route GET pour éditer une tâche spécifique
// Appelle la méthode 'edit' du TaskController
// Nom de la route : 'tasks.edit'
Route::get('tasks/{task}/edit', 'TaskController@edit')->name('tasks.edit');

// Définit une route PUT pour mettre à jour une tâche spécifique
// Appelle la méthode 'update' du TaskController
// Nom de la route : 'tasks.update'
Route::put('tasks/{task}', 'TaskController@update')->name('tasks.update');

// Définit une route ressource pour le contrôleur des tâches
// Génère automatiquement les routes pour les opérations CRUD standard (index, create, store, show, edit, update, destroy)
Route::resource('tasks', TaskController::class);