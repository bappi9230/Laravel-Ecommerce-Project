@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<div class="container-full">
<section class="content" style="padding: 0px 0px;">
<div class="row">

    <!-- ----------------Add category-------------- -->
    <div class="col-4">

        <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title pl-3 ">Add Category</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="table-responsive">
					<form method="post" action="{{route('category.store')}}">
                        @csrf
                        <div class="col-md-12">
                            <div class="form-group">
                                <h5>Category Name English <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="category_name_en" class="form-control" >
                                </div>
                                @error('category_name_en')
                                    <span class="text-danger">{{ $message }} </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <h5>Category Name Bangla <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="category_name_bn"  class="form-control">
                                </div>
                                @error('category_name_bn')
                                    <span class="text-danger">{{ $message }} </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <h5>Category Icon <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input id="image" type="text" name="category_icon"  class="form-control">
                                </div>
                                @error('category_icon')
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
            <h3 class="box-title pl-3 ">Category List</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Category Icon</th>
                        <th>Category Name En</th>
                        <th>Category Name Bn</th>
                        <th>Action</th>

                    </tr>
                </thead>
            <tbody>
                @foreach($category as $item)
                   <tr>
                        <td><span><i class="{{ $item->category_icon }}"></i></span></td>
                        <td>{{ $item->category_name_en }}</td>
                        <td>{{ $item->category_name_bn }}</td>
                            <td>
                                <!-- <a href="" class="btn btn-info sm" title="Edit" ><i class="fas fa-edit">Edit</i></a> -->
                                <a href="{{ route('category.edit',$item->id) }}" class="btn btn-info sm" title="Edit" ><i class="fa fa-pencil"></i></a>
                                <a href="{{ route('category.delete',$item->id) }}" class="btn btn-danger sm" title="Delete" id="delete" ><i class="fa fa-trash" ></i></a>
                            </td>
                    </tr>
                @endforeach
            </tbody>
                <tfoot>
                    <tr>
                        <th>Category Icon</th>
                        <th>Category Name En</th>
                        <th>Category Name Bn</th>
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

