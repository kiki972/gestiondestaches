<?php

// Déclare le namespace de la classe pour l'organisation et l'autoloading
namespace App\Http\Controllers; // Définit le namespace pour cette classe, permettant une meilleure organisation et l'autoloading par Composer.

// On importe les classes nécessaires
use App\Models\Task; // Importe le modèle Task pour interagir avec la base de données.
use Illuminate\Http\Request; // Importe la classe Request pour gérer les requêtes HTTP.

// On crée une classe TaskController qui étend la classe de base des contrôleurs de Laravel
class TaskController extends Controller
{
    /**
     * Affiche la liste des tâches.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Récupère toutes les tâches de la base de données
        $tasks = Task::all();
        
        // Passe les tâches à la vue 'tasks.index'
        return view('tasks.index', compact('tasks'));
    }

    /**
     * Affiche le formulaire de création d'une nouvelle tâche.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // Retourne la vue pour créer une nouvelle tâche
        return view('tasks.create');
    }

    /**
     * Enregistre une nouvelle tâche dans la base de données.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Valide les données du formulaire
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:incomplete,complete', // Exemple de validation pour le statut
        ]);

        // Crée une nouvelle tâche avec les données validées
        Task::create($request->all());

        // Redirige vers la liste des tâches après la création
        return redirect()->route('tasks.index');
    }

    /**
     * Affiche les détails d'une tâche spécifique.
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        // Récupère la tâche spécifiée par son ID ou échoue si elle n'existe pas
        $task = Task::findOrFail($id);
        
        // Passe la tâche à la vue 'tasks.show'
        return view('tasks.show', compact('task'));
    }

    /**
     * Affiche le formulaire de modification d'une tâche existante.
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        // Récupère la tâche spécifiée par son ID ou échoue si elle n'existe pas
        $task = Task::findOrFail($id);
        
        // Passe la tâche à la vue 'tasks.edit'
        return view('tasks.edit', compact('task'));
    }

    /**
     * Met à jour une tâche existante dans la base de données.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        // Valide les données du formulaire
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:incomplete,complete', // Exemple de validation pour le statut
        ]);

        // Récupère la tâche spécifiée par son ID ou échoue si elle n'existe pas
        $task = Task::findOrFail($id);

        // Met à jour la tâche avec les nouvelles données validées
        $task->update($request->all());

        // Redirige vers la liste des tâches après la mise à jour
        return redirect()->route('tasks.index');
    }

    /**
     * Supprime une tâche spécifique de la base de données.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        // Récupère la tâche spécifiée par son ID ou échoue si elle n'existe pas
        $task = Task::findOrFail($id);

        // Supprime la tâche de la base de données
        $task->delete();

        // Redirige vers la liste des tâches après la suppression
        return redirect()->route('tasks.index');
    }
}

