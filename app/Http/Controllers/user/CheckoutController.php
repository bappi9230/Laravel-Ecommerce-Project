<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\ShipDistrict;
use App\Models\ShipState;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{

    ////state Selection ajax method
    public function StateSelection($district_id){

        $states = ShipState::where('district_id',$district_id)->orderBy('state_name','DESC')->get();
        return json_encode($states);

    }  //end method

    public function DistrictSelection($division_id){

        $districts = ShipDistrict::where('division_id',$division_id)->orderBy('district_name','DESC')->get();
        return json_encode($districts);

    }  //end method

    public function CheckoutStore(Request $request){
//         dd($request->all());
        $data = [];
        $data['shipping_name'] = $request->shipping_name;
        $data['shipping_email'] = $request->shipping_email;
        $data['shipping_phone'] = $request->shipping_phone;
        $data['post_code'] = $request->post_code;
        $data['division_id'] = $request->division_id;
        $data['district_id'] = $request->district_id;
        $data['state_id'] = $request->state_id;
        $data['notes'] = $request->notes;
        $cartTotal = round(str_replace(',','',Cart::total()));


        if ($request->payment_method == 'stripe') {
            return view('frontend.payment.stripe',compact('data','cartTotal'));
        }elseif ($request->payment_method == 'card') {
            return 'card';
        }else{
            return view('frontend.payment.cash',compact('data','cartTotal'));;
        }
    }//end method
}
