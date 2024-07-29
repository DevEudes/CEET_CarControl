<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class BonCarburant
 * 
 * @property int $id
 * @property string $numero_bon_carburant
 * @property string $point_approvisionnement
 * @property string $type_produit
 * @property float $quantite
 * @property int $montant
 * @property int $id_app_bon_sortie
 * @property int $id_compagnie_petroliere
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * 
 * @property AppBonSorty $app_bon_sorty
 * @property CompagniePetroliere $compagnie_petroliere
 *
 * @package App\Models
 */
class BonCarburant extends Model
{
	use SoftDeletes;
	protected $table = 'bon_carburants';

	protected $casts = [
		'quantite' => 'float',
		'montant' => 'int',
		'id_app_bon_sortie' => 'int',
		'id_compagnie_petroliere' => 'int',
		'created_by' => 'int',
		'updated_by' => 'int'
	];

	protected $fillable = [
		'numero_bon_carburant',
		'point_approvisionnement',
		'type_produit',
		'quantite',
		'montant',
		'id_app_bon_sortie',
		'id_compagnie_petroliere',
		'created_by',
		'updated_by'
	];

	public function app_bon_sorty()
	{
		return $this->belongsTo(AppBonSorty::class, 'id_app_bon_sortie');
	}

	public function compagnie_petroliere()
	{
		return $this->belongsTo(CompagniePetroliere::class, 'id_compagnie_petroliere');
	}
}
