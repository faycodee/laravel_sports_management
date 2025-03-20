@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Détails du Match</h1>

    <div class="card">
        <div class="card-header">
            Match entre {{ $match->equipe1->nom }} <span style="color: red">VS</span> {{ $match->equipe2->nom }}
        </div>
        <div class="card-body">
            <h5 class="card-title">Date: {{ $match->date_match }}</h5>
            <p class="card-text">Lieu: {{ $match->lieu }}</p>
            <p class="card-text">ID: {{ $match->id }}</p>
            <a href="{{ route('matchs.edit', $match->id) }}" class="btn btn-warning">Modifier</a>
            <form action="{{ route('matchs.destroy', $match->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce match ?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Supprimer</button>
            </form>
        </div>
    </div>
</div>
@endsection