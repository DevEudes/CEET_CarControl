@extends ('layouts/base')
@section('container')
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
								<tr>
									<td>Nissan Navara</td>
									<td class="font-weight-bold">TG 5345</td>
									<td>Camionnette</td>
									<td>4740 km</td>
									<td class="font-weight-medium"><div class="badge badge-success">En mission</div></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
    </div>
    <!-- vehicule -->
@endsection