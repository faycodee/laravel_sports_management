@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Modifier le Match</h1>

    <form action="{{ route('matchs.update', $match->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="equipe1_id">Équipe 1:</label>
            <select name="equipe1_id" id="equipe1_id" class="form-control" required>
                @foreach($equipes as $equipe)
                    <option value="{{ $equipe->id }}" {{ $equipe->id == $match->equipe1_id ? 'selected' : '' }}>{{ $equipe->nom }}</option>
                @endforeach
            </select>
            @error('equipe1_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="equipe2_id">Équipe 2:</label>
            <select name="equipe2_id" id="equipe2_id" class="form-control" required>
                @foreach($equipes as $equipe)
                    <option value="{{ $equipe->id }}" {{ $equipe->id == $match->equipe2_id ? 'selected' : '' }}>{{ $equipe->nom }}</option>
                @endforeach
            </select>
            @error('equipe2_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="date_match">Date du Match:</label>
            <input type="datetime-local" name="date_match" id="date_match" class="form-control" value="{{ old('date_match', $match->date_match) }}" required>
            @error('date_match')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="lieu">Lieu:</label>
            <input type="text" name="lieu" id="lieu" class="form-control" value="{{ old('lieu', $match->lieu) }}" required>
            @error('lieu')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
</div>
@endsection