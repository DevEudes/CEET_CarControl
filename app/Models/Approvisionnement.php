<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Approvisionnement
 * 
 * @property int $id
 * @property string $motif_appvnmt
 * @property string|null $centre_cout_machine
 * @property string|null $depense_engagement_concedent
 * @property string|null $numero_ot
 * @property string $type_produit
 * @property Carbon $date_depart
 * @property Carbon $date_retour
 * @property int $index_depart
 * @property int $index_retour
 * @property int|null $solde_carte_depart
 * @property int|null $solde_carte_retour
 * @property float $quantite
 * @property float $taux_consommation
 * @property int|null $numero_bon_carburant
 * @property int|null $numero_bon_sortie_produit_petrolier
 * @property int|null $numero_transaction
 * @property string $etat_fiche
 * @property int $id_type_approvisionnement
 * @property int $id_chauffeur
 * @property int $id_vehicule
 * @property int $id_user
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * 
 * @property Chauffeur $chauffeur
 * @property TypeApprovisionnement $type_approvisionnement
 * @property User $user
 * @property Vehicule $vehicule
 *
 * @package App\Models
 */
class Approvisionnement extends Model
{
	use SoftDeletes;
	protected $table = 'approvisionnements';

	protected $casts = [
		'date_depart' => 'datetime',
		'date_retour' => 'datetime',
		'index_depart' => 'int',
		'index_retour' => 'int',
		'solde_carte_depart' => 'int',
		'solde_carte_retour' => 'int',
		'quantite' => 'float',
		'taux_consommation' => 'float',
		'numero_bon_carburant' => 'int',
		'numero_bon_sortie_produit_petrolier' => 'int',
		'numero_transaction' => 'int',
		'id_type_approvisionnement' => 'int',
		'id_chauffeur' => 'int',
		'id_vehicule' => 'int',
		'id_user' => 'int',
		'created_by' => 'int',
		'updated_by' => 'int'
	];

	protected $fillable = [
		'motif_appvnmt',
		'centre_cout_machine',
		'depense_engagement_concedent',
		'numero_ot',
		'type_produit',
		'date_depart',
		'date_retour',
		'index_depart',
		'index_retour',
		'solde_carte_depart',
		'solde_carte_retour',
		'quantite',
		'taux_consommation',
		'numero_bon_carburant',
		'numero_bon_sortie_produit_petrolier',
		'numero_transaction',
		'etat_fiche',
		'id_type_approvisionnement',
		'id_chauffeur',
		'id_vehicule',
		'id_user',
		'created_by',
		'updated_by'
	];

	public function chauffeur()
	{
		return $this->belongsTo(Chauffeur::class, 'id_chauffeur');
	}

	public function type_approvisionnement()
	{
		return $this->belongsTo(TypeApprovisionnement::class, 'id_type_approvisionnement');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'id_user');
	}

	public function vehicule()
	{
		return $this->belongsTo(Vehicule::class, 'id_vehicule');
	}
}
