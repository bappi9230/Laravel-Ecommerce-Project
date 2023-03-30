@php
  $prefix = Request::route()->getPrefix();
  $route = Route::current()->getName();
@endphp
  <aside class="main-sidebar" style="background-color: #475569;">
    <!-- sidebar-->
    <section class="sidebar">

        <div class="user-profile">
			<div class="ulogo">
				 <a href="index.html">
				  <!-- logo for regular state and mobile devices -->
					 <div class="d-flex align-items-center justify-content-center">
						  <img src="{{ asset('backend/images/logo-dark.png') }}" alt="">
						  <h3 style="color: white;"><b>Super</b> Admin</h3>
					 </div>
				</a>
			</div>
        </div>

      <!-- sidebar menu-->
      <ul class="sidebar-menu" data-widget="tree">
		<li class="{{ ($route == 'dashboard')? 'active live color':'' }}">
          <a class="color" href="{{ url('admin/dashboard') }}">
            <i  data-feather="pie-chart"></i>
			<span >Dashboard</span>
          </a>
        </li>
<!-- admin brand  -->
        <li class="treeview {{ ($prefix == '/brand')?'live':'' }} ">
          <a href="#" class="color" >
            <i  data-feather="message-circle"></i>
            <span>Brand</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ ($route == 'all.brand')? 'active color':'' }}"><a class="color" href="{{ route('all.brand') }}"><i class="ti-more"></i>All Brand</a></li>
          </ul>
        </li>

        <!------------ Admin Category --------- -->
        <li class="treeview {{ ($prefix == '/category')?'live':'' }}">
          <a href="#" class="color" >
            <i data-feather="mail"></i> <span>Category</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu color">
            <li class="{{ ($route == 'all.category')? 'active color':'' }}" ><a class="color" href="{{ route('all.category') }}"><i class="ti-more"></i>All Category</a></li>

            <li class="{{ ($route == 'all.subcategory')? 'active color':'' }}"><a class="color" href="{{ route('all.subcategory') }}"><i class="ti-more"></i>All Subcategory</a></li>

            <li class="{{ ($route == 'all.subSubcategory')? 'active color':'' }}"><a class="color" href="{{ route('all.subSubcategory') }}"><i class="ti-more"></i>All Sub->Subcategory</a></li>
          </ul>
        </li>

        <!------------ deals with  Product --------- -->
        <li class="treeview {{ ($prefix == '/product')?'live':'' }}">
          <a href="#" class="color" >
            <i data-feather="mail"></i> <span>Product</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu color">
            <li class="{{ ($route == 'add.product')? 'active color':'' }}" ><a class="color" href="{{ route('add.product') }}"><i class="ti-more"></i>Add Product</a></li>

            <li class="{{ ($route == 'product.view')? 'active color':'' }}"><a class="color" href="{{ route('product.view') }}"><i class="ti-more"></i>Manage Product</a></li>
          </ul>
        </li>

        <!------------ Slider--------- -->
        <li class="treeview {{ ($prefix == '/slider')?'live':'' }}">
          <a href="#" class="color" >
            <i data-feather="mail"></i> <span>Slider</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu color">
            <li class="{{ ($route == 'manage-slider')? 'active color':'' }}" ><a class="color" href="{{ route('manage-slider') }}"><i class="ti-more"></i>Manage Slider</a></li>
          </ul>
        </li>

          <!------------ Coupons--------- -->
          <li class="treeview {{ ($prefix == '/coupons')?'live':'' }}">
              <a href="#" class="color" >
                  <i data-feather="mail"></i> <span>Coupons</span>
                  <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
              </a>
              <ul class="treeview-menu color">
                  <li class="{{ ($route == 'manage-coupon')? 'active color':'' }}" ><a class="color" href="{{ route('manage-coupon') }}"><i class="ti-more"></i>Manage Coupon</a></li>
              </ul>
          </li>

          <!------------ Shipping Area--------- -->
          <li class="treeview {{ ($prefix == '/shipping')?'live':'' }}">
              <a href="#" class="color" >
                  <i data-feather="mail"></i> <span>Shipping Area</span>
                  <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
              </a>
              <ul class="treeview-menu color">
                  <li class="{{ ($route == 'manage-division')? 'active color':'' }}" ><a class="color" href="{{ route('manage-division') }}"><i class="ti-more"></i>Ship Division</a></li>
                  <li class="{{ ($route == 'manage-district')? 'active color':'' }}" ><a class="color" href="{{ route('manage-district') }}"><i class="ti-more"></i>Ship District</a></li>
              </ul>
          </li>





        <li class="treeview">
          <a href="#">
            <i data-feather="file"></i>
            <span>Pages</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="profile.html"><i class="ti-more"></i>Profile</a></li>
            <li><a href="invoice.html"><i class="ti-more"></i>Invoice</a></li>
            <li><a href="gallery.html"><i class="ti-more"></i>Gallery</a></li>
            <li><a href="faq.html"><i class="ti-more"></i>FAQs</a></li>
            <li><a href="timeline.html"><i class="ti-more"></i>Timeline</a></li>
          </ul>
        </li>

        <li class="header nav-small-cap">User Interface</li>

        <li class="treeview">
          <a href="#">
            <i data-feather="grid"></i>
            <span>Components</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="components_alerts.html"><i class="ti-more"></i>Alerts</a></li>
            <li><a href="components_badges.html"><i class="ti-more"></i>Badge</a></li>
            <li><a href="components_buttons.html"><i class="ti-more"></i>Buttons</a></li>
            <li><a href="components_sliders.html"><i class="ti-more"></i>Sliders</a></li>
            <li><a href="components_dropdown.html"><i class="ti-more"></i>Dropdown</a></li>
            <li><a href="components_modals.html"><i class="ti-more"></i>Modal</a></li>
            <li><a href="components_nestable.html"><i class="ti-more"></i>Nestable</a></li>
            <li><a href="components_progress_bars.html"><i class="ti-more"></i>Progress Bars</a></li>
          </ul>
        </li>

		<li class="treeview">
          <a href="#">
            <i data-feather="credit-card"></i>
            <span>Cards</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
			<li><a href="card_advanced.html"><i class="ti-more"></i>Advanced Cards</a></li>
			<li><a href="card_basic.html"><i class="ti-more"></i>Basic Cards</a></li>
			<li><a href="card_color.html"><i class="ti-more"></i>Cards Color</a></li>
		  </ul>
        </li>
      </ul>
    </section>

	<div class="sidebar-footer"style="background-color: #475569; color:white;">
		<!-- item-->
		<a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
		<!-- item-->
		<a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i class="ti-email"></i></a>
		<!-- item-->
		<a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="ti-lock"></i></a>
	</div>
  </aside>

<style>

   .live{
     border: 1px solid gray;
     color: white;
     box-shadow: 1px 2px gray;
     background-color: gray;
   }
   .color{
    color: white;
   }
</style>
