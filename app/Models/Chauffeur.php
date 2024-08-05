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
 * Class Chauffeur
 * 
 * @property int $id
 * @property string $matricule
 * @property string $nom
 * @property string $prenom
 * @property int $contact
 * @property bool $disponibilite
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * 
 * @property Collection|Approvisionnement[] $approvisionnements
 * @property Collection|FicheMaintenance[] $fiche_maintenances
 * @property Collection|Fichesortie[] $fiche_sorties
 *
 * @package App\Models
 */
class Chauffeur extends Model
{
	use SoftDeletes;
	protected $table = 'chauffeurs';

	protected $casts = [
		'contact' => 'int',
		'disponibilite' => 'bool',
		'created_by' => 'int',
		'updated_by' => 'int'
	];

	protected $fillable = [
		'matricule',
		'nom',
		'prenom',
		'contact',
		'disponibilite',
		'created_by',
		'updated_by'
	];

	public function approvisionnements()
	{
		return $this->hasMany(Approvisionnement::class, 'id_chauffeur');
	}

	public function fiche_maintenances()
	{
		return $this->hasMany(FicheMaintenance::class, 'id_chauffeur');
	}

	public function fiche_sorties()
	{
		return $this->hasMany(Fichesortie::class, 'id_chauffeur');
	}
}
