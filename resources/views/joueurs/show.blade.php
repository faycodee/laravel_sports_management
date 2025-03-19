@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Détails du Joueur</h1>

    <div class="card">
        <div class="card-header">
            {{ $joueur->nom }} {{ $joueur->prenom }}
        </div>
        <div class="card-body">
            <h5 class="card-title">Équipe: {{ $joueur->equipe->nom }}</h5>
            <p class="card-text">Date de Naissance: {{ $joueur->date_naissance }}</p>
            <p class="card-text">ID: {{ $joueur->id }}</p>
            <a href="{{ route('joueurs.edit', $joueur->id) }}" class="btn btn-warning">Modifier</a>
            <form action="{{ route('joueurs.destroy', $joueur->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Supprimer</button>
            </form>
        </div>
    </div>
</div>
@endsection