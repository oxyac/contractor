<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Contract extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    public $casts = [
        'services' => 'array',
    ];

    public function fromEntity()
    {
        return $this->belongsTo(LegalEntity::class, 'from_entity_id');
    }

    public function toEntity()
    {
        return $this->belongsTo(LegalEntity::class, 'to_entity_id');
    }
}
