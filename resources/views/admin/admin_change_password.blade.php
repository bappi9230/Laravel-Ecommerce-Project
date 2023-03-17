@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

<div class="container-full">

<section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Admin Update Password</h4>
			</div>
			<!-- /.box-header -->
            <div class="col-md-6">
             @if(count($errors))
               @foreach($errors->all() as $error)
               <p class="alert alert-danger alert-dismissible fade show">{{ $error }}</p>
               @endforeach
            @endif
            </div>
			<div class="box-body">
			  <div class="row">
				<div class="col">
					<form method="post" action="{{route('admin.update.store')}}">
                        @csrf
					  <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Current Password <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="password" name="oldPassword" id="current_password" class="form-control" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>New Password <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="password" name="password" id="password"  class="form-control" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Re-type Password <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="password" name="password_confirmation" id="password_confirmation"  class="form-control" required="">
                                        </div>
                                    </div>
                                </div>

                                <div class="text-xs-right col-md-6">
                                    <button type="submit" class="btn btn-rounded btn-info">Update  Profile</button>
                                </div>
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
