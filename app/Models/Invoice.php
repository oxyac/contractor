<?php

namespace App\Models;

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
}
