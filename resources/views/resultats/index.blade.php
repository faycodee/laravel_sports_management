@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Liste des Résultats</h1>
    <a href="{{ route('resultats.create') }}" class="btn btn-primary">Ajouter un Résultat</a>

    <table class="table table-striped mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Match</th>
                <th>Score Équipe 1</th>
                <th>Score Équipe 2</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($resultats as $resultat)
                <tr>
                    <td>{{ $resultat->id }}</td>
                    <td>{{ $resultat->match->equipe1->nom }} vs {{ $resultat->match->equipe2->nom }}</td>
                    <td>{{ $resultat->score_equipe1 }}</td>
                    <td>{{ $resultat->score_equipe2 }}</td>
                    <td>
                        <a href="{{ route('resultats.edit', $resultat->id) }}" class="btn btn-warning">Modifier</a>
                        <a href="{{ route('resultats.show', $resultat->id) }}" class="btn btn-danger">Delete</a>
                       
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-center mt-3">
        {{ $resultats->links('pagination::bootstrap-4') }}
    </div>
</div>
@endsection