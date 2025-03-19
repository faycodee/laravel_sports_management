@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Supprimer le Sport</h1>
        <p>Êtes-vous sûr de vouloir supprimer le sport <strong>{{ $sport->nom }}</strong> ?</p>

        <form action="{{ route('sports.destroy', $sport->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Oui, Supprimer</button>
            <a href="{{ route('sports.index') }}" class="btn btn-secondary">Annuler</a>
        </form>
    </div>
@endsection
