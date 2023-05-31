<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Str; 

class Blog extends Model
{
    use HasFactory;

    protected $fillable = ['blog', 'title', 'image', 'slug', 'short_description'];
    protected $appends = ['image_url'];
    protected $hidden = ['image'];

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