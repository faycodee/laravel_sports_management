@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Liste des Résultats</h1>
    <a href="{{ route('resultats.create') }}" class="btn btn-primary">Ajouter un Résultat</a>
    <form action="{{ route('resultats.index') }}" method="GET" class="mt-3">
        <div class="form-row" style="display: flex; justify-content: space-between;">
            <div class="form-group col-md-4">
                <label for="search">Recherche</label>
                <input placeholder="Recherche par Nom ..." type="text" name="nom" id="nom" class="form-control" value="{{ request('nom') }}">
            </div>
            <div class="form-group col-md-4">
                <label for="sort_by">Trier par:</label>
                <select name="sort_by" id="sort_by" class="form-control">
                    <option value="id" {{ request('sort_by') == 'id' ? 'selected' : '' }}>ID</option>
                    <option value="match" {{ request('sort_by') == 'match' ? 'selected' : '' }}>Match</option>
                    <option value="score_equipe1" {{ request('sort_by') == 'score_equipe1' ? 'selected' : '' }}>Score Équipe 1</option>
                    <option value="score_equipe2" {{ request('sort_by') == 'score_equipe2' ? 'selected' : '' }}>Score Équipe 2</option>
                </select>
            </div>
            <div class="form-group col-md-4">
                <label for="sort_order">Ordre:</label>
                <select name="sort_order" id="sort_order" class="form-control">
                    <option value="asc" {{ request('sort_order') == 'asc' ? 'selected' : '' }}>Ascendant</option>
                    <option value="desc" {{ request('sort_order') == 'desc' ? 'selected' : '' }}>Descendant</option>
                </select>
            </div>
        </div>
        <br> <button type="submit" class="btn btn-secondary">Appliquer</button>
    </form>
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
                        <form action="{{ route('resultats.destroy', $resultat->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce résultat ?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
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