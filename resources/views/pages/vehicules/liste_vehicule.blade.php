@extends ('layouts.base')
@section('title')
<div class="col-12 col-xl-8 mb-4 mb-xl-0 mx-auto">
    <div class="d-flex align-items-center justify-content-center">
        <h2 class="header-text">
        <i class="mdi mdi-car" style="color: #6C7383;"></i>
        </h2>
        <h2 class="header-text" style="font-size: 1.5rem; color: #ef1212;">
            &nbsp;&nbsp; VEHICULES
        </h2>
    </div>
</div>
@endsection


@section('content')
<div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card" style="width: 100%;">
                <div class="card-body">
                    <p class="card-title mb-0">Tous les véhicules</p>
                    <div class="table-responsive">
                        <table class="table table-striped table-borderless" style="width: 100%;"> 
                            <thead>
                                <tr>
                                    <th>Véhicule</th>
                                    <th>Immatriculation</th>
                                    <th>Genre</th>
                                    <th>Index du compteur</th>
                                    <th>Affection</th>
                                    <th>Statut</th>
                                </tr>  
                            </thead>
                            <tbody>
                                @foreach($affectations as $affectation)
                                <tr>
                                    <td>{{$affectation->vehicule->marque}}</td>
                                    <td class="font-weight-bold">{{$affectation->vehicule->immatriculation}}</td>
                                    <td>{{$affectation->vehicule->genre_vehicule->libelle}}</td>
                                    <td>{{$affectation->vehicule->index}} km</td>
                                    <td>{{$affectation->departement->nom}} </td>
                                    <td class="font-weight-medium"><div class="badge badge-success">{{$affectation->vehicule->etat_vehicule}}</div></td>
                                </tr>
                                @endforeach
                                </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection