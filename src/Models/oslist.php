<?php

namespace Firwalle\Rule\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class oslist extends Model
{
    use HasFactory;
    protected $table = "oslist";
    protected $fillable = [
     'os_name'   
    ];
}
