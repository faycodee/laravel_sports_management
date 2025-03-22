@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Détails de la Statistique</h1>

    <div class="card">
        <div class="card-header">
            Statistique de l'équipe {{ $statistique->equipe->nom }}
        </div>
        <div class="card-body">
            <h5 class="card-title">Victoires: {{ $statistique->victoires }}</h5>
            <h5 class="card-title">Défaites: {{ $statistique->defaites }}</h5>
            <h5 class="card-title">Nuls: {{ $statistique->nuls }}</h5>
            <p class="card-text">ID: {{ $statistique->id }}</p>
            <a href="{{ route('statistiques.edit', $statistique->id) }}" class="btn btn-warning">Modifier</a>
            <form action="{{ route('statistiques.destroy', $statistique->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette statistique ?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Supprimer</button>
            </form>
        </div>
    </div>
</div>
@endsection