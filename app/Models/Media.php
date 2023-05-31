<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Media extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'url'];
    protected $appends = ['image_url'];

    public function getImageUrlAttribute()
    {
        if (!$this->url) {
            return 'https://t4.ftcdn.net/jpg/04/73/25/49/360_F_473254957_bxG9yf4ly7OBO5I0O5KABlN930GwaMQz.jpg';
        }
        else if(Str::startsWith($this->url, ['http', 'https'])) {
            return $this->url;
        }
        else {  
            return asset('storage/'. $this->url);
        }
    }
}