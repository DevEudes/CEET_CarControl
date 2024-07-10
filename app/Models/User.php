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
 * Class User
 * 
 * @property int $id
 * @property string $matricule
 * @property string $nom
 * @property string $prenom
 * @property string $email
 * @property Carbon|null $email_verified_at
 * @property string $password
 * @property int $id_profil
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * 
 * @property Profil $profil
 * @property Collection|Affectation[] $affectations
 * @property Collection|Approvisionnement[] $approvisionnements
 * @property Collection|BonSortieMagasin[] $bon_sortie_magasins
 * @property Collection|DemandeAchat[] $demande_achats
 * @property Collection|FicheMaintenance[] $fiche_maintenances
 * @property Collection|FicheSorty[] $fiche_sorties
 *
 * @package App\Models
 */
class User extends Model
{
	use SoftDeletes;
	protected $table = 'users';

	protected $casts = [
		'email_verified_at' => 'datetime',
		'id_profil' => 'int',
		'created_by' => 'int',
		'updated_by' => 'int'
	];

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'matricule',
		'nom',
		'prenom',
		'email',
		'email_verified_at',
		'password',
		'id_profil',
		'created_by',
		'updated_by'
	];

	public function profil()
	{
		return $this->belongsTo(Profil::class, 'id_profil');
	}

	public function affectations()
	{
		return $this->hasMany(Affectation::class, 'id_user');
	}

	public function approvisionnements()
	{
		return $this->hasMany(Approvisionnement::class, 'id_user');
	}

	public function bon_sortie_magasins()
	{
		return $this->hasMany(BonSortieMagasin::class, 'id_user');
	}

	public function demande_achats()
	{
		return $this->hasMany(DemandeAchat::class, 'id_user');
	}

	public function fiche_maintenances()
	{
		return $this->hasMany(FicheMaintenance::class, 'id_user');
	}

	public function fiche_sorties()
	{
		return $this->hasMany(FicheSorty::class, 'id_user');
	}
}
