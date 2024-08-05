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
<head>
    <style>
        .btn-custom {
            padding: 10px 30px;
            margin: 0 15px;
            border-radius: 10px;
            transition: background-color 0.3s, color 0.3s, box-shadow 0.3s;
            background-color: #d3d3d3;
            width: 250px;
        }

        .btn-tous.active { background-color: orange; box-shadow: 3px 3px 5px #999; 
            color: white; }
        .btn-parc.active { background-color: #479FCB; box-shadow: 3px 3px 5px #999; 
            color: white;}
        .btn-neuf.active { background-color: #5AC85A; box-shadow: 3px 3px 5px #999; 
            color: white;}
    </style>
</head>

<div class="row">
    <div class="col-12 mb-4 d-flex justify-content-center">
        <button class="btn btn-custom btn-tous active" id="btn-tous">Tous les véhicules <br> <h4 style="padding-top:10px; padding-bottom:0.05em;">{{ $count_all }}</h4></button>
        <button class="btn btn-custom btn-parc" id="btn-parc">Véhicules du parc <br> <h4 style="padding-top:10px; padding-bottom:0.05em;">{{ $count_parc_auto }}</h4></button>
        <button class="btn btn-custom btn-neuf" id="btn-neuf">Nouveaux véhicules <br> <h4 style="padding-top:10px; padding-bottom:0.05em;">{{ $count_neuf }}</h4></button>
    </div>
</div>

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card" style="width: 100%;">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-borderless" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>Marque</th>
                                <th>Modèle</th>
                                <th>Immatriculation</th>
                                <th>Genre</th>
                                <th>Kilometrage du compteur</th>
                                <th>Affectation</th>
                                <th>Statut</th>
                            </tr>
                        </thead>
                        <tbody id="table-content">
                            <!-- Contenu du tableau ici -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const btnTous = document.getElementById('btn-tous');
    const btnParc = document.getElementById('btn-parc');
    const btnNeuf = document.getElementById('btn-neuf');
    const tableContent = document.getElementById('table-content');

    btnTous.addEventListener('click', () => {
        setActiveButton(btnTous);
        populateTableTous();
    });

    btnParc.addEventListener('click', () => {
        setActiveButton(btnParc);
        populateTableParc();
    });

    btnNeuf.addEventListener('click', () => {
        setActiveButton(btnNeuf);
        populateTableNeuf();
    });

    function setActiveButton(button) {
        [btnTous, btnParc, btnNeuf].forEach(btn => btn.classList.remove('active'));
        button.classList.add('active');
    }

    function populateTableTous() {
        tableContent.innerHTML = `
            @foreach($vehicules_all as $vehicule)
            <tr>
                <td>{{ $vehicule->marque }}</td>
                <td>{{ $vehicule->modele }}</td>
                <td class="font-weight-bold">{{ $vehicule->immatriculation }}</td>
                <td>{{ $vehicule->genre_vehicule->nom }}</td>
                <td>{{ $vehicule->kilometrage }} km</td>
                <td>
                    @if($vehicule->affectations->isNotEmpty())
                        {{ $vehicule->affectations->first()->departement->nom }}
                    @else
                        N/A
                    @endif
                </td>
                <td class="font-weight-medium"><div class="badge badge-success">{{ $vehicule->etat_vehicule }}</div></td>
            </tr>
            @endforeach
        `;
    }

    function populateTableParc() {
        tableContent.innerHTML = `
            @foreach($vehicules_parc_auto as $vehicule)
            <tr>
                <td>{{$vehicule->marque}}</td>
                <td>{{$vehicule->modele}}</td>
                <td class="font-weight-bold">{{$vehicule->immatriculation}}</td>
                <td>{{$vehicule->genre_vehicule->nom}}</td>
                <td>{{$vehicule->kilometrage}} km</td>
                <td>{{$vehicule->affectations[0]->departement->nom}}</td>
                <td class="font-weight-medium"><div class="badge badge-success">{{ $vehicule->etat_vehicule }}</div></td>
            </tr>
            @endforeach
        `;
    }

    function populateTableNeuf() {
        tableContent.innerHTML = `
            @foreach($vehicules_neuf as $vehicule)
            <tr>
                <td>{{$vehicule->marque}}</td>
                <td>{{$vehicule->modele}}</td>
                <td class="font-weight-bold">{{$vehicule->immatriculation}}</td>
                <td>{{$vehicule->genre_vehicule->nom}}</td>
                <td>{{$vehicule->kilometrage}} km</td>
                <td>{{$vehicule->affectations[0]->departement->nom ?? 'N/A'}}</td>
                <td class="font-weight-medium"><div class="badge badge-success">{{ $vehicule->etat_vehicule }}</div></td>
            </tr>
            @endforeach
        `;
    }

    // Initial load
    populateTableTous();
</script>
@endsection
