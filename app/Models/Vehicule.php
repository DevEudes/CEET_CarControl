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
 * Class Vehicule
 * 
 * @property int $id
 * @property string $immatriculation
 * @property string $marque
 * @property string $modele
 * @property string $numero_moteur
 * @property string $numero_chassis
 * @property Carbon $date_achat
 * @property int $numero_carte_grise
 * @property string $image_carte_grise
 * @property Carbon|null $validite_garantie
 * @property int $kilometrage
 * @property string $liste_outillage
 * @property string $etat_vehicule
 * @property int $id_genre_vehicule
 * @property int $id_fournisseur
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * 
 * @property Fournisseur $fournisseur
 * @property GenreVehicule $genre_vehicule
 * @property Collection|Affectation[] $affectations
 * @property Collection|Approvisionnement[] $approvisionnements
 * @property Collection|Assurance[] $assurances
 * @property Collection|CarteCarburant[] $carte_carburants
 * @property Collection|FicheMaintenance[] $fiche_maintenances
 * @property Collection|FicheSorty[] $fiche_sorties
 * @property Collection|TVM[] $t_v_m_s
 * @property Collection|VisiteTechnique[] $visite_techniques
 *
 * @package App\Models
 */
class Vehicule extends Model
{
	use SoftDeletes;
	protected $table = 'vehicules';

	protected $casts = [
		'date_achat' => 'datetime',
		'numero_carte_grise' => 'int',
		'validite_garantie' => 'datetime',
		'kilometrage' => 'int',
		'id_genre_vehicule' => 'int',
		'id_fournisseur' => 'int',
		'created_by' => 'int',
		'updated_by' => 'int'
	];

	protected $fillable = [
		'immatriculation',
		'marque',
		'modele',
		'numero_moteur',
		'numero_chassis',
		'date_achat',
		'numero_carte_grise',
		'image_carte_grise',
		'validite_garantie',
		'kilometrage',
		'liste_outillage',
		'etat_vehicule',
		'id_genre_vehicule',
		'id_fournisseur',
		'created_by',
		'updated_by'
	];

	public function fournisseur()
	{
		return $this->belongsTo(Fournisseur::class, 'id_fournisseur');
	}

	public function genre_vehicule()
	{
		return $this->belongsTo(GenreVehicule::class, 'id_genre_vehicule');
	}

	public function affectations()
	{
		return $this->hasMany(Affectation::class, 'id_vehicule');
	}

	public function approvisionnements()
	{
		return $this->hasMany(Approvisionnement::class, 'id_vehicule');
	}

	public function assurances()
	{
		return $this->hasMany(Assurance::class, 'id_vehicule');
	}

	public function carte_carburants()
	{
		return $this->hasMany(CarteCarburant::class, 'id_vehicule');
	}

	public function fiche_maintenances()
	{
		return $this->hasMany(FicheMaintenance::class, 'id_vehicule');
	}

	public function fiche_sorties()
	{
		return $this->hasMany(FicheSorty::class, 'id_vehicule');
	}

	public function t_v_m_s()
	{
		return $this->hasMany(TVM::class, 'id_vehicule');
	}

	public function visite_techniques()
	{
		return $this->hasMany(VisiteTechnique::class, 'id_vehicule');
	}
}
