<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\CarouselProduct;
use App\Models\CodeEditor;
use App\Models\CustomHtml;
use App\Models\LinkImage;
use App\Models\Offer;
use App\Models\Product;
use App\Models\TextImage;
use Illuminate\Http\Request;

class CmsController extends Controller
{
    public function home()
    {
        $cms_link_img = LinkImage::where('page', 'home')->get(); 
        $cms_text_img = TextImage::where('page', 'home')->get(); 
        $cms_custom_html = CustomHtml::where('page', 'home')->get(); 
        $cms_carousel_products = collect(CarouselProduct::where('page', 'home')->get())->map(function($item) {
            $item->products = Product::whereIn('id', json_decode($item->products))->get();
            return $item;   
        });
      $cms_code_editor = CodeEditor::where('page', 'home')->get(); 

        

        return response()->json(collect([
                ...$cms_link_img,
                ...$cms_text_img,
                ...$cms_custom_html,
                ...$cms_carousel_products,
                ...$cms_code_editor 
        ])->sortBy('created_at')->values()->all());
    }

    public function about()
    {
      $cms_custom_html = CustomHtml::where('page', 'about')->get(); 
      $cms_code_editor = CodeEditor::where('page', 'about')->get(); 
        

        return response()->json(collect([
                ...$cms_custom_html,
                ...$cms_code_editor 
        ])->sortBy('created_at')->values()->all());   
    }
}