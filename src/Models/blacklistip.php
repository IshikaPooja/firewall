<?php

namespace Firwalle\Rule\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class blacklistip extends Model
{
    use HasFactory;
    protected $table = "blackip";
    protected $fillable = [
     'ip'   
    ];

}
