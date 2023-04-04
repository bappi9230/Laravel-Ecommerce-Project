@extends('admin.admin_master')
@section('admin')
    <div class="container-full ">
        <section class="content pt-0">
            <div class="row">

                <!-- ----------------Add division-------------- -->
                <div class="col-4">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title pl-3 ">Add Division</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <form method="post" action="{{route('division.store')}}">
                                    @csrf
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <h5>Division Name<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="division_name" class="form-control" >
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

                <!-- all division view  -->
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
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($divisions as $item)
                                        <tr>
                                            <td>{{ ucfirst($item->division_name) }}</td>
                                            <td>
                                                <!-- <a href="" class="btn btn-info sm" title="Edit" ><i class="fas fa-edit">Edit</i></a> -->
                                                <a href="{{ route('division.edit',$item->id) }}" class="btn btn-info sm" title="Edit" ><i class="fa fa-pencil"></i></a>
                                                <a href="{{ route('division.delete',$item->id) }}" class="btn btn-danger sm" title="Delete" id="delete" ><i class="fa fa-trash" ></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>Division Name</th>
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

