@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<div class="container-full">
<section class="content" style="padding: 0px 0px;">
    <div class="row">
            <!-- ----------------Add brand-------------- -->
    <div class="col-4">

        <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title pl-3 ">Add Slider</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="table-responsive">
					<form method="post" action="{{route('slider.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-12">
                            <div class="form-group">
                                <h5>Slider Title <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="title" class="form-control" >
                                </div>
                            </div>

                            <div class="form-group">
                                <h5>Slider Description<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="description"  class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <h5>Slider Image <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input id="image" type="file" name="slider_img"  class="form-control">
                                </div>
                                @error('slider_img')
                                    <span class="text-danger">{{ $message }} </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <h5>Slider Image <span class="text-danger">*</span></h5>
                                <img id="showImage" src="{{ (!empty($slider->slider_img))? url($slider->slider_img): url('upload/no_image.jpg') }}" style="width: 300px;height: 100px;" alt="yes" >
                            </div>

                            <div class="text-xs-right">
                                <input type="submit" class="btn btn-rounded btn-info" value="Add Slider">
                            </div>
                        </div>

					</form>
            </div>
        </div>
        <!-- /.box-body -->
        </div>
    </div>

    <!-- all brand view  -->
    <div class="col-8">

        <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title pl-3 ">Slider List</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Slider Image</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Action</th>

                    </tr>
                </thead>
            <tbody>
                @foreach($sliders as $item)
                <tr>
                        <td><img src="{{ asset($item->slider_img) }}" alt="" style="width:70px;height:40px;"></td>
                        <td>
                            @if($item->title == NULL)
                            <span class="badge badge-pill badge-danger">No Title</span>
                            @else
                              {{ $item->title }}
                            @endif
                        </td>
                        <td>
                            @if($item->description == NULL)
                            <span class="badge badge-pill badge-danger">No Description</span>
                            @else
                              {{ $item->description }}
                            @endif
                        </td>
                        <td>
                            @if($item->status == 1)
                            <span class="badge badge-pill badge-primary">Active</span>
                            @else
                            <span class="badge badge-pill badge-danger">Inactive</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('slider.edit',$item->id) }}" class="btn btn-info sm" title="Edit" ><i class="fa fa-pencil"></i></a>
                            <a href="{{ route('slider.delete',$item->id) }}" class="btn btn-danger sm" title="Delete" id="delete" ><i class="fa fa-trash" ></i></a>
                            @if($item->status == 1)
                            <a href="{{ route('slider.inactive',$item->id) }}" class="btn badge-primary sm" title="Inactive Now"><i class="fa fa-arrow-down" ></i></a>
                            @else
                            <a href="{{ route('slider.active',$item->id) }}" class="btn btn-success sm" title="Active Now"><i class="fa fa-arrow-up" ></i></a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
                <tfoot>
                    <tr>
                        <th>Slider Image</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Status</th>
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

