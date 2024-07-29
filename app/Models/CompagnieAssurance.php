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
 * Class CompagnieAssurance
 * 
 * @property int $id
 * @property string $code
 * @property string $nom
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * 
 * @property Collection|Assurance[] $assurances
 *
 * @package App\Models
 */
class CompagnieAssurance extends Model
{
	use SoftDeletes;
	protected $table = 'compagnie_assurances';

	protected $casts = [
		'created_by' => 'int',
		'updated_by' => 'int'
	];

	protected $fillable = [
		'code',
		'nom',
		'created_by',
		'updated_by'
	];

	public function assurances()
	{
		return $this->hasMany(Assurance::class, 'id_compagnie_assurance');
	}
}
