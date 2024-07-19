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
    <!-- cards -->
    <div class="row">
        <div class="col-md-6 grid-margin transparent">
            <div class="row">
                <div class="col-md-6 mb-4 stretch-card transparent">
                    <div class="card card-tale">
                        <div class="card-body">
                            <p class="mb-4">Véhicules disponibles</p>
                            <p class="fs-30 mb-2">4006</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4 stretch-card transparent">
                    <div class="card card-dark-blue">
                        <div class="card-body">
                            <p class="mb-4">Véhicules en maintenance</p>
                            <p class="fs-30 mb-2">61344</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 grid-margin transparent">
            <div class="row">
                <div class="col-md-6 mb-4 stretch-card transparent">
                    <div class="card card-light-blue">
                        <div class="card-body">
                            <p class="mb-4">Chauffeurs disponibles</p>
                            <p class="fs-30 mb-2">34040</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4 stretch-card transparent">
                    <div class="card card-light-danger">
                        <div class="card-body">
                            <p class="mb-4">Nombre de sortie en cours</p>
                            <p class="fs-30 mb-2">47033</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- cards -->

    <!-- vehicule -->
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card"> <!-- Changer col-md-7 à col-md-12 pour plus de largeur -->
            <div class="card" style="width: 100%;"> <!-- Définir la largeur de la card à 100% -->
                <div class="card-body">
                    <p class="card-title mb-0">Tous les véhicules du parc</p>
                    <div class="table-responsive">
                        <table class="table table-striped table-borderless" style="width: 100%;"> <!-- Définir la largeur de la table à 100% -->
                            <thead>
                                <tr>
                                    <th>Véhicule</th>
                                    <th>Immatriculation</th>
                                    <th>Genre</th>
                                    <th>Index du compteur</th>
                                    <th>Statut</th>
                                </tr>  
                            </thead>
                            <tbody>
                                @foreach($vehicules_parc_auto as $vehicule)
                                <tr>
                                    <td>{{$vehicule->marque}}</td>
                                    <td class="font-weight-bold">{{$vehicule->immatriculation}}</td>
                                    <td>{{$vehicule->genre_vehicule->libelle}}</td>
                                    <td>{{$vehicule->index}} km</td>
                                    <td class="font-weight-medium"><div class="badge badge-success">En mission</div></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- vehicule -->
@endsection
