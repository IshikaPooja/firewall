<?php

namespace Firwalle\Rule\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class geolist extends Model
{
    use HasFactory;
    protected $table = "geolist";
    protected $fillable = [
     'country_name' ,
     'city_name'
    ];
}
