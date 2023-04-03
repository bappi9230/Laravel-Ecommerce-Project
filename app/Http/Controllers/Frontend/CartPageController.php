<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;

class CartPageController extends Controller
{
    public function MyCart(){
        return view('frontend.wishlist.mycart_view');
    }//end method

    public function GetMyCartProduct(){
        return response()->json(array(
            'carts' => Cart::content(),
            'cartQty' => Cart::count(),
            'cartTotal' => round(str_replace(',', '',Cart::total())),
        ));
    }//end method

    public function RemoveMyCartProduct($rowId){
        Cart::remove($rowId);
        if (Session::has('coupon')){
            Session::forget('coupon');
        }
        return response()->json(['success'=>'Successfully Remove Cart']);
    }

    // Cart Increment
    public function CartQtyInc($rowId){
        $row = Cart::get($rowId);
        Cart::update($rowId, $row->qty + 1);

        if (Session::has('coupon')){

            $coupon_name = Session::get('coupon')['coupon_name'];
            $coupon = Coupon::where('coupon_name',$coupon_name)->first();

            Session::put('coupon',[
                'coupon_name'=> $coupon->coupon_name,
                'coupon_discount'=> $coupon->coupon_discount,
                'discount_amount'=> round((int)str_replace(',','',Cart::total()) * $coupon->coupon_discount / 100),
                'total_amount'=> round((int)str_replace(',','',Cart::total()) - (int)str_replace(',','',Cart::total()) * $coupon->coupon_discount / 100),
            ]);
        }

        return response()->json();
    } // end mehtod

    // Cart Decrement
    public function CartQtyDec($rowId){

        $row = Cart::get($rowId);
        if(Cart::count() > 1) {
            Cart::update($rowId, $row->qty - 1);

            if (Session::has('coupon')){

                $coupon_name = Session::get('coupon')['coupon_name'];
                $coupon = Coupon::where('coupon_name',$coupon_name)->first();
                Session::put('coupon',[
                    'coupon_name'=> $coupon->coupon_name,
                    'coupon_discount'=> $coupon->coupon_discount,
                    'discount_amount'=> round((int)str_replace(',','',Cart::total()) * $coupon->coupon_discount / 100),
                    'total_amount'=> round((int)str_replace(',','',Cart::total()) -(int)str_replace(',','',Cart::total()) * $coupon->coupon_discount / 100),
                ]);
            }

            return response()->json();
        }
    }// end mehtod


}
