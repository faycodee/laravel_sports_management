@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Détails du Résultat</h1>

    <div class="card">
        <div class="card-header">
            Résultat du match entre {{ $resultat->match->equipe1->nom }} et {{ $resultat->match->equipe2->nom }}
        </div>
        <div class="card-body">
            <h5 class="card-title">Score Équipe 1: {{ $resultat->score_equipe1 }}</h5>
            <h5 class="card-title">Score Équipe 2: {{ $resultat->score_equipe2 }}</h5>
            <p class="card-text">ID: {{ $resultat->id }}</p>
            <a href="{{ route('resultats.edit', $resultat->id) }}" class="btn btn-warning">Modifier</a>
            <form action="{{ route('resultats.destroy', $resultat->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce résultat ?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Supprimer</button>
            </form>
        </div>
    </div>
</div>
@endsection