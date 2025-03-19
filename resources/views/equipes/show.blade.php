@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Détails de l'Équipe</h1>

    <div class="card">
        <div class="card-header">
            {{ $equipe->nom }}
        </div>
        <div class="card-body">
            <h5 class="card-title">Sport: {{ $equipe->sport->nom }}</h5>
            <p class="card-text">ID: {{ $equipe->id }}</p>
            <a href="{{ route('equipes.edit', $equipe->id) }}" class="btn btn-warning">Modifier</a>
            <form action="{{ route('equipes.destroy', $equipe->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Supprimer</button>
            </form>
        </div>
    </div>
</div>
@endsection