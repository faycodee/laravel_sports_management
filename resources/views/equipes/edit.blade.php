@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Modifier l'Équipe</h1>

    <form action="{{ route('equipes.update', $equipe->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nom">Nom:</label>
            <input type="text" name="nom" id="nom" class="form-control" value="{{ old('nom', $equipe->nom) }}" required>
            @error('nom')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="sport_id">Sport:</label>
            <select name="sport_id" id="sport_id" class="form-control" required>
                @foreach($sports as $sport)
                    <option value="{{ $sport->id }}" {{ $sport->id == $equipe->sport_id ? 'selected' : '' }}>{{ $sport->nom }}</option>
                @endforeach
            </select>
            @error('sport_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
</div>
@endsection