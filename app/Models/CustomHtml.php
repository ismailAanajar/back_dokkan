<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomHtml extends Model
{
    use HasFactory;

    protected $fillable = ['page', 'width','style', 'html'];

}