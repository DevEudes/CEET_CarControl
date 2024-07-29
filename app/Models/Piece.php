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
 * Class Piece
 * 
 * @property int $id
 * @property string $reference
 * @property string $nom
 * @property float $quantite
 * @property string|null $observation
 * @property int $id_type_piece
 * @property int $id_fournisseur
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * 
 * @property Fournisseur $fournisseur
 * @property TypePiece $type_piece
 * @property Collection|AchatPiece[] $achat_pieces
 * @property Collection|SortiePiece[] $sortie_pieces
 *
 * @package App\Models
 */
class Piece extends Model
{
	use SoftDeletes;
	protected $table = 'pieces';

	protected $casts = [
		'quantite' => 'float',
		'id_type_piece' => 'int',
		'id_fournisseur' => 'int',
		'created_by' => 'int',
		'updated_by' => 'int'
	];

	protected $fillable = [
		'reference',
		'nom',
		'quantite',
		'observation',
		'id_type_piece',
		'id_fournisseur',
		'created_by',
		'updated_by'
	];

	public function fournisseur()
	{
		return $this->belongsTo(Fournisseur::class, 'id_fournisseur');
	}

	public function type_piece()
	{
		return $this->belongsTo(TypePiece::class, 'id_type_piece');
	}

	public function achat_pieces()
	{
		return $this->hasMany(AchatPiece::class, 'id_piece');
	}

	public function sortie_pieces()
	{
		return $this->hasMany(SortiePiece::class, 'id_piece');
	}
}
