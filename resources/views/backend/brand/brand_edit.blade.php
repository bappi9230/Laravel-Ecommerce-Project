@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<div class="container-full">
<section class="content" style="padding: 0px 0px;">
    <div class="row">
    <!-- ----------------Add brand-------------- -->
    <div class="col-8">

        <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title pl-3 ">Edit Brand</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="table-responsive">
					<form method="post" action="{{route('brand.update')}}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$brand->id}}">
                        <input type="hidden" name="old_image" value="{{$brand->brand_image}}">
                        <div class="col-md-12">
                            <div class="form-group">
                                <h5>Brand Name English <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="brand_name_en" value="{{ $brand->brand_name_en }}" class="form-control" >
                                </div>
                            </div>

                            <div class="form-group">
                                <h5>Brand Name Bangla <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="brand_name_bn" value="{{ $brand->brand_name_bn }}" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <h5>Brand Image <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input id="image" type="file" name="brand_image" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Brand Image <span class="text-danger">*</span></h5>
                                    <img id="showImage" src="{{ (!empty($brand->brand_image))? url($brand->brand_image): url('upload/no_image.jpg') }}" style="width: 100px;height: 100px;" alt="yes" >
                                </div>
                            </div>

                            <div class="text-xs-right">
                                <input type="submit" class="btn btn-rounded btn-info" value="Update Brand">
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

