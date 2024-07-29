<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

/**
 * Class User
 * 
 * @property int $id
 * @property string $matricule
 * @property string $nom
 * @property string $prenom
 * @property string $email
 * @property string $contact
 * @property Carbon|null $email_verified_at
 * @property string $password
 * @property int $id_departement
 * @property int $id_profil
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * 
 * @property Departement $departement
 * @property Profil $profil
 * @property Collection|BonSortieMagasin[] $bon_sortie_magasins
 * @property Collection|DemandeAchat[] $demande_achats
 *
 * @package App\Models
 */
class User extends Authenticatable implements AuthenticatableContract, CanResetPasswordContract
{
	use SoftDeletes, CanResetPassword, Notifiable, HasRoles;
	protected $table = 'users';

	protected $casts = [
		'email_verified_at' => 'datetime',
		'id_departement' => 'int',
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
		'contact',
		'email_verified_at',
		'password',
		'id_departement',
		'id_profil',
		'created_by',
		'updated_by'
	];

	public function departement()
	{
		return $this->belongsTo(Departement::class, 'id_departement');
	}

	public function profil()
	{
		return $this->belongsTo(Profil::class, 'id_profil');
	}

	public function bon_sortie_magasins()
	{
		return $this->hasMany(BonSortieMagasin::class, 'id_user');
	}

	public function demande_achats()
	{
		return $this->hasMany(DemandeAchat::class, 'id_user');
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
