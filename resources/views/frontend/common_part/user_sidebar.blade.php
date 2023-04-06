

<div class="col-md-2"><br><br>
    <img class="card-img-top" style="border-radius: 50%; width: 100%;height: 100%;" src="{{ (!empty(Auth::user()->profile_photo_path))? url('upload/user_profile_image/'.Auth::user()->profile_photo_path): url('upload/no_image.jpg') }}" alt="image"><br><br>
    <ul class="list-group list-group-flush">
        <a href="{{ url('/') }}" class="btn btn-primary btn-sm btn-block">Home</a>
        <a href="{{ route('user.profile') }}" class="btn btn-primary btn-sm btn-block">Profile Update</a>
        <a href="{{ route('user.change.password') }}" class="btn btn-primary btn-sm btn-block">Change Password</a>
        <a href="{{ route('user.order') }}" class="btn btn-primary btn-sm btn-block">My Order</a>
        <a href="{{ route('return.order.list') }}" class="btn btn-primary btn-sm btn-block">Return Order List</a>
        <a href="{{ route('cancel.order.list') }}" class="btn btn-primary btn-sm btn-block">Cancel Order</a>
        <a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm btn-block">Logout</a>
    </ul>
</div>
