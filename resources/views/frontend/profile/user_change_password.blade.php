@extends('frontend.main_master')
@section('content')
@php
   $user_image = Auth::user();
@endphp
<div class="body-content">
    <div class="container">
        <div class="row">
            <div class="col-md-2"><br><br>
                <img class="card-img-top" style="border-radius: 50%; width: 100%;height: 100%;" src="{{ (!empty($user_image->profile_photo_path))? url('upload/user_profile_image/'.$user_image->profile_photo_path): url('upload/no_image.jpg') }}" alt="image"><br><br>
                <ul class="list-group list-group-flush">
                    <a href="{{ route('dashboard') }}" class="btn btn-primary btn-sm btn-block">Home</a>
                    <a href="{{ route('user.profile') }}" class="btn btn-primary btn-sm btn-block">Profile Update</a>
                    <a href="#" class="btn btn-primary btn-sm btn-block">Change Password</a>
                    <a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm btn-block">Logout</a>
                </ul>
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-6"><br><br>
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center"><strong>User Change Password</strong></h3><br>
                    </div>
                    <div class="card-body">
                        <!-- @if(count($errors))
                            @foreach($errors->all() as $error)
                            <p class="alert alert-danger alert-dismissible fade show">{{ $error }}</p>
                            @endforeach
                        @endif -->
                                    <form method="post" action="{{ route('user.password.store') }}">
                            @csrf
                            <input type="hidden" value="{{ $user_image->id }}" name="id">

                                <div class="form-group">
                                    <h5>Current Password <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="password" name="oldPassword" id="current_password" class="form-control" required="">
                                    </div>
                                    @error('oldPassword')
                                      <span class="text-danger" role="alert" >{{ $message }}</span>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <h5>New Password <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="password" name="password" id="password"  class="form-control" required="">
                                    </div>
                                     @error('password')
                                      <span class="text-danger" role="alert" >{{ $message }}</span>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <h5>Re-type Password <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="password" name="password_confirmation" id="password_confirmation"  class="form-control" required="">
                                    </div>
                                    @error('password_confirmation')
                                      <span class="text-danger" role="alert" >{{ $message }}</span>
                                    @enderror
                                </div>
                            <div class="form-group">
                                <button class="btn btn-primary">Change Password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
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
