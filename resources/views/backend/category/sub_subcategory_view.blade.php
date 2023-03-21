@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="container-full">
<section class="content" style="padding: 0px 0px;">
<div class="row">

    <!-- ----------------Add sub sub category-------------- -->
    <div class="col-4">

        <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title pl-3 ">Add Sub Subcategory</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="table-responsive">
					<form method="post" action="{{route('subSubcategory.store')}}">
                        @csrf
                        <div class="col-md-12">

                            <div class="form-group">
								<h5>Category Select <span class="text-danger">*</span></h5>
								<div class="controls">
									<select name="category_id" class="form-control">
										<option value="" selected disabled>Select Category</option>
                                        @foreach($categories as $category)
										<option value="{{$category->id}}">{{ $category->category_name_en }}</option>
                                        @endforeach
									</select>
								<div class="help-block"></div></div>
                                @error('category_id')
                                    <span class="text-danger">{{ $message }} </span>
                                @enderror
							</div>

                            <div class="form-group">
								<h5>SubCategory Select <span class="text-danger">*</span></h5>
								<div class="controls">
									<select name="subcategory_id" class="form-control">
										<option value="" selected="" disabled="">Select Sub-Subcategory</option>
									</select>
								<div class="help-block"></div></div>
                                @error('subcategory_id')
                                    <span class="text-danger">{{ $message }} </span>
                                @enderror
							</div>

                            <div class="form-group">
                                <h5>Sub-Subcategory English <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="subSubcategory_name_en" class="form-control" >
                                </div>
                                @error('subSubcategory_name_en')
                                    <span class="text-danger">{{ $message }} </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <h5>Sub-Subcategory Bangla <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="subSubcategory_name_bn"  class="form-control">
                                </div>
                                @error('subSubcategory_name_bn')
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

    <!-- all sub sub Category view  -->
    <div class="col-8">

        <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title pl-3">Sub-Subcategory List</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Category</th>
                        <th>Sub Category</th>
                        <th>Sub Subcategory En</th>
                        <th>Sub Subcategory Bn</th>
                        <th>Action</th>

                    </tr>
                </thead>
            <tbody>
                @foreach($subSubcategories as $item)
                   <tr>
                       <td style="width:30px;">{{ $item->category->category_name_en }}</td>
                       <td style="width:30px;">{{ $item->subcategory->subcategory_name_en}}</td>
                        <td>{{ $item->subSubcategory_name_en }}</td>
                        <td>{{ $item->subSubcategory_name_bn }}</td>
                            <td>
                                <!-- <a href="" class="btn btn-info sm" title="Edit" ><i class="fas fa-edit">Edit</i></a> -->
                                <a href="{{ route('subSubcategory.edit',$item->id) }}" class="btn btn-info sm" title="Edit" ><i class="fa fa-pencil"></i></a>
                                <a href="{{ route('subSubcategory.delete',$item->id) }}" class="btn btn-danger sm" title="Delete" id="delete" ><i class="fa fa-trash" ></i></a>
                            </td>
                    </tr>
                @endforeach
            </tbody>
                <tfoot>
                    <tr>
                        <th>Category</th>
                        <th>Sub Category</th>
                        <th>Sub Subcategory En</th>
                        <th>Sub Subcategory Bn</th>
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
        $(document).ready(function() {
        $('select[name="category_id"]').on('change', function(){
            var category_id = $(this).val();
            if(category_id) {
                $.ajax({
                    url: "{{  url('/category/subcategory/ajax') }}/"+category_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                        var d =$('select[name="subcategory_id"]').empty();
                            $.each(data, function(key, value){
                                $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">' + value.subcategory_name_en + '</option>');
                            });
                        },
                    });
                    } else {
                alert('danger');
                }
            });
        });
    </script>

@endsection

