<?php

namespace App\Http\Controllers;

use App\Models\Matche;
use App\Models\Equipe;
use App\Models\User;
use App\Notifications\NouveauMatchNotification;
use Illuminate\Http\Request;

class MatchController extends Controller
{
    public function index(Request $request)
    {
        $query = Matche::query();

        // Filtrer par équipe
        if ($request->filled('equipe_id')) {
            $query->where('equipe1_id', $request->equipe_id)
                  ->orWhere('equipe2_id', $request->equipe_id);
        }

        // Gestion du tri
        $sortBy = $request->get('sort_by', 'date_match'); // Critère de tri (par défaut "date_match")
        $sortOrder = $request->get('sort_order', 'asc'); // Ordre de tri (par défaut "asc")

        $query->orderBy($sortBy, $sortOrder);
        $matchs = $query->paginate(10);

        return view('matchs.index', compact('matchs'));
    }

    public function create()
    {
        $equipes = Equipe::all();
        return view('matchs.create', compact('equipes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'equipe1_id' => 'required|exists:equipes,id',
            'equipe2_id' => 'required|exists:equipes,id',
            'date_match' => 'required|date',
            'lieu' => 'required|string|max:255',
        ]);

        $matche = Matche::create($request->all());

        // Envoyer la notification à tous les utilisateurs (ou à un groupe spécifique d'utilisateurs)
        $users = User::all(); // Vous pouvez filtrer les utilisateurs selon vos besoins
        foreach ($users as $user) {
            $user->notify(new NouveauMatchNotification($matche));
        }

        return redirect()->route('matchs.index')->with('success', 'Match ajouté avec succès.');
    }

    public function show(Matche $match)
    {
        return view('matchs.show', compact('match'));
    }

 
    public function update(Request $request, Matche $match)
    {
        $request->validate([
            'equipe1_id' => 'required|exists:equipes,id',
            'equipe2_id' => 'required|exists:equipes,id',
            'date_match' => 'required|date',
            'lieu' => 'required|string|max:255',
        ]);

        $match->update($request->all());
        return redirect()->route('matchs.index')->with('success', 'Match mis à jour avec succès.');
    }

    public function destroy(Matche $match)
    {
        $match->delete();
        return redirect()->route('matchs.index')->with('success', 'Match supprimé avec succès.');
    }
}