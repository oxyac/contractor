<?php

namespace App\Models;

use App\Models\Scopes\CompanyScope;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Invoice extends Model
{
    use HasFactory;

    public $fillable = [
        'contract_id',
        'stage_num',
        'due_date',
        'product_description',
        'product_quantity',
        'product_price',
        'total',
        'legal_entity_id'
    ];

    protected $casts = [
        'due_date' => 'datetime',

    ];

    public function contract()
    {
        return $this->belongsTo(Contract::class);
    }

    protected static function booted(): void
    {
        if(auth()->user()) {
            static::addGlobalScope(new CompanyScope());
        }
    }
}
