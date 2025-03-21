<?php

namespace App\Http\Controllers;

use App\Models\Classement;
use App\Models\Equipe;
use Illuminate\Http\Request;

class ClassementController extends Controller
{
    public function index(Request $request)
    {
        $query = Classement::with('equipe');

        // Recherche par nom d'équipe
        if ($request->filled('nom')) {
            $query->whereHas('equipe', function ($q) use ($request) {
                $q->where('nom', 'like', '%' . $request->nom . '%');
            });
        }

        // Gestion du tri
        $sortBy = $request->get('sort_by', 'id'); // Critère de tri (par défaut "id")
        $sortOrder = $request->get('sort_order', 'asc'); // Ordre de tri (par défaut "asc")

        $query->orderBy($sortBy, $sortOrder);

        $classements = $query->paginate(10);

        return view('classements.index', compact('classements'));
    }

    public function create()
    {
        $equipes = Equipe::all();
        return view('classements.create', compact('equipes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'equipe_id' => 'required|exists:equipes,id',
            'points' => 'required|integer',
            'victoires' => 'required|integer',
            'defaites' => 'required|integer',
            'nuls' => 'required|integer',
        ]);

        Classement::create($request->all());
        return redirect()->route('classements.index')->with('success', 'Classement ajouté avec succès.');
    }

    public function show(Classement $classement)
    {
        return view('classements.show', compact('classement'));
    }

    public function edit(Classement $classement)
    {
        $equipes = Equipe::all();
        return view('classements.edit', compact('classement', 'equipes'));
    }

    public function update(Request $request, Classement $classement)
    {
        $request->validate([
            'equipe_id' => 'required|exists:equipes,id',
            'points' => 'required|integer',
            'victoires' => 'required|integer',
            'defaites' => 'required|integer',
            'nuls' => 'required|integer',
        ]);

        $classement->update($request->all());
        return redirect()->route('classements.index')->with('success', 'Classement mis à jour avec succès.');
    }

    public function destroy(Classement $classement)
    {
        $classement->delete();
        return redirect()->route('classements.index')->with('success', 'Classement supprimé avec succès.');
    }
}