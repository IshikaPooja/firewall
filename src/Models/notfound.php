<?php

namespace Firwalle\Rule\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class notfound extends Model
{
    use HasFactory;
    protected $table = "not_found";
    protected $fillable = [
     'ip',
     'count',
     'error_code'

    ];
}
