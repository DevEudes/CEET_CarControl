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
 * Class Profil
 * 
 * @property int $id
 * @property string $libelle
 * @property string $description
 * @property int $id_departement
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * 
 * @property Departement $departement
 * @property Collection|User[] $users
 *
 * @package App\Models
 */
class Profil extends Model
{
	use SoftDeletes;
	protected $table = 'profils';

	protected $casts = [
		'id_departement' => 'int',
		'created_by' => 'int',
		'updated_by' => 'int'
	];

	protected $fillable = [
		'libelle',
		'description',
		'id_departement',
		'created_by',
		'updated_by'
	];

	public function departement()
	{
		return $this->belongsTo(Departement::class, 'id_departement');
	}

	public function users()
	{
		return $this->hasMany(User::class, 'id_profil');
	}
}
