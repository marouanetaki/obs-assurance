<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\MultiTenantModelTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Dossier extends Model implements HasMedia
{
    use SoftDeletes;
    use MultiTenantModelTrait;
    use InteractsWithMedia;
    use HasFactory;

    public const STATUT_SELECT = [
        'Enregistré' => 'Enregistré',
        'En cours'  => 'En cours de traitement',
        'Remboursé' => 'Remboursé',
        'Rejeté'    => 'Rejeté',
    ];

    public $table = 'dossiers';

    protected $appends = [
        'documents',
    ];

    protected $dates = [
        'date_soins',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'num_dossier',
        'beneficiaire_id',
        'date_soins',
        'frais_consultation',
        'frais_analyse',
        'frais_pharmacie',
        'statut',
        'created_by_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function beneficiaire()
    {
        return $this->belongsTo(Beneficiaire::class, 'beneficiaire_id');
    }

    public function getDateSoinsAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDateSoinsAttribute($value)
    {
        $this->attributes['date_soins'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function medicaments()
    {
        return $this->belongsToMany(Medicament::class);
    }

    public function created_by()
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }

    public function getDocumentsAttribute()
    {
        $files = $this->getMedia('documents');
        $files->each(function ($item) {
            $item->url = $item->getUrl();
            $item->thumbnail = $item->getUrl('thumb');
            $item->preview = $item->getUrl('preview');
        });

        return $files;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
