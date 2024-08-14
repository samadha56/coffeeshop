<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'title',
    ];

    public function getRouteKey()
    {
        return 'slug';
    }

    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
