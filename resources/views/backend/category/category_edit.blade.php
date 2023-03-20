@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<div class="container-full">
<section class="content" style="padding: 0px 0px;">
<div class="row">

    <!-- ----------------Add category-------------- -->
    <div class="col-8">

        <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title pl-3 ">Add Category</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="table-responsive">
					<form method="post" action="{{route('category.update')}}">
                        @csrf
                        <input type="hidden" name="id" value="{{ $category->id }}" >
                        <div class="col-md-12">
                            <div class="form-group">
                                <h5>Category Name English <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="category_name_en" value="{{ $category->category_name_en }}" class="form-control" >
                                </div>
                            </div>
                            <div class="form-group">
                                <h5>Category Name Bangla <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="category_name_bn" value="{{ $category->category_name_bn }}"  class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <h5>Category Icon <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input id="image" type="text" name="category_icon" value="{{ $category->category_icon }}" class="form-control">
                                </div>

                            </div>
                            <div class="text-xs-right">
                                <input type="submit" class="btn btn-rounded btn-info" value="Update">
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

