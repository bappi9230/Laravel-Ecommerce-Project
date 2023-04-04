@extends('frontend.main_master')
@section('content')

<div class="body-content">
    <div class="container">
        <div class="row">
            @include('frontend.common_part.user_sidebar')
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <h2><strong>{{ Auth::user()->name}}</strong> Welcome to Our online Shopping Page.</h2>
            </div>
        </div>
    </div>
</div>

@endsection
