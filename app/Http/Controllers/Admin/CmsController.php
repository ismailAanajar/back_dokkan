<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CmsController extends Controller
{
    public function index()
    {
        return view('cms.index');
    }

    public function create()
    {
        return view('cms.create');
    }
}