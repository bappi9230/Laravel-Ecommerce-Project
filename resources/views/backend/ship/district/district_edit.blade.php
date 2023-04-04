@extends('admin.admin_master')
@section('admin')
    <div class="container-full ">
        <section class="content pt-0">
            <div class="row">

                <!-- ----------------Add district-------------- -->
                <div class="col-8">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title pl-3 ">Edit District</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <form method="post" action="{{route('district.update',$district->id)}}">
                                    @csrf
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <h5>Select Division <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="division_id"  class="form-control" aria-invalid="false">
                                                    <option value="" disabled>Select Your Division</option>
                                                    @foreach($divisions as $division)
                                                        <option value="{{$division->id}}"{{ $division->id == $district->division_id? 'selected':'' }} >{{ $division->division_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('division_id')
                                            <span class="text-danger">{{ $message }} </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <h5>District Name<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="district_name" value="{{$district->district_name}}" class="form-control" >
                                            </div>
                                            @error('district_name')
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

