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
 * Class CompagniePetroliere
 * 
 * @property int $id
 * @property string $nom
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * 
 * @property Collection|BonCarburant[] $bon_carburants
 * @property Collection|CarteCarburant[] $carte_carburants
 *
 * @package App\Models
 */
class CompagniePetroliere extends Model
{
	use SoftDeletes;
	protected $table = 'compagnie_petrolieres';

	protected $casts = [
		'created_by' => 'int',
		'updated_by' => 'int'
	];

	protected $fillable = [
		'nom',
		'created_by',
		'updated_by'
	];

	public function bon_carburants()
	{
		return $this->hasMany(BonCarburant::class, 'id_compagnie_petroliere');
	}

	public function carte_carburants()
	{
		return $this->hasMany(CarteCarburant::class, 'id_compagnie_petroliere');
	}
}
