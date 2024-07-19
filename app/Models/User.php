<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements AuthenticatableContract, CanResetPasswordContract
{
    use SoftDeletes, CanResetPassword, Notifiable, HasRoles;

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

