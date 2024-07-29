<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Affectation
 * 
 * @property int $id
 * @property string $numero_affectation
 * @property Carbon $date_affectation
 * @property int $kilometrage
 * @property string $fonction
 * @property int $id_departement
 * @property int $id_vehicule
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * 
 * @property Departement $departement
 * @property Vehicule $vehicule
 *
 * @package App\Models
 */
class Affectation extends Model
{
	use SoftDeletes;
	protected $table = 'affectations';

	protected $casts = [
		'date_affectation' => 'datetime',
		'kilometrage' => 'int',
		'id_departement' => 'int',
		'id_vehicule' => 'int',
		'created_by' => 'int',
		'updated_by' => 'int'
	];

	protected $fillable = [
		'numero_affectation',
		'date_affectation',
		'kilometrage',
		'fonction',
		'id_departement',
		'id_vehicule',
		'created_by',
		'updated_by'
	];

	public function departement()
	{
		return $this->belongsTo(Departement::class, 'id_departement');
	}

	public function vehicule()
	{
		return $this->belongsTo(Vehicule::class, 'id_vehicule');
	}
}
