@extends('frontend.main_master')
@section('content')

    @section('title')
        Product Mycart
    @endsection

    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="home.html">Home</a></li>
                    <li class='active'>My Cart</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->
    <div class="body-content outer-top-xs">
        <div class="container">
            <div class="row ">

                <div class="shopping-cart">
                    <div class="shopping-cart-table ">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="cart-description item">Image</th>
                                        <th class="cart-product-name item">Product Name</th>
                                        <th class="cart-sub-total item">Price</th>
                                        <th class="cart-qty item">Quantity</th>
                                        <th class="cart-total last-item">SubTotal</th>
                                        <th class="cart-edit item">Edit</th>
                                        <th class="cart-romove item">Remove</th>
                                    </tr>
                                </thead><!-- /thead -->
                                <tbody id="mycart">

                                </tbody><!-- /tbody -->

                            </table><!-- /table -->
                        </div>
                    </div><!-- /.shopping-cart-table -->



                    <div class="col-md-6 col-sm-12 estimate-ship-tax">
                        @if(Session::has('coupon'))

                        @else

                        <table class="table" id="couponApplyField">
                            <thead>
                            <tr>
                                <th>
                                    <span class="estimate-title">Discount Code</span>
                                    <p>Enter your coupon code if you have one..</p>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <input type="text" id="coupon_name" class="form-control unicase-form-control text-input" placeholder="You Coupon..">
                                    </div>
                                    <div class="clearfix pull-right">
                                        <button type="submit" class="btn-upper btn btn-primary" onclick="applyCoupon()">APPLY COUPON</button>
                                    </div>
                                </td>
                            </tr>
                            </tbody><!-- /tbody -->
                        </table><!-- /table -->

                        @endif

                    </div><!-- /.estimate-ship-tax -->


                    <div class="col-md-6 col-sm-12 cart-shopping-total">
                        <table class="table" >
                            <thead id="couponCalculation" style>

                            </thead><!-- /thead -->
                            <tbody>
                            <tr>
                                <td>
                                    <div class="cart-checkout-btn pull-right">
                                        <a href="{{route('checkout')}}" class="btn btn-primary checkout-btn">PROCCED TO CHEKOUT</a>
                                    </div>
                                </td>
                            </tr>
                            </tbody><!-- /tbody -->
                        </table><!-- /table -->
                    </div><!-- /.cart-shopping-total -->



                </div><!-- /.shopping-cart -->


            </div> <!-- /.row -->
            <!-- ============================================== BRANDS CAROUSEL ============================================== -->
@include('frontend.body.brands')
            <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div><!-- /.container -->
    </div><!-- /.body-content -->


@endsection
