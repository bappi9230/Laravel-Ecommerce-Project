@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="container-full">
        <section class="content pt-0">
            <div class="row">

                <!-- ----------------edit state-------------- -->
                <div class="col-8">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title pl-3 ">Add State Name</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <form method="post" action="{{route('state.update',$state->id)}}">
                                    @csrf
                                    <div class="col-md-12">

                                        <div class="form-group">
                                            <h5>Select Division <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="division_id"  class="form-control" aria-invalid="false">
                                                    <option value="" disabled>Select Your Division</option>
                                                    @foreach($divisions as $division)
                                                        <option value="{{$division->id}}" {{ $division->id == $state->division_id ? 'selected':'' }}>{{ $division->division_name }}</option>
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
                                                    @foreach($districts as $distric)
                                                        <option value="{{$distric->id}}" {{ $distric->id == $state->district_id? 'selected':'' }} >{{ $distric->district_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('district_id')
                                            <span class="text-danger">{{ $message }} </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <h5>State Name<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="state_name" value="{{ $state->state_name }}" class="form-control" >
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

