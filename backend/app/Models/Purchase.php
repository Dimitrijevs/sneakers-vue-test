<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $fillable = ['total_price', 'sneakers_ids'];

    protected $casts = [
        'sneakers_ids' => 'array'
    ];
}
