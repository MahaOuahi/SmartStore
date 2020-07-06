<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $table = 'products';
    protected $fillable = ['title', 'slug', 'subtitle', 'description', 'price', 'image'];

    public function getPrice()
    {
        $price = $this->price/100;

        return number_format($price, 2, '.', ' ') . ' DH';
    }

    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }
}
