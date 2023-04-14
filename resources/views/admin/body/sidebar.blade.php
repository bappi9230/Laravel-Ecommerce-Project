@php
  $prefix = Request::route()->getPrefix();
  $route = Route::current()->getName();
        $brand = (auth()->guard('admin')->user()->brand == 1);
        $category = (auth()->guard('admin')->user()->category == 1);
        $product = (auth()->guard('admin')->user()->product == 1);
        $slider = (auth()->guard('admin')->user()->slider == 1);
        $coupons = (auth()->guard('admin')->user()->coupons == 1);
        $shipping = (auth()->guard('admin')->user()->shipping == 1);
        $blog = (auth()->guard('admin')->user()->blog == 1);
        $setting = (auth()->guard('admin')->user()->setting == 1);
        $returnorder = (auth()->guard('admin')->user()->returnorder == 1);
        $review = (auth()->guard('admin')->user()->review == 1);
        $orders = (auth()->guard('admin')->user()->orders == 1);
        $stock = (auth()->guard('admin')->user()->stock == 1);
        $reports = (auth()->guard('admin')->user()->reports == 1);
        $alluser = (auth()->guard('admin')->user()->alluser == 1);
        $adminuserrole = (auth()->guard('admin')->user()->adminuserrole == 1);

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
						  <h3 style="color: white;"><b>Admin</b>Dashboard</h3>
					 </div>
				</a>
			</div>
        </div>

      <!-- sidebar menu-->
      <ul class="sidebar-menu" data-widget="tree">
		<li class="{{ ($route == 'dashboard')? 'active live color':'' }}">
          <a class="color" href="{{ url('admin/dashboard') }}">
            <i style="color: white;"  data-feather="pie-chart"></i>
			<span >Dashboard</span>
          </a>
        </li>

        @if($brand == true)
        <!-- admin brand  -->
        <li class="treeview {{ ($prefix == '/brand')?'live':'' }} ">
          <a href="#" class="color" >
            <i style="color: white;"  data-feather="file"></i>
            <span>Brand</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ ($route == 'all.brand')? 'active color':'' }}"><a class="color" href="{{ route('all.brand') }}"><i class="ti-more"></i>All Brand</a></li>
          </ul>
        </li>
          @endif

          @if($category == true)
        <!------------ Admin Category --------- -->
        <li class="treeview {{ ($prefix == '/category')?'live':'' }}">
          <a href="#" class="color" >
            <i style="color: white;" data-feather="file"></i> <span>Category</span>
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
          @endif

          @if($product == true)
        <!------------ deals with  Product --------- -->
        <li class="treeview {{ ($prefix == '/product')?'live':'' }}">
          <a href="#" class="color" >
            <i style="color: white;" data-feather="file"></i> <span>Product</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu color">
            <li class="{{ ($route == 'add.product')? 'active color':'' }}" ><a class="color" href="{{ route('add.product') }}"><i class="ti-more"></i>Add Product</a></li>

            <li class="{{ ($route == 'product.view')? 'active color':'' }}"><a class="color" href="{{ route('product.view') }}"><i class="ti-more"></i>Manage Product</a></li>
          </ul>
        </li>
          @endif

          @if($slider ==true)
        <!------------ Slider--------- -->
        <li class="treeview {{ ($prefix == '/slider')?'live':'' }}">
          <a href="#" class="color" >
            <i style="color: white;" data-feather="file"></i> <span>Slider</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu color">
            <li class="{{ ($route == 'manage-slider')? 'active color':'' }}" ><a class="color" href="{{ route('manage-slider') }}"><i class="ti-more"></i>Manage Slider</a></li>
          </ul>
        </li>
          @endif

          @if($coupons == true)
          <!------------ Coupons--------- -->
          <li class="treeview {{ ($prefix == '/coupons')?'live':'' }}">
              <a href="#" class="color" >
                  <i style="color: white;" data-feather="file"></i> <span>Coupons</span>
                  <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
              </a>
              <ul class="treeview-menu color">
                  <li class="{{ ($route == 'manage-coupon')? 'active color':'' }}" ><a class="color" href="{{ route('manage-coupon') }}"><i class="ti-more"></i>Manage Coupon</a></li>
              </ul>
          </li>
          @endif

          @if($shipping ==true)
          <!------------ Shipping Area--------- -->
          <li class="treeview {{ ($prefix == '/shipping')?'live':'' }}">
              <a href="#" class="color" >
                  <i style="color: white;" data-feather="file"></i> <span>Shipping Area</span>
                  <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
              </a>
              <ul class="treeview-menu color">
                  <li class="{{ ($route == 'manage-division')? 'active color':'' }}" ><a class="color" href="{{ route('manage-division') }}"><i class="ti-more"></i>Ship Division</a></li>

                  <li class="{{ ($route == 'manage-district')? 'active color':'' }}" ><a class="color" href="{{ route('manage-district') }}"><i class="ti-more"></i>Ship District</a></li>

                  <li class="{{ ($route == 'manage-state')? 'active color':'' }}" ><a class="color" href="{{ route('manage-state') }}"><i class="ti-more"></i>Ship State</a></li>
              </ul>
          </li>
          @endif

          @if($setting ==true)

          <!------------ Site Settings--------- -->
          <li class="treeview {{ ($prefix == '/setting')?'live':'' }}">
              <a href="#" class="color" >
                  <i style="color: white;" data-feather="file"></i> <span>Manage Setting</span>
                  <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
              </a>
              <ul class="treeview-menu color">
                  <li class="{{ ($route == 'site.setting')? 'active color':'' }}" ><a class="color" href="{{ route('site.setting') }}"><i class="ti-more"></i>Site Setting</a></li>

                  <li class="{{ ($route == 'seo.setting')? 'active color':'' }}" ><a class="color" href="{{ route('seo.setting') }}"><i class="ti-more"></i>Seo Setting</a></li>

              </ul>
          </li>
          @endif

          @if($review == true)
          <!------------ manage review--------- -->

          <li class="treeview {{ ($prefix == '/review')?'live':'' }}">
              <a href="#" class="color" >
                  <i style="color: white;" data-feather="file"></i> <span>Manage Review</span>
                  <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
              </a>
              <ul class="treeview-menu color">
                  <li class="{{ ($route == 'pending.review')? 'active color':'' }}" ><a class="color" href="{{ route('pending.review') }}"><i class="ti-more"></i>Pending Review</a></li>

                  <li class="{{ ($route == 'publish.review')? 'active color':'' }}" ><a class="color" href="{{ route('publish.review') }}"><i class="ti-more"></i>Publish Review</a></li>

              </ul>
          </li>
          @endif

          @if($returnorder == true)

          <!------------ Return order-------- -->
          <li class="treeview {{ ($prefix == '/return')?'live':'' }}">
              <a href="#" class="color" >
                  <i style="color: white;" data-feather="file"></i> <span>Return Order</span>
                  <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
              </a>
              <ul class="treeview-menu color">
                  <li class="{{ ($route == 'return.request')? 'active color':'' }}" ><a class="color" href="{{ route('return.request') }}"><i class="ti-more"></i>Return Request</a></li>

                  <li class="{{ ($route == 'all.request')? 'active color':'' }}" ><a class="color" href="{{ route('all.request') }}"><i class="ti-more"></i>All Request</a></li>

              </ul>
          </li>
          @endif

          @if($blog == true)

          <!--============ blog =================== -->

          <li class="treeview {{ ($prefix == '/blog')?'live':'' }}">
              <a href="#" class="color" >
                  <i style="color: white;" data-feather="file"></i> <span> Manage Blog</span>
                  <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
              </a>
              <ul class="treeview-menu color">
                  <li class="{{ ($route == 'blog.category')? 'active color':'' }}" ><a class="color" href="{{ route('blog.category') }}"><i class="ti-more"></i>Blog Category</a></li>

                  <li class="{{ ($route == 'list.post')? 'active color':'' }}" ><a class="color" href="{{ route('list.post') }}"><i class="ti-more"></i>List Blog Post</a></li>

                  <li class="{{ ($route == 'add.post')? 'active color':'' }}" ><a class="color" href="{{ route('add.post') }}"><i class="ti-more"></i>Add Blog Post</a></li>

              </ul>
          </li>
          @endif




        <li class="header nav-small-cap" style="color: white">User Interface</li>



        @if($orders == true)
          <!------------ Shipping Area--------- -->
          <li class="treeview {{ ($prefix == '/orders')?'live':'' }}">
              <a href="#" class="color" >
                  <i style="color: white;" data-feather="file"></i> <span>Orders</span>
                  <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
              </a>
              <ul class="treeview-menu color">
                  <li class="{{ ($route == 'pending-orders')? 'active color':'' }}" ><a class="color" href="{{ route('pending-orders') }}"><i class="ti-more"></i>Pending Order</a></li>

                  <li class="{{ ($route == 'confirmed-orders')? 'active color':'' }}" ><a class="color" href="{{ route('confirmed-orders') }}"><i class="ti-more"></i>Confirmed Order</a></li>

                  <li class="{{ ($route == 'processing-orders')? 'active color':'' }}" ><a class="color" href="{{ route('processing-orders') }}"><i class="ti-more"></i>Processing Order</a></li>

                  <li class="{{ ($route == 'picked-orders')? 'active color':'' }}" ><a class="color" href="{{ route('picked-orders') }}"><i class="ti-more"></i>Picked Order</a></li>

                  <li class="{{ ($route == 'shipped-orders')? 'active color':'' }}" ><a class="color" href="{{ route('shipped-orders') }}"><i class="ti-more"></i>Shipped Order</a></li>

                  <li class="{{ ($route == 'delivered-orders')? 'active color':'' }}" ><a class="color" href="{{ route('delivered-orders') }}"><i class="ti-more"></i>Delivered Order</a></li>

                  <li class="{{ ($route == 'cancel-orders')? 'active color':'' }}" ><a class="color" href="{{ route('cancel-orders') }}"><i class="ti-more"></i>Cancel Order</a></li>


              </ul>
          </li>
          @endif

          @if($stock == true)
          <!------------ Stock Manage --------- -->

          <li class="treeview {{ ($prefix == '/stock')?'live':'' }}">
              <a href="#" class="color" >
                  <i style="color: white;" data-feather="file"></i> <span>Stock Manage</span>
                  <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
              </a>
              <ul class="treeview-menu color">
                  <li class="{{ ($route == 'product.stock')? 'active color':'' }}" ><a class="color" href="{{ route('product.stock') }}"><i class="ti-more"></i>Product Stock</a></li>

              </ul>
          </li>
          @endif

          @if($reports == true)
          <!------------ Report Area--------- -->

          <li class="treeview {{ ($prefix == '/reports')?'live':'' }}">
              <a href="#" class="color" >
                  <i style="color: white;" data-feather="file"></i> <span> All Reports</span>
                  <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
              </a>
              <ul class="treeview-menu color">
                  <li class="{{ ($route == 'all.reports')? 'active color':'' }}" ><a class="color" href="{{ route('all.reports') }}"><i class="ti-more"></i>All Reports</a></li>

              </ul>
          </li>
          @endif

        @if($alluser == true)
            <!--============ all users =================== -->

          <li class="treeview {{ ($prefix == '/alluser')?'live':'' }}">
              <a href="#" class="color" >
                  <i style="color: white;" data-feather="file"></i> <span> All User</span>
                  <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
              </a>
              <ul class="treeview-menu color">
                  <li class="{{ ($route == 'all.users')? 'active color':'' }}" ><a class="color" href="{{ route('all.users') }}"><i class="ti-more"></i>All User</a></li>

              </ul>
          </li>
          @endif

          @if($adminuserrole == true)
          <!--============ admin user role =================== -->

          <li class="treeview {{ ($prefix == '/adminuserrole')?'live':'' }}">
              <a href="#" class="color" >
                  <i style="color: white;" data-feather="file"></i> <span> Admin User Role</span>
                  <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
              </a>
              <ul class="treeview-menu color">
                  <li class="{{ ($route == 'all.admin.user')? 'active color':'' }}" ><a class="color" href="{{ route('all.admin.user') }}"><i class="ti-more"></i>All Admin User</a></li>

              </ul>
          </li>
          @endif

      </ul>
    </section>

	<div class="sidebar-footer"style="background-color: #475569; color:white;">
		<!-- item-->
		<a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings" aria-describedby="tooltip92529"><i style="color: white;" class="ti-settings"></i></a>
		<!-- item-->
		<a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i style="color: white;" class="ti-email"></i></a>
		<!-- item-->
		<a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i  style="color: white;" class="ti-lock"></i></a>
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
