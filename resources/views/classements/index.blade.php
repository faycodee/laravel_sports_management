@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Liste des Classements</h1>
    <a href="{{ route('classements.create') }}" class="btn btn-primary">Ajouter un Classement</a>

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