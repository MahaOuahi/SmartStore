<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApiProduct extends Model
{
    protected $table = 'products';
    protected $fillable = ['title', 'subtitle', 'decription', 'price'];
}
