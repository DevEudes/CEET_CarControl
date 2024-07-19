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
 * Class TypeApprovisionnement
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
 * @property Collection|Approvisionnement[] $approvisionnements
 * @property Collection|FicheSorty[] $fiche_sorties
 *
 * @package App\Models
 */
class TypeApprovisionnement extends Model
{
	use SoftDeletes;
	protected $table = 'type_approvisionnements';

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

	public function approvisionnements()
	{
		return $this->hasMany(Approvisionnement::class, 'id_type_approvisionnement');
	}

	public function fiche_sorties()
	{
		return $this->hasMany(FicheSorty::class, 'id_type_appvnmt');
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
