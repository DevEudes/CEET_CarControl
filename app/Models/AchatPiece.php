<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class AchatPiece
 * 
 * @property int $id
 * @property int $id_piece
 * @property int $id_demande_achat
 * @property float $quantite
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * 
 * @property DemandeAchat $demande_achat
 * @property Piece $piece
 *
 * @package App\Models
 */
class AchatPiece extends Model
{
	use SoftDeletes;
	protected $table = 'achat_pieces';

	protected $casts = [
		'id_piece' => 'int',
		'id_demande_achat' => 'int',
		'quantite' => 'float',
		'created_by' => 'int',
		'updated_by' => 'int'
	];

	protected $fillable = [
		'id_piece',
		'id_demande_achat',
		'quantite',
		'created_by',
		'updated_by'
	];

	public function demande_achat()
	{
		return $this->belongsTo(DemandeAchat::class, 'id_demande_achat');
	}

	public function piece()
	{
		return $this->belongsTo(Piece::class, 'id_piece');
	}

	protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (auth()->check()) {
                $model->created_by = auth()->id();
                $model->updated_by = auth()->id();
            }
        });

        static::updating(function ($model) {
            if (auth()->check()) {
                $model->updated_by = auth()->id();
            }
        });
    }
}
