@extends('frontend.main_master')
@section('content')
    @section('title')
        Order Details
    @endsection

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <div class="body-content">
        <div class="container">
            <div class="row">
                @include('frontend.common_part.user_sidebar')
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-header"><h4>Shipping Details</h4></div>
                        <hr>
                        <div class="card-body" style="background: #E9EBEC;">
                            <table class="table">
                                <tr>
                                    <th> Shipping Name : </th>
                                    <th> {{ $order->name }} </th>
                                </tr>

                                <tr>
                                    <th> Shipping Phone : </th>
                                    <th> {{ $order->phone }} </th>
                                </tr>

                                <tr>
                                    <th> Shipping Email : </th>
                                    <th> {{ $order->email }} </th>
                                </tr>

                                <tr>
                                    <th> Division : </th>
                                    <th> {{ $order->division->division_name }} </th>
                                </tr>

                                <tr>
                                    <th> District : </th>
                                    <th> {{ $order->district->district_name }} </th>
                                </tr>

                                <tr>
                                    <th> State : </th>
                                    <th>{{ $order->state->state_name }} </th>
                                </tr>

                                <tr>
                                    <th> Post Code : </th>
                                    <th> {{ $order->post_code }} </th>
                                </tr>

                                <tr>
                                    <th> Order Date : </th>
                                    <th> {{ $order->order_date }} </th>
                                </tr>

                            </table>


                        </div>

                    </div>

                </div> <!-- // 1st col md -5 -->

                <div class="col-md-5">
                    <div class="card">
                        <div class="card-header"><h4>Order Details
                                <span class="text-danger"> Invoice : {{ $order->invoice_no }}</span></h4>
                        </div>
                        <hr>
                        <div class="card-body" style="background: #E9EBEC;">
                            <table class="table">
                                <tr>
                                    <th>  Name : </th>
                                    <th> {{ $order->user->name }} </th>
                                </tr>

                                <tr>
                                    <th>  Phone : </th>
                                    <th> {{ $order->user->phone }} </th>
                                </tr>

                                <tr>
                                    <th> Payment Type : </th>
                                    <th> {{ $order->payment_method }} </th>
                                </tr>

                                <tr>
                                    <th> Tranx ID : </th>
                                    <th> {{ $order->transaction_id }} </th>
                                </tr>

                                <tr>
                                    <th> Invoice  : </th>
                                    <th class="text-danger"> {{ $order->invoice_no }} </th>
                                </tr>

                                <tr>
                                    <th> Order Total : </th>
                                    <th>{{ $order->amount }} </th>
                                </tr>

                                <tr>
                                    @if($order->status == 'pending' || $order->status == 'confirm' || $order->status == 'processing' || $order->status == 'shipped' || $order->status == 'picked')
                                            <th> Order : </th>
                                            <th>
                                                <span class="badge badge-pill badge-warning" style="background: #418DB9;">{{ $order->status }} yes </span>
                                            </th>
                                    @else
                                        @if($order->status == 'cancel')
                                            <th> Order : </th>
                                            <th>
                                                <span class="badge badge-pill badge-warning" style="background: red;">{{ $order->status }}</span>
                                            </th>

                                        @else
                                            @if($order->return_reason !== NULL )
                                                <th> Order : </th>
                                                <th>
                                                    <span class="badge badge-pill badge-warning" style="background:  #EDE04D;">return request </span>
                                                </th>
                                            @else
                                                <th> Order : </th>
                                                <th>
                                                    <span class="badge badge-pill badge-warning" style="background: gray;">{{ $order->status }}</span>
                                                </th>
                                            @endif
                                        @endif
                                    @endif


                                </tr>



                            </table>


                        </div>

                    </div>

                </div> <!-- // 2nd end col md -5 -->

                <div class="row">

                    <div class="col-md-12">

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>

                                <tr style="background: #e2e2e2;">
                                    <td class="col-md-1">
                                        <label for=""> Image</label>
                                    </td>

                                    <td class="col-md-3">
                                        <label for=""> Product Name </label>
                                    </td>

                                    <td class="col-md-3">
                                        <label for=""> Product Code</label>
                                    </td>


                                    <td class="col-md-2">
                                        <label for=""> Color </label>
                                    </td>

                                    <td class="col-md-2">
                                        <label for=""> Size </label>
                                    </td>

                                    <td class="col-md-1">
                                        <label for=""> Quantity </label>
                                    </td>

                                    <td class="col-md-1">
                                        <label for=""> Price </label>
                                    </td>

                                </tr>


                                @foreach($orderItem as $item)
                                    <tr>
                                        <td class="col-md-1">
                                            <label for=""><img src="{{ asset($item->product->product_thumbnail) }}" height="50px;" width="50px;"> </label>
                                        </td>

                                        <td class="col-md-3">
                                            <label for=""> {{ $item->product->product_name_en }}</label>
                                        </td>


                                        <td class="col-md-3">
                                            <label for=""> {{ $item->product->product_code }}</label>
                                        </td>

                                        <td class="col-md-2">
                                            <label for=""> {{ $item->color }}</label>
                                        </td>

                                        <td class="col-md-2">
                                            <label for=""> {{ $item->size }}</label>
                                        </td>

                                        <td class="col-md-2">
                                            <label for=""> {{ $item->qty }}</label>
                                        </td>

                                        <td class="w-3" >
                                            <label for="" style="width: 96px;"> ${{ $item->price }}  ( ${{ $item->price * $item->qty }} ) </label>
                                        </td>

                                    </tr>
                                @endforeach



                                </tbody>

                            </table>

                        </div>

                    </div> <!-- / end col md 8 -->

            </div>  <!-- End order item -->
                @if($order->status !== "delivered")

                @else
                    @if( $order->return_reason == NULL )
                        <form action="{{ route('return.order',$order->id) }}" method="POST"  >
                            @csrf
                            <div class="form-group">
                                <label for="label"> Order Return Reason:</label>
                                <textarea name="return_reason" id="" class="form-control" cols="30" rows="05" required>Return Reason</textarea>

                            </div>
                            <button type="submit" class="btn btn-danger">Submit Order Return Reason</button>
                        </form>
                    @endif
                @endif

            </div>
        </div>
    </div><br>
    <script>
        $(document).ready(function(){
            $('#image').change(function(e){
                var reader = new FileReader()
                reader.onload = function(e){
                    $('#showImage').attr('src',e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            })
        })
    </script>
@endsection
