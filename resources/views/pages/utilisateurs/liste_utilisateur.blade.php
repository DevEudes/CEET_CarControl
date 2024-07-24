@extends('dashboard')
@section('dashboard_container')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card" style="width: 100%;">
                <div class="card-body">
                    <p class="card-title mb-0">Tous les utilisateurs</p>
                    <div class="table-responsive">
                        <table class="table table-striped table-borderless" style="width: 100%;"> 
                            <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>Matricule</th>
                                    <th>email</th>
                                    <th>Téléphone</th>
                                    <th>Profil</th>
                                </tr>  
                            </thead>
                            <tbody>
                                @foreach($utilisateurs as $utilisateur)
                                <tr>
                                    <td>{{$utilisateur->nom}}</td>
                                    <td>{{$utilisateur->prenom}}</td>
                                    <td>{{$utilisateur->matricule}}</td>
                                    <td>{{$utilisateur->email}}</td>
                                    <td>{{$utilisateur->telephone}}</td>
                                    <td>{{$utilisateur->profil->libelle}}</td>
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