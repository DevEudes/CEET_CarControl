<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Assurance
 * 
 * @property int $id
 * @property int $numero_police
 * @property int $montatnt
 * @property Carbon $date_debut
 * @property Carbon $date_expiration
 * @property string $image
 * @property string $type_assurance
 * @property int $id_compagnie_assurance
 * @property int $id_vehicule
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * 
 * @property CompagnieAssurance $compagnie_assurance
 * @property Vehicule $vehicule
 *
 * @package App\Models
 */
class Assurance extends Model
{
	use SoftDeletes;
	protected $table = 'assurances';

	protected $casts = [
		'numero_police' => 'int',
		'montatnt' => 'int',
		'date_debut' => 'datetime',
		'date_expiration' => 'datetime',
		'id_compagnie_assurance' => 'int',
		'id_vehicule' => 'int',
		'created_by' => 'int',
		'updated_by' => 'int'
	];

	protected $fillable = [
		'numero_police',
		'montatnt',
		'date_debut',
		'date_expiration',
		'image',
		'type_assurance',
		'id_compagnie_assurance',
		'id_vehicule',
		'created_by',
		'updated_by'
	];

	public function compagnie_assurance()
	{
		return $this->belongsTo(CompagnieAssurance::class, 'id_compagnie_assurance');
	}

	public function vehicule()
	{
		return $this->belongsTo(Vehicule::class, 'id_vehicule');
	}
}
