<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Mail\OrderMail;
use App\Models\Order;
use App\Models\OrderItem;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class CashPayment extends Controller
{
    public function CashOnPayment(Request $request){

        if (Session::has('coupon')){

            $total_amount = session()->get('coupon')['total_amount'];

        }else{
            $total_amount = round(str_replace(',','',Cart::total()));
        }

        $order_id = Order::insertGetId([
            'user_id' => Auth::id(),
            'division_id' => $request->division_id,
            'district_id' => $request->district_id,
            'state_id' => $request->state_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'post_code' => $request->post_code,
            'notes' => $request->notes,

            'payment_type' => 'Cash On Delivery',
            'payment_method' =>'Cash On Delivery',
            'transaction_id' => uniqid('',false),
            'currency' => 'usd',
            'amount' => $total_amount,
            'order_number' => rand(00000000,99999999),

            'invoice_no' => 'shop'.mt_rand(10000000,99999999),
            'order_date' => Carbon::now()->format('d F Y'),
            'order_month' => Carbon::now()->format('F'),
            'order_year' => Carbon::now()->format('Y'),
            'status' => 'pending',
            'created_at' => Carbon::now(),

        ]);

        ///////////mail to the user/////////

        $order = Order::findOrFail($order_id);
        $data = [
            'invoice_no' =>$order->invoice_no,
            'amount'=>$order->amount,
            'name'=>$order->name,
            'email'=>$order->email,
        ];
        Mail::to($request->email)->send( new OrderMail($data));

        /////////// end mail to the user/////////


        $carts = Cart::content();
        foreach ($carts as $cart) {
            OrderItem::insert([
                'order_id' => $order_id,
                'product_id' => $cart->id,
                'color' => $cart->options->color,
                'size' => $cart->options->size,
                'qty' => $cart->qty,
                'price' => $cart->price,
                'created_at' => Carbon::now(),

            ]);
        }

        if (Session::has('coupon')) {
            Session::forget('coupon');
        }

        Cart::destroy();

        $notification = array(
            'message' => 'Your Order Place Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('dashboard')->with($notification);

    } //end method
}
