@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Ajouter un Résultat</h1>

    <form action="{{ route('resultats.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="match_id">Match:</label>
            <select name="match_id" id="match_id" class="form-control" required>
                @foreach($matchs as $match)
                    <option value="{{ $match->id }}">{{ $match->equipe1->nom }} vs {{ $match->equipe2->nom }}</option>
                @endforeach
            </select>
            @error('match_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="score_equipe1">Score Équipe 1:</label>
            <input type="number" name="score_equipe1" id="score_equipe1" class="form-control" value="{{ old('score_equipe1') }}" required>
            @error('score_equipe1')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="score_equipe2">Score Équipe 2:</label>
            <input type="number" name="score_equipe2" id="score_equipe2" class="form-control" value="{{ old('score_equipe2') }}" required>
            @error('score_equipe2')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
</div>
@endsection