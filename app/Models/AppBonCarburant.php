<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class AppBonCarburant
 * 
 * @property int $id
 * @property Carbon $date_heure_depart
 * @property Carbon $date_heure_retour
 * @property int $kilometrage_depart
 * @property int $kilometrage_retour
 * @property int $id_approvisionnement
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * 
 * @property Approvisionnement $approvisionnement
 *
 * @package App\Models
 */
class AppBonCarburant extends Model
{
	use SoftDeletes;
	protected $table = 'app_bon_carburants';

	protected $casts = [
		'date_heure_depart' => 'datetime',
		'date_heure_retour' => 'datetime',
		'kilometrage_depart' => 'int',
		'kilometrage_retour' => 'int',
		'id_approvisionnement' => 'int',
		'created_by' => 'int',
		'updated_by' => 'int'
	];

	protected $fillable = [
		'date_heure_depart',
		'date_heure_retour',
		'kilometrage_depart',
		'kilometrage_retour',
		'id_approvisionnement',
		'created_by',
		'updated_by'
	];

	public function approvisionnement()
	{
		return $this->belongsTo(Approvisionnement::class, 'id_approvisionnement');
	}
}
