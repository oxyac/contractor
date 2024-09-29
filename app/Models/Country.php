<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{

    public function legalEntity()
    {
        return $this->belongsTo(LegalEntity::class);
    }
}
