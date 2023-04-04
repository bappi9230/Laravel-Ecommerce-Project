@extends('frontend.main_master')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    @section('title')
        Checkout page
    @endsection

    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="#">Home</a></li>
                    <li class='active'>Checkout</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->

    <div class="body-content">
        <div class="container">
            <div class="checkout-box ">
                <form class="register-form" role="form" method="post" action="{{route('checkout.store')}}">
                    @csrf
                    <div class="row">
                    <div class="col-md-8">
                        <div class="panel-group checkout-steps" id="accordion">
                            <!-- checkout-step-01  -->
                            <div class="panel panel-default checkout-step-01">

                                <div id="collapseOne" class="panel-collapse collapse in">

                                    <!-- panel-body  -->
                                    <div class="panel-body">
                                        <div class="row">

                                            <!-- guest-login -->

                                                <div class="col-md-6 col-sm-6 already-registered-login">
                                                    <h4 class="checkout-subtitle"><b> Shipping Address </b></h4>


                                                        <div class="form-group">
                                                            <label class="info-title" for="exampleInputEmail1">Shipping Name <span>*</span></label>
                                                            <input type="text" name="shipping_name" value="{{ Auth::user()->name }}" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Name" required>
                                                        </div> <!-- end form group -->

                                                        <div class="form-group">
                                                            <label class="info-title" for="exampleInputEmail1">Shipping Email <span>*</span></label>
                                                            <input type="email" name="shipping_email" value="{{ Auth::user()->email }}" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Email" required>
                                                        </div> <!-- end form group -->

                                                        <div class="form-group">
                                                            <label class="info-title" for="exampleInputEmail1">Shipping Phone Number <span>*</span></label>
                                                            <input type="text" name="shipping_phone" value="{{ Auth::user()->phone }}" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Phone" required>
                                                        </div> <!-- end form group -->

                                                        <div class="form-group">
                                                            <label class="info-title" for="exampleInputEmail1">Post Code <span>*</span></label>
                                                            <input type="number" name="post_code" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Post Code" required>
                                                        </div> <!-- end form group -->

                                                </div>

                                                <div class="col-md-6 col-sm-6 already-registered-login">

                                                        <div class="col-md-12">

                                                            <div class="form-group">
                                                                <h5><b>Select Division</b> <span class="text-danger">*</span></h5>
                                                                <div class="controls">
                                                                    <select name="division_id"  class="form-control" aria-invalid="false" required>
                                                                        <option value="" selected disabled>Select Your Division</option>
                                                                        @foreach($divisions as $division)
                                                                            <option value="{{$division->id}}">{{ $division->division_name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                @error('division_id')
                                                                <span class="text-danger">{{ $message }} </span>
                                                                @enderror
                                                            </div> <!-- end form group -->

                                                            <div class="form-group">
                                                                <h5><b>Select District</b> <span class="text-danger">*</span></h5>
                                                                <div class="controls">
                                                                    <select name="district_id"  class="form-control" aria-invalid="false" required>
                                                                        <option value="" selected disabled>Select Your District</option>
                                                                    </select>
                                                                </div>
                                                                @error('district_id')
                                                                <span class="text-danger">{{ $message }} </span>
                                                                @enderror
                                                            </div> <!-- end form group -->

                                                            <div class="form-group">
                                                                <h5><b>State Name</b> <span class="text-danger">*</span></h5>
                                                                <div class="controls">
                                                                    <select name="state_id"  class="form-control" aria-invalid="false" required>
                                                                        <option value="" selected disabled>Select State Name</option>
                                                                    </select>
                                                                </div>
                                                                @error('state_id')
                                                                <span class="text-danger">{{ $message }} </span>
                                                                @enderror
                                                            </div> <!-- end form group -->

                                                            <div class="form-group">
                                                                <label class="info-title" for="exampleInputEmail1">Shipping Address Notes<span>(optional)</span></label>
                                                                <textarea type="text" name="notes" cols="30" rows="5" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Write Some Notes About shipping Address...." ></textarea>
                                                            </div> <!-- end form group -->

                                                        </div>

                                                </div>

                                            <!-- guest-login -->

                                        </div>
                                    </div>
                                    <!-- panel-body  -->

                                </div><!-- row -->
                            </div>
                            <!-- checkout-step-01  -->
                        </div><!-- /.checkout-steps -->
                    </div>
                    <div class="col-md-4">

                        <!-- checkout-progress-sidebar -->
                        <div class="checkout-progress-sidebar ">
                            <div class="panel-group">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="unicase-checkout-title">Your Checkout Progress</h4>
                                    </div>
                                    <div class="">
                                        <ul class="nav nav-checkout-progress list-unstyled">
                                            @foreach($carts as $item)
                                                <li><h4> <strong>Name:</strong> <span>{{ $item->name }}</span> </h4> </li>
                                                <li><strong>image:</strong> <img style="width: 150px;height: 120px" src="{{asset($item->options->image)}}"></li>
                                                <li> <strong>Color:</strong> <span>{{ $item->options->color }}</span></li>
                                                <li> <strong>Size:</strong> <span>{{ $item->options->size }}</span></li>
                                                <li> <strong>Quantity:</strong> <span>{{ $item->qty }}</span></li>
                                            @endforeach
                                            @if(Session::has('coupon'))
                                                <li> <strong>Sutotal:</strong> <span>{{ $cartTotal }}</span></li>
                                                <li> <strong>Coupon Name:</strong> <span>{{ session()->get('coupon')['coupon_name'] }}</span></li>
                                                <li> <strong>Coupon Discount:</strong> <span>{{ session()->get('coupon')['coupon_discount'] }}%</span></li>
                                                <li> <strong>Discount Amount:</strong> <span>{{ session()->get('coupon')['discount_amount'] }}</span></li>
                                                <li> <strong>Total Amount:</strong> <span>{{ session()->get('coupon')['total_amount'] }}</span></li>

                                            @else
                                                <li> <strong>Subtotal:</strong> <span>{{ $cartTotal }}</span></li>
                                                <li> <strong>GtrandTotal:</strong> <span>{{ $cartTotal }}</span></li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- checkout-progress-sidebar -->

                         <!--========== Payment method ========== -->
                        <div class="">
                            <!-- checkout-progress-sidebar -->
                            <div class="checkout-progress-sidebar ">
                                <div class="panel-group">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="unicase-checkout-title">Select Payment Method</h4>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label for="">Stripe</label>
                                                <input type="radio" name="payment_method" value="stripe" required>
                                                <img src="{{asset('frontend/assets/images/payments/4.png')}}">
                                            </div><!-- end col-md-4 -->
                                            <div class="col-md-4">
                                                <label for="">Card</label>
                                                <input type="radio" name="payment_method" value="card" required>
                                                <img src="{{asset('frontend/assets/images/payments/3.png')}}">
                                            </div><!-- end col-md-4 -->
                                            <div class="col-md-4">
                                                <label for="">Cash</label>
                                                <input type="radio" name="payment_method" value="cash" required>
                                                <img src="{{asset('frontend/assets/images/payments/6.png')}}">
                                            </div><!-- end col-md-4 -->
                                        </div> <!-- end row -->
                                        <hr>
                                        <div class="text-xs-right">
                                            <input type="submit" class="btn btn-rounded btn-info" value="Submit">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- checkout-progress-sidebar -->
                        </div>
                        <!--========= end Payment method========= -->
                    </div>



                </div><!-- /.row -->
            </form>
        </div><!-- /.checkout-box -->
            <!-- ============================== BRANDS CAROUSEL ============================================== -->
    @include('frontend.body.brands')
            <!-- ============================== BRANDS CAROUSEL : END ============================= -->
        </div><!-- /.container -->
    </div><!-- /.body-content -->



    <!-- state show script  -->

    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="division_id"]').on('change', function(){
                var division_id = $(this).val();
                if(division_id) {
                    $.ajax({
                        url: "/shipping/division/district/ajax/"+division_id,
                        type:"GET",
                        dataType:"json",
                        success:function(data) {
                            console.log(data)
                            $('select[name="district_id"]').html('');
                            $('select[name="district_id"]').empty();

                            $('select[name="district_id"]').append('<option value="">' + "Select Your District " + '</option>');
                            $.each(data, function(key, value){
                                $('select[name="district_id"]').append('<option value="'+ value.id +'">' + value.district_name + '</option>');
                            }); //end loop
                        },
                    }); //end ajax
                } else {
                    alert('danger');
                }
            }); //end district_id

            ///////////////// sate selection /////////////////////////

            $('select[name="district_id"]').on('change', function(){
                var district_id = $(this).val();
                if(district_id) {
                    $.ajax({
                        url: "/shipping/division/sate/ajax/"+district_id,
                        type:"GET",
                        dataType:"json",
                        success:function(data) {
                            console.log(data)
                            $('select[name="state_id"]').html('');
                            $('select[name="state_id"]').empty();

                            $('select[name="state_id"]').append('<option value="">' + "Select Your State " + '</option>');
                            $.each(data, function(key, value){
                                $('select[name="state_id"]').append('<option value="'+ value.id +'">' + value.state_name + '</option>');
                            }); //end loop
                        },
                    }); //end ajax
                } else {
                    alert('danger');
                }
            }); //end district_id

        }); //end ready function

    </script>
        <!-- End State show script  -->

@endsection
