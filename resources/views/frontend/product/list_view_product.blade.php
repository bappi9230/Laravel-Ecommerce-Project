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
