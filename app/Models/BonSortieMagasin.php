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
 * Class BonSortieMagasin
 * 
 * @property int $id
 * @property int $numero_bon_sortie
 * @property Carbon $date
 * @property string $centre_cout_machine
 * @property string $depense_engagement_concedent
 * @property string $numero_ot
 * @property string $type_utilisation_materiel
 * @property int $id_fiche_maintenance
 * @property int $id_user
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * 
 * @property FicheMaintenance $fiche_maintenance
 * @property User $user
 * @property Collection|SortiePiece[] $sortie_pieces
 *
 * @package App\Models
 */
class BonSortieMagasin extends Model
{
	use SoftDeletes;
	protected $table = 'bon_sortie_magasins';

	protected $casts = [
		'numero_bon_sortie' => 'int',
		'date' => 'datetime',
		'id_fiche_maintenance' => 'int',
		'id_user' => 'int',
		'created_by' => 'int',
		'updated_by' => 'int'
	];

	protected $fillable = [
		'numero_bon_sortie',
		'date',
		'centre_cout_machine',
		'depense_engagement_concedent',
		'numero_ot',
		'type_utilisation_materiel',
		'id_fiche_maintenance',
		'id_user',
		'created_by',
		'updated_by'
	];

	public function fiche_maintenance()
	{
		return $this->belongsTo(FicheMaintenance::class, 'id_fiche_maintenance');
	}

	public function sortie_pieces()
	{
		return $this->hasMany(SortiePiece::class, 'id_bon_sortie_magasin');
	}
}
