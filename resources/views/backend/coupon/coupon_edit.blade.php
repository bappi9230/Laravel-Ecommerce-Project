@extends('admin.admin_master')
@section('admin')
    <div class="container-full pt-0">
        <section class="content">
            <div class="row">

                <!-- ----------------Add category-------------- -->
                <div class="col-8">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title pl-3 ">Add Coupon</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <form method="post" action="{{route('coupon.update',$coupon->id)}}">
                                    @csrf
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <h5>Coupon Name<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="coupon_name" value="{{$coupon->coupon_name}}" class="form-control" >
                                            </div>
                                            @error('coupon_name')
                                            <span class="text-danger">{{ $message }} </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <h5>Coupon Discount(%)<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="coupon_discount" value="{{$coupon->coupon_discount}}" class="form-control">
                                            </div>
                                            @error('coupon_discount')
                                            <span class="text-danger">{{ $message }} </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <h5 id="coupon_validity">Coupon Validity Date<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="date" name="coupon_validity" value="{{$coupon->coupon_validity}}"  class="form-control" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}">
                                            </div>
                                            @error('coupon_validity')
                                            <span class="text-danger">{{ $message }} </span>
                                            @enderror
                                        </div>

                                        <div class="text-xs-right">
                                            <input type="submit" class="btn btn-rounded btn-info" value="Submit">
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>

                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->

    </div>

@endsection


