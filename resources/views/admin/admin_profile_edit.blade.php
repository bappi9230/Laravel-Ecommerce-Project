@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

<div class="container-full">

<section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Admin Profile Edit</h4>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
					<form method="post" action="{{route('admin.profile.store')}}" enctype="multipart/form-data">
                        @csrf
					  <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Admin User Name <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="name" value="{{ $adminData->name }}" class="form-control" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Admin Email<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="email" name="email" value="{{ $adminData->email }}" class="form-control" required="" >
                                        </div>
                                    </div>
                            </div>
                               <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Profile Image <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="file" name="profile_photo_path" class="form-control" required=""id="image">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Profile Image <span class="text-danger">*</span></h5>
                                        <img id="showImage" src="{{ (!empty($adminData->profile_image))? url('upload/admin_image/'.$adminData->profile_image): url('upload/no_image.jpg') }}" style="width: 100px;height: 100px;" alt="yes" >
                                    </div>
                                </div>
                            <div class="text-xs-right">
                                <button type="submit" class="btn btn-rounded btn-info">Update  Profile</button>
                            </div>
                      </div>
					</form>

				</div>
				<!-- /.col -->
			  </div>
			  <!-- /.row -->
			</div>
			<!-- /.box-body -->
		  </div>
		  <!-- /.box -->

		</section>

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
