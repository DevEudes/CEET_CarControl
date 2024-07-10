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
 * Class Direction
 * 
 * @property int $id
 * @property string $nom
 * @property string $libelle
 * @property int $code_geographique
 * @property int $id_parent
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * 
 * @property Direction $direction
 * @property Collection|Departement[] $departements
 * @property Collection|Direction[] $directions
 *
 * @package App\Models
 */
class Direction extends Model
{
	use SoftDeletes;
	protected $table = 'directions';

	protected $casts = [
		'code_geographique' => 'int',
		'id_parent' => 'int',
		'created_by' => 'int',
		'updated_by' => 'int'
	];

	protected $fillable = [
		'nom',
		'libelle',
		'code_geographique',
		'id_parent',
		'created_by',
		'updated_by'
	];

	public function direction()
	{
		return $this->belongsTo(Direction::class, 'id_parent');
	}

	public function departements()
	{
		return $this->hasMany(Departement::class, 'id_direction');
	}

	public function directions()
	{
		return $this->hasMany(Direction::class, 'id_parent');
	}
}
