@extends('admin.admin_master')
@section('admin')
    <div class="container-full pt-0">
        <section class="content">
            <div class="row">

                <!-- ----------------Add district-------------- -->
                <div class="col-4">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title pl-3 ">Add District</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <form method="post" action="{{route('district.store')}}">
                                    @csrf
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <h5>Select Division <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="division_id"  class="form-control" aria-invalid="false">
                                                    <option value="" selected disabled>Select Your Division</option>
                                                    @foreach($divisions as $division)
                                                        <option value="{{$division->id}}">{{ $division->division_name }}</option>
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
                                                <input type="text" name="district_name" class="form-control" >
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

                <!-- all district view  -->
                <div class="col-8">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title pl-3 ">Division List</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Division Name</th>
                                        <th>District Name</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($districts as $item)
                                        <tr>
                                            <td>{{ ucfirst($item->division->division_name)}}</td>
                                            <td>{{ ucfirst($item->district_name) }}</td>
                                            <td>
                                                <!-- <a href="" class="btn btn-info sm" title="Edit" ><i class="fas fa-edit">Edit</i></a> -->
                                                <a href="{{ route('district.edit',$item->id) }}" class="btn btn-info sm" title="Edit" ><i class="fa fa-pencil"></i></a>
                                                <a href="{{ route('district.delete',$item->id) }}" class="btn btn-danger sm" title="Delete" id="delete" ><i class="fa fa-trash" ></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>Division Name</th>
                                        <th>District Name</th>
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

@endsection

