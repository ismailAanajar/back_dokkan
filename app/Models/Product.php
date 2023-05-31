<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;
class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'category_id', 'brand_id', 'description', 'price', 'image', 'status', 'options'];

    protected $appends = ['image_url', 'slug'];

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
        $builder->when($filters['search'] ?? false, function ($query) use ($filters) {
            $query->where('name', 'like', "%{$filters['search']}%");
        });
        $builder->when($filters['category_id'] ?? false, function ($query) use ($filters) {
            $query->where('category_id',  $filters['category_id']);
        });

        $builder->when($filters['brand_id'] ?? false, function ($query) use ($filters) {
            $query->where('brand_id',  $filters['brand_id']);
        });
        
        $builder->when($filters['price_min'] ?? false, function ($query) use ($filters) {
            $query->where('price', '>=', $filters['price_min']);
        });
        $builder->when($filters['price_max'] ?? false, function ($query) use ($filters) {
            $query->where('price', '<=', $filters['price_max']);
        });
        $builder->when($filters['status'] ?? false, function ($query) use ($filters) {
            $query->where('status', $filters['status']);
        });
    }

    public function getImageUrlAttribute()
    {
        if (!$this->image) {
            return 'https://t4.ftcdn.net/jpg/04/73/25/49/360_F_473254957_bxG9yf4ly7OBO5I0O5KABlN930GwaMQz.jpg';
        }
        else if(Str::startsWith($this->image, ['http', 'https'])) {
            return $this->image;
        }
        else {
            return asset('storage/'. $this->image);
        }
    }

    public function getSlugAttribute()
    {
        return Str::slug($this->name);
    }

    public function orders(): BelongsToMany
    {
        return $this->belongsToMany(Order::class, 'order_items', 'order_id','product_id');
    }
    public function cart()
    {
        return $this->hasOne(Cart::class);
    }
    public function wishlist()
    {
        return $this->hasOne(Wishlist::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }
}