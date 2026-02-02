<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'total_price'
    ];
    protected $table='orders';
    protected $casts = [
        'price' => 'decimal:2',
    ];

    protected $appends = ['formatted_price'];

    public function getFormattedPriceAttribute()
    {
        return number_format((float) $this->total_price, 0);
    }

    public function products(){
        return $this->belongsToMany(Product::class)->withPivot('quantity');
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
