<div class="col-xs-12 col-sm-12 col-md-3 sidebar">

    <!-- ================================== TOP NAVIGATION ================================== -->
    @include('frontend.common_part.vertical_navigetion')
    <!-- /.side-menu -->
    <!-- ================================== TOP NAVIGATION : END ================================== -->


    <!-- =================== HOT DEALS ====================== -->
@include('frontend.common_part.hot_deals')
    <!-- ===================END HOT DEALS ====================== -->


    <!-- ============================== SPECIAL OFFER ============================= -->
    <div class="sidebar-widget outer-bottom-small wow fadeInUp">
        <h3 class="section-title">@if(session()->get('language') == 'bangla') বিশেষ প্রস্তাব @else Special Offer @endif</h3>
        <div class="sidebar-widget-body outer-top-xs">
            @foreach($special_offer as $product)
                <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">
                    <div class="item">
                        <div class="products special-product">
                            <div class="product">
                                <div class="product-micro">
                                    <div class="row product-micro-row">
                                        <div class="col col-xs-5">
                                            <div class="product-image">
                                                <div class="image"> <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en) }}"> <img src="{{ asset($product->product_thumbnail) }}" alt=""> </a> </div>
                                                <!-- /.image -->

                                            </div>
                                            <!-- /.product-image -->
                                        </div>
                                        <!-- /.col -->
                                        <div class="col col-xs-7">
                                            <div class="product-info">
                                                <h3 class="name"><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en) }}">@if(session()->get('language') == 'bangla'){{ $product->product_name_bn }} @else {{ $product->product_name_en }} @endif</a></h3>
                                                <div class="rating rateit-small"></div>
                                                <div class="product-price"> <span class="price">${{ $product->selling_price }} </span> </div>
                                                <!-- /.product-price -->

                                            </div>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.product-micro-row -->
                                </div>
                                <!-- /.product-micro -->

                            </div>
                        </div>
                    </div>
                </div>
            @endforeach  <!--End speacial offer -->
        </div>
        <!-- /.sidebar-widget-body -->
    </div>
    <!-- /.sidebar-widget -->
    <!-- ============================================ SPECIAL OFFER : END ============================== -->


    <!-- ============================================== PRODUCT TAGS ============================================== -->
     @include('frontend.common_part.product_tags')
    <!-- /.sidebar-widget -->
    <!-- ===================== PRODUCT TAGS : END ================== -->


    <!-- ================= SPECIAL DEALS ================== -->

    <div class="sidebar-widget outer-bottom-small wow fadeInUp">
        <h3 class="section-title">@if(session()->get('language') == 'bangla') বিশেষ চুক্তি @else Special Deals @endif </h3>
        <div class="sidebar-widget-body outer-top-xs">
                @foreach($special_deals as $product)
            <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">
                    <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">
                        <div class="item">
                            <div class="products special-product">
                                <div class="product">
                                    <div class="product-micro">
                                        <div class="row product-micro-row">
                                            <div class="col col-xs-5">
                                                <div class="product-image">
                                                    <div class="image"> <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en) }}"> <img src="{{ asset($product->product_thumbnail) }}" alt=""> </a> </div>
                                                    <!-- /.image -->

                                                </div>
                                                <!-- /.product-image -->
                                            </div>
                                            <!-- /.col -->
                                            <div class="col col-xs-7">
                                                <div class="product-info">
                                                    <h3 class="name"><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en) }}">@if(session()->get('language') == 'bangla'){{ $product->product_name_bn }} @else {{ $product->product_name_en }} @endif</a></h3>
                                                    <div class="rating rateit-small"></div>
                                                    <div class="product-price"> <span class="price">${{ $product->selling_price }} </span> </div>
                                                    <!-- /.product-price -->

                                                </div>
                                            </div>
                                            <!-- /.col -->
                                        </div>
                                        <!-- /.product-micro-row -->
                                    </div>
                                    <!-- /.product-micro -->

                                </div>
                            </div>
                        </div>
                    </div>
            </div>
                @endforeach  <!--End Special deal-->
        </div>
        <!-- /.sidebar-widget-body -->
    </div>
    <!-- /.sidebar-widget -->

    <!-- =============== SPECIAL DEALS : END =============== -->


    <!-- =============== NEWSLETTER ==================== -->

    <div class="sidebar-widget newsletter wow fadeInUp outer-bottom-small">
        <h3 class="section-title">Newsletters</h3>
        <div class="sidebar-widget-body outer-top-xs">
            <p>Sign Up for Our Newsletter!</p>
            <form>
                <div class="form-group">
                    <label class="sr-only" for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Subscribe to our newsletter">
                </div>
                <button class="btn btn-primary">Subscribe</button>
            </form>
        </div>
        <!-- /.sidebar-widget-body -->
    </div>
    <!-- /.sidebar-widget -->
    <!-- ============== NEWSLETTER: END ================== -->

</div>
