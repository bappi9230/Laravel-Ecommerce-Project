<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
class UserAllController extends Controller
{
    public function UserOrder(){

        $orders = Order::where('user_id',Auth::id())->orderBy('id','DESC')->paginate(5);
        return view('frontend.user.order.order_view',compact('orders'));

    } //end method

    public function UserOrderDetails($order_id){

        $order = Order::with('division','district','state','user')->where('id',$order_id)->where('user_id',Auth::id())->first();

        $orderItem = OrderItem::with('product')->where('order_id',$order_id)->orderBy('id','DESC')->get();

        return view('frontend.user.order.order_details',compact('order','orderItem'));

    } //end method

    public function PdfGenerate($order_id){

        $order = Order::with('division','district','state','user')->where('id',$order_id)->where('user_id',Auth::id())->first();

        $orderItem = OrderItem::with('product')->where('order_id',$order_id)->orderBy('id','DESC')->get();

//         $html = '<h1>Test</h1>';
//         $pdf = PDF::loadHTML($html);
//        return view('frontend.user.order.order_invoice',compact('order','orderItem'));
//
        $pdf = PDF::loadView('frontend.user.order.order_invoice', compact('order','orderItem'));

        return $pdf->download('invoice.pdf');

    } //end method
}
