<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class CarteCarburant
 * 
 * @property int $id
 * @property int $numero_carte
 * @property int $solde
 * @property Carbon $date_expiration
 * @property int $id_etablissement
 * @property int $id_vehicule
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * 
 * @property Etablissement $etablissement
 * @property Vehicule $vehicule
 *
 * @package App\Models
 */
class CarteCarburant extends Model
{
	use SoftDeletes;
	protected $table = 'carte_carburants';

	protected $casts = [
		'numero_carte' => 'int',
		'solde' => 'int',
		'date_expiration' => 'datetime',
		'id_etablissement' => 'int',
		'id_vehicule' => 'int',
		'created_by' => 'int',
		'updated_by' => 'int'
	];

	protected $fillable = [
		'numero_carte',
		'solde',
		'date_expiration',
		'id_etablissement',
		'id_vehicule',
		'created_by',
		'updated_by'
	];

	public function etablissement()
	{
		return $this->belongsTo(Etablissement::class, 'id_etablissement');
	}

	public function vehicule()
	{
		return $this->belongsTo(Vehicule::class, 'id_vehicule');
	}
}
