<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sex extends Model
{

    protected $table = 'sex';
    use HasFactory;
    protected $fillable = [
        'code',
        'name',
        'active'    
    ];
}
