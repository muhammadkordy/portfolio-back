<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['title', 'scope', 'key_result', 'order', 'active'];

    protected $casts = [
        'order' => 'integer',
        'active' => 'boolean',
    ];
}
