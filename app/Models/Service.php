<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = ['icon', 'title', 'description', 'order', 'active'];

    protected $casts = [
        'order' => 'integer',
        'active' => 'boolean',
    ];
}
