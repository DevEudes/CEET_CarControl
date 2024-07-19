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
 * Class Etablissement
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
 * @property Collection|CarteCarburant[] $carte_carburants
 *
 * @package App\Models
 */
class Etablissement extends Model
{
	use SoftDeletes;
	protected $table = 'etablissements';

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
		return $this->hasMany(Assurance::class, 'id_etablissement');
	}

	public function carte_carburants()
	{
		return $this->hasMany(CarteCarburant::class, 'id_etablissement');
	}

	protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (auth()->check()) {
                $model->created_by = auth()->id();
                $model->updated_by = auth()->id();
            }
        });

        static::updating(function ($model) {
            if (auth()->check()) {
                $model->updated_by = auth()->id();
            }
        });
    }
}
