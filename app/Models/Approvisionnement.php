<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Approvisionnement
 * 
 * @property int $id
 * @property string $numero_appvnmt
 * @property string $motif_appvnmt
 * @property string $type_produit
 * @property float $quantite
 * @property float $taux_consommation
 * @property string $etat_fiche
 * @property int $id_chauffeur
 * @property int $id_vehicule
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * 
 * @property Chauffeur $chauffeur
 * @property Vehicule $vehicule
 * @property Collection|AppBonCarburant[] $app_bon_carburants
 * @property Collection|AppBonSorty[] $app_bon_sorties
 * @property Collection|AppCarteCarburant[] $app_carte_carburants
 *
 * @package App\Models
 */
class Approvisionnement extends Model
{
	use SoftDeletes;
	protected $table = 'approvisionnements';

	protected $casts = [
		'quantite' => 'float',
		'taux_consommation' => 'float',
		'id_chauffeur' => 'int',
		'id_vehicule' => 'int',
		'created_by' => 'int',
		'updated_by' => 'int'
	];

	protected $fillable = [
		'numero_appvnmt',
		'motif_appvnmt',
		'type_produit',
		'quantite',
		'taux_consommation',
		'etat_fiche',
		'id_chauffeur',
		'id_vehicule',
		'created_by',
		'updated_by'
	];

	public function chauffeur()
	{
		return $this->belongsTo(Chauffeur::class, 'id_chauffeur');
	}

	public function vehicule()
	{
		return $this->belongsTo(Vehicule::class, 'id_vehicule');
	}

	public function app_bon_carburants()
	{
		return $this->hasMany(AppBonCarburant::class, 'id_approvisionnement');
	}

	public function app_bon_sorties()
	{
		return $this->hasMany(AppBonSorty::class, 'id_approvisionnement');
	}

	public function app_carte_carburants()
	{
		return $this->hasMany(AppCarteCarburant::class, 'id_approvisionnement');
	}
}
