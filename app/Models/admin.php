<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class admin extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name',
        'mail',
        'password',
    ];

    protected $hidden = [
        'password',
    ];
}
