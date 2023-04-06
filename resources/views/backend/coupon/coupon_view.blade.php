@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <div class="container-full ">
        <section class="content pt-0">
            <div class="row">

                <!-- ----------------Add category-------------- -->
                <div class="col-4">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title pl-3 ">Add Coupon</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <form method="post" action="{{route('coupon.store')}}">
                                    @csrf
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <h5>Coupon Name<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="coupon_name" class="form-control" >
                                            </div>
                                            @error('coupon_name')
                                            <span class="text-danger">{{ $message }} </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <h5>Coupon Discount(%)<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="coupon_discount"  class="form-control">
                                            </div>
                                            @error('coupon_discount')
                                            <span class="text-danger">{{ $message }} </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <h5>Coupon Validity Date<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="date" name="coupon_validity"  class="form-control" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}">
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

                <!-- all Category view  -->
                <div class="col-8">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title pl-3 ">Coupon List :<span class="badge badge-pill badge-primary">{{ count($coupons) }}</span></h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Coupon Name</th>
                                        <th>Coupon Discount</th>
                                        <th>Validity</th>
                                        <th>Status</th>
                                        <th>Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($coupons as $item)
                                        <tr>
                                            <td>{{ $item->coupon_name }}</td>
                                            <td>{{ $item->coupon_discount }}%</td>
                                            <td>{{ Carbon\Carbon::parse($item->coupon_validity)->format('D, d F Y') }}</td>
                                            <td>
                                                @if($item->coupon_validity >= Carbon\Carbon::now()->format('Y-m-d'))
                                                    <span class="badge badge-pill badge-primary">Valid</span>
                                                @else
                                                    <span class="badge badge-pill badge-danger">Invalid</span>
                                                @endif
                                            </td>
                                            <td>
                                                <!-- <a href="" class="btn btn-info sm" title="Edit" ><i class="fas fa-edit">Edit</i></a> -->
                                                <a href="{{ route('coupon.edit',$item->id) }}" class="btn btn-info sm" title="Edit" ><i class="fa fa-pencil"></i></a>
                                                <a href="{{ route('coupon.delete',$item->id) }}" class="btn btn-danger sm" title="Delete" id="delete" ><i class="fa fa-trash" ></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>Coupon Name</th>
                                        <th>Coupon Discount</th>
                                        <th>Validity</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
                <!-- /.col -->


                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->

    </div>

    <script type="text/javascript">
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

