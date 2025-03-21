@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Liste des Utilisateurs</h1>
    <a href="{{ route('users.create') }}" class="btn btn-primary">Ajouter un Utilisateur</a>

    <table class="table table-striped mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">Modifier</a>
                        <a href="{{ route('users.show', $user->id) }}" class="btn btn-danger">Delete</a>
                        
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-center mt-3">
        {{ $users->links('pagination::bootstrap-4') }}
    </div>
</div>
@endsection