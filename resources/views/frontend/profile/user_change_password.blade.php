@extends('frontend.main_master')
@section('content')
@php
   $user_image = Auth::user();
@endphp
<div class="body-content">
    <div class="container">
        <div class="row">
            @include('frontend.common_part.user_sidebar')
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
