<?php

namespace App\Http\Controllers;

use App\Models\Equipe;
use App\Models\Sport;
use Illuminate\Http\Request;

class EquipeController extends Controller
{
    public function index(Request $request)
    {
        $query = Equipe::query();

    
        if ($request->filled('nom')) {
            $query->where('nom', 'like', '%' . $request->nom . '%');
        }


        $sortBy = $request->get('sort_by', 'nom'); 
        $sortOrder = $request->get('sort_order', 'asc'); 

        $query->orderBy($sortBy, $sortOrder);
        $equipes = $query->paginate(10);

        return view('equipes.index', compact('equipes'));
    }
    public function create()
    {
        $sports = Sport::all();
        return view('equipes.create', compact('sports'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'sport_id' => 'required|exists:sports,id',
        ]);

        Equipe::create($request->all());
        return redirect()->route('equipes.index')->with('success', 'Équipe ajoutée avec succès.');
    }

    public function show(Equipe $equipe)
    {
        return view('equipes.show', compact('equipe'));
    }

    public function edit(Equipe $equipe)
    {
        $sports = Sport::all();
        return view('equipes.edit', compact('equipe', 'sports'));
    }

    public function update(Request $request, Equipe $equipe)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'sport_id' => 'required|exists:sports,id',
        ]);

        $equipe->update($request->all());
        return redirect()->route('equipes.index')->with('success', 'Équipe mise à jour avec succès.');
    }

    public function destroy(Equipe $equipe)
    {
        $equipe->delete();
        return redirect()->route('equipes.index')->with('success', 'Équipe supprimée avec succès.');
    }
}