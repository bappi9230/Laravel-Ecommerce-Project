@extends('admin.admin_master')
@section('admin')


    <!-- Content Wrapper. Contains page content -->

    <div class="container-full ">
        <!-- Content Header (Page header) -->
        <div class="content-header pt-0">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title">Order Details</h3>
                </div>
            </div>
        </div>
        <!-- end Content Header (Page header) -->


        <!-- Main content -->
        <section class="content pt-0">
            <div class="row">

                <div class="col-md-6 col-12">
                    <div class="box box-bordered border-primary">
                        <div class="box-header with-border">
                            <h4 class="box-title"><strong>Shipping Details</strong> </h4>
                        </div>


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
                </div> <!--  // cod md -6 -->


                <div class="col-md-6 col-12">
                    <div class="box box-bordered border-primary">
                        <div class="box-header with-border">
                            <h4 class="box-title"><strong>Order Details</strong><span class="text-danger"> Invoice : {{ $order->invoice_no }}</span></h4>
                        </div>


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
                                <th>${{ $order->amount }} </th>
                            </tr>

                            <tr>
                                <th> Order : </th>
                                <th>
                                    <span class="badge badge-pill badge-warning" style="background: #418DB9;">{{ $order->status }} </span> </th>
                            </tr>

                            @if($order->status == 'pending')
                            <tr>
                                <th></th>
                                <th>
                                    <a id="confirm" class="btn btn-block btn-primary" href="{{ route('pending-confirm',$order->id) }}"> Confirmed Order </a>
                                </th>
                            </tr>
                            @endif


                            @if($order->status == 'confirm')
                            <tr>
                                <th></th>
                                <th>
                                    <a id="processing" class="btn btn-block btn-primary" href="{{ route('confirm-processing',$order->id) }}"> Processing Order </a>
                                </th>
                            </tr>
                            @endif

                            @if($order->status == 'processing')
                            <tr>
                                <th></th>
                                <th>
                                    <a id="picked" class="btn btn-block btn-primary" href="{{ route('processing-picked',$order->id) }}"> Picked Order </a>
                                </th>
                            </tr>
                            @endif

                            @if($order->status == 'picked')
                            <tr>
                                <th></th>
                                <th>
                                    <a id="shipped" class="btn btn-block btn-primary" href="{{ route('picked-shipped',$order->id) }}"> Shipped Order </a>
                                </th>
                            </tr>
                            @endif

                            @if($order->status == 'shipped')
                            <tr>
                                <th></th>
                                <th>
                                    <a id="delivered" class="btn btn-block btn-primary" href="{{ route('shipped-delivered',$order->id) }}"> Delivered Order </a>
                                </th>
                            </tr>
                            @endif

                            @if($order->status == 'delivered')
                            <tr>
                                <th></th>
                                <th>
                                    <a id="cancel" class="btn btn-block btn-primary" href="{{ route('delivered-cancel',$order->id) }}"> Cancel Order </a>
                                </th>
                            </tr>
                            @endif

                        </table>



                    </div>
                </div> <!--  // cod md -6 -->


                <div class="col-md-12 col-12">
                    <div class="box box-bordered border-primary">
                        <div class="box-header with-border">
                        </div>
                        <table class="table">
                            <tbody>
                            <tr>
                                <td width="10%">
                                    <label for=""> Image</label>
                                </td>

                                <td width="20%">
                                    <label for=""> Product Name </label>
                                </td>

                                <td width="10%">
                                    <label for=""> Product Code</label>
                                </td>


                                <td width="10%">
                                    <label for=""> Color </label>
                                </td>

                                <td width="10%">
                                    <label for=""> Size </label>
                                </td>

                                <td width="10%">
                                    <label for=""> Quantity </label>
                                </td>

                                <td width="10%">
                                    <label for=""> Price </label>
                                </td>

                            </tr>


                            @foreach($orderItem as $item)
                                <tr>
                                    <td width="10%">
                                        <label for=""><img src="{{ asset($item->product->product_thumbnail) }}" height="50px;" width="50px;"> </label>
                                    </td>

                                    <td width="20%">
                                        <label for=""> {{ $item->product->product_name_en }}</label>
                                    </td>


                                    <td width="10%">
                                        <label for=""> {{ $item->product->product_code }}</label>
                                    </td>

                                    <td width="10%">
                                        <label for=""> {{ $item->color }}</label>
                                    </td>

                                    <td width="10%">
                                        <label for=""> {{ $item->size }}</label>
                                    </td>

                                    <td width="10%">
                                        <label for=""> {{ $item->qty }}</label>
                                    </td>

                                    <td width="10%">
                                        <label for=""> ${{ $item->price }}  ( $ {{ $item->price * $item->qty}} ) </label>
                                    </td>

                                </tr>
                            @endforeach


                            </tbody>

                        </table>


                    </div>
                </div>  <!--  // cod md -12 -->



            </div>
            <!-- /. end row -->
        </section>
        <!-- /.content -->

    </div>



@endsection
