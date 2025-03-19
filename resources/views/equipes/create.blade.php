/2 année/0-Projects/6-Sport/gestion-sportive/resources/views/equipes/create.blade.php
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Ajouter une Équipe</h1>

    <form action="{{ route('equipes.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nom">Nom:</label>
            <input type="text" name="nom" id="nom" class="form-control" value="{{ old('nom') }}" required>
            @error('nom')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="sport_id">Sport:</label>
            <select name="sport_id" id="sport_id" class="form-control" required>
                @foreach($sports as $sport)
                    <option value="{{ $sport->id }}">{{ $sport->nom }}</option>
                @endforeach
            </select>
            @error('sport_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
</div>
@endsection