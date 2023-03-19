@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<div class="container-full">
<section class="content" style="padding: 0px 0px;">
    <div class="row">
    <div class="col-8">

        <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title pl-3 ">Brand List</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Brand Name En</th>
                        <th>Brand Name Bn</th>
                        <th>Brand Image</th>
                        <th>Action</th>

                    </tr>
                </thead>
            <tbody>
                @foreach($brands as $item)
                    <tr>
                        <td>{{ $item->brand_name_en }}</td>
                        <td>{{ $item->brand_name_bn }}</td>
                        <td><img src="{{ asset($item->brand_image) }}" alt="" style="width:70px;height:40px;"></td>
                        <td>
                            <!-- <a href="" class="btn btn-info sm" title="Edit" ><i class="fas fa-edit">Edit</i></a> -->
                            <a href="{{ route('brand.edit',$item->id) }}" class="btn btn-info sm" title="Edit" ><i class="fa fa-pencil"></i></a>
                            <a href="{{ route('brand.delete',$item->id) }}" class="btn btn-danger sm" title="Delete" id="delete" ><i class="fa fa-trash" ></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
                <tfoot>
                    <tr>
                        <th>Brand Name En</th>
                        <th>Brand Name Bn</th>
                        <th>Brand Image</th>
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

    <!-- ----------------Add brand-------------- -->
    <div class="col-4">

        <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title pl-3 ">Add Brand</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="table-responsive">
					<form method="post" action="{{route('brand.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-12">
                            <div class="form-group">
                                <h5>Brand Name English <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="brand_name_en" class="form-control" >
                                </div>
                                @error('brand_name_en')
                                    <span class="text-danger">{{ $message }} </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <h5>Brand Name Bangla <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="brand_name_bn"  class="form-control">
                                </div>
                                @error('brand_name_bn')
                                    <span class="text-danger">{{ $message }} </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <h5>Brand Image <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input id="image" type="file" name="brand_image"  class="form-control">
                                </div>
                                @error('brand_image')
                                    <span class="text-danger">{{ $message }} </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <h5>Brand Image <span class="text-danger">*</span></h5>
                                <img id="showImage" src="{{ (!empty($brand->brand_image))? url($brand->brand_image): url('upload/no_image.jpg') }}" style="width: 100px;height: 100px;" alt="yes" >
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

