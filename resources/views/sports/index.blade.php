@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Liste des Sports</h1>
        <a href="{{ route('sports.create') }}" class="btn btn-primary">Ajouter un Sport</a>
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
    </div>
@endsection
