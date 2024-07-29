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
 * Class AppCarteCarburant
 * 
 * @property int $id
 * @property Carbon $date_heure_depart
 * @property Carbon $date_heure_retour
 * @property int $kilometrage_depart
 * @property int $kilometrage_retour
 * @property int $solde_carte_depart
 * @property int $solde_carte_retour
 * @property int $id_approvisionnement
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * 
 * @property Approvisionnement $approvisionnement
 * @property Collection|RecuTransaction[] $recu_transactions
 *
 * @package App\Models
 */
class AppCarteCarburant extends Model
{
	use SoftDeletes;
	protected $table = 'app_carte_carburants';

	protected $casts = [
		'date_heure_depart' => 'datetime',
		'date_heure_retour' => 'datetime',
		'kilometrage_depart' => 'int',
		'kilometrage_retour' => 'int',
		'solde_carte_depart' => 'int',
		'solde_carte_retour' => 'int',
		'id_approvisionnement' => 'int',
		'created_by' => 'int',
		'updated_by' => 'int'
	];

	protected $fillable = [
		'date_heure_depart',
		'date_heure_retour',
		'kilometrage_depart',
		'kilometrage_retour',
		'solde_carte_depart',
		'solde_carte_retour',
		'id_approvisionnement',
		'created_by',
		'updated_by'
	];

	public function approvisionnement()
	{
		return $this->belongsTo(Approvisionnement::class, 'id_approvisionnement');
	}

	public function recu_transactions()
	{
		return $this->hasMany(RecuTransaction::class, 'id_app_carte_carburant');
	}
}
