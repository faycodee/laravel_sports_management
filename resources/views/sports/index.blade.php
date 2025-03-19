@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Liste des Sports</h1>
        <a href="{{ route('sports.create') }}" class="btn btn-primary">Ajouter un Sport</a>

        <form action="{{ route('sports.index') }}" method="GET" class="mt-3">
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="nom">Nom:</label>
                    <input type="text" name="nom" id="nom" class="form-control" value="{{ request('nom') }}">
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
            <button type="submit" class="btn btn-secondary">Rechercher</button>
        </form>

        <table class="table table-striped mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sports as $sport)
                    <tr>
                        <td>{{ $sport->id }}</td>
                        <td>{{ $sport->nom }}</td>
                        <td>
                            <a href="{{ route('sports.edit', $sport->id) }}" class="btn btn-warning">Modifier</a>
                            <a href="{{ route('sports.confirmDelete', $sport->id) }}" class="btn btn-danger">Supprimer</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Pagination Links -->
        <div class="d-flex justify-content-center mt-3">
            {{ $sports->links('pagination::bootstrap-4') }}
        </div>
    </div>
@endsection