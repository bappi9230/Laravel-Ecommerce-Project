@extends('frontend.main_master')
@section('content')

@section('title')
    @if(session()->get('language') == 'bangla') {{ $product->product_name_bn }}
    @else {{ $product->product_name_en }}
    @endif
@endsection

    <!-- ===== ======== HEADER : END ============================================== -->
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Clothing</a></li>
                    <li class='active'>
                        @if(session()->get('language') == 'bangla') {{ $product->product_name_bn }}
                        @else {{ $product->product_name_en }}
                        @endif
                    </li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->
    <div class="body-content outer-top-xs">
        <div class='container'>
            <div class='row single-product'>
                <div class='col-md-3 sidebar'>
                    <div class="sidebar-module-container">
                        <div class="home-banner outer-top-n">
                            <img src="{{ asset('frontend/assets/images/banners/LHS-banner.jpg') }}" alt="Image">
                        </div>



                        <!-- ======================= HOT DEALS ============================== -->
@include('frontend.common_part.hot_deals')
                        <!-- ==================== HOT DEALS: END ================================== -->

                        <!-- ========================= NEWSLETTER =================================== -->
                        <div class="sidebar-widget newsletter wow fadeInUp outer-bottom-small outer-top-vs">
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
                            </div><!-- /.sidebar-widget-body -->
                        </div><!-- /.sidebar-widget -->
                        <!-- ================== NEWSLETTER: END =================================== -->

                        <!-- =========== Testimonials==================================== -->
                        <div class="sidebar-widget  wow fadeInUp outer-top-vs ">
                            <div id="advertisement" class="advertisement">
                                <div class="item">
                                    <div class="avatar"><img src="{{ asset('frontend/assets/images/testimonials/member1.png') }}" alt="Image"></div>
                                    <div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
                                    <div class="clients_author">John Doe	<span>Abc Company</span>	</div><!-- /.container-fluid -->
                                </div><!-- /.item -->

                                <div class="item">
                                    <div class="avatar"><img src="{{ asset('frontend/assets/images/testimonials/member3.png') }}" alt="Image"></div>
                                    <div class="testimonials"><em>"</em>Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
                                    <div class="clients_author">Stephen Doe	<span>Xperia Designs</span>	</div>
                                </div><!-- /.item -->

                                <div class="item">
                                    <div class="avatar"><img src="{{ asset('frontend/assets/images/testimonials/member2.png') }}" alt="Image"></div>
                                    <div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
                                    <div class="clients_author">Saraha Smith	<span>Datsun &amp; Co</span>	</div><!-- /.container-fluid -->
                                </div><!-- /.item -->

                            </div><!-- /.owl-carousel -->
                        </div>

                        <!-- ==================== Testimonials: END =========================== -->
                    </div>
                </div><!-- /.sidebar -->


                <div class='col-md-9'>
                    <div class="detail-block">
                        <div class="row  wow fadeInUp">

                            <div class="col-xs-12 col-sm-6 col-md-5 gallery-holder">
                                <div class="product-item-holder size-big single-product-gallery small-gallery">
                                    <div id="owl-single-product">
                                    @foreach($multi_image as $img)
                                        <div class="single-product-gallery-item" id="slide{{ $img->id }}">
                                            <a data-lightbox="image-1" data-title="Gallery" href="{{ asset($img->photo_name) }}">
                                                <img class="img-responsive" alt="" src="{{ asset($img->photo_name) }}" data-echo="{{ asset($img->photo_name) }}" />
                                            </a>
                                        </div><!-- /.single-product-gallery-item -->
                                    @endforeach
                                    </div><!-- /.single-product-slider -->


                                    <div class="single-product-gallery-thumbs gallery-thumbs">
                                        <div id="owl-single-product-thumbnails">
                                            @foreach($multi_image as $img)
                                            <div class="item">
                                                <a class="horizontal-thumb active" data-target="#owl-single-product" data-slide="1" href="#slide{{ $img->id }}">
                                                    <img class="img-responsive" width="85" alt="" src="{{ asset($img->photo_name) }}" data-echo="{{ asset($img->photo_name) }}" />
                                                </a>
                                            </div>
                                            @endforeach
                                        </div><!-- /#owl-single-product-thumbnails -->

                                    </div><!-- /.gallery-thumbs -->

                                </div><!-- /.single-product-gallery -->
                            </div><!-- /.gallery-holder -->
                            <div class='col-sm-6 col-md-7 product-info-block'>
                                <div class="product-info">
                                    <h1 class="name" id="pname">@if(session()->get('language') == 'bangla') {{$product->product_name_bn}} @else {{ $product->product_name_en }} @endif</h1>

                                    <div class="rating-reviews m-t-20">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <div class="rating rateit-small"></div>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="reviews">
                                                    <a href="#" class="lnk">(13 Reviews)</a>
                                                </div>
                                            </div>
                                        </div><!-- /.row -->
                                    </div><!-- /.rating-reviews -->

                                    <div class="stock-container info-container m-t-10">
                                        <div class="row">
                                            <div class="col-sm-2">
                                                <div class="stock-box">
                                                    <span class="label">Availability :</span>
                                                </div>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="stock-box">
                                                    <span class="value">In Stock</span>
                                                </div>
                                            </div>
                                        </div><!-- /.row -->
                                    </div><!-- /.stock-container -->

                                    <div class="description-container m-t-20">
                                        @if(session()->get('language') == 'bangla') {{ $product->short_descp_bn }}  @else {{ $product->short_descp_en }} @endif
                                    </div><!-- /.description-container -->

                                    <div class="price-container info-container m-t-20">
                                        <div class="row">

                                            <div class="col-sm-6">
                                                <div class="price-box">
                                                    @if($product->discount_price == NULL || $product->discount_price == 0)
                                                    <span class="price">{{ $product->selling_price }}</span>
                                                    @else
                                                        <span class="price">{{ $product->discount_price }}</span>
                                                        <span class="price-strike">{{ $product->selling_price }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="favorite-button m-t-10">
                                                    <a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="Wishlist" href="#">
                                                        <i class="fa fa-heart"></i>
                                                    </a>
                                                    <a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="Add to Compare" href="#">
                                                        <i class="fa fa-signal"></i>
                                                    </a>
                                                    <a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="E-mail" href="#">
                                                        <i class="fa fa-envelope"></i>
                                                    </a>
                                                </div>
                                            </div>

                                        </div><!-- /.row -->
                                    </div><!-- /.price-container -->


                                    <div class="price-container info-container m-t-20">
                                        <div class="row">

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    @if($product->product_color_en ==NULL || $product->product_color_bn=NULL)
                                                    @else
                                                        <label class="info-title control-label"> @if(session()->get('language') == 'bangla') রঙ চয়ন করুন @else Choose Color @endif <span>*</span></label>
                                                        <select id="color" class="form-control unicase-form-control selectpicker" style="display: none;">
                                                            @if(session()->get('language') == 'bangla')
                                                                <option value="---" disabled selected>--বিকল্প নির্বাচন করুন--</option>
                                                                @foreach($product_color_bn as $color)
                                                                    <option value="{{ $color }}">{{ $color }}</option>
                                                                @endforeach
                                                            @else
                                                                <option value="---" disabled selected>--Select options--</option>
                                                                @foreach($product_color_en as $color)
                                                                    <option value="{{ $color }}">{{ $color }}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                @if($product->product_size_en ==NULL || $product->product_size_bn ==NULL)
                                                @else
                                                    <div class="form-group">
                                                        <label class="info-title control-label"> @if(session()->get('language') == 'bangla') আকার নির্বাচন করুন @else Choose Size @endif <span>*</span></label>
                                                        <select id="size" class="form-control unicase-form-control selectpicker" style="display: none;">
                                                            @if(session()->get('language') == 'bangla')
                                                                <option value="---" selected disabled>--বিকল্প নির্বাচন করুন--</option>
                                                                @foreach($product_size_bn as $size)
                                                                    <option value="{{ $size }}">{{ $size }}</option>
                                                                @endforeach
                                                            @else
                                                                <option value="---" selected disabled>--Select options--</option>
                                                                @foreach($product_size_en as $size)
                                                                    <option value="{{ $size }}">{{ $size }}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>

                                                @endif
                                            </div>

                                        </div><!-- /.row -->
                                    </div><!-- /.price-container -->

                                    <div class="quantity-container info-container">
                                        <div class="row">

                                            <div class="col-sm-2">
                                                <span class="label">Qty :</span>
                                            </div>

                                            <div class="col-sm-2">
                                                <div class="cart-quantity">
                                                    <div class="quant-input">
                                                        <input type="number" value="1" min="1" id="qty">
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" id="product_id" value="{{ $product->id }}" min="1">
                                            <div class="col-sm-7">
                                                <button type="submit" class="btn btn-primary" onclick="addToCart()"><i class="fa fa-shopping-cart inner-right-vs"></i> ADD TO CART</button>
                                            </div>


                                        </div><!-- /.row -->
                                    </div><!-- /.quantity-container -->




                                    <!-- ShareThis BEGIN --><div class="sharethis-inline-share-buttons"></div><!-- ShareThis END -->


                                </div><!-- /.product-info -->
                            </div><!-- /.col-sm-7 -->
                        </div><!-- /.row -->
                    </div>

                    <div class="product-tabs inner-bottom-xs  wow fadeInUp">
                        <div class="row">
                            <div class="col-sm-3">
                                <ul id="product-tabs" class="nav nav-tabs nav-tab-cell">
                                    <li class="active"><a data-toggle="tab" href="#description">DESCRIPTION</a></li>
                                    <li><a data-toggle="tab" href="#review">REVIEW</a></li>
                                    <li><a data-toggle="tab" href="#tags">TAGS</a></li>
                                </ul><!-- /.nav-tabs #product-tabs -->
                            </div>
                            <div class="col-sm-9">

                                <div class="tab-content">

                                    <div id="description" class="tab-pane in active">
                                        <div class="product-tab">
                                            <p class="text">@if(session()->get('language') == 'bangla') {!! $product->long_descp_bn !!}  @else {!! $product->long_descp_en !!} @endif</p>
                                        </div>
                                    </div><!-- /.tab-pane -->

                                    <div id="review" class="tab-pane">
                                        <div class="product-tab">

                                            <div class="product-reviews">
                                                <h4 class="title">Customer Reviews</h4>
                                                @php
                                                 $reviews = App\Models\Review::where('product_id',$product->id)->latest()->limit(5)->get();
                                                @endphp
                                                <div class="reviews">
                                                    @foreach($reviews as $item)
                                                        @if($item->status == 1)
                                                        <div class="review">
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <img style="border-radius: 50%" src="{{ (!empty($item->user->profile_photo_path))? url('upload/user_profile_image/'.$item->user->profile_photo_path):url('upload/no_image.jpg') }}" width="40px;" height="40px;"><b> {{ $item->user->name }}</b>
                                                                </div>
                                                                <div class="col-md-9"></div>
                                                            </div>
                                                            <div class="review-title">
                                                                <span class="summary">{{$item->summary}}</span>
                                                                <span class="date"><i class="fa fa-calendar"></i>
                                                                    <span>{{Carbon\Carbon::parse($item->created_at)->diffForHumans()}}</span>
                                                                </span>
                                                            </div>
                                                            <div class="text">{{$item->comment}}</div>
                                                        </div>
                                                        @endif
                                                    @endforeach

                                                </div><!-- /.reviews -->
                                            </div><!-- /.product-reviews -->



                                            <div class="product-add-review">

{{--                                                <div class="review-table">--}}
{{--                                                    <div class="table-responsive">--}}
{{--                                                        <table class="table">--}}
{{--                                                            <thead>--}}
{{--                                                            <tr>--}}
{{--                                                                <th class="cell-label">&nbsp;</th>--}}
{{--                                                                <th>1 star</th>--}}
{{--                                                                <th>2 stars</th>--}}
{{--                                                                <th>3 stars</th>--}}
{{--                                                                <th>4 stars</th>--}}
{{--                                                                <th>5 stars</th>--}}
{{--                                                            </tr>--}}
{{--                                                            </thead>--}}
{{--                                                            <tbody>--}}
{{--                                                            <tr>--}}
{{--                                                                <td class="cell-label">Quality</td>--}}
{{--                                                                <td><input type="radio" name="quality" class="radio" value="1"></td>--}}
{{--                                                                <td><input type="radio" name="quality" class="radio" value="2"></td>--}}
{{--                                                                <td><input type="radio" name="quality" class="radio" value="3"></td>--}}
{{--                                                                <td><input type="radio" name="quality" class="radio" value="4"></td>--}}
{{--                                                                <td><input type="radio" name="quality" class="radio" value="5"></td>--}}
{{--                                                            </tr>--}}
{{--                                                            <tr>--}}
{{--                                                                <td class="cell-label">Price</td>--}}
{{--                                                                <td><input type="radio" name="quality" class="radio" value="1"></td>--}}
{{--                                                                <td><input type="radio" name="quality" class="radio" value="2"></td>--}}
{{--                                                                <td><input type="radio" name="quality" class="radio" value="3"></td>--}}
{{--                                                                <td><input type="radio" name="quality" class="radio" value="4"></td>--}}
{{--                                                                <td><input type="radio" name="quality" class="radio" value="5"></td>--}}
{{--                                                            </tr>--}}
{{--                                                            <tr>--}}
{{--                                                                <td class="cell-label">Value</td>--}}
{{--                                                                <td><input type="radio" name="quality" class="radio" value="1"></td>--}}
{{--                                                                <td><input type="radio" name="quality" class="radio" value="2"></td>--}}
{{--                                                                <td><input type="radio" name="quality" class="radio" value="3"></td>--}}
{{--                                                                <td><input type="radio" name="quality" class="radio" value="4"></td>--}}
{{--                                                                <td><input type="radio" name="quality" class="radio" value="5"></td>--}}
{{--                                                            </tr>--}}
{{--                                                            </tbody>--}}
{{--                                                        </table><!-- /.table .table-bordered -->--}}
{{--                                                    </div><!-- /.table-responsive -->--}}
{{--                                                </div><!-- /.review-table -->--}}


                                                @guest
                                                    <p> <b> For Add Product Review. You Need to Login First <a href="{{ route('login') }}">Login Here</a> </b> </p>
                                                @else

                                                <div class="review-form">
                                                    <div class="form-container">
                                                        <form role="form" method="post" class="cnt-form" action="{{route('review.store',$product->id)}}">
                                                            @csrf
                                                            <div class="row">
                                                                <div class="col-sm-6">


                                                                    <div class="form-group">
                                                                        <label for="exampleInputSummary">Summary <span class="astk">*</span></label>
                                                                        <input type="text" name="summary" class="form-control txt" id="exampleInputSummary" placeholder="">
                                                                    </div><!-- /.form-group -->

                                                                </div>

                                                                <div class="col-md-6">

                                                                    <div class="form-group">
                                                                        <label for="exampleInputReview">Review <span class="astk">*</span></label>
                                                                        <textarea class="form-control txt txt-review" name="comment" id="exampleInputReview" rows="4" placeholder=""></textarea>
                                                                    </div><!-- /.form-group -->
                                                                </div>

                                                            </div><!-- /.row -->

                                                            <div class="action text-right">
                                                                <button class="btn btn-primary btn-upper">SUBMIT REVIEW</button>
                                                            </div><!-- /.action -->

                                                        </form><!-- /.cnt-form -->
                                                    </div><!-- /.form-container -->
                                                </div><!-- /.review-form -->

                                                @endguest
                                            </div><!-- /.product-add-review -->

                                        </div><!-- /.product-tab -->
                                    </div><!-- /.tab-pane -->



                                    <div id="tags" class="tab-pane">
                                        <div class="product-tag">

                                            <h4 class="title">Product Tags</h4>
                                            <form role="form" class="form-inline form-cnt">
                                                <div class="form-container">

                                                    <div class="form-group">
                                                        <label for="exampleInputTag">Add Your Tags: </label>
                                                        <input type="email" id="exampleInputTag" class="form-control txt">


                                                    </div>

                                                    <button class="btn btn-upper btn-primary" type="submit">ADD TAGS</button>
                                                </div><!-- /.form-container -->
                                            </form><!-- /.form-cnt -->

                                            <form role="form" class="form-inline form-cnt">
                                                <div class="form-group">
                                                    <label>&nbsp;</label>
                                                    <span class="text col-md-offset-3">Use spaces to separate tags. Use single quotes (') for phrases.</span>
                                                </div>
                                            </form><!-- /.form-cnt -->

                                        </div><!-- /.product-tab -->
                                    </div><!-- /.tab-pane -->




                                </div><!-- /.tab-content -->
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.product-tabs -->

                    <!-- ========================= UPSELL PRODUCTS =============================== -->
                    <section class="section featured-product wow fadeInUp">
                        <h3 class="section-title">Related Products</h3>
                        <div class="owl-carousel home-owl-carousel upsell-product custom-carousel owl-theme outer-top-xs">

                            @foreach($relatedProduct as $product)
                            <div class="item item-carousel">
                                <div class="products">

                                    <div class="product">
                                        <div class="product-image">
                                            <div class="image">
                                                <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en) }}"><img  src="{{ asset($product->product_thumbnail) }}" alt="">
                                                </a>
                                            </div><!-- /.image -->

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
                                        </div><!-- /.product-image -->


                                        <div class="product-info text-left">
                                            <h3 class="name"><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en) }}">@if(session()->get('language') == 'bangla') {{ $product->product_name_bn }}  @else {{ $product->product_name_en }}  @endif</a></h3>
                                            <div class="rating rateit-small"></div>
                                            <div class="description"></div>

                                            <div class="product-price">

                                                @if( $product->discount_price == NULL || $product->discount_price == 0)
                                                    <span class="price">$ {{ $product->selling_price }}</span>
                                                @else
                                                    <span class="price"> ${{ $product->discount_price }} </span>
                                                    <span class="price-before-discount">$ {{ $product->selling_price }}</span>
                                                @endif

                                            </div><!-- /.product-price -->

                                        </div><!-- /.product-info -->
                                        <div class="cart clearfix animate-effect">
                                            <div class="action">
                                                <ul class="list-unstyled">
                                                    <li class="add-cart-button btn-group">
                                                        <button class="btn btn-primary icon" data-toggle="dropdown" type="button">
                                                            <i class="fa fa-shopping-cart"></i>
                                                        </button>
                                                        <button class="btn btn-primary cart-btn" type="button" title="@if(session()->get('language') == 'bangla') কার্টে যোগ করুন @else Add Cart @endif">@if(session()->get('language') == 'bangla') কার্টে যোগ করুন @else Add to cart @endif</button>

                                                    </li>

                                                    <li class="lnk wishlist">
                                                        <a class="add-to-cart" href="detail.html" title="@if(session()->get('language') == 'bangla') ইচ্ছেতালিকা @else Wishlist @endif ">
                                                            <i class="icon fa fa-heart"></i>
                                                        </a>
                                                    </li>

                                                    <li class="lnk">
                                                        <a class="add-to-cart" href="detail.html" title="@if(session()->get('language') == 'bangla') তুলনা করা @else Compare @endif ">
                                                            <i class="fa fa-signal"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div><!-- /.action -->
                                        </div><!-- /.cart -->
                                    </div><!-- /.product -->

                                </div><!-- /.products -->
                            </div><!-- /.item -->
                            @endforeach
                        </div><!-- /.home-owl-carousel -->
                    </section><!-- /.section -->
                    <!-- ===================== UPSELL PRODUCTS : END ============================ -->

                </div><!-- /.col -->
                <div class="clearfix"></div>
            </div><!-- /.row -->
        </div>

        <script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=643140ea1cdb86001a1ecf74&product=inline-share-buttons' async='async'></script>


@endsection
