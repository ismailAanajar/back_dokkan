<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Traits\FileUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{
    use FileUpload;
    public function index()
    {
         $categories = Category::filter(request()->query())->paginate(5);
        return view('product.category.index', compact('categories'));
    }

    public function create()
    {

        $category = new Category();
        return view('product.category.create', compact( 'category'));
    }

    public function store(Request $request)
    {
         if (!$request->slug) {
            $request->merge([
                'slug' => Str::slug($request->name)
            ]);
        }
        $data = $request->except('image');
        $image = $this->imageUpload($request, 'image', 'images');
        $data['image'] = $image;

        Category::create($data);
        
        Alert::success('success', 'A category was created successfully');

        return redirect()->route('admin.products.category.index');
    }
}