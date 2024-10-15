<?php

namespace Firwalle\Rule\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class browserlist extends Model
{
    use HasFactory;
    protected $table = "browserlist";
    protected $fillable = [
     'browser_name'   
    ];
}
