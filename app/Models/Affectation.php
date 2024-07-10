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
 * @property Carbon $date_affectation
 * @property int $index
 * @property string $fonction
 * @property int $id_departement
 * @property int $id_vehicule
 * @property int $id_user
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * 
 * @property Departement $departement
 * @property User $user
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
		'index' => 'int',
		'id_departement' => 'int',
		'id_vehicule' => 'int',
		'id_user' => 'int',
		'created_by' => 'int',
		'updated_by' => 'int'
	];

	protected $fillable = [
		'date_affectation',
		'index',
		'fonction',
		'id_departement',
		'id_vehicule',
		'id_user',
		'created_by',
		'updated_by'
	];

	public function departement()
	{
		return $this->belongsTo(Departement::class, 'id_departement');
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
