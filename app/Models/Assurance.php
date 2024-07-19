<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Assurance
 * 
 * @property int $id
 * @property int $numero_police
 * @property int $montatnt
 * @property Carbon $date_debut
 * @property Carbon $date_expiration
 * @property string $image
 * @property int $id_type_assurance
 * @property int $id_etablissement
 * @property int $id_vehicule
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * 
 * @property Etablissement $etablissement
 * @property TypeAssurance $type_assurance
 * @property Vehicule $vehicule
 *
 * @package App\Models
 */
class Assurance extends Model
{
	use SoftDeletes;
	protected $table = 'assurances';

	protected $casts = [
		'numero_police' => 'int',
		'montatnt' => 'int',
		'date_debut' => 'datetime',
		'date_expiration' => 'datetime',
		'id_type_assurance' => 'int',
		'id_etablissement' => 'int',
		'id_vehicule' => 'int',
		'created_by' => 'int',
		'updated_by' => 'int'
	];

	protected $fillable = [
		'numero_police',
		'montatnt',
		'date_debut',
		'date_expiration',
		'image',
		'id_type_assurance',
		'id_etablissement',
		'id_vehicule',
		'created_by',
		'updated_by'
	];

	public function etablissement()
	{
		return $this->belongsTo(Etablissement::class, 'id_etablissement');
	}

	public function type_assurance()
	{
		return $this->belongsTo(TypeAssurance::class, 'id_type_assurance');
	}

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
