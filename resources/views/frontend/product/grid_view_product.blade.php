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
                    <h3 class="name"><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en) }}">@if(session()->get('language') == 'bangla') {{ $product->product_name_bn }}  @else {{ $product->product_name_en }}  @endif </a></h3>
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
