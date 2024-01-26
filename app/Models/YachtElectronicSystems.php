<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class YachtElectronicSystems extends Model
{
    use HasFactory;

    public function electronSystem()
    {
        return $this->belongsTo(ElectronicSystems::class,'system_id');
    }

    public function yachts()
    {
        return $this->belongsTo(Yacht::class,'yacht_id');
    }
}
