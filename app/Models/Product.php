<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // 'product_user' itu nama table
    protected $fillable = [
        'name',
        'price',
        'point',
        'stock',
    ];
    public function users()
    {
        return $this->belongsToMany(User::class, 'product_user')->withPivot('qty');
    }
    public function isInStock()
    {
        return $this->stock > 0;
    }
}
