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
 * Class Typesortie
 * 
 * @property int $id
 * @property string $nom
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * 
 * @property Collection|Demande[] $demandes
 *
 * @package App\Models
 */
class Typesortie extends Model
{
	use SoftDeletes;
	protected $table = 'type_sorties';

	protected $casts = [
		'created_by' => 'int',
		'updated_by' => 'int'
	];

	protected $fillable = [
		'nom',
		'created_by',
		'updated_by'
	];

	public function demandes()
	{
		return $this->hasMany(Demande::class, 'id_type_sortie');
	}
}
