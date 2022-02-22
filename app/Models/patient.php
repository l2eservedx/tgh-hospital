<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class patient extends Model
{
    protected $table = 'patient';
    use HasFactory;

    protected $fillable = [
        
            'hn',
            'pname',
            'fname',
            'lname',
            'birthday',
            'addpart',
            'moopart',
            'tmbpart',
            'amppart',
            'chwpart',
            'hometel',
            'sex',
            'cid',
            'drugallergy',
            'status'
    ];
}
