<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class TVM
 * 
 * @property int $id
 * @property int $numero_taxe
 * @property int $montatnt
 * @property Carbon $date_debut
 * @property Carbon $date_expiration
 * @property string $image
 * @property int $id_vehicule
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * 
 * @property Vehicule $vehicule
 *
 * @package App\Models
 */
class TVM extends Model
{
	use SoftDeletes;
	protected $table = 't_v_m_s';

	protected $casts = [
		'numero_taxe' => 'int',
		'montatnt' => 'int',
		'date_debut' => 'datetime',
		'date_expiration' => 'datetime',
		'id_vehicule' => 'int',
		'created_by' => 'int',
		'updated_by' => 'int'
	];

	protected $fillable = [
		'numero_taxe',
		'montatnt',
		'date_debut',
		'date_expiration',
		'image',
		'id_vehicule',
		'created_by',
		'updated_by'
	];

	public function vehicule()
	{
		return $this->belongsTo(Vehicule::class, 'id_vehicule');
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
