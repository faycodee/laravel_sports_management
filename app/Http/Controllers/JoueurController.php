<?php

namespace App\Http\Controllers;

use App\Models\Joueur;
use App\Models\Equipe;
use Illuminate\Http\Request;

class JoueurController extends Controller
{
    public function index(Request $request)
    {
        $query = Joueur::query();

        // Filtrer par nom
        if ($request->filled('nom')) {
            $query->where('nom', 'like', '%' . $request->nom . '%');
        }

        // Filtrer par équipe
        if ($request->filled('equipe_id')) {
            $query->where('equipe_id', $request->equipe_id);
        }

        // Gestion du tri
        $sortBy = $request->get('sort_by', 'nom'); // Critère de tri (par défaut "nom")
        $sortOrder = $request->get('sort_order', 'asc'); // Ordre de tri (par défaut "asc")

        $query->orderBy($sortBy, $sortOrder);
        $joueurs = $query->paginate(10);

        return view('joueurs.index', compact('joueurs'));
    }

    public function create()
    {
        $equipes = Equipe::all();
        return view('joueurs.create', compact('equipes'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'date_naissance' => 'required|date',
            'equipe_id' => 'required|exists:equipes,id',
        ]);
    
        Joueur::create($request->all());
    
        return redirect()->route('joueurs.index')->with('success', 'Joueur ajouté avec succès.');
    }
    

    public function show(Joueur $joueur)
    {
        return view('joueurs.show', compact('joueur'));
    }

    public function edit(Joueur $joueur)
    {
        $equipes = Equipe::all();
        return view('joueurs.edit', compact('joueur', 'equipes'));
    }

    public function update(Request $request, Joueur $joueur)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'date_naissance' => 'required|date',
            'equipe_id' => 'required|exists:equipes,id',
        ]);

        $joueur->update($request->all());
        return redirect()->route('joueurs.index')->with('success', 'Joueur mis à jour avec succès.');
    }

    public function destroy(Joueur $joueur)
    {
        $joueur->delete();
        return redirect()->route('joueurs.index')->with('success', 'Joueur supprimé avec succès.');
    }
}