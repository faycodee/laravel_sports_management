@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Statistiques des Équipes</h1>

    <div class="row">
        @foreach($equipes as $equipe)
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-header">
                        {{ $equipe->nom }}
                    </div>
                    <div class="card-body">
                        @if($equipe->classement)
                            <p>Points: {{ $equipe->classement->points }}</p>
                            <p>Victoires: {{ $equipe->classement->victoires }}</p>
                            <p>Défaites: {{ $equipe->classement->defaites }}</p>
                            <p>Nuls: {{ $equipe->classement->nuls }}</p>
                            <canvas id="chart-{{ $equipe->id }}"></canvas>
                        @else
                            <p>Aucun classement disponible pour cette équipe.</p>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    @foreach($equipes as $equipe)
        @if($equipe->classement)
            var ctx = document.getElementById('chart-{{ $equipe->id }}').getContext('2d');
            var chart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Victoires', 'Défaites', 'Nuls'],
                    datasets: [{
                        label: 'Statistiques',
                        data: [{{ $equipe->classement->victoires }}, {{ $equipe->classement->defaites }}, {{ $equipe->classement->nuls }}],
                        backgroundColor: ['#28a745', '#dc3545', '#ffc107']
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        @endif
    @endforeach
</script>
@endsection