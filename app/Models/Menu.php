<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'sort_order',
        'status'
    ];

public function categories()
{
    return $this->hasMany(\App\Models\Category::class)
        ->where('status', '0')
        ->orderBy('name');
}
}