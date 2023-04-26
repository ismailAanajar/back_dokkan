<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
       'user_id', 'order_id', 'type', 'first_name', 'last_name', 'email', 'phone', 'country', 'city', 'post_code', 'state', 'isSelected'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
