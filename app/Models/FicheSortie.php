<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class FicheSorty
 * 
 * @property int $id
 * @property Carbon $date_demande
 * @property string $objet_demande
 * @property string $nom_demandeur
 * @property Carbon $date_heure_depart
 * @property Carbon $date_heure_retour
 * @property int $index_depart
 * @property int $index_retour
 * @property string $etat_depart
 * @property string $etat_retour
 * @property float $estimation_besoin_carburant
 * @property int $estimation_nombre_kilometre
 * @property string|null $observation_depart
 * @property string|null $observation_retour
 * @property string $etat_fiche
 * @property int $id_type_sortie
 * @property int $id_type_appvnmt
 * @property int $id_chauffeur
 * @property int $id_vehicule
 * @property int $id_user
 * @property int $id_departement
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * 
 * @property Chauffeur $chauffeur
 * @property Departement $departement
 * @property TypeApprovisionnement $type_approvisionnement
 * @property TypeSorty $type_sorty
 * @property User $user
 * @property Vehicule $vehicule
 *
 * @package App\Models
 */
class FicheSorty extends Model
{
	use SoftDeletes;
	protected $table = 'fiche_sorties';

	protected $casts = [
		'date_demande' => 'datetime',
		'date_heure_depart' => 'datetime',
		'date_heure_retour' => 'datetime',
		'index_depart' => 'int',
		'index_retour' => 'int',
		'estimation_besoin_carburant' => 'float',
		'estimation_nombre_kilometre' => 'int',
		'id_type_sortie' => 'int',
		'id_type_appvnmt' => 'int',
		'id_chauffeur' => 'int',
		'id_vehicule' => 'int',
		'id_user' => 'int',
		'id_departement' => 'int',
		'created_by' => 'int',
		'updated_by' => 'int'
	];

	protected $fillable = [
		'date_demande',
		'objet_demande',
		'nom_demandeur',
		'date_heure_depart',
		'date_heure_retour',
		'index_depart',
		'index_retour',
		'etat_depart',
		'etat_retour',
		'estimation_besoin_carburant',
		'estimation_nombre_kilometre',
		'observation_depart',
		'observation_retour',
		'etat_fiche',
		'id_type_sortie',
		'id_type_appvnmt',
		'id_chauffeur',
		'id_vehicule',
		'id_user',
		'id_departement',
		'created_by',
		'updated_by'
	];

	public function chauffeur()
	{
		return $this->belongsTo(Chauffeur::class, 'id_chauffeur');
	}

	public function departement()
	{
		return $this->belongsTo(Departement::class, 'id_departement');
	}

	public function type_approvisionnement()
	{
		return $this->belongsTo(TypeApprovisionnement::class, 'id_type_appvnmt');
	}

	public function type_sorty()
	{
		return $this->belongsTo(TypeSorty::class, 'id_type_sortie');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'id_user');
	}

	public function vehicule()
	{
		return $this->belongsTo(Vehicule::class, 'id_vehicule');
	}

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (auth()->check()) {
                $model->created_by = auth()->id();
                $model->updated_by = auth()->id();
            }
        });

        static::updating(function ($model) {
            if (auth()->check()) {
                $model->updated_by = auth()->id();
            }
        });
    }
}
