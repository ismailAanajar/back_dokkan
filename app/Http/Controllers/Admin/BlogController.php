<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Traits\FileUpload;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    use FileUpload;
    public function index()
    {
        $blogs = Blog::paginate(10);
        return view('blog.index', compact('blogs'));
    }

    public function create()
    {
        return view('blog.blog');
    }
    public function store(Request $request)
    {
        if (!$request->slug) {
            $request->merge([
                'slug' => Str::slug($request->title)
            ]);
        }
        $data = $request->except('image');
        $image = $this->imageUpload($request, 'image', 'images');
        $data['image'] = $image;

        Blog::create($data);
        
        Alert::success('success', 'A category was created successfully');

        return redirect()->route('admin.blog.index');
    }
}