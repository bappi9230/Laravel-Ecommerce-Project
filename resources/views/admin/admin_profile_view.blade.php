@extends('admin.admin_master')
@section('admin')

<div class="container-full">

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="box  bg-img" style="background-color: #e2e8f0">
            <div class="flexbox px-20 pt-20">
                <div></div>
               <a href="{{ route('admin.profile.edit') }}" style="float: right; color:#6b7280"><button type="button"class="btn btn-rounded btn-secondary mb-5">Edit Profile</button></a>
            </div>

            <div class="box-body text-center pb-50">
                <a href="#">
                    <img class="avatar avatar-xxl avatar-bordered" src="{{ (!empty($adminData->profile_photo_path))? url('upload/admin_image/'.$adminData->profile_photo_path): url('upload/no_image.jpg') }}" alt="image">
                </a>
                <h2 class="mt-2 mb-0" style="color:#6b7280">Admin Name:  {{ $adminData->name }}</h2>
                <h4 class="mt-2 mb-0" style="color:#6b7280">Admin Email:  {{ $adminData->email }}</h4>
            </div>

        </div>
    </div>
</section>
<!-- /.content -->
</div>

@endsection
