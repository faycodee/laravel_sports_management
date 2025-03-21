@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Détails de l'Utilisateur</h1>

    <div class="card">
        <div class="card-header">
            Utilisateur: {{ $user->name }}
        </div>
        <div class="card-body">
            <h5 class="card-title">Email: {{ $user->email }}</h5>
            <p class="card-text">ID: {{ $user->id }}</p>
            <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-warning">Modifier</a>
            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Supprimer</button>
            </form>
        </div>
    </div>
</div>
@endsection