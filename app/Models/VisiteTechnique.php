<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class VisiteTechnique
 * 
 * @property int $id
 * @property int $numero_quittance
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
class VisiteTechnique extends Model
{
	use SoftDeletes;
	protected $table = 'visite_techniques';

	protected $casts = [
		'numero_quittance' => 'int',
		'montatnt' => 'int',
		'date_debut' => 'datetime',
		'date_expiration' => 'datetime',
		'id_vehicule' => 'int',
		'created_by' => 'int',
		'updated_by' => 'int'
	];

	protected $fillable = [
		'numero_quittance',
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
