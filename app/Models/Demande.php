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
 * Class Demande
 * 
 * @property int $id
 * @property string $date_demande
 * @property string $nom_demandeur
 * @property string $objet_demande
 * @property int $contact_demandeur
 * @property int $id_departement
 * @property int $id_type_sortie
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * 
 * @property Departement $departement
 * @property Typesortie $type_sortie
 * @property Collection|Fichesortie[] $fiche_sorties
 *
 * @package App\Models
 */
class Demande extends Model
{
	use SoftDeletes;
	protected $table = 'demandes';

	protected $casts = [
		'contact_demandeur' => 'int',
		'id_departement' => 'int',
		'id_type_sortie' => 'int',
		'created_by' => 'int',
		'updated_by' => 'int'
	];

	protected $fillable = [
		'date_demande',
		'nom_demandeur',
		'objet_demande',
		'contact_demandeur',
		'id_departement',
		'id_type_sortie',
		'created_by',
		'updated_by'
	];

	public function departement()
	{
		return $this->belongsTo(Departement::class, 'id_departement');
	}

	public function type_sortie()
	{
		return $this->belongsTo(Typesortie::class, 'id_type_sortie');
	}

	public function fiche_sorties()
	{
		return $this->hasMany(Fichesortie::class, 'id_demande');
	}
}
