<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class SortiePiece
 * 
 * @property int $id
 * @property int $id_piece
 * @property int $id_bon_sortie_magasin
 * @property float $quantite
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * 
 * @property BonSortieMagasin $bon_sortie_magasin
 * @property Piece $piece
 *
 * @package App\Models
 */
class SortiePiece extends Model
{
	use SoftDeletes;
	protected $table = 'sortie_pieces';

	protected $casts = [
		'id_piece' => 'int',
		'id_bon_sortie_magasin' => 'int',
		'quantite' => 'float',
		'created_by' => 'int',
		'updated_by' => 'int'
	];

	protected $fillable = [
		'id_piece',
		'id_bon_sortie_magasin',
		'quantite',
		'created_by',
		'updated_by'
	];

	public function bon_sortie_magasin()
	{
		return $this->belongsTo(BonSortieMagasin::class, 'id_bon_sortie_magasin');
	}

	public function piece()
	{
		return $this->belongsTo(Piece::class, 'id_piece');
	}
}
