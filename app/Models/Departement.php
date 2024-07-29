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
 * @property string $code_centre_de_responsabilite
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
 * @property Collection|Demande[] $demandes
 * @property Collection|User[] $users
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
		'code_centre_de_responsabilite',
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

	public function demandes()
	{
		return $this->hasMany(Demande::class, 'id_departement');
	}

	public function users()
	{
		return $this->hasMany(User::class, 'id_departement');
	}
}
