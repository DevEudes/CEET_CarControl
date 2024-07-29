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
 * Class FicheMaintenance
 * 
 * @property int $id
 * @property string $numero_maintenance
 * @property Carbon $date_heure_entree
 * @property Carbon $date_heure_sortie
 * @property int $kilometrage
 * @property string $declaration_utilisateur
 * @property string $obsrvation_controleur
 * @property string $inspection_reception
 * @property string $inspection_livraison
 * @property string $travaux_execute
 * @property string $etat_fiche
 * @property int $id_chauffeur
 * @property int $id_vehicule
 * @property int $id_mecanicien
 * @property int $id_garage
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * 
 * @property Chauffeur $chauffeur
 * @property Garage $garage
 * @property Mecanicien $mecanicien
 * @property Vehicule $vehicule
 * @property Collection|BonSortieMagasin[] $bon_sortie_magasins
 *
 * @package App\Models
 */
class FicheMaintenance extends Model
{
	use SoftDeletes;
	protected $table = 'fiche_maintenances';

	protected $casts = [
		'date_heure_entree' => 'datetime',
		'date_heure_sortie' => 'datetime',
		'kilometrage' => 'int',
		'id_chauffeur' => 'int',
		'id_vehicule' => 'int',
		'id_mecanicien' => 'int',
		'id_garage' => 'int',
		'created_by' => 'int',
		'updated_by' => 'int'
	];

	protected $fillable = [
		'numero_maintenance',
		'date_heure_entree',
		'date_heure_sortie',
		'kilometrage',
		'declaration_utilisateur',
		'obsrvation_controleur',
		'inspection_reception',
		'inspection_livraison',
		'travaux_execute',
		'etat_fiche',
		'id_chauffeur',
		'id_vehicule',
		'id_mecanicien',
		'id_garage',
		'created_by',
		'updated_by'
	];

	public function chauffeur()
	{
		return $this->belongsTo(Chauffeur::class, 'id_chauffeur');
	}

	public function garage()
	{
		return $this->belongsTo(Garage::class, 'id_garage');
	}

	public function mecanicien()
	{
		return $this->belongsTo(Mecanicien::class, 'id_mecanicien');
	}

	public function vehicule()
	{
		return $this->belongsTo(Vehicule::class, 'id_vehicule');
	}

	public function bon_sortie_magasins()
	{
		return $this->hasMany(BonSortieMagasin::class, 'id_fiche_maintenance');
	}
}
