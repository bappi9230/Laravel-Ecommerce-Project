<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

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
        return response()->json(['success'=>'Successfully Remove Cart']);
    }

    // Cart Increment
    public function CartQtyInc($rowId){
        $row = Cart::get($rowId);
        Cart::update($rowId, $row->qty + 1);
        return response()->json();
    } // end mehtod

    // Cart Decrement
    public function CartQtyDec($rowId){
        $row = Cart::get($rowId);
        Cart::update($rowId,$row->qty -1);
        return response()->json();
    }// end mehtod


}
