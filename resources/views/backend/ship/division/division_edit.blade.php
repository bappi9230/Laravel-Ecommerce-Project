@extends('admin.admin_master')
@section('admin')
    <div class="container-full pt-0">
        <section class="content">
            <div class="row">

                <!-- ----------------edit division-------------- -->
                <div class="col-8">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title pl-3 ">Edit Division</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <form method="post" action="{{route('division.update',$division->id)}}">
                                    @csrf
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <h5>Division Name<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="division_name" value="{{$division->division_name}}" class="form-control" >
                                            </div>
                                            @error('division_name')
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

            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->

    </div>

@endsection

