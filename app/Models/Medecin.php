<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Medecin extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'medecins';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'nom',
        'prenom',
        'specialite_id',
        'adress',
        'ville',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function specialite()
    {
        return $this->belongsTo(Specialite::class, 'specialite_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
