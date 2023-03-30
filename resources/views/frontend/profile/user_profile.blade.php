@extends('frontend.main_master')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<div class="body-content">
    <div class="container">
        <div class="row">
            <div class="col-md-2"><br><br>
                <img class="card-img-top" style="border-radius: 50%; width: 100px; height: 100px;" src="{{ (!empty($userData->profile_photo_path))? url('upload/user_profile_image/'.$userData->profile_photo_path): url('upload/no_image.jpg') }}" alt="image"><br><br>
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
                        <h3 class="text-center"><strong>{{ Auth::user()->name}}</strong> Welcome to Our online Shopping Page.</h3>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('user.profile.store') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="{{ $userData->id }}" name="id">
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Name </label>
                                <input type="text" name="name" value="{{ $userData->name }}" class="form-control unicase-form-control text-input" id="exampleInputEmail1" >
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Email Address </label>
                                <input type="email" name="email" value="{{ $userData->email }}" class="form-control unicase-form-control text-input" id="exampleInputEmail1" >
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Phone</label>
                                <input type="text" name="phone" value="{{ $userData->phone }}" class="form-control unicase-form-control text-input" id="exampleInputEmail1" >
                            </div>

                            <div class="form-group">
                                <label class="info-title" for="image">User Image</label>
                                <input type="file" name="profile_photo_path"  class="form-control unicase-form-control text-input" id="image" >
                            </div>
                             <div class="form-group">
                                <img id="showImage" type="file" src="{{ (!empty($userData->profile_photo_path))? url('upload/user_profile_image/'.$userData->profile_photo_path): url('upload/no_image.jpg') }}" style="width: 100px;height: 100px;" >
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary">Update Profile</button>
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
