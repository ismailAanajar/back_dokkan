<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Str;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'slug', 'image'];


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
}