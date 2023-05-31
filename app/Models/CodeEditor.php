<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CodeEditor extends Model
{
    use HasFactory;
    protected $fillable = ['page', 'html', 'css', 'js', 'name'];
}