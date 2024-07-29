<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class RecuTransaction
 * 
 * @property int $id
 * @property string $numero_transaction
 * @property string $point_approvisionnement
 * @property string $type_produit
 * @property float $quantite
 * @property int $montant
 * @property int $id_app_carte_carburant
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * 
 * @property AppCarteCarburant $app_carte_carburant
 *
 * @package App\Models
 */
class RecuTransaction extends Model
{
	use SoftDeletes;
	protected $table = 'recu_transactions';

	protected $casts = [
		'quantite' => 'float',
		'montant' => 'int',
		'id_app_carte_carburant' => 'int',
		'created_by' => 'int',
		'updated_by' => 'int'
	];

	protected $fillable = [
		'numero_transaction',
		'point_approvisionnement',
		'type_produit',
		'quantite',
		'montant',
		'id_app_carte_carburant',
		'created_by',
		'updated_by'
	];

	public function app_carte_carburant()
	{
		return $this->belongsTo(AppCarteCarburant::class, 'id_app_carte_carburant');
	}
}
