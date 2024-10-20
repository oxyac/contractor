<?php

namespace App\Models;

use App\Models\Scopes\CompanyScope;
use App\Models\Scopes\LegalEntityScope;
use Faker\Provider\Company;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;


class Contract extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    public $fillable = [
        'from_entity_id',
        'to_entity_id',
        'services',
        'currency',
        'language_code',
        'contract_date',
        'contract_start_date',
        'contract_due_date',
        'total',
        'notes',
        'is_parsed',
        'is_limited',
        'is_subscription',
        'is_in_rates',
        'parse_result',
        'legal_entity_id'
    ];
    public $casts = [
        'services' => 'array',
        'parse_result' => 'array',
        'contract_date' => 'date',
        'contract_start_date' => 'date',
        'contract_due_date' => 'date',
        'is_parsed' => 'bool'
    ];

    public function fromEntity()
    {
        return $this->belongsTo(LegalEntity::class, 'from_entity_id');
    }

    public function toEntity()
    {
        return $this->belongsTo(LegalEntity::class, 'to_entity_id');
    }

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }

    protected static function booted(): void
    {
        if(auth()->user()) {
            static::addGlobalScope(new CompanyScope());
        }
    }
}
