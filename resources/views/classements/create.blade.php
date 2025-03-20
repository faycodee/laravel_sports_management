@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Ajouter un Classement</h1>

    <form action="{{ route('classements.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="equipe_id">Équipe:</label>
            <select name="equipe_id" id="equipe_id" class="form-control" required>
                @foreach($equipes as $equipe)
                    <option value="{{ $equipe->id }}">{{ $equipe->nom }}</option>
                @endforeach
            </select>
            @error('equipe_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="points">Points:</label>
            <input type="number" name="points" id="points" class="form-control" value="{{ old('points') }}" required>
            @error('points')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="victoires">Victoires:</label>
            <input type="number" name="victoires" id="victoires" class="form-control" value="{{ old('victoires') }}" required>
            @error('victoires')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="defaites">Défaites:</label>
            <input type="number" name="defaites" id="defaites" class="form-control" value="{{ old('defaites') }}" required>
            @error('defaites')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="nuls">Nuls:</label>
            <input type="number" name="nuls" id="nuls" class="form-control" value="{{ old('nuls') }}" required>
            @error('nuls')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
</div>
@endsection