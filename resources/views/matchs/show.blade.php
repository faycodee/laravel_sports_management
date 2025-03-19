@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Détails du Match</h1>

    <div class="card">
        <div class="card-header">
            Match entre {{ $matche->equipe1->nom }} et {{ $matche->equipe2->nom }}
        </div>
        <div class="card-body">
            <h5 class="card-title">Date: {{ $matche->date_match }}</h5>
            <p class="card-text">Lieu: {{ $matche->lieu }}</p>
            <p class="card-text">ID: {{ $matche->id }}</p>
            <a href="{{ route('matchs.edit', $matche->id) }}" class="btn btn-warning">Modifier</a>
            <form action="{{ route('matchs.destroy', $matche->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Supprimer</button>
            </form>
        </div>
    </div>
</div>
@endsection