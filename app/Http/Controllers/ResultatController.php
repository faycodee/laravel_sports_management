<?php

namespace App\Http\Controllers;

use App\Models\Resultat;
use App\Models\Matche;
use Illuminate\Http\Request;

class ResultatController extends Controller
{
    public function index()
    {
        $resultats = Resultat::with('match')->paginate(10);
        return view('resultats.index', compact('resultats'));
    }

    public function create()
    {
        $matchs = Matche::all();
        return view('resultats.create', compact('matchs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'match_id' => 'required|exists:matchs,id',
            'score_equipe1' => 'required|integer',
            'score_equipe2' => 'required|integer',
        ]);

        Resultat::create($request->all());
        return redirect()->route('resultats.index')->with('success', 'Résultat ajouté avec succès.');
    }

    public function show(Resultat $resultat)
    {
        return view('resultats.show', compact('resultat'));
    }

    public function edit(Resultat $resultat)
    {
        $matchs = Matche::all();
        return view('resultats.edit', compact('resultat', 'matchs'));
    }

    public function update(Request $request, Resultat $resultat)
    {
        $request->validate([
            'match_id' => 'required|exists:matchs,id',
            'score_equipe1' => 'required|integer',
            'score_equipe2' => 'required|integer',
        ]);

        $resultat->update($request->all());
        return redirect()->route('resultats.index')->with('success', 'Résultat mis à jour avec succès.');
    }

    public function destroy(Resultat $resultat)
    {
        $resultat->delete();
        return redirect()->route('resultats.index')->with('success', 'Résultat supprimé avec succès.');
    }
}