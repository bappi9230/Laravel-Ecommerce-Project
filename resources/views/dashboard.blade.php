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
                    <a href="#" class="btn btn-primary btn-sm btn-block">Home</a>
                    <a href="{{ route('user.profile') }}" class="btn btn-primary btn-sm btn-block">Profile Update</a>
                    <a href="{{ route('user.change.password') }}" class="btn btn-primary btn-sm btn-block">Change Password</a>
                    <a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm btn-block">Logout</a>
                </ul>
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <h2><strong>{{ Auth::user()->name}}</strong> Welcome to Our online Shopping Page.</h2>
            </div>
        </div>
    </div>
</div>

@endsection
