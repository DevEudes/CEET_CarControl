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
 * Class TypeAssurance
 * 
 * @property int $id
 * @property string $libelle
 * @property string|null $description
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
class TypeAssurance extends Model
{
	use SoftDeletes;
	protected $table = 'type_assurances';

	protected $casts = [
		'created_by' => 'int',
		'updated_by' => 'int'
	];

	protected $fillable = [
		'libelle',
		'description',
		'created_by',
		'updated_by'
	];

	public function assurances()
	{
		return $this->hasMany(Assurance::class, 'id_type_assurance');
	}
}
