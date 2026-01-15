<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table='products';

    protected $fillable = [
        'category_id',
        'name',
        'price',
        'inventory',
        'weight',
        'image',
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function orders(){
        return $this->belongsToMany(Order::class)->withPivot('quantity');
    }
}
