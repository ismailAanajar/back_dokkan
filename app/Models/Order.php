<?php

namespace App\Models;

use App\Observers\OrderObserver;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'shipping_addr_id', 'billing_addr_id', 'number', 'status', 'payment_method', 'payment_status'];
      protected static function booted()
    {
        static::observe(OrderObserver::class);
    }
    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_items')
                    // ->using(OrderItem::class)
                    ->as('details')  
                    ->withPivot(['price', 'quantity', 'product_name']);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    } 

    public function shipping_addr()
    {
        return $this->belongsTo(Address::class, 'shipping_addr_id', 'id');
    }
    public function billing_addr()
    {
        return $this->belongsTo(Address::class, 'billing_addr_id', 'id');
    }

    public function getNextOrderNumber()
    {
        $lastOrderNumber = Order::whereYear('created_at', Carbon::now()->year)->max('number');
        
        if ($lastOrderNumber) {
            return $lastOrderNumber + 1;
        }

        return Carbon::now()->year . '0001';
    }
}