@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Liste des Classements</h1>
    <a href="{{ route('classements.create') }}" class="btn btn-primary">Ajouter un Classement</a>
    <form action="{{ route('classements.index') }}" method="GET" class="mt-3">
        <div class="form-row" style="display: flex; justify-content: space-between;">
            <div class="form-group col-md-4">
                <label for="search">Recherche</label>
                <input placeholder="Recherche par Nom ..." type="text" name="nom" id="nom" class="form-control" value="{{ request('nom') }}">
            </div>
            <div class="form-group col-md-4">
                <label for="sort_by">Trier par:</label>
                <select name="sort_by" id="sort_by" class="form-control">
                    <option value="id" {{ request('sort_by') == 'id' ? 'selected' : '' }}>ID</option>
                    <option value="equipe_id" {{ request('sort_by') == 'equipe_id' ? 'selected' : '' }}>Équipe</option>
                    <option value="points" {{ request('sort_by') == 'points' ? 'selected' : '' }}>Points</option>
                    <option value="victoires" {{ request('sort_by') == 'victoires' ? 'selected' : '' }}>Victoires</option>
                    <option value="defaites" {{ request('sort_by') == 'defaites' ? 'selected' : '' }}>Défaites</option>
                    <option value="nuls" {{ request('sort_by') == 'nuls' ? 'selected' : '' }}>Nuls</option>
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
                <th>Équipe</th>
                <th>Points</th>
                <th>Victoires</th>
                <th>Défaites</th>
                <th>Nuls</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($classements as $classement)
                <tr>
                    <td>{{ $classement->id }}</td>
                    <td>{{ $classement->equipe->nom }}</td>
                    <td>{{ $classement->points }}</td>
                    <td>{{ $classement->victoires }}</td>
                    <td>{{ $classement->defaites }}</td>
                    <td>{{ $classement->nuls }}</td>
                    <td>
                        <a href="{{ route('classements.edit', $classement->id) }}" class="btn btn-warning">Modifier</a>
                        <a href="{{ route('classements.show', $classement->id) }}" class="btn btn-danger">Delete</a>
                       
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-center mt-3">
        {{ $classements->links('pagination::bootstrap-4') }}
    </div>
</div>
@endsection