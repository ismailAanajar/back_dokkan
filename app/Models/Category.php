<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'image', 'status'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    //* locadl scope
    public function scopeFilter(Builder $builder, $filters) 
    {
        $builder->when($filters['name'] ?? false, function ($query) use ($filters) {
            $query->where('name', 'like', "%{$filters['name']}%");
        } );
        $builder->when($filters['status'] ?? false, function ($query) use ($filters) {
            $query->where('status',$filters['status']);
        } );
    }

}
