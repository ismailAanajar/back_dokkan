<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;
    public $timestamps = true;

    public $table = 'order_items';

    protected $fillable = ['order_id', 'product_id', 'product_name', 'price', 'quantity'];

    protected $hidden = ['order_id', 'product_id'];
}