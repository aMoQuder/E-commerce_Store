<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
class OrderItem extends Model
{
    // use HasFactory;

    protected $fillable = [
        'order_id',
        'product_id',
        'size',
        'image',
        'name',
        'color',
        'quantity',
        'price',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
