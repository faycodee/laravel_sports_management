@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Liste des Équipes</h1>
    <a href="{{ route('equipes.create') }}" class="btn btn-primary">Ajouter une Équipe</a>

    <form action="{{ route('equipes.index') }}" method="GET" class="mt-3">
        <div class="form-row" style="display: flex; justify-content: space-between;">
            <div class="form-group col-md-4">
                <label for="search">Recherche</label>
                <input placeholder="Recherche par Nom ..." type="text" name="nom" id="nom" class="form-control" value="{{ request('nom') }}">
            </div>
            <div class="form-group col-md-4">
                <label for="sort_by">Trier par:</label>
                <select name="sort_by" id="sort_by" class="form-control">
                    <option value="nom" {{ request('sort_by') == 'nom' ? 'selected' : '' }}>Nom</option>
                    <option value="id" {{ request('sort_by') == 'id' ? 'selected' : '' }}>ID</option>
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
                <th>Nom</th>
                <th>Sport</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($equipes as $equipe)
                <tr>
                    <td>{{ $equipe->id }}</td>
                    <td>{{ $equipe->nom }}</td>
                    <td>{{ $equipe->sport->nom }}</td>
                    <td>
                        <a href="{{ route('equipes.edit', $equipe->id) }}" class="btn btn-warning">Modifier</a>
                        <form action="{{ route('equipes.destroy', $equipe->id) }}" method="POST" style="display:inline;">
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
        {{ $equipes->links('pagination::bootstrap-4') }}
    </div>
</div>
@endsection