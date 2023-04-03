<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\Wishlist;
use Carbon\Carbon;
use Faker\Core\Number;
use http\Client\Response;
use Illuminate\Http\Request;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function AddToCart(Request $request, $id){

        if (Session::has('coupon')){
            Session::forget('coupon');
        }

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


    ///// aplly coupon/////////
    public function ApplyCoupon(Request $request){

        $coupon = Coupon::where('coupon_name',$request->coupon_name)->where('coupon_validity','>=',Carbon::now()->format('Y-m-d'))->first();

       if ($coupon){
           Session::put('coupon',[
               'coupon_name'=> $coupon->coupon_name,
               'coupon_discount'=> $coupon->coupon_discount,
               'discount_amount'=> round((int)str_replace(',','',Cart::total()) * $coupon->coupon_discount / 100),
               'total_amount'=> round((int)str_replace(',','',Cart::total()) -(int)str_replace(',','',Cart::total()) * $coupon->coupon_discount / 100),
           ]);
           return response()->json(['success' => 'Coupon Apply Successfully']);

       }else{
           return response()->json(['error'=>'Invalid Coupon Name']);
       }



    }  //end method


    public function CouponCalculation(){
        if (Session::has('coupon')){
            return response()->json([
                'subtotal' => (int)str_replace(',','',Cart::total()),
                'coupon_name' => session()->get('coupon')['coupon_name'],
                'coupon_discount' => session()->get('coupon')['coupon_discount'],
                'discount_amount' => session()->get('coupon')['discount_amount'],
                'total_amount' => session()->get('coupon')['total_amount'],
            ]);
        }else{
            return response()->json([
               'total' => round((int)str_replace(',','',Cart::total()))
            ]);
        }
    }  //end method

    public function CouponRemove(){
        Session::forget('coupon');
        return response()->json(['success' => 'Coupon Remove Successfully']);

    }//end method


    public function Checkout(){

            $carts = Cart::content();
            $cartQty =Cart::count();
            $cartTotal = round(str_replace(',', '',Cart::total()));

        if (Auth::check()){
            if(Cart::total() > 1){
                return view('frontend.checkout.checkout_view',compact('carts','cartQty','cartTotal'));
            }else{
                $notification = [
                    'message'   => 'At least Buy One Product',
                    'alert-type'=> 'error',
                ];
                return redirect()->to('/')->with($notification);
            }
        }else{
            $notification = [
                'message'   => 'Login First to Buy',
                'alert-type'=> 'error',
            ];
            return redirect()->to('/')->with($notification);
        }
    }

}
