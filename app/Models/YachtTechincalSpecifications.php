<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class YachtTechincalSpecifications extends Model
{
    use HasFactory;
    public function specification()
    {
        return $this->belongsTo(TechnicalSpecification::class);
    }
}
