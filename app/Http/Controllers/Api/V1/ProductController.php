<?php

namespace App\Http\Controllers\Api\V1;

use App\Events\OrderCreated;
use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Brand;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Wishlist;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Throwable;

class ProductController extends Controller
{
    public function getProducts(Request $request)
    {
        // return $request;
        $products = Product::filter($request->query())->select('id','price', 'image', 'name', 'category_id')->get();
        $categories = Category::all();
        $brands = Brand::all();
        return response()->json([
            'products' => $products,
            'categories' => $categories,
            'brands' => $brands
        ]);
    }

    public function getProduct($id)
    {
        $product = Product::with('category:id,name', 'images')->where('id', $id)->first();

        $related_products = Product::where('category_id', $product->category_id)->get();

        return response()->json([
            'product' => $product,
            'related_products' => $related_products
        ]);
    }


    public function addToCart(Request $request)
    {
        try {
            
            Cart::create([
                'user_id' => Auth::id(),
                'product_id' => $request->productId,
                'quantity' => $request->quantity
            ]);
        } catch (Exception $th) {
            return response()->json([
                'message' => $th->getMessage()
            ]);
        }
    }
    public function updateCart(Request $request)
    {
        $cart = Cart::where('product_id', $request->productId)->where('user_id', Auth::id())->first();
        $cart->update([
        'quantity' => $request->quantity
        ]);
    }

    public function removeFromCart(Request $request)
    {
        Cart::where('id', $request->productId)->where('user_id', Auth::id())->delete();

        return response()->json([
            'success' => true
        ]);
    }
    public function emptyCart()
    {
        Cart::query()->delete();
    }
    public function total()
    {
        return collect(Cart::where('user_id', Auth::id())->get())->sum(function($item) {
            return $item->quantity * $item->product->price;
        });
        
    }

    public function addToWishlist(Request $request)
    {
        try {
            Wishlist::create([
            'user_id' => Auth::id(),
            'product_id' => $request->productId
            ]);

            return response()->json([
                'success' => true
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => $th->getMessage()
            ]);
        }
    }

    public function removeFromWishlist(Request $request)
    {
        try {
            $wishlist_item = Wishlist::where('product_id', $request->productId)->where('user_id', Auth::id());
            $wishlist_item->delete();
            return response()->json([
                'success' => true
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ]);        }
    }

    public function addAddress(Request $request)
    {
        $data = $request->all();
        // $data['user_id'] = ;
        // return $data;
        Address::create([
            'user_id' => Auth::id(),
            ...$request->all()
        ]);

        return response()->json([
            'success' => true
        ]);
    }
    public function selectAddress(Request $request)
    {
        $addr = Address::where('id', $request->address_id)->first(); 
        $selectAddrs = Address::where('isSelected', true)->where('type', $request->type)->get(); 

        foreach ($selectAddrs as $item) {
            $item->update([
            'isSelected' => false
        ]);
        }
        $addr->update([
            'isSelected' => true
        ]);

        return response()->json([
            'success' => true
        ]);
    }

    public function checkout(Request $request)
    {
        $cart = Cart::where('user_id', Auth::id())->get();
        $shipping_addr = Address::where('isSelected', 1)->where('type', 'shipping')->first();
        $billing_addr = Address::where('isSelected', 1)->where('type', 'billing')->first();
        try {
         DB::beginTransaction();
            // foreach ($stores as $store_id => $items) {
                //todo
                /***
                 * 1. create order
                 * 2. fill order_items
                 * 3. fill order addresses
                 * 4. empty cart
                 * 5. update each cart product stock
                 * 
                 */

                //  $shipping:

                $order = Order::create([
                    'user_id' => Auth::id(),
                    'shipping_addr_id' => $shipping_addr->id,
                    'billing_addr_id' => $billing_addr->id,
                    'total' => $this->total()
                ]);

                foreach ($cart as $item) {
                    OrderItem::create([
                        'order_id' => $order->id,
                        'product_id' => $item->product->id,
                        'quantity' => $item->quantity,
                        'price' => $item->product->price,
                        'product_name' => $item->product->name
                    ]);
                }

                Cart::where('user_id', Auth::id())->delete();

                // event(new OrderCreated($order));

            // }
         DB::commit();

        
       } catch (Throwable $e) {
         DB::rollBack();
         throw $e;
       }
    }
}