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
 * Class AppBonSortie
 * 
 * @property int $id
 * @property string $numero_bon_sortie
 * @property string $centre_cout_machine
 * @property string $depense_engagement_concedent
 * @property string $numero_ot
 * @property int $id_approvisionnement
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * 
 * @property Approvisionnement $approvisionnement
 * @property Collection|BonCarburant[] $bon_carburants
 *
 * @package App\Models
 */
class AppBonSortie extends Model
{
	use SoftDeletes;
	protected $table = 'app_bon_sorties';

	protected $casts = [
		'id_approvisionnement' => 'int',
		'created_by' => 'int',
		'updated_by' => 'int'
	];

	protected $fillable = [
		'numero_bon_sortie',
		'centre_cout_machine',
		'depense_engagement_concedent',
		'numero_ot',
		'id_approvisionnement',
		'created_by',
		'updated_by'
	];

	public function approvisionnement()
	{
		return $this->belongsTo(Approvisionnement::class, 'id_approvisionnement');
	}

	public function bon_carburants()
	{
		return $this->hasMany(BonCarburant::class, 'id_app_bon_sortie');
	}
}
