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
 * @property int $id_compagnie_petroliere
 * @property int $id_vehicule
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * 
 * @property CompagniePetroliere $compagnie_petroliere
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
		'id_compagnie_petroliere' => 'int',
		'id_vehicule' => 'int',
		'created_by' => 'int',
		'updated_by' => 'int'
	];

	protected $fillable = [
		'numero_carte',
		'solde',
		'date_expiration',
		'id_compagnie_petroliere',
		'id_vehicule',
		'created_by',
		'updated_by'
	];

	public function compagnie_petroliere()
	{
		return $this->belongsTo(CompagniePetroliere::class, 'id_compagnie_petroliere');
	}

	public function vehicule()
	{
		return $this->belongsTo(Vehicule::class, 'id_vehicule');
	}
}
