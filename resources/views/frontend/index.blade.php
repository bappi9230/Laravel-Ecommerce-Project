@extends('frontend.main_master')
@section('content')

@section('title')
    Online shop
@endsection


<div class="body-content outer-top-xs" id="top-banner-and-menu">
  <div class="container">
    <div class="row">

      <!-- ============================================== SIDEBAR ============================================== -->
      @include('frontend.body.side_bar')
      <!-- /.sidemenu-holder -->
      <!-- ============================================== SIDEBAR : END ============================================== -->


      <!-- ============================================== CONTENT ============================================== -->
      <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">


        <!-- ========================================== SECTION – HERO ========================================= -->
        <div id="hero">
          <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
           @foreach($sliders as $slider)
            <div class="item" style="background-image:url('{{ asset($slider->slider_img) }}')">
              <div class="container-fluid">
                <div class="caption bg-color vertical-center text-left">
                  <div class="big-text fadeInDown-1"> {{ $slider->title }} </div>
                  <div class="excerpt fadeInDown-2 hidden-xs"> <span>{{ $slider->description }}</span> </div>
                  <div class="button-holder fadeInDown-3"> <a href="index.php?page=single-product" class="btn-lg btn btn-uppercase btn-primary shop-now-button">Shop Now</a> </div>
                </div>
                <!-- /.caption -->
              </div>
              <!-- /.container-fluid -->
            </div>
            @endforeach
            <!-- /.item -->
          </div>
          <!-- /.owl-carousel -->
        </div>
        <!-- ========================================= SECTION – HERO : END ========================================= -->


        <!-- ============================================== INFO BOXES ============================================== -->
        <div class="info-boxes wow fadeInUp">
          <div class="info-boxes-inner">
            <div class="row">
              <div class="col-md-6 col-sm-4 col-lg-4">
                <div class="info-box">
                  <div class="row">
                    <div class="col-xs-12">
                      <h4 class="info-box-heading green">money back</h4>
                    </div>
                  </div>
                  <h6 class="text">30 Days Money Back Guarantee</h6>
                </div>
              </div>
              <!-- .col -->

              <div class="hidden-md col-sm-4 col-lg-4">
                <div class="info-box">
                  <div class="row">
                    <div class="col-xs-12">
                      <h4 class="info-box-heading green">free shipping</h4>
                    </div>
                  </div>
                  <h6 class="text">Shipping on orders over $99</h6>
                </div>
              </div>
              <!-- .col -->

              <div class="col-md-6 col-sm-4 col-lg-4">
                <div class="info-box">
                  <div class="row">
                    <div class="col-xs-12">
                      <h4 class="info-box-heading green">Special Sale</h4>
                    </div>
                  </div>
                  <h6 class="text">Extra $5 off on all items </h6>
                </div>
              </div>
              <!-- .col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.info-boxes-inner -->

        </div>
        <!-- /.info-boxes -->
        <!-- ============================================== INFO BOXES : END ============================================== -->


        <!-- ============================================== SCROLL TABS ============================================== -->
        <div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
          <div class="more-info-tab clearfix ">
            <h3 class="new-product-title pull-left">@if(session()->get('language') == 'bangla') নতুন পণ্য @else New Products @endif</h3>

            <ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">
              <li class="active"><a data-transition-type="backSlide" href="#all" data-toggle="tab"> @if(session()->get('language') == 'bangla') সব @else All @endif</a></li>
                @foreach($categories as $category)
              <li><a data-transition-type="backSlide" href="#category{{$category->id}}" data-toggle="tab">
                      @if(session()->get('language') == 'bangla') {{ $category->category_name_bn }}  @else {{ $category->category_name_en }} @endif
                      </a></li>
                @endforeach

            </ul>
            <!-- /.nav-tabs -->
          </div>
          <div class="tab-content outer-top-xs">
            <div class="tab-pane in active" id="all">
              <div class="product-slider">
                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">

                  @foreach($products as $product)
                    <div class="item item-carousel">
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
{{--                                <div class="tag hot"><span> {{ $discount_price }}% </span></div>--}}
                                <div class="tag hot"><span>{{ $discount_price }}% </span></div>
                            @endif
                        </div>
                        <!-- /.product-image -->

                        <div class="product-info text-left">
                          <h3 class="name"><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en) }}">@if(session()->get('language') == 'bangla'){{ $product->product_name_bn }} @else {{ $product->product_name_en }} @endif</a></h3>
                          <div class="rating rateit-small"></div>
                          <div class="description"></div>
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

                                      <button class="btn btn-primary cart-btn" type="button">@if(session()->get('language') == 'bangla') কার্টে যোগ করুন @else Add to cart @endif</button>


                                  </li>

                                  <button  id="{{$product->id}}" onclick="addToWishlist(this.id)" class="add-to-cart rounded" style="padding-bottom:5px;background-color: #0c85d0;outline: none; " title=" @if(session()->get('language') == 'bangla') ইচ্ছেতালিকা @else Wishlist @endif "> <i class="icon fa fa-heart" style="margin-top:8px;color: white;"></i>
                                  </button>

                                  <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="@if(session()->get('language') == 'bangla') তুলনা করা @else Compare @endif "> <i class="fa fa-signal" aria-hidden="true"></i> </a>
                                  </li>

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
                    @endforeach   <!-- end product foreach  -->



                </div>
                <!-- /.home-owl-carousel -->
              </div>
              <!-- /.product-slider -->
            </div>
            <!-- /.tab-pane -->

              @foreach($categories as $category)
              <div class="tab-pane" id="category{{$category->id}}">
                  <div class="product-slider">
                      <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">
          @php
            $categoryWiseData = App\Models\Product::where('category_id',$category->id)->orderBy('id','DESC')->get();
          @endphp
                          @forelse($categoryWiseData as $product)
                              <div class="item item-carousel">
                                  <div class="products">
                                      <div class="product">
                                          <div class="product-image">
                                              <div class="image"> <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en) }}"><img  src="{{ asset($product->product_thumbnail) }}" alt=""></a> </div>
                                              <!-- /.image -->
                                              @php
                                                  $amount = $product->selling_price - $product->discount_price;
                                                  $discount_price = round(($amount / $product->selling_price) *100);
                                              @endphp
                                              @if( $product->discount_price == NULL || $product->discount_price == 0)
                                                  <div class="tag new"><span>@if(session()->get('language') == 'bangla') নতুন  @else New  @endif</span></div>
                                              @else
                                                  {{--  <div class="tag hot"><span> {{ $discount_price }}% </span></div>--}}
                                                  <div class="tag hot"><span>{{ $discount_price }}% </span></div>
                                              @endif
                                          </div>
                                          <!-- /.product-image -->

                                          <div class="product-info text-left">
                                              <h3 class="name"><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en) }}">@if(session()->get('language') == 'bangla'){{ $product->product_name_bn }} @else {{ $product->product_name_en }} @endif</a></h3>
                                              <div class="rating rateit-small"></div>
                                              <div class="description"></div>

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

                                                          <button class="btn btn-primary cart-btn" type="button">@if(session()->get('language') == 'bangla') কার্টে যোগ করুন @else Add to cart @endif</button>


                                                      </li>

                                                      <button  id="{{$product->id}}" onclick="addToWishlist(this.id)" class="add-to-cart rounded" style="padding-bottom:5px;background-color: #0c85d0;outline: none; " title=" @if(session()->get('language') == 'bangla') ইচ্ছেতালিকা @else Wishlist @endif "> <i class="icon fa fa-heart" style="margin-top:8px;color: white;"></i>
                                                      </button>

                                                      <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="@if(session()->get('language') == 'bangla') তুলনা করা @else Compare @endif "> <i class="fa fa-signal" aria-hidden="true"></i> </a>
                                                      </li>

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
                          @empty
                              <h5 class="text-danger"> @if(session()->get('language') == 'bangla') কোন পণ্য পাওয়া যায়নি @else No product found @endif</h5>

                          @endforelse   <!-- end product foreach  -->

                      </div>
                      <!-- /.home-owl-carousel -->
                  </div>
                  <!-- /.product-slider -->
              </div>
              <!-- /.tab-pane -->
              @endforeach   <!--end category foreach -->


            <div class="tab-pane" id="smartphone">
              <div class="product-slider">
                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme">
                  <div class="item item-carousel">
                    <div class="products">
                      <div class="product">
                        <div class="product-image">
                          <div class="image"> <a href="detail.html"><img  src="{{ asset('frontend/assets/images/products/p5.jpg') }}" alt=""></a> </div>
                          <!-- /.image -->

                          <div class="tag sale"><span>sale</span></div>
                        </div>
                        <!-- /.product-image -->

                        <div class="product-info text-left">
                          <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                          <div class="rating rateit-small"></div>
                          <div class="description"></div>
                          <div class="product-price"> <span class="price"> $450.99 </span> <span class="price-before-discount">$ 800</span> </div>
                          <!-- /.product-price -->

                        </div>
                        <!-- /.product-info -->
                        <div class="cart clearfix animate-effect">
                          <div class="action">
                            <ul class="list-unstyled">
                              <li class="add-cart-button btn-group">
                                <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                                <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                              </li>
                              <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                              <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
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

                  <div class="item item-carousel">
                    <div class="products">
                      <div class="product">
                        <div class="product-image">
                          <div class="image"> <a href="detail.html"><img  src="{{ asset('frontend/assets/images/products/p6.jpg') }}" alt=""></a> </div>
                          <!-- /.image -->

                          <div class="tag new"><span>new</span></div>
                        </div>
                        <!-- /.product-image -->

                        <div class="product-info text-left">
                          <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                          <div class="rating rateit-small"></div>
                          <div class="description"></div>
                          <div class="product-price"> <span class="price"> $450.99 </span> <span class="price-before-discount">$ 800</span> </div>
                          <!-- /.product-price -->

                        </div>
                        <!-- /.product-info -->
                        <div class="cart clearfix animate-effect">
                          <div class="action">
                            <ul class="list-unstyled">
                              <li class="add-cart-button btn-group">
                                <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                                <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                              </li>
                              <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                              <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
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

                  <div class="item item-carousel">
                    <div class="products">
                      <div class="product">
                        <div class="product-image">
                          <div class="image"> <a href="detail.html"><img  src="{{ asset('frontend/assets/images/products/p7.jpg') }}" alt=""></a> </div>
                          <!-- /.image -->

                          <div class="tag sale"><span>sale</span></div>
                        </div>
                        <!-- /.product-image -->

                        <div class="product-info text-left">
                          <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                          <div class="rating rateit-small"></div>
                          <div class="description"></div>
                          <div class="product-price"> <span class="price"> $450.99 </span> <span class="price-before-discount">$ 800</span> </div>
                          <!-- /.product-price -->

                        </div>
                        <!-- /.product-info -->
                        <div class="cart clearfix animate-effect">
                          <div class="action">
                            <ul class="list-unstyled">
                              <li class="add-cart-button btn-group">
                                <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                                <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                              </li>
                              <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                              <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
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

                  <div class="item item-carousel">
                    <div class="products">
                      <div class="product">
                        <div class="product-image">
                          <div class="image"> <a href="detail.html"><img  src="{{ asset('frontend/assets/images/products/p8.jpg') }}" alt=""></a> </div>
                          <!-- /.image -->

                          <div class="tag new"><span>new</span></div>
                        </div>
                        <!-- /.product-image -->

                        <div class="product-info text-left">
                          <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                          <div class="rating rateit-small"></div>
                          <div class="description"></div>
                          <div class="product-price"> <span class="price"> $450.99 </span> <span class="price-before-discount">$ 800</span> </div>
                          <!-- /.product-price -->

                        </div>
                        <!-- /.product-info -->
                        <div class="cart clearfix animate-effect">
                          <div class="action">
                            <ul class="list-unstyled">
                              <li class="add-cart-button btn-group">
                                <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                                <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                              </li>
                              <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                              <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
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

                  <div class="item item-carousel">
                    <div class="products">
                      <div class="product">
                        <div class="product-image">
                          <div class="image"> <a href="detail.html"><img  src="{{ asset('frontend/assets/images/products/p9.jpg') }}" alt=""></a> </div>
                          <!-- /.image -->

                          <div class="tag hot"><span>hot</span></div>
                        </div>
                        <!-- /.product-image -->

                        <div class="product-info text-left">
                          <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                          <div class="rating rateit-small"></div>
                          <div class="description"></div>
                          <div class="product-price"> <span class="price"> $450.99 </span> <span class="price-before-discount">$ 800</span> </div>
                          <!-- /.product-price -->

                        </div>
                        <!-- /.product-info -->
                        <div class="cart clearfix animate-effect">
                          <div class="action">
                            <ul class="list-unstyled">
                              <li class="add-cart-button btn-group">
                                <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                                <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                              </li>
                              <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                              <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
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

                  <div class="item item-carousel">
                    <div class="products">
                      <div class="product">
                        <div class="product-image">
                          <div class="image"> <a href="detail.html"><img  src="{{ asset('frontend/assets/images/products/p10.jpg') }}" alt=""></a> </div>
                          <!-- /.image -->

                          <div class="tag hot"><span>hot</span></div>
                        </div>
                        <!-- /.product-image -->

                        <div class="product-info text-left">
                          <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                          <div class="rating rateit-small"></div>
                          <div class="description"></div>
                          <div class="product-price"> <span class="price"> $450.99 </span> <span class="price-before-discount">$ 800</span> </div>
                          <!-- /.product-price -->

                        </div>
                        <!-- /.product-info -->
                        <div class="cart clearfix animate-effect">
                          <div class="action">
                            <ul class="list-unstyled">
                              <li class="add-cart-button btn-group">
                                <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                                <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                              </li>
                              <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                              <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
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
                </div>
                <!-- /.home-owl-carousel -->
              </div>
              <!-- /.product-slider -->
            </div>
            <!-- /.tab-pane -->

            <div class="tab-pane" id="laptop">
              <div class="product-slider">
                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme">
                  <div class="item item-carousel">
                    <div class="products">
                      <div class="product">
                        <div class="product-image">
                          <div class="image"> <a href="detail.html"><img  src="{{ asset('frontend/assets/images/products/p11.jpg') }}" alt=""></a> </div>
                          <!-- /.image -->

                          <div class="tag new"><span>new</span></div>
                        </div>
                        <!-- /.product-image -->

                        <div class="product-info text-left">
                          <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                          <div class="rating rateit-small"></div>
                          <div class="description"></div>
                          <div class="product-price"> <span class="price"> $450.99 </span> <span class="price-before-discount">$ 800</span> </div>
                          <!-- /.product-price -->

                        </div>
                        <!-- /.product-info -->
                        <div class="cart clearfix animate-effect">
                          <div class="action">
                            <ul class="list-unstyled">
                              <li class="add-cart-button btn-group">
                                <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                                <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                              </li>
                              <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                              <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
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

                  <div class="item item-carousel">
                    <div class="products">
                      <div class="product">
                        <div class="product-image">
                          <div class="image"> <a href="detail.html"><img  src="{{ asset('frontend/assets/images/products/p12.jpg') }}" alt=""></a> </div>
                          <!-- /.image -->

                          <div class="tag new"><span>new</span></div>
                        </div>
                        <!-- /.product-image -->

                        <div class="product-info text-left">
                          <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                          <div class="rating rateit-small"></div>
                          <div class="description"></div>
                          <div class="product-price"> <span class="price"> $450.99 </span> <span class="price-before-discount">$ 800</span> </div>
                          <!-- /.product-price -->

                        </div>
                        <!-- /.product-info -->
                        <div class="cart clearfix animate-effect">
                          <div class="action">
                            <ul class="list-unstyled">
                              <li class="add-cart-button btn-group">
                                <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                                <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                              </li>
                              <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                              <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
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

                  <div class="item item-carousel">
                    <div class="products">
                      <div class="product">
                        <div class="product-image">
                          <div class="image"> <a href="detail.html"><img  src="{{ asset('frontend/assets/images/products/p13.jpg') }}" alt=""></a> </div>
                          <!-- /.image -->

                          <div class="tag sale"><span>sale</span></div>
                        </div>
                        <!-- /.product-image -->

                        <div class="product-info text-left">
                          <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                          <div class="rating rateit-small"></div>
                          <div class="description"></div>
                          <div class="product-price"> <span class="price"> $450.99 </span> <span class="price-before-discount">$ 800</span> </div>
                          <!-- /.product-price -->

                        </div>
                        <!-- /.product-info -->
                        <div class="cart clearfix animate-effect">
                          <div class="action">
                            <ul class="list-unstyled">
                              <li class="add-cart-button btn-group">
                                <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                                <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                              </li>
                              <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                              <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
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

                  <div class="item item-carousel">
                    <div class="products">
                      <div class="product">
                        <div class="product-image">
                          <div class="image"> <a href="detail.html"><img src="{{ asset('frontend/assets/images/products/p14.jpg') }}" alt=""></a> </div>
                          <!-- /.image -->

                          <div class="tag hot"><span>hot</span></div>
                        </div>
                        <!-- /.product-image -->

                        <div class="product-info text-left">
                          <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                          <div class="rating rateit-small"></div>
                          <div class="description"></div>
                          <div class="product-price"> <span class="price"> $450.99 </span> <span class="price-before-discount">$ 800</span> </div>
                          <!-- /.product-price -->

                        </div>
                        <!-- /.product-info -->
                        <div class="cart clearfix animate-effect">
                          <div class="action">
                            <ul class="list-unstyled">
                              <li class="add-cart-button btn-group">
                                <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                                <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                              </li>
                              <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                              <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
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

                  <div class="item item-carousel">
                    <div class="products">
                      <div class="product">
                        <div class="product-image">
                          <div class="image"> <a href="detail.html"><img  src="{{ asset('frontend/assets/images/products/p15.jpg') }}" alt="image"></a> </div>
                          <!-- /.image -->

                          <div class="tag hot"><span>hot</span></div>
                        </div>
                        <!-- /.product-image -->

                        <div class="product-info text-left">
                          <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                          <div class="rating rateit-small"></div>
                          <div class="description"></div>
                          <div class="product-price"> <span class="price"> $450.99 </span> <span class="price-before-discount">$ 800</span> </div>
                          <!-- /.product-price -->

                        </div>
                        <!-- /.product-info -->
                        <div class="cart clearfix animate-effect">
                          <div class="action">
                            <ul class="list-unstyled">
                              <li class="add-cart-button btn-group">
                                <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                                <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                              </li>
                              <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                              <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
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

                  <div class="item item-carousel">
                    <div class="products">
                      <div class="product">
                        <div class="product-image">
                          <div class="image"> <a href="detail.html"><img src="{{ asset('frontend/assets/images/products/p16.jpg') }}" alt=""></a> </div>
                          <!-- /.image -->

                          <div class="tag sale"><span>sale</span></div>
                        </div>
                        <!-- /.product-image -->

                        <div class="product-info text-left">
                          <h3 class="name"><a href="detail.html">Apple Iphone 5s 32GB</a></h3>
                          <div class="rating rateit-small"></div>
                          <div class="description"></div>
                          <div class="product-price"> <span class="price"> $450.99 </span> <span class="price-before-discount">$ 800</span> </div>
                          <!-- /.product-price -->

                        </div>
                        <!-- /.product-info -->
                        <div class="cart clearfix animate-effect">
                          <div class="action">
                            <ul class="list-unstyled">
                              <li class="add-cart-button btn-group">
                                <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                                <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                              </li>
                              <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                              <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
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
                </div>
                <!-- /.home-owl-carousel -->
              </div>
              <!-- /.product-slider -->
            </div>
            <!-- /.tab-pane -->

            <div class="tab-pane" id="apple">
              <div class="product-slider">
                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme">
                  <div class="item item-carousel">
                    <div class="products">
                      <div class="product">
                        <div class="product-image">
                          <div class="image"> <a href="detail.html"><img src="{{ asset('frontend/assets/images/products/p18.jpg') }}" alt=""></a> </div>
                          <!-- /.image -->

                          <div class="tag sale"><span>sale</span></div>
                        </div>
                        <!-- /.product-image -->

                        <div class="product-info text-left">
                          <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                          <div class="rating rateit-small"></div>
                          <div class="description"></div>
                          <div class="product-price"> <span class="price"> $450.99 </span> <span class="price-before-discount">$ 800</span> </div>
                          <!-- /.product-price -->

                        </div>
                        <!-- /.product-info -->
                        <div class="cart clearfix animate-effect">
                          <div class="action">
                            <ul class="list-unstyled">
                              <li class="add-cart-button btn-group">
                                <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                                <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                              </li>
                              <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                              <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
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

                  <div class="item item-carousel">
                    <div class="products">
                      <div class="product">
                        <div class="product-image">
                          <div class="image"> <a href="detail.html"><img  src="{{ asset('frontend/assets/images/products/p18.jpg') }}" alt=""></a> </div>
                          <!-- /.image -->

                          <div class="tag hot"><span>hot</span></div>
                        </div>
                        <!-- /.product-image -->

                        <div class="product-info text-left">
                          <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                          <div class="rating rateit-small"></div>
                          <div class="description"></div>
                          <div class="product-price"> <span class="price"> $450.99 </span> <span class="price-before-discount">$ 800</span> </div>
                          <!-- /.product-price -->

                        </div>
                        <!-- /.product-info -->
                        <div class="cart clearfix animate-effect">
                          <div class="action">
                            <ul class="list-unstyled">
                              <li class="add-cart-button btn-group">
                                <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                                <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                              </li>
                              <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                              <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
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

                  <div class="item item-carousel">
                    <div class="products">
                      <div class="product">
                        <div class="product-image">
                          <div class="image"> <a href="detail.html"><img  src="{{ asset('frontend/assets/images/products/p17.jpg') }}" alt=""></a> </div>
                          <!-- /.image -->

                          <div class="tag sale"><span>sale</span></div>
                        </div>
                        <!-- /.product-image -->

                        <div class="product-info text-left">
                          <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                          <div class="rating rateit-small"></div>
                          <div class="description"></div>
                          <div class="product-price"> <span class="price"> $450.99 </span> <span class="price-before-discount">$ 800</span> </div>
                          <!-- /.product-price -->

                        </div>
                        <!-- /.product-info -->
                        <div class="cart clearfix animate-effect">
                          <div class="action">
                            <ul class="list-unstyled">
                              <li class="add-cart-button btn-group">
                                <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                                <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                              </li>
                              <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                              <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
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

                  <div class="item item-carousel">
                    <div class="products">
                      <div class="product">
                        <div class="product-image">
                          <div class="image"> <a href="detail.html"><img  src="{{ asset('frontend/assets/images/products/p16.jpg') }}" alt=""></a> </div>
                          <!-- /.image -->

                          <div class="tag new"><span>new</span></div>
                        </div>
                        <!-- /.product-image -->

                        <div class="product-info text-left">
                          <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                          <div class="rating rateit-small"></div>
                          <div class="description"></div>
                          <div class="product-price"> <span class="price"> $450.99 </span> <span class="price-before-discount">$ 800</span> </div>
                          <!-- /.product-price -->

                        </div>
                        <!-- /.product-info -->
                        <div class="cart clearfix animate-effect">
                          <div class="action">
                            <ul class="list-unstyled">
                              <li class="add-cart-button btn-group">
                                <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                                <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                              </li>
                              <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                              <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
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

                  <div class="item item-carousel">
                    <div class="products">
                      <div class="product">
                        <div class="product-image">
                          <div class="image"> <a href="detail.html"><img  src="{{ asset('frontend/assets/images/products/p13.jpg') }}" alt=""></a> </div>
                          <!-- /.image -->

                          <div class="tag new"><span>new</span></div>
                        </div>
                        <!-- /.product-image -->

                        <div class="product-info text-left">
                          <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                          <div class="rating rateit-small"></div>
                          <div class="description"></div>
                          <div class="product-price"> <span class="price"> $450.99 </span> <span class="price-before-discount">$ 800</span> </div>
                          <!-- /.product-price -->

                        </div>
                        <!-- /.product-info -->
                        <div class="cart clearfix animate-effect">
                          <div class="action">
                            <ul class="list-unstyled">
                              <li class="add-cart-button btn-group">
                                <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                                <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                              </li>
                              <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                              <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
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

                  <div class="item item-carousel">
                    <div class="products">
                      <div class="product">
                        <div class="product-image">
                          <div class="image"> <a href="detail.html"><img  src="{{ asset('frontend/assets/images/products/p14.jpg') }}" alt=""></a> </div>
                          <!-- /.image -->

                          <div class="tag hot"><span>hot</span></div>
                        </div>
                        <!-- /.product-image -->

                        <div class="product-info text-left">
                          <h3 class="name"><a href="detail.html">Samsung Galaxy S4</a></h3>
                          <div class="rating rateit-small"></div>
                          <div class="description"></div>
                          <div class="product-price"> <span class="price"> $450.99 </span> <span class="price-before-discount">$ 800</span> </div>
                          <!-- /.product-price -->

                        </div>
                        <!-- /.product-info -->
                        <div class="cart clearfix animate-effect">
                          <div class="action">
                            <ul class="list-unstyled">
                              <li class="add-cart-button btn-group">
                                <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                                <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                              </li>
                              <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                              <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
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
                </div>
                <!-- /.home-owl-carousel -->
              </div>
              <!-- /.product-slider -->
            </div>
            <!-- /.tab-pane -->

          </div>
          <!-- /.tab-content -->
        </div>
        <!-- /.scroll-tabs -->
        <!-- ============ SCROLL TABS : END ========================== -->



        <!-- ====================skip_category_0  and  skip_product_0========================= -->
          <section class="section featured-product wow fadeInUp">
              <h3 class="section-title">@if(session()->get('language') == 'bangla') {{ $skip_category_0->category_name_bn }}  @else {{ $skip_category_0->category_name_en }} @endif </h3>
              <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">

                  @foreach($skip_product_0 as $product)
                      <div class="item item-carousel">
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
                                      <h3 class="name"><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en) }}">@if(session()->get('language') == 'bangla'){{ $product->product_name_bn }} @else {{ $product->product_name_en }} @endif</a></h3>
                                      <div class="rating rateit-small"></div>
                                      <div class="description"></div>
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

                                                  <button class="btn btn-primary cart-btn" type="button">@if(session()->get('language') == 'bangla') কার্টে যোগ করুন @else Add to cart @endif</button>


                                              </li>

                                              <button  id="{{$product->id}}" onclick="addToWishlist(this.id)" class="add-to-cart rounded" style="padding-bottom:5px;background-color: #0c85d0;outline: none; " title=" @if(session()->get('language') == 'bangla') ইচ্ছেতালিকা @else Wishlist @endif "> <i class="icon fa fa-heart" style="margin-top:8px;color: white;"></i>
                                              </button>

                                              <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="@if(session()->get('language') == 'bangla') তুলনা করা @else Compare @endif "> <i class="fa fa-signal" aria-hidden="true"></i> </a>
                                              </li>

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
              <!-- /.home-owl-carousel -->
              <!-- ============================================== WIDE PRODUCTS ============================================== -->
          </section>
          <!-- ================================= END skip_category_0  and  skip_product_0========================== -->


          <!-- =============skip_category_1  and  skip_product_1 ======================= -->
          <section class="section featured-product wow fadeInUp">
              <h3 class="section-title">@if(session()->get('language') == 'bangla') {{ $skip_category_1->category_name_bn }}  @else {{ $skip_category_1->category_name_en }} @endif </h3>
              <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">

                  @foreach($skip_product_1 as $product)
                      <div class="item item-carousel">
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
                                      <h3 class="name"><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en) }}">@if(session()->get('language') == 'bangla'){{ $product->product_name_bn }} @else {{ $product->product_name_en }} @endif</a></h3>
                                      <div class="rating rateit-small"></div>
                                      <div class="description"></div>
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

                                                  <button class="btn btn-primary cart-btn" type="button">@if(session()->get('language') == 'bangla') কার্টে যোগ করুন @else Add to cart @endif</button>


                                              </li>

                                              <button  id="{{$product->id}}" onclick="addToWishlist(this.id)" class="add-to-cart rounded" style="padding-bottom:5px;background-color: #0c85d0;outline: none; " title=" @if(session()->get('language') == 'bangla') ইচ্ছেতালিকা @else Wishlist @endif "> <i class="icon fa fa-heart" style="margin-top:8px;color: white;"></i>
                                              </button>

                                              <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="@if(session()->get('language') == 'bangla') তুলনা করা @else Compare @endif "> <i class="fa fa-signal" aria-hidden="true"></i> </a>
                                              </li>

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
              <!-- /.home-owl-carousel -->
              <!-- ============================================== WIDE PRODUCTS ============================================== -->
          </section>
          <!-- ================================= END skip_category_1  and  skip_product_1========================== -->


        <!-- ============================= FEATURED PRODUCTS ========================== -->

        <section class="section featured-product wow fadeInUp">
          <h3 class="section-title">@if(session()->get('language') == 'bangla') বৈশিষ্ট্যযুক্ত পণ্য  @else Featured products @endif </h3>
          <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">

           @foreach($features as $product)
                <div class="item item-carousel">
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
                                      <div class="tag hot"><span>{{ $discount_price }}% </span></div>
                                  @endif
                              </div>
                              <!-- /.product-image -->

                              <div class="product-info text-left">
                                  <h3 class="name"><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en) }}">@if(session()->get('language') == 'bangla'){{ $product->product_name_bn }} @else {{ $product->product_name_en }} @endif</a></h3>
                                  <div class="rating rateit-small"></div>
                                  <div class="description"></div>
                                  <div class="product-price">
                                      @if( $product->discount_price == NULL || $product->discount_price == 0)
                                              <span class="price">$ {{ $product->selling_price }}</span>
                                      @else
                                              <span class="price"> ${{ $product->discount_price }} </span>
                                              <span class="price-before-discount">$ {{ $product->selling_price }}</span>
                                      @endif
                                  <!-- /.product-price -->
                                  </div>
                              </div>
                              <!-- /.product-info -->
                              <div class="cart clearfix animate-effect">
                                  <div class="action">
                                      <ul class="list-unstyled">
                                          <li class="add-cart-button btn-group">

                                              <button class="btn btn-primary icon" type="button" title="@if(session()->get('language') == 'bangla') কার্টে যোগ করুন @else Add Cart @endif" data-toggle="modal" data-target="#exampleModal" id="{{ $product->id }}" onclick="productView(this.id)">
                                                  <i class="fa fa-shopping-cart"></i>
                                              </button>

                                              <button class="btn btn-primary cart-btn" type="button">@if(session()->get('language') == 'bangla') কার্টে যোগ করুন @else Add to cart @endif</button>


                                          </li>

                                              <button  id="{{$product->id}}" onclick="addToWishlist(this.id)" class="add-to-cart rounded" style="padding-bottom:5px;background-color: #0c85d0;outline: none; " title=" @if(session()->get('language') == 'bangla') ইচ্ছেতালিকা @else Wishlist @endif "> <i class="icon fa fa-heart" style="margin-top:8px;color: white;"></i>
                                              </button>

                                          <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="@if(session()->get('language') == 'bangla') তুলনা করা @else Compare @endif "> <i class="fa fa-signal" aria-hidden="true"></i> </a>
                                          </li>

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
          <!-- /.home-owl-carousel -->
        </section>
        <!-- /.section -->
        <!-- ====================== FEATURED PRODUCTS : END ============================= -->


        <!-- =============================================== BEST SELLER ============================================ -->
        <div class="best-deal wow fadeInUp outer-bottom-xs">
          <h3 class="section-title">Best seller</h3>
          <div class="sidebar-widget-body outer-top-xs">
            <div class="owl-carousel best-seller custom-carousel owl-theme outer-top-xs">
                @foreach($products as $product)
                    <div class="item">
                <div class="products best-product">
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
                        <div class="col2 col-xs-7">
                          <div class="product-info">
                            <h3 class="name"><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en) }}"> @if(session()->get('language') == 'bangla'){{ $product->product_name_bn }} @else {{ $product->product_name_en }} @endif </a></h3>
                            <div class="rating rateit-small"></div>

                              <div class="product-price">
                                  @if( $product->discount_price == NULL || $product->discount_price == 0)
                                      <span class="price">$ {{ $product->selling_price }}</span>
                                  @else
                                      <span class="price"> ${{ $product->discount_price }} </span>
                                      <span class="price-before-discount">$ {{ $product->selling_price }}</span>
                                  @endif
                              </div>
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
                @endforeach
            </div>
          </div>
          <!-- /.sidebar-widget-body -->
        </div>
        <!-- /.sidebar-widget -->
        <!-- ======================= BEST SELLER : END ======================= -->


        <!-- ============================================== BLOG SLIDER ============================================== -->
        <section class="section latest-blog outer-bottom-vs wow fadeInUp">
          <h3 class="section-title">latest form blog</h3>
          <div class="blog-slider-container outer-top-xs">
            <div class="owl-carousel blog-slider custom-carousel">

            @foreach($blogpost as $blog)
              <div class="item">
                <div class="blog-post">
                  <div class="blog-post-image">
                    <div class="image"> <a href="{{ route('post.details',$blog->id) }}"><img src="{{ asset($blog->post_image) }}" alt=""></a> </div>
                  </div>
                  <!-- /.blog-post-image -->

                  <div class="blog-post-info text-left">
                    <h3 class="name"><a href="{{ route('post.details',$blog->id) }}">@if(session()->get('language') == 'bangla') {{ $blog->post_title_bn }} @else {{ $blog->post_title_en }} @endif</a></h3>

                    <span class="info"> {{ Carbon\Carbon::parse($blog->created_at)->diffForHumans() }} </span>

                    <p class="text">@if(session()->get('language') == 'bangla') {!! Str::limit($blog->post_details_bn, 200 )  !!} @else {!! Str::limit($blog->post_details_en, 200 )  !!} @endif</p>

                    <a href="{{ route('post.details',$blog->id) }}" class="lnk btn btn-primary">Read more</a> </div>
                  <!-- /.blog-post-info -->

                </div>
                <!-- /.blog-post -->
              </div>
              <!-- /.item -->
            @endforeach
            </div>
            <!-- /.owl-carousel -->
          </div>
          <!-- /.blog-slider-container -->
        </section>
        <!-- /.section -->
        <!-- ============================================== BLOG SLIDER : END ============================================== -->


        <!-- ============================================== FEATURED PRODUCTS ============================================== -->
        <section class="section wow fadeInUp new-arriavls">
          <h3 class="section-title">New Arrivals</h3>
          <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">



            @foreach($new_arrivals as $product)

            <div class="item item-carousel">
              <div class="products">
                <div class="product">
                  <div class="product-image">
                    <div class="image"> <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en) }}"><img  src="{{ asset($product->product_thumbnail) }}" alt=""></a> </div>
                    <!-- /.image -->

                    <div class="tag new"><span>new</span></div>
                  </div>
                  <!-- /.product-image -->

                  <div class="product-info text-left">
                    <h3 class="name"><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en) }}">@if(session()->get('language') == 'bangla'){{ $product->product_name_bn }} @else {{ $product->product_name_en }} @endif</a></h3>
                    <div class="rating rateit-small"></div>
                    <div class="description"></div>
                    <div class="product-price">
                        @if( $product->discount_price == NULL || $product->discount_price == 0)
                            <span class="price">$ {{ $product->selling_price }}</span>
                        @else
                            <span class="price"> ${{ $product->discount_price }} </span>
                            <span class="price-before-discount">$ {{ $product->selling_price }}</span>
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

                                <button class="btn btn-primary cart-btn" type="button">@if(session()->get('language') == 'bangla') কার্টে যোগ করুন @else Add to cart @endif</button>


                            </li>

                            <button  id="{{$product->id}}" onclick="addToWishlist(this.id)" class="add-to-cart rounded" style="padding-bottom:5px;background-color: #0c85d0;outline: none; " title=" @if(session()->get('language') == 'bangla') ইচ্ছেতালিকা @else Wishlist @endif "> <i class="icon fa fa-heart" style="margin-top:8px;color: white;"></i>
                            </button>

                            <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="@if(session()->get('language') == 'bangla') তুলনা করা @else Compare @endif "> <i class="fa fa-signal" aria-hidden="true"></i> </a>
                            </li>

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
          <!-- /.home-owl-carousel -->
        </section>
        <!-- /.section -->
        <!-- ====================== FEATURED PRODUCTS : END ============================================== -->

      </div>
      <!-- /.homebanner-holder -->
      <!-- ============================================== CONTENT : END ============================================== -->
    </div>
    <!-- /.row -->
    <!-- ============================================== BRANDS CAROUSEL ============================================== -->
    @include('frontend.body.brands')
    <!-- /.logo-slider -->
    <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
  </div>
  <!-- /.container -->
</div>
<!-- /#top-banner-and-menu -->
@endsection
