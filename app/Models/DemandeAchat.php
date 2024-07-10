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
 * Class DemandeAchat
 * 
 * @property int $id
 * @property int $numero_demande
 * @property Carbon $date
 * @property string $centre_cout_machine
 * @property string $depense_engagement_concedent
 * @property string $numero_ot
 * @property string $motif
 * @property int $id_departement
 * @property int $id_user
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * 
 * @property Departement $departement
 * @property User $user
 * @property Collection|AchatPiece[] $achat_pieces
 *
 * @package App\Models
 */
class DemandeAchat extends Model
{
	use SoftDeletes;
	protected $table = 'demande_achats';

	protected $casts = [
		'numero_demande' => 'int',
		'date' => 'datetime',
		'id_departement' => 'int',
		'id_user' => 'int',
		'created_by' => 'int',
		'updated_by' => 'int'
	];

	protected $fillable = [
		'numero_demande',
		'date',
		'centre_cout_machine',
		'depense_engagement_concedent',
		'numero_ot',
		'motif',
		'id_departement',
		'id_user',
		'created_by',
		'updated_by'
	];

	public function departement()
	{
		return $this->belongsTo(Departement::class, 'id_departement');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'id_user');
	}

	public function achat_pieces()
	{
		return $this->hasMany(AchatPiece::class, 'id_demande_achat');
	}
}
