@extends('frontend.main_master')
@section('content')

<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="{{ url('/') }}">Home</a></li>
				<li class='active'>Login</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
		<div class="sign-in-page">
			<div class="row">
				<!-- Sign-in -->
<div class="col-md-6 col-sm-6 sign-in">
	<h4 class="">Sign in</h4>
	<p class="">Hello, Welcome to your account.</p>
	<div class="social-sign-in outer-top-xs">
		<a href="#" class="facebook-sign-in"><i class="fa fa-facebook"></i> Sign In with Facebook</a>
		<a href="#" class="twitter-sign-in"><i class="fa fa-twitter"></i> Sign In with Twitter</a>
	</div><br>

    <!-- ================Sign-in=============================== -->

    <form method="POST" action="{{ isset($guard) ? url($guard.'/login') : route('login') }}">
            @csrf

		<div class="form-group">
		    <label class="info-title" for="email">User Name <span>*</span></label>
		     <input type="email" name="email" class="form-control text-input" id="email">
            @error('email')
            <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </div>


	  	<div class="form-group">
		    <label class="info-title" for="password">Password <span>*</span></label>
		    <input type="password" name="password" class="form-control unicase-form-control text-input" id="password" >
		</div>

		<div class="radio outer-xs">
		  	<label>
		    	<input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">Remember me!
		  	</label>
		  	<a href="{{route('password.request')}}" class="forgot-password pull-right">Forgot your Password?</a>
		</div>

	  	<button type="submit" class="btn-upper btn btn-primary checkout-page-button">Login</button>

	</form>


</div>
                <!-- ================end Sign-in=============================== -->



                <!-- ================ Register =============================== -->

<!-- create a new account -->
    <div class="col-md-6 col-sm-6 create-new-account">
    <h4 class="checkout-subtitle">Create a new account</h4>
    <p class="text title-tag-line">Create your new account.</p>
    <form method="POST" action="{{ route('register') }}">
            @csrf

         <div class="form-group">
            <label class="info-title" for="regname">Name <span>*</span></label>
            <input type="text" name="regname" class="form-control unicase-form-control text-input" id="regname" >
            @error('regname')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
         </div>

        <div class="form-group">
            <label class="info-title" for="regemail">Email Address <span>*</span></label>
            <input type="email" name="regemail" class="form-control unicase-form-control text-input" id="regemail" >
            @error('regemail')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label class="info-title" for="exampleInputEmail1">Phone Number <span>*</span></label>
            <input type="text" name="phone" class="form-control unicase-form-control text-input" id="exampleInputEmail1" >
            @error('phone')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label class="info-title" for="exampleInputEmail1">Password <span>*</span></label>
            <input type="password" name="password" class="form-control unicase-form-control text-input" id="exampleInputEmail1" >
             @error('password')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </div>

         <div class="form-group">
            <label class="info-title" for="exampleInputEmail1">Confirm Password <span>*</span></label>
            <input type="password" name="password_confirmation"  class="form-control unicase-form-control text-input" id="exampleInputEmail1" >
        </div>

        <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Sign Up</button>

    </form>

    </div>
 </div><!-- /.row -->

</div><!-- /.sigin-in-->
        <!-- ================End Register =============================== -->


        <!-- ======================== BRANDS CAROUSEL =========================== -->
            @include('frontend.body.brands')
        <!-- ===================== BRANDS CAROUSEL : END =========================== -->

    </div><!-- /.container -->
</div><!-- /.body-content -->
@endsection
