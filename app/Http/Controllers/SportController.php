<?php

namespace App\Http\Controllers;

use App\Models\Sport;
use Illuminate\Http\Request;

class SportController extends Controller
{
    public function index()
    {
        $sports = Sport::all();
        return view('sports.index', compact('sports'));
    }

    public function create()
    {
        return view('sports.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
        ]);

        Sport::create($request->all());
        return redirect()->route('sports.index')->with('success', 'Sport ajouté avec succès.');
    }

    public function show(Sport $sport)
    {
        return view('sports.show', compact('sport'));
    }

    public function edit(Sport $sport)
    {
        return view('sports.edit', compact('sport'));
    }

    public function update(Request $request, Sport $sport)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
        ]);

        $sport->update($request->all());
        return redirect()->route('sports.index')->with('success', 'Sport mis à jour avec succès.');
    }

   
    public function confirmDelete($id) {
        $sport = Sport::findOrFail($id);
        return view('sports.delete', compact('sport'));
    }
    
    public function destroy($id) {
        $sport = Sport::findOrFail($id);
        $sport->delete();
    
        return redirect()->route('sports.index')->with('success', 'Sport supprimé avec succès.');
    }
    
    
}
