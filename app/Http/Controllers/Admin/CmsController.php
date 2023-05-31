<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CarouselProduct;
use App\Models\CarouselProductd;
use App\Models\Category;
use App\Models\CodeEditor;
use App\Models\CustomHtml;
use App\Models\LinkImage;
use App\Models\Offer;
use App\Models\Product;
use App\Models\TextImage;
use App\Traits\FileUpload;
use Illuminate\Http\Request;

class CmsController extends Controller
{
    use FileUpload;
    
    public function index()
    {
        $cms_link_image = LinkImage:: all();
        $cms_text_image = TextImage::all();
        $cms_custom_html = CustomHtml::all();
        $cms_carousel = CarouselProduct::all();
        $cms_code_editor = CodeEditor::all();
        $cms = collect([...$cms_link_image,...$cms_text_image, ...$cms_custom_html,...$cms_carousel,...$cms_code_editor])->groupBy('page');
        // dd($cms);
        return view('cms.index', compact('cms'));
    }

    public function create()
    {
        $products = Product::all();
        $categories = Category::all();
        // dd($products);
        return view('cms.create', compact('products', 'categories'));
    }

    public function store(Request $request)
    {
        // dd(Product::whereIn('id', $request->prod)->get());
        // dd($request);
        switch ($request->cmsType) {
            case 'link_image':
                LinkImage::create([
                    'page' => $request->page_li,
                    'image' => $this->imageUpload($request, 'image_li', 'cms'),
                    'link' => $request->link_li,
                    'width' => $request->width_li,
                    'style' => $request->style_li,
                ]);
                
                return redirect()->route('admin.cms.index');
            
            case 'text_image':
                TextImage::create([
                    'page' => $request->page_ti,
                    'image' => $this->imageUpload($request, 'image_ti', 'cms'),
                    'link' => $request->link_ti,
                    'title' => $request->title_ti,
                    'sub_title' => $request->sub_title_ti,
                    'width' => $request->width_ti,
                    'style' => $request->style_ti,
                ]);
                
                return redirect()->route('admin.cms.index');
            case 'custom_html':
                CustomHtml::create([
                    'page' => $request->page_ch,
                    'width' => $request->width_ch,
                    'style' => $request->style_ch,
                    'html' => $request->html,
                ]);
                
                return redirect()->route('admin.cms.index');
            case 'carousel':
                switch ($request->carouselType) {
                    case 'product':
                        CarouselProduct::create([
                            'page' => $request->page,
                            'title' => $request->title,
                            'sub_title' => $request->sub_title,
                            'products' => json_encode($request->prod)
                        ]);
                        break;
                    case 'category':
                        CarouselProduct::create([
                            'page' => $request->page,
                            'title' => $request->title,
                            'sub_title' => $request->sub_title,
                            'products' => json_encode($request->prod)
                        ]);
                        break;
                    
                    default:
                        # code...
                        break;
                }
                
                return redirect()->route('admin.cms.index');
        }
    }


    public function cEditorIndex()
    {
        return view('cms.code_editor_index');
    }

    public function cEditorStore(Request $request)
    {
        // dd($request);
        CodeEditor::create($request->all());

        return redirect()->route('admin.cms.index');
    }
}