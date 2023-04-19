<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'category_id', 'brand_id', 'description', 'price', 'image', 'status', 'options'];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    //* local scope
    
    public function scopeFilter(Builder $builder, $filters)
    {
        $builder->when($filters['name'] ?? false, function ($query) use ($filters) {
            $query->where('name', 'like', "%{$filters['name']}%");
        });
        
        $builder->when($filters['price'] ?? false, function ($query) use ($filters) {
            $query->where('price', '=', $filters['price']);
        });
        $builder->when($filters['status'] ?? false, function ($query) use ($filters) {
            $query->where('status', $filters['status']);
        });
    }
}