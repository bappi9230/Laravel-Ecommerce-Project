<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Carbon\Carbon;
use Faker\Core\Number;
use Illuminate\Http\Request;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function AddToCart(Request $request, $id){

        $product = Product::findOrFail($id);

        if ($product->discount_price == NULL) {
            Cart::add([
                'id' => $id,
                'name' => $request->product_name,
                'qty' => $request->quantity,
                'price' => $product->selling_price,
                'weight' => 1,
                'options' => [
                    'image' => $product->product_thumbnail,
                    'color' => $request->color,
                    'size' => $request->size,
                ],
            ]);

            return response()->json(['success' => 'Successfully Added on Your Cart']);

        }else{

            Cart::add([
                'id' => $id,
                'name' => $request->product_name,
                'qty' => $request->quantity,
                'price' => $product->discount_price,
                'weight' => 1,
                'options' => [
                    'image' => $product->product_thumbnail,
                    'color' => $request->color,
                    'size' => $request->size,
                ],
            ]);
            return response()->json(['success' => 'Successfully Added on Your Cart']);
        }

    } // end mehtod

    // Mini Cart Section
    public function AddMiniCart(){
        return response()->json(array(
            'carts' => Cart::content(),
            'cartQty' => Cart::count(),
            'cartTotal' => round(str_replace(',', '',Cart::total())),
        ));
    } // end method

    //Remove Mini Cart
    public function RemoveMiniCart($rowId){

        Cart::remove($rowId);
        return response()->json(['success'=>'Product Remove From Cart']);
    } // end method

    //Add To Wishlist
    public function AddToWishlist(Request $request ,$product_id){
        if (Auth::check()){
            $exists = Wishlist::where('user_id',Auth::id())->where('product_id',$product_id)->first();
            if (!$exists){
                Wishlist::insert([
                    'user_id' => Auth::id(),
                    'product_id' => $product_id,
                    'created_at' => Carbon::now(),
                ]);
                return response()->json(['success' => 'Successfully Added On Your Wishlist']);
            }
            else{
                return response()->json(['error'=>'This Product Already In Your Wishlist']);
            }
        }else{
            return response()->json(['error'=>'At First Login Your Account']);
        }
    } // end method
}
