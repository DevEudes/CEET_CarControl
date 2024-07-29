<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Fichesortie
 * 
 * @property int $id
 * @property Carbon $date_heure_depart
 * @property Carbon $date_heure_retour
 * @property int $kilometrage_depart
 * @property int $kilometrage_retour
 * @property string $etat_depart
 * @property string $etat_retour
 * @property float $estimation_besoin_carburant
 * @property int $estimation_nombre_kilometre
 * @property string|null $observation_depart
 * @property string|null $observation_retour
 * @property string $etat_fiche
 * @property int $id_chauffeur
 * @property int $id_vehicule
 * @property int $id_demande
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * 
 * @property Chauffeur $chauffeur
 * @property Demande $demande
 * @property Vehicule $vehicule
 *
 * @package App\Models
 */
class Fichesortie extends Model
{
	use SoftDeletes;
	protected $table = 'fiche_sorties';

	protected $casts = [
		'date_heure_depart' => 'datetime',
		'date_heure_retour' => 'datetime',
		'kilometrage_depart' => 'int',
		'kilometrage_retour' => 'int',
		'estimation_besoin_carburant' => 'float',
		'estimation_nombre_kilometre' => 'int',
		'id_chauffeur' => 'int',
		'id_vehicule' => 'int',
		'id_demande' => 'int',
		'created_by' => 'int',
		'updated_by' => 'int'
	];

	protected $fillable = [
		'date_heure_depart',
		'date_heure_retour',
		'kilometrage_depart',
		'kilometrage_retour',
		'etat_depart',
		'etat_retour',
		'estimation_besoin_carburant',
		'estimation_nombre_kilometre',
		'observation_depart',
		'observation_retour',
		'etat_fiche',
		'id_chauffeur',
		'id_vehicule',
		'id_demande',
		'created_by',
		'updated_by'
	];

	public function chauffeur()
	{
		return $this->belongsTo(Chauffeur::class, 'id_chauffeur');
	}

	public function demande()
	{
		return $this->belongsTo(Demande::class, 'id_demande');
	}

	public function vehicule()
	{
		return $this->belongsTo(Vehicule::class, 'id_vehicule');
	}
}
