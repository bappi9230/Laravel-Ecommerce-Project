@extends('frontend.main_master')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    @section('title')
        Shop Page
    @endsection


    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="#">Shop Page</a></li>
                </ul>
            </div>
            <!-- /.breadcrumb-inner -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /.breadcrumb -->
    <div class="body-content outer-top-xs">
        <div class='container'>
            <form action="{{route('shop.filter')}}" method="POST">
                @csrf
                <div class='row'>
                    <div class='col-md-3 sidebar'>
                        <!-- ================================== TOP NAVIGATION ================================== -->
                        @include('frontend.common_part.vertical_navigetion')
                        <!-- /.side-menu -->
                        <!-- ================================== TOP NAVIGATION : END ============================ -->

                        <div class="sidebar-module-container">
                            <div class="sidebar-filter">
                                <!--============================= SIDEBAR CATEGORY ============================== -->
                                <!-- =======shop by category ========-->
                                <div class="sidebar-widget wow fadeInUp">
                                    <h3 class="section-title">shop by</h3>
                                    <div class="widget-header" >
                                        <h4 class="widget-title"> Category </h4>
                                    </div>
                                    <div class="sidebar-widget-body">
                                        <div class="accordion">

                                            @if(!empty($_GET['category']))
                                                @php
                                                    $category_name = explode(',',$_GET['category'])
                                                @endphp
                                            @endif

                                            @foreach($categories as $category)

                                                <div class="accordion-group">
                                                    <div class="accordion-heading">


                                                        <label class="form-check-label">
                                                            <input type="checkbox" name="category[]" value="{{ $category->category_slug_en }}" onchange="this.form.submit()" class="form-check-input" @if(!empty($category_name) && in_array($category->category_slug_en,$category_name)) checked @endif >
                                                            @if(session()->get('language') == 'bangla')
                                                                {{ $category->category_name_bn }}  @else
                                                                {{ $category->category_name_en }} @endif
                                                        </label>

                                                    </div><!-- /.accordion-heading -->

                                                </div><!-- /.accordion-group -->

                                            @endforeach
                                        </div>
                                        <!-- /.accordion -->
                                    </div>
                                    <!-- /.sidebar-widget-body -->
                                </div>

                                  <!-- =======shop by brand ========-->
                                <div class="sidebar-widget wow fadeInUp">
                                    <h3 class="section-title">shop by</h3>
                                    <div class="widget-header" >
                                        <h4 class="widget-title"> Brands </h4>
                                    </div>
                                    <div class="sidebar-widget-body">
                                        <div class="accordion">

                                            @if(!empty($_GET['brand']))
                                                @php
                                                    $brand_name = explode(',',$_GET['brand'])
                                                @endphp
                                            @endif

                                            @foreach($brands as $brand)

                                                <div class="accordion-group">
                                                    <div class="accordion-heading">


                                                        <label class="form-check-label">
                                                            <input type="checkbox" name="brand[]" value="{{ $brand->brand_slug_en }}" onchange="this.form.submit()" class="form-check-input" @if(!empty($brand_name) && in_array($brand->brand_slug_en,$brand_name)) checked @endif >
                                                            @if(session()->get('language') == 'bangla')
                                                                {{ $brand->brand_name_bn }}  @else
                                                                {{ $brand->brand_name_en }} @endif
                                                        </label>

                                                    </div><!-- /.accordion-heading -->

                                                </div><!-- /.accordion-group -->

                                            @endforeach
                                        </div>
                                        <!-- /.accordion -->
                                    </div>
                                    <!-- /.sidebar-widget-body -->
                                </div>
                                <!-- /.sidebar-widget -->
                                <!-- ===================== SIDEBAR CATEGORY : END ============== -->


                                <!-- ======================== PRICE SILDER===================== -->
                                <div class="sidebar-widget wow fadeInUp">
                                    <div class="widget-header">
                                        <h4 class="widget-title">Price Slider</h4>
                                    </div>
                                    <div class="sidebar-widget-body m-t-10">
                                        <div class="price-range-holder"> <span class="min-max"> <span class="pull-left">$200.00</span> <span class="pull-right">$800.00</span> </span>
                                            <input type="text" id="amount" style="border:0; color:#666666; font-weight:bold;text-align:center;">
                                            <input type="text" class="price-slider" value="" >
                                        </div>
                                        <!-- /.price-range-holder -->
                                        <a href="#" class="lnk btn btn-primary">Show Now</a> </div>
                                    <!-- /.sidebar-widget-body -->
                                </div>
                                <!-- /.sidebar-widget -->
                                <!-- ======================= PRICE SILDER : END ============================= -->



                                <!-- ======================== MANUFACTURES=============================== -->
                                {{--                            <div class="sidebar-widget wow fadeInUp">--}}
                                {{--                                <div class="widget-header">--}}
                                {{--                                    <h4 class="widget-title">Manufactures</h4>--}}
                                {{--                                </div>--}}
                                {{--                                <div class="sidebar-widget-body">--}}
                                {{--                                    <ul class="list">--}}
                                {{--                                        <li><a href="#">Forever 18</a></li>--}}
                                {{--                                        <li><a href="#">Nike</a></li>--}}
                                {{--                                        <li><a href="#">Dolce & Gabbana</a></li>--}}
                                {{--                                        <li><a href="#">Alluare</a></li>--}}
                                {{--                                        <li><a href="#">Chanel</a></li>--}}
                                {{--                                        <li><a href="#">Other Brand</a></li>--}}
                                {{--                                    </ul>--}}
                                {{--                                    <!--<a href="#" class="lnk btn btn-primary">Show Now</a>-->--}}
                                {{--                                </div>--}}
                                {{--                                <!-- /.sidebar-widget-body -->--}}
                                {{--                            </div>--}}
                                <!-- /.sidebar-widget -->
                                <!-- =================== MANUFACTURES: END ============================== -->


                                <!-- ========================= COLOR======================== -->
                                {{--                            <div class="sidebar-widget wow fadeInUp">--}}
                                {{--                                <div class="widget-header">--}}
                                {{--                                    <h4 class="widget-title">Colors</h4>--}}
                                {{--                                </div>--}}
                                {{--                                <div class="sidebar-widget-body">--}}
                                {{--                                    <ul class="list">--}}
                                {{--                                        <li><a href="#">Red</a></li>--}}
                                {{--                                        <li><a href="#">Blue</a></li>--}}
                                {{--                                        <li><a href="#">Yellow</a></li>--}}
                                {{--                                        <li><a href="#">Pink</a></li>--}}
                                {{--                                        <li><a href="#">Brown</a></li>--}}
                                {{--                                        <li><a href="#">Teal</a></li>--}}
                                {{--                                    </ul>--}}
                                {{--                                </div>--}}
                                {{--                                <!-- /.sidebar-widget-body -->--}}
                                {{--                            </div>--}}
                                <!-- /.sidebar-widget -->
                                <!-- ===================== COLOR: END ============================== -->


                                <!-- ==================== ==COMPARE============================ -->
                                {{--                            <div class="sidebar-widget wow fadeInUp outer-top-vs">--}}
                                {{--                                <h3 class="section-title">Compare products</h3>--}}
                                {{--                                <div class="sidebar-widget-body">--}}
                                {{--                                    <div class="compare-report">--}}
                                {{--                                        <p>You have no <span>item(s)</span> to compare</p>--}}
                                {{--                                    </div>--}}
                                {{--                                    <!-- /.compare-report -->--}}
                                {{--                                </div>--}}
                                {{--                                <!-- /.sidebar-widget-body -->--}}
                                {{--                            </div>--}}
                                <!-- /.sidebar-widget -->
                                <!-- ====================== COMPARE: END ======================== -->


                                <!-- ====================PRODUCT TAGS ========================== -->
                                @include('frontend.common_part.product_tags')
                                <!-- ====================END PRODUCT TAGS ========================== -->

                                <!----------- Testimonials------------->

                                {{--                            <div class="sidebar-widget  wow fadeInUp outer-top-vs ">--}}
                                {{--                                <div id="advertisement" class="advertisement">--}}
                                {{--                                    <div class="item">--}}
                                {{--                                        <div class="avatar"><img src="assets/images/testimonials/member1.png" alt="Image"></div>--}}
                                {{--                                        <div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>--}}
                                {{--                                        <div class="clients_author">John Doe <span>Abc Company</span> </div>--}}
                                {{--                                        <!-- /.container-fluid -->--}}
                                {{--                                    </div>--}}
                                {{--                                    <!-- /.item -->--}}

                                {{--                                    <div class="item">--}}
                                {{--                                        <div class="avatar"><img src="assets/images/testimonials/member3.png" alt="Image"></div>--}}
                                {{--                                        <div class="testimonials"><em>"</em>Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>--}}
                                {{--                                        <div class="clients_author">Stephen Doe <span>Xperia Designs</span> </div>--}}
                                {{--                                    </div>--}}
                                {{--                                    <!-- /.item -->--}}

                                {{--                                    <div class="item">--}}
                                {{--                                        <div class="avatar"><img src="assets/images/testimonials/member2.png" alt="Image"></div>--}}
                                {{--                                        <div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>--}}
                                {{--                                        <div class="clients_author">Saraha Smith <span>Datsun &amp; Co</span> </div>--}}
                                {{--                                        <!-- /.container-fluid -->--}}
                                {{--                                    </div>--}}
                                {{--                                    <!-- /.item -->--}}

                                {{--                                </div>--}}
                                {{--                                <!-- /.owl-carousel -->--}}
                                {{--                            </div>--}}


                                <!-- ====================== Testimonials: END ========================== -->

                                {{--                            <div class="home-banner"> <img src="assets/images/banners/LHS-banner.jpg" alt="Image"> </div>--}}
                            </div>
                            <!-- /.sidebar-filter -->
                        </div>
                        <!-- /.sidebar-module-container -->
                    </div>
                    <!-- /.sidebar -->
                    <div class='col-md-9'>

                        <!-- ======================= SECTION – HERO =================== -->

                        <div id="category" class="category-carousel hidden-xs">
                            <div class="item">
                                <div class="image"> <img src="{{ asset('frontend/assets/images/banners/cat-banner-1.jpg') }}" alt="" class="img-responsive"> </div>
                                <div class="container-fluid">
                                    <div class="caption vertical-top text-left">
                                        <div class="big-text"> Big Sale </div>
                                        <div class="excerpt hidden-sm hidden-md"> Save up to 49% off </div>
                                        <div class="excerpt-normal hidden-sm hidden-md"> Lorem ipsum dolor sit amet, consectetur adipiscing elit </div>
                                    </div>
                                    <!-- /.caption -->
                                </div>
                                <!-- /.container-fluid -->
                            </div>
                        </div>


                        <div class="clearfix filters-container m-t-10">
                            <div class="row">
                                <div class="col col-sm-6 col-md-2">
                                    <div class="filter-tabs">
                                        <ul id="filter-tabs" class="nav nav-tabs nav-tab-box nav-tab-fa-icon">
                                            <li class="active"> <a data-toggle="tab" href="#grid-container"><i class="icon fa fa-th-large"></i>Grid</a> </li>
                                            <li><a data-toggle="tab" href="#list-container"><i class="icon fa fa-th-list"></i>List</a></li>
                                        </ul>
                                    </div>
                                    <!-- /.filter-tabs -->
                                </div>
                                <!-- /.col -->
                                <div class="col col-sm-12 col-md-6">
                                    <div class="col col-sm-3 col-md-6 no-padding">
                                        <div class="lbl-cnt"> <span class="lbl">Sort by</span>
                                            <div class="fld inline">
                                                <div class="dropdown dropdown-small dropdown-med dropdown-white inline">
                                                    <button data-toggle="dropdown" type="button" class="btn dropdown-toggle"> Position <span class="caret"></span> </button>
                                                    <ul role="menu" class="dropdown-menu">
                                                        <li role="presentation"><a href="#">position</a></li>
                                                        <li role="presentation"><a href="#">Price:Lowest first</a></li>
                                                        <li role="presentation"><a href="#">Price:HIghest first</a></li>
                                                        <li role="presentation"><a href="#">Product Name:A to Z</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- /.fld -->
                                        </div>
                                        <!-- /.lbl-cnt -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col col-sm-3 col-md-6 no-padding">
                                        <div class="lbl-cnt"> <span class="lbl">Show</span>
                                            <div class="fld inline">
                                                <div class="dropdown dropdown-small dropdown-med dropdown-white inline">
                                                    <button data-toggle="dropdown" type="button" class="btn dropdown-toggle"> 1 <span class="caret"></span> </button>
                                                    <ul role="menu" class="dropdown-menu">
                                                        <li role="presentation"><a href="#">1</a></li>
                                                        <li role="presentation"><a href="#">2</a></li>
                                                        <li role="presentation"><a href="#">3</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- /.fld -->
                                        </div>
                                        <!-- /.lbl-cnt -->
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.col -->
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>




                        <!-- ================================== START GRID VIEW ================================= -->


                        <div class="search-result-container ">
                            <div id="myTabContent" class="tab-content category-list">
                                <div class="tab-pane active " id="grid-container">
                                    <div class="category-product">
                                        <div class="row" id="grid_view_product">

                                            @include('frontend.product.grid_view_product')

                                        </div>
                                        <!-- /.row -->
                                    </div>
                                    <!-- /.category-product -->

                                </div>
                                <!-- /.tab-pane -->


                                <!-- =======================   END START GRID VIEW ========================= -->


                                <!-- ============================ START START LIST VIEW =================== -->


                                <div class="tab-pane "  id="list-container">
                                    <div class="category-product" id="list_view_product">

                                        @include('frontend.product.list_view_product')

                                    </div>
                                    <!-- /.category-product -->
                                </div>
                                <!-- /.tab-pane #list-container -->
                            </div>
                            <!-- /.tab-content -->
                            <!-- ============================= END START LIST VIEW ========================= -->

                            {{$products->links('vendor.pagination.custom_pagination')}}
                            <!-- /.filters-container -->

                        </div>
                        <!-- /.search-result-container -->

                    </div>
                    <!-- /.col -->

                    <div class="ajax-loadmore-product text-center"  style="display: none">
                        <img src="{{asset('frontend/assets/images/loading.svg')}}" style="width: 120px;height: 120px;" >
                    </div>



                </div>
                <!-- /.row -->


                <!-- ======== BRANDS CAROUSEL ========================= -->
                @include('frontend.body.brands')
                <!-- /.logo-slider -->
                <!-- =========== BRANDS CAROUSEL : END ==================== -->

            </form>
        </div>
        <!-- /.container -->



    </div>
    <!-- /.body-content -->

@endsection
