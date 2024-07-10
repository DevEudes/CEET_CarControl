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
 * Class Mecanicien
 * 
 * @property int $id
 * @property string $matricule
 * @property string $nom
 * @property string $prenom
 * @property int $contact
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * 
 * @property Collection|FicheMaintenance[] $fiche_maintenances
 *
 * @package App\Models
 */
class Mecanicien extends Model
{
	use SoftDeletes;
	protected $table = 'mecaniciens';

	protected $casts = [
		'contact' => 'int',
		'created_by' => 'int',
		'updated_by' => 'int'
	];

	protected $fillable = [
		'matricule',
		'nom',
		'prenom',
		'contact',
		'created_by',
		'updated_by'
	];

	public function fiche_maintenances()
	{
		return $this->hasMany(FicheMaintenance::class, 'id_mecanicien');
	}
}
