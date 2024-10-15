<?php

namespace Firwalle\Rule\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class whitelistip extends Model
{
    use HasFactory;
    protected $table = "whiteip";
    protected $fillable = [
     'ip'   
    ];
}
