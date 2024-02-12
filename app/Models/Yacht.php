<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Yacht extends Model
{
    use HasFactory;
    public function yachtType()
    {
        return $this->belongsTo(YachtTypes::class, 'yacht_type_id');
    }

    public function electronicSystems()
    {
        return $this->hasMany(YachtElectronicSystems::class);
    }
    public function specifications()
    {
        return $this->hasMany(YachtTechincalSpecifications::class);
    }

    public function yachtImages()
    {
        return $this->hasMany(YachtImages::class);
    }

    public function setPriceAttribute($value)
    {
        $this->attributes['price'] = str_replace(',', '', $value);
    }

    public function getPriceAttribute($value)
    {
        return number_format($value, 0, ',', '.');
    }
}
