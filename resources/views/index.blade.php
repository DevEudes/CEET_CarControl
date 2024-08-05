@extends ('layouts.base')
@section('title')
<div class="col-12 col-xl-8 mb-4 mb-xl-0 mx-auto">
    <div class="d-flex align-items-center justify-content-center">
        <h2 class="header-text">
            <i class="mdi mdi-home" style="color: #6C7383;"></i>
        </h2>
        <h2 class="header-text" style="font-size: 1.5rem; color: #ef1212;">
            &nbsp;&nbsp;ACCUEIL
        </h2>
    </div>
</div>
@endsection

@section('content')
    <!-- cards and chart -->
    <div class="row">
        <div class="col-md-6 grid-margin transparent">
            <div class="row">
                <div class="col-md-6 mb-4 stretch-card transparent">
                    <div class="card card-tale">
                        <div class="card-body">
                            <p class="mb-4">Véhicules disponibles</p>
                            <p class="fs-30 mb-2">{{ $countVehiculesDisponibles }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4 stretch-card transparent">
                    <div class="card card-dark-blue">
                        <div class="card-body">
                            <p class="mb-4">Véhicules en maintenance</p>
                            <p class="fs-30 mb-2">{{ $countVehiculesMaintenance }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4 stretch-card transparent">
                    <div class="card card-light-blue">
                        <div class="card-body">
                            <p class="mb-4">Chauffeurs disponibles</p>
                            <p class="fs-30 mb-2">{{ $countChauffeursDisponibles }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4 stretch-card transparent">
                    <div class="card card-light-danger">
                        <div class="card-body">
                            <p class="mb-4">Nombre de sorties en cours</p>
                            <p class="fs-30 mb-2">{{ $countSortiesEnCours }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 grid-margin transparent">
            <div class="card">
                <div class="card-body">
                    <canvas id="fluxSortieVehiculeChart"></canvas>
                </div>
            </div>
        </div>
    </div>
    <!-- cards and chart -->

    <!-- vehicule par catégories -->
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card" style="width: 100%;">
                <div class="card-body">
                    <p class="card-title mb-0">Véhicules disponibles par catégories</p>
                    <div class="table-responsive">
                        <table class="table table-striped table-borderless" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>Genre</th>
                                    <th>Nombre de Véhicules</th>
                                </tr>  
                            </thead>
                            <tbody>
                                @foreach($vehiculesParCategorie as $categorie)
                                <tr>
                                    <td>{{ $categorie->genre_vehicule->nom }}</td>
                                    <td class="font-weight-bold">{{ $categorie->count }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- vehicule par catégories -->
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('fluxSortieVehiculeChart').getContext('2d');
        const fluxSortieVehiculeChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: @json($fluxSortieVehicules['hours']),
                datasets: [{
                    label: 'Flux de sortie de véhicules',
                    data: @json($fluxSortieVehicules['data']),
                    borderColor: 'rgba(239, 18, 18, 0.8)',
                    fill: false
                }]
            },
            options: {
                responsive: true,
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Heures'
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Nombre de sorties'
                        }
                    }
                }
            }
        });
    });
</script>
@endsection
