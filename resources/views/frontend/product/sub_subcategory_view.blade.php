@extends('frontend.main_master')
@section('content')
    @section('title')
        Sub SubCategory Product
    @endsection
    @php
        $categories = App\Models\Category::latest()->get();
    @endphp
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="#">Home</a></li>

                    @foreach($breadSubSubCat as $item)
                        <li class="active">{{ $item->category->category_name_en }}</li>
                    @endforeach

                    @foreach($breadSubSubCat as $item)
                        <li class="active">{{ $item->subcategory->subcategory_name_en }}</li>
                    @endforeach

                    @foreach($breadSubSubCat as $item)
                        <li class='active'>{{ $item->subSubcategory_name_en }}</li>
                    @endforeach

                </ul>
            </div>
            <!-- /.breadcrumb-inner -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /.breadcrumb -->
    <div class="body-content outer-top-xs">
        <div class='container'>
            <div class='row'>
                <div class='col-md-3 sidebar'>
                    <!-- ================================== TOP NAVIGATION ================================== -->
                    @include('frontend.common_part.vertical_navigetion')
                    <!-- /.side-menu -->
                    <!-- ================================== TOP NAVIGATION : END ============================ -->

                    <div class="sidebar-module-container">
                        <div class="sidebar-filter">
                            <!--============================= SIDEBAR CATEGORY ============================== -->
                            <div class="sidebar-widget wow fadeInUp">
                                <h3 class="section-title">shop by</h3>
                                <div class="widget-header">
                                    <h4 class="widget-title">Category</h4>
                                </div>
                                <div class="sidebar-widget-body">
                                    <div class="accordion">
                                        @foreach($categories as $category)

                                            <div class="accordion-group">
                                                <div class="accordion-heading"> <a href="#collapse{{ $category->id }}" data-toggle="collapse" class="accordion-toggle collapsed">
                                                        @if(session()->get('language') == 'bangla') {{ $category->category_name_bn }}  @else {{ $category->category_name_en }} @endif </a> </div>
                                                <!-- /.accordion-heading -->
                                                <div class="accordion-body collapse" id="collapse{{ $category->id }}" style="height: 0px;">
                                                    <div class="accordion-inner">
                                                        @php
                                                            $subcategories = App\models\SubCategory::where('category_id',$category->id)->orderBy('subcategory_name_en','ASC')->get();
                                                        @endphp
                                                        @foreach($subcategories as $subcategory)
                                                            <ul>
                                                                <li><a href="{{ url('product/subcategory/'.$subcategory->id.'/'.$subcategory->subcategory_slug_en) }}">@if(session()->get('language') == 'bangla') {{$subcategory->subcategory_name_bn}}  @else {{$subcategory->subcategory_name_en}} @endif</a>
                                                                </li>
                                                            </ul>
                                                        @endforeach
                                                    </div>
                                                    <!-- /.accordion-inner -->
                                                </div>
                                                <!-- /.accordion-body -->
                                            </div>
                                            <!-- /.accordion-group -->
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




                            <!-- ====================PRODUCT TAGS ========================== -->
                            @include('frontend.common_part.product_tags')
                            <!-- ====================END PRODUCT TAGS ========================== -->

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
                                                    <li role="presentation"><a href="#">4</a></li>
                                                    <li role="presentation"><a href="#">5</a></li>
                                                    <li role="presentation"><a href="#">6</a></li>
                                                    <li role="presentation"><a href="#">7</a></li>
                                                    <li role="presentation"><a href="#">8</a></li>
                                                    <li role="presentation"><a href="#">9</a></li>
                                                    <li role="presentation"><a href="#">10</a></li>
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
                                    <div class="row">


                                        @foreach($products as $product)
                                            <div class="col-sm-6 col-md-4 wow fadeInUp">
                                                <div class="products">
                                                    <div class="product">
                                                        <div class="product-image">
                                                            <div class="image"> <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en) }}"><img  src="{{ asset($product->product_thumbnail) }}" alt=""></a> </div>
                                                            <!-- /.image -->
                                                            @php
                                                                $amount = $product->selling_price - $product->discount_price;
                                                                $discount_price = round(( $amount / $product->selling_price) *100);
                                                            @endphp
                                                            @if( $product->discount_price == NULL || $product->discount_price == 0)
                                                                <div class="tag new"><span>@if(session()->get('language') == 'bangla') নতুন  @else New  @endif</span></div>
                                                            @else
                                                                {{--<div class="tag hot"><span> {{ $discount_price }}% </span></div>--}}
                                                                <div class="tag hot"><span>{{ $discount_price }}% </span></div>
                                                            @endif
                                                        </div>
                                                        <!-- /.product-image -->

                                                        <div class="product-info text-left">
                                                            <h3 class="name"><a href="detail.html">@if(session()->get('language') == 'bangla') {{ $product->product_name_bn }}  @else {{ $product->product_name_en }}  @endif </a></h3>
                                                            <div class="rating rateit-small"></div>
                                                            <div class="description"></div>
                                                            <div class="product-price">
                                                                @if( $product->discount_price == NULL || $product->discount_price == 0)
                                                                    <div class="product-price">
                                                                        <span class="price">$ {{ $product->selling_price }}</span>
                                                                    </div>
                                                                @else
                                                                    <div class="product-price">
                                                                        <span class="price"> ${{ $product->discount_price }} </span>
                                                                        <span class="price-before-discount">$ {{ $product->selling_price }}</span>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                            <!-- /.product-price -->

                                                        </div>
                                                        <!-- /.product-info -->
                                                        <div class="cart clearfix animate-effect">
                                                            <div class="action">
                                                                <ul class="list-unstyled">
                                                                    <li class="add-cart-button btn-group">
                                                                        <button class="btn btn-primary icon" type="button" title="@if(session()->get('language') == 'bangla') কার্টে যোগ করুন @else Add Cart @endif" data-toggle="modal" data-target="#exampleModal" id="{{ $product->id }}" onclick="productView(this.id)">
                                                                            <i class="fa fa-shopping-cart"></i>
                                                                        </button>
                                                                        <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                                                    </li>
                                                                    <button  id="{{$product->id}}" onclick="addToWishlist(this.id)" class="add-to-cart rounded" style="padding-bottom:5px;background-color: #0c85d0;outline: none; " title=" @if(session()->get('language') == 'bangla') ইচ্ছেতালিকা @else Wishlist @endif "> <i class="icon fa fa-heart" style="margin-top:8px;color: white;"></i>
                                                                    </button>
                                                                    <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal"></i> </a> </li>
                                                                </ul>
                                                            </div>
                                                            <!-- /.action -->
                                                        </div>
                                                        <!-- /.cart -->
                                                    </div>
                                                    <!-- /.product -->

                                                </div>
                                                <!-- /.products -->
                                            </div>
                                            <!-- /.item -->
                                        @endforeach

                                    </div>
                                    <!-- /.row -->
                                </div>
                                <!-- /.category-product -->

                            </div>
                            <!-- /.tab-pane -->


                            <!-- =======================   END START GRID VIEW ========================= -->


                            <!-- ============================ START START LIST VIEW =================== -->


                            <div class="tab-pane "  id="list-container">
                                <div class="category-product">
                                    @foreach($products as $product)
                                        <div class="category-product-inner wow fadeInUp">
                                            <div class="products">
                                                <div class="product-list product">
                                                    <div class="row product-list-row">
                                                        <div class="col col-sm-4 col-lg-4">
                                                            <div class="product-image">
                                                                <div class="image"> <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en) }}" > <img src="{{ asset($product->product_thumbnail) }}" alt=""></a> </div>
                                                            </div>
                                                            <!-- /.product-image -->
                                                        </div>
                                                        <!-- /.col -->
                                                        <div class="col col-sm-8 col-lg-8">
                                                            <div class="product-info">
                                                                <h3 class="name"><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en) }}">@if(session()->get('language') == 'bangla'){{ $product->product_name_bn }} @else {{ $product->product_name_en }} @endif</a></h3>
                                                                <div class="rating rateit-small"></div>
                                                                <div class="product-price">
                                                                    <div class="product-price">
                                                                        @php
                                                                            $amount = $product->selling_price - $product->discount_price;
                                                                            $discount_price = round(( $amount / $product->selling_price) *100);
                                                                        @endphp
                                                                        @if( $product->discount_price == NULL || $product->discount_price == 0)
                                                                            <span class="price">$ {{ $product->selling_price }}</span>
                                                                        @else
                                                                            <span class="price"> ${{ $product->discount_price }} </span>
                                                                            <span class="price-before-discount">$ {{ $product->selling_price }}</span>
                                                                        @endif
                                                                        <!-- /.product-price -->
                                                                    </div>
                                                                </div>
                                                                <!-- /.product-price -->
                                                                <div class="description m-t-10">@if(session()->get('language') == 'bangla') {{ $product->short_descp_bn }}  @else {{ $product->short_descp_en }}  @endif</div>
                                                                <div class="cart clearfix animate-effect">
                                                                    <div class="action">
                                                                        <ul class="list-unstyled">
                                                                            <li class="add-cart-button btn-group">
                                                                                <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                                                                                <button class="btn btn-primary cart-btn" type="button">@if(session()->get('language') == 'bangla') কার্টে যোগ করুন @else Add Cart @endif</button>
                                                                            </li>
                                                                            <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="@if(session()->get('language') == 'bangla') ইচ্ছেতালিকা @else Wishlist @endif "> <i class="icon fa fa-heart"></i> </a> </li>
                                                                            <li class="lnk"> <a class="add-to-cart" href="detail.html" title="@if(session()->get('language') == 'bangla') তুলনা করা @else Compare @endif"> <i class="fa fa-signal"></i> </a> </li>
                                                                        </ul>
                                                                    </div>
                                                                    <!-- /.action -->
                                                                </div>
                                                                <!-- /.cart -->

                                                            </div>
                                                            <!-- /.product-info -->
                                                        </div>
                                                        <!-- /.col -->
                                                    </div>
                                                    <!-- /.product-list-row -->
                                                    @php
                                                        $amount = $product->selling_price - $product->discount_price;
                                                        $discount_price = round(( $amount / $product->selling_price) *100);
                                                    @endphp
                                                    @if( $product->discount_price == NULL || $product->discount_price == 0)
                                                        <div class="tag new"><span>@if(session()->get('language') == 'bangla') নতুন  @else New  @endif</span></div>
                                                    @else
                                                        <div class="tag hot"><span>{{ $discount_price }}% </span></div>
                                                    @endif
                                                </div>
                                                <!-- /.product-list -->
                                            </div>
                                            <!-- /.products -->
                                        </div>
                                        <!-- /.category-product-inner -->
                                    @endforeach
                                </div>
                                <!-- /.category-product -->
                            </div>
                            <!-- /.tab-pane #list-container -->
                        </div>
                        <!-- /.tab-content -->
                        <!-- ============================= END START LIST VIEW ========================= -->


                        <div class="clearfix filters-container">
                            <div class="text-right">
                                <div class="pagination-container">
                                    <ul class="list-inline list-unstyled">
                                        {{ $products->links() }}
                                    </ul>
                                    <!-- /.list-inline -->
                                </div>
                                <!-- /.pagination-container --> </div>
                            <!-- /.text-right -->

                        </div>
                        <!-- /.filters-container -->

                    </div>
                    <!-- /.search-result-container -->

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
            <!-- ========================= BRANDS CAROUSEL ============================================== -->
            @include('frontend.body.brands')
            <!-- /.logo-slider -->
            <!-- ================ BRANDS CAROUSEL : END ================================= --> </div>
        <!-- /.container -->

    </div>
    <!-- /.body-content -->


@endsection
