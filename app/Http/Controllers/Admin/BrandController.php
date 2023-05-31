<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Traits\FileUpload;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\support\Str;

class BrandController extends Controller
{
    use FileUpload;
    
    public function index()
    {
        $brands = Brand::paginate(5);
        return view('product.brand.index', compact('brands'));
    }

    public function create()
    {
        $brand = new Brand();
        return view('product.brand.create', compact('brand'));
    }

     public function store(Request $request)
    {
        //  if (!$request->slug) {
        //     $request->merge([
        //         'slug' => Str::slug($request->name)
        //     ]);
        // }
        $data = $request->except('image');
        $image = $this->imageUpload($request, 'image', 'images');
        $data['image'] = $image;

        brand::create($data);
        
        Alert::success('success', 'A brand was created successfully');

        return redirect()->route('admin.products.brand.index');
    }
}