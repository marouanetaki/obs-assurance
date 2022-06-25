<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\MultiTenantModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Facture extends Model
{
    use SoftDeletes;
    use MultiTenantModelTrait;
    use HasFactory;

    public const MODE_PAIEMENT_SELECT = [
        'Virement' => 'Virement',
        'Chèque'   => 'Chèque',
    ];

    public $table = 'factures';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'dossier_id',
        'frais_rembourse',
        'created_by_id',
        'mode_paiement',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function dossier()
    {
        return $this->belongsTo(Dossier::class, 'dossier_id');
    }

    public function created_by()
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
