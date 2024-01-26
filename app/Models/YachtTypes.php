<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class YachtTypes extends Model
{
    use HasFactory;

    protected $fillable = ['type_name','status','type_slug'];


}
