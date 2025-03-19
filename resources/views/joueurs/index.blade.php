@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Liste des Joueurs</h1>
    <a href="{{ route('joueurs.create') }}" class="btn btn-primary">Ajouter un Joueur</a>

    <form action="{{ route('joueurs.index') }}" method="GET" class="mt-3">
        <div class="form-row" style="display: flex; justify-content: space-between;">
            <div class="form-group col-md-3">
                <label for="search">Recherche par Nom</label>
                <input placeholder="Recherche par Nom ..." type="text" name="nom" id="nom" class="form-control" value="{{ request('nom') }}">
            </div>
            <div class="form-group col-md-3">
                <label for="equipe_id">Filtrer par Équipe</label>
                <select name="equipe_id" id="equipe_id" class="form-control">
                    <option value="">Toutes les équipes</option>
                    @foreach(App\Models\Equipe::all() as $equipe)
                        <option value="{{ $equipe->id }}" {{ request('equipe_id') == $equipe->id ? 'selected' : '' }}>{{ $equipe->nom }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-3">
                <label for="sort_by">Trier par:</label>
                <select name="sort_by" id="sort_by" class="form-control">
                    <option value="nom" {{ request('sort_by') == 'nom' ? 'selected' : '' }}>Nom</option>
                    <option value="id" {{ request('sort_by') == 'id' ? 'selected' : '' }}>ID</option>
                    <option value="equipe_id" {{ request('sort_by') == 'equipe_id' ? 'selected' : '' }}>Équipe</option>
                </select>
            </div>
            <div class="form-group col-md-3">
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
                <th>Nom</th>
                <th>Prénom</th>
                <th>Date de Naissance</th>
                <th>Équipe</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($joueurs as $joueur)
                <tr>
                    <td>{{ $joueur->id }}</td>
                    <td>{{ $joueur->nom }}</td>
                    <td>{{ $joueur->prenom }}</td>
                    <td>{{ $joueur->date_naissance }}</td>
                    <td>{{ $joueur->equipe->nom }}</td>
                    <td>
                        <a href="{{ route('joueurs.edit', $joueur->id) }}" class="btn btn-warning">Modifier</a>
                        <a href="{{ route('joueurs.show', $joueur->id) }}" class="btn btn-danger">Supprimer</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-center mt-3">
        {{ $joueurs->links('pagination::bootstrap-4') }}
    </div>
</div>
@endsection