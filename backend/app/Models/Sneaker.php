<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sneaker extends Model
{
    protected $fillable = ['title', 'price', 'imageUrl', 'is_added_to_cart', 'is_favorite'];
}