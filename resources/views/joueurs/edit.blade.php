@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Modifier le Joueur</h1>

    <form action="{{ route('joueurs.update', $joueur->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nom">Nom:</label>
            <input type="text" name="nom" id="nom" class="form-control" value="{{ old('nom', $joueur->nom) }}" required>
            @error('nom')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="prenom">Prénom:</label>
            <input type="text" name="prenom" id="prenom" class="form-control" value="{{ old('prenom', $joueur->prenom) }}" required>
            @error('prenom')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="date_naissance">Date de Naissance:</label>
            <input type="date" name="date_naissance" id="date_naissance" class="form-control" value="{{ old('date_naissance', $joueur->date_naissance) }}" required>
            @error('date_naissance')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="equipe_id">Équipe:</label>
            <select name="equipe_id" id="equipe_id" class="form-control" required>
                @foreach($equipes as $equipe)
                    <option value="{{ $equipe->id }}" {{ $equipe->id == $joueur->equipe_id ? 'selected' : '' }}>{{ $equipe->nom }}</option>
                @endforeach
            </select>
            @error('equipe_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
</div>
@endsection