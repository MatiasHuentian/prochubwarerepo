<?php

namespace App\Models;

use App\Support\HasAdvancedFilter;
use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class ProposalsUpgradesState extends Model implements HasMedia
{
    use HasFactory, HasAdvancedFilter, SoftDeletes, InteractsWithMedia;

    public $table = 'proposals_upgrades_states';

    protected $appends = [
        'archivo',
        'photo',
    ];

    protected $dates = [
        'fecha_inicio',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'prueba_1',
        'probando_el_textarea',
        'user_id',
        'fecha_inicio',
    ];

    public $orderable = [
        'id',
        'prueba_1',
        'probando_el_textarea',
        'user.name',
        'user.email',
        'fecha_inicio',
    ];

    public $filterable = [
        'id',
        'prueba_1',
        'probando_el_textarea',
        'user.name',
        'user.email',
        'fecha_inicio',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $thumbnailWidth  = 50;
        $thumbnailHeight = 50;

        $thumbnailPreviewWidth  = 120;
        $thumbnailPreviewHeight = 120;

        $this->addMediaConversion('thumbnail')
            ->width($thumbnailWidth)
            ->height($thumbnailHeight)
            ->fit('crop', $thumbnailWidth, $thumbnailHeight);
        $this->addMediaConversion('preview_thumbnail')
            ->width($thumbnailPreviewWidth)
            ->height($thumbnailPreviewHeight)
            ->fit('crop', $thumbnailPreviewWidth, $thumbnailPreviewHeight);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getFechaInicioAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('project.date_format')) : null;
    }

    public function setFechaInicioAttribute($value)
    {
        $this->attributes['fecha_inicio'] = $value ? Carbon::createFromFormat(config('project.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getArchivoAttribute()
    {
        return $this->getMedia('proposals_upgrades_state_archivo')->map(function ($item) {
            $media        = $item->toArray();
            $media['url'] = $item->getUrl();

            return $media;
        });
    }

    public function getPhotoAttribute()
    {
        return $this->getMedia('proposals_upgrades_state_photo')->map(function ($item) {
            $media                      = $item->toArray();
            $media['url']               = $item->getUrl();
            $media['thumbnail']         = $item->getUrl('thumbnail');
            $media['preview_thumbnail'] = $item->getUrl('preview_thumbnail');

            return $media;
        });
    }

    public function getCreatedAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }

    public function getUpdatedAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }

    public function getDeletedAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }
}
