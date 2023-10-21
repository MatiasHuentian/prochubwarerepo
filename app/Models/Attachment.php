<?php

namespace App\Models;

use App\Support\HasAdvancedFilter;
use App\Traits\Auditable;
use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Attachment extends Model implements HasMedia
{
    use HasFactory, HasAdvancedFilter, SoftDeletes, InteractsWithMedia, Auditable;

    public $table = 'attachments';

    protected $appends = [
        'src',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'process_id',
        'type_id',
        'category_id',
        'description',
    ];

    public $orderable = [
        'id',
        'process.name',
        'process.objective',
        'type.name',
        'type.active',
        'category.name',
        'description',
    ];

    public $filterable = [
        'id',
        'process.name',
        'process.objective',
        'type.name',
        'type.active',
        'category.name',
        'description',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function process()
    {
        return $this->belongsTo(Process::class);
    }

    public function type()
    {
        return $this->belongsTo(AttachmentsType::class);
    }

    public function category()
    {
        return $this->belongsTo(AttachmentsCategory::class);
    }

    public function getSrcAttribute()
    {
        return $this->getMedia('attachment_src')->map(function ($item) {
            $media        = $item->toArray();
            $media['url'] = $item->getUrl();

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
