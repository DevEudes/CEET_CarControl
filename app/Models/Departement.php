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
 * Class Departement
 * 
 * @property int $id
 * @property string $nom
 * @property string $libelle
 * @property string $code_centre_de_responsabilite_
 * @property int $id_direction
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * 
 * @property Direction $direction
 * @property Collection|Affectation[] $affectations
 * @property Collection|DemandeAchat[] $demande_achats
 * @property Collection|FicheSorty[] $fiche_sorties
 * @property Collection|Profil[] $profils
 *
 * @package App\Models
 */
class Departement extends Model
{
	use SoftDeletes;
	protected $table = 'departements';

	protected $casts = [
		'id_direction' => 'int',
		'created_by' => 'int',
		'updated_by' => 'int'
	];

	protected $fillable = [
		'nom',
		'libelle',
		'code_centre_de_responsabilite_',
		'id_direction',
		'created_by',
		'updated_by'
	];

	public function direction()
	{
		return $this->belongsTo(Direction::class, 'id_direction');
	}

	public function affectations()
	{
		return $this->hasMany(Affectation::class, 'id_departement');
	}

	public function demande_achats()
	{
		return $this->hasMany(DemandeAchat::class, 'id_departement');
	}

	public function fiche_sorties()
	{
		return $this->hasMany(FicheSorty::class, 'id_departement');
	}

	public function profils()
	{
		return $this->hasMany(Profil::class, 'id_departement');
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
