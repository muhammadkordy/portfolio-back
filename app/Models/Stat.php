<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stat extends Model
{
    protected $fillable = ['label', 'value', 'suffix', 'order', 'active'];

    protected $casts = [
        'order' => 'integer',
        'active' => 'boolean',
    ];
}
