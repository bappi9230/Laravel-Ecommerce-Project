@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<div class="container-full">
<section class="content pt-0">
    <div class="row">
            <!-- ----------------Edit Slider-------------- -->
    <div class="col-6">

        <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title pl-3 ">Add Slider</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="table-responsive">
					<form method="post" action="{{route('slider.update')}}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $sliders->id }}">
                        <input type="hidden" name="old_image" value="{{ $sliders->slider_img }}">
                        <div class="col-md-12">
                            <div class="form-group">
                                <h5>Slider Title <span class="text-danger">*</span></h5>
                                <div class="controls">
                                   @if($sliders->title)
                                    <input type="text" name="title" class="form-control" value="{{ $sliders->title }}" >
                                   @else
                                    <input type="text" name="title" class="form-control" placeholder=" There is no title" >
                                   @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <h5>Slider Description<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    @if($sliders->description)
                                        <input type="text" name="description"  class="form-control" value="{{ $sliders->description }}" >
                                    @else
                                        <input type="text" name="description"  class="form-control" value="There is no description" >
                                    @endif
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
                                <img id="showImage" src="{{ (!empty($sliders->slider_img))? url($sliders->slider_img): url('upload/no_image.jpg') }}" style="width: 300px;height: 100px;" alt="yes" >
                            </div>

                            <div class="text-xs-right">
                                <input type="submit" class="btn btn-rounded btn-info" value="Update Slider">
                            </div>
                        </div>

					</form>
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

