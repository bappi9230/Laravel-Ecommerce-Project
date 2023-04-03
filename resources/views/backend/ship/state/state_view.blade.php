@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="container-full pt-0">
        <section class="content">
            <div class="row">

                <!-- ----------------Add district-------------- -->
                <div class="col-4">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title pl-3 ">Add State Name</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <form method="post" action="{{route('state.store')}}">
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
                                            <h5>Select District <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="district_id"  class="form-control" aria-invalid="false">
                                                    <option value="" selected disabled>Select Your District</option>
                                                </select>
                                            </div>
                                            @error('district_id')
                                            <span class="text-danger">{{ $message }} </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <h5>State Name<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="state_name" class="form-control" >
                                            </div>
                                            @error('state_name')
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
                            <h3 class="box-title pl-3 ">State List</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Division Name</th>
                                            <th>District Name</th>
                                            <th>State Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($states as $item)
                                        <tr>
                                            <td>{{ ucfirst($item->division->division_name)}}</td>
                                            <td>{{ ucfirst($item->district->district_name) }}</td>
                                            <td>{{ ucfirst($item->state_name) }}</td>
                                            <td>
                                                <!-- <a href="" class="btn btn-info sm" title="Edit" ><i class="fas fa-edit">Edit</i></a> -->
                                                <a href="{{ route('state.edit',$item->id) }}" class="btn btn-info sm" title="Edit" ><i class="fa fa-pencil"></i></a>
                                                <a href="{{ route('state.delete',$item->id) }}" class="btn btn-danger sm" title="Delete" id="delete" ><i class="fa fa-trash" ></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>Division Name</th>
                                        <th>District Name</th>
                                        <th>State Name</th>
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

        }); //end ready function

        <!-- subcategory and Sub-subCategory show script  -->
    </script>

@endsection

