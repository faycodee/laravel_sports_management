@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Détails du Classement</h1>

    <div class="card">
        <div class="card-header">
            Classement de l'équipe {{ $classement->equipe->nom }}
        </div>
        <div class="card-body">
            <h5 class="card-title">Points: {{ $classement->points }}</h5>
            <h5 class="card-title">Victoires: {{ $classement->victoires }}</h5>
            <h5 class="card-title">Défaites: {{ $classement->defaites }}</h5>
            <h5 class="card-title">Nuls: {{ $classement->nuls }}</h5>
            <p class="card-text">ID: {{ $classement->id }}</p>
            <a href="{{ route('classements.edit', $classement->id) }}" class="btn btn-warning">Modifier</a>
            <form action="{{ route('classements.destroy', $classement->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce classement ?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Supprimer</button>
            </form>
        </div>
    </div>
</div>
@endsection