@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Liste des Matchs</h1>
    <a href="{{ route('matchs.create') }}" class="btn btn-primary">Ajouter un Match</a>

    <form action="{{ route('matchs.index') }}" method="GET" class="mt-3">
        <div class="form-row" style="display: flex; justify-content: space-between;">
            <div class="form-group col-md-4">
                <label for="equipe_id">Filtrer par Équipe</label>
                <select name="equipe_id" id="equipe_id" class="form-control">
                    <option value="">Toutes les équipes</option>
                    @foreach(App\Models\Equipe::all() as $equipe)
                        <option value="{{ $equipe->id }}" {{ request('equipe_id') == $equipe->id ? 'selected' : '' }}>{{ $equipe->nom }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-4">
                <label for="sort_by">Trier par:</label>
                <select name="sort_by" id="sort_by" class="form-control">
                    <option value="date_match" {{ request('sort_by') == 'date_match' ? 'selected' : '' }}>Date</option>
                    <option value="lieu" {{ request('sort_by') == 'lieu' ? 'selected' : '' }}>Lieu</option>
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
                <th>Équipe 1</th>
                <th>Équipe 2</th>
                <th>Date</th>
                <th>Lieu</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($matchs as $matche)
                <tr>
                    <td>{{ $matche->id }}</td>
                    <td>{{ $matche->equipe1->nom }}</td>
                    <td>{{ $matche->equipe2->nom }}</td>
                    <td>{{ $matche->date_match }}</td>
                    <td>{{ $matche->lieu }}</td>
                    <td>
                        <a href="{{ route('matchs.edit', $matche->id) }}" class="btn btn-warning">Modifier</a>
                        <form action="{{ route('matchs.destroy', $matche->id) }}" method="POST" style="display:inline;">
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
        {{ $matchs->links('pagination::bootstrap-4') }}
    </div>
</div>
@endsection