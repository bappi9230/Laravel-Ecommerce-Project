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

    public function RemoveMyCartProduct($id){

    }


}
