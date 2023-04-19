<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use App\Traits\FileUpload;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    use FileUpload;
    public function index(Request $request)
    {
        $products = Product::filter(request()->query())->paginate(10);
        return view('product.index', compact('products'));
    }
    public function create(Request $request)
    {
        $categories = Category::all();
        $brands = Brand::all();
        $product = new Product();
        return view('product.create', compact('categories', 'brands', 'product'));
    }

    public function store(Request $request)
    {
        if (!$request->slug) {
            $request->merge([
                'slug' => Str::slug($request->name)
            ]);
        }
        $data = $request->except(['image', 'images']);
        $image = $this->imageUpload($request, 'image', 'productImages');
        $data['image'] = $image;

        $product = Product::create($data);

        foreach ($request->images as $image) {
            Image::create([
                'product_id' => $product->id,
                'image' => $image->store('productImages', [
                        'disk' => 'public'
                        ])
            ]);
        }
        
        // Alert::success('success', 'A category was created successfully');

        return redirect()->route('admin.products.index');
    }
}