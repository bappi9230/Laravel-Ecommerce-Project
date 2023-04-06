<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
class UserAllController extends Controller
{
    public function UserOrder(){

        $orders = Order::where('user_id',Auth::id())->orderBy('id','DESC')->get();
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


    public function ReturnOrderReason(Request $request, $order_id){

        Order::findOrFail($order_id)->update([
            'return_date'=> Carbon::now()->format('d F Y'),
            'return_reason'=> $request->return_reason,
        ]);
        $notification = array(
            'message'   => 'Retiurn Request Send Successfully',
            'alert-type'=> 'success',
        );
        return redirect()->route('user.order')->with($notification);
    }

    public function ReturnOrderList(){

        $orders = Order::where('user_id',Auth::id())->where('return_reason','!=',NULL)->orderBy('id','DESC')->get();
        return view('frontend.user.order.return_order',compact('orders'));

    } //end method


     public function CancelOrderList(){

        $orders = Order::where('user_id',Auth::id())->where('status','cancel')->orderBy('id','DESC')->get();
        return view('frontend.user.order.cancel_order',compact('orders'));

    } //end method


}
