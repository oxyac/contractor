<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LegalEntity extends Model
{
    use HasFactory;

    public $fillable = [
        'name',
        'address',
        'phone',
        'email',
        'entity_type',
        'bank_details',
        'iban',
        'belongs_to_legal_entity_id'
    ];
}
