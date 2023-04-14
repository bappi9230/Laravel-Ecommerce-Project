@php
    $hot_deals = App\Models\Product::where('hot_deals',1)->where('discount_price','!=',NULL)->orderBy('id','DESC')->get();
@endphp

<div class="sidebar-widget hot-deals wow fadeInUp outer-bottom-xs">
    <h3 class="section-title">@if(session()->get('language') == 'bangla') গরম অফার  @else hot deals @endif</h3>
    <div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-ss">
        @foreach($hot_deals as $hot_deal)
            @php
                $amount = $hot_deal->selling_price - $hot_deal->discount_price;
                $discount_price = round(( $amount / $hot_deal->selling_price) *100);
            @endphp
            <div class="item">
                <div class="products">
                    <div class="hot-deal-wrapper">
                        <div class="image"> <a href="{{ url('product/details/'.$hot_deal->id.'/'.$hot_deal->product_slug_en) }}"><img src="{{ asset($hot_deal->product_thumbnail) }}" alt=""></a> </div>
                        <div class="sale-offer-tag"><span>{{ $discount_price }}%<br>off</span></div>
                        <div class="timing-wrapper">
                            <div class="box-wrapper">
                                <div class="date box"> <span class="key">120</span> <span class="value">DAYS</span> </div>
                            </div>
                            <div class="box-wrapper">
                                <div class="hour box"> <span class="key">20</span> <span class="value">HRS</span> </div>
                            </div>
                            <div class="box-wrapper">
                                <div class="minutes box"> <span class="key">36</span> <span class="value">MINS</span> </div>
                            </div>
                            <div class="box-wrapper hidden-md">
                                <div class="seconds box"> <span class="key">60</span> <span class="value">SEC</span> </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.hot-deal-wrapper -->

                    <div class="product-info text-left m-t-20">
                        <h3 class="name"><a href="{{ url('product/details/'.$hot_deal->id.'/'.$hot_deal->product_slug_en) }}">@if(session()->get('language') == 'bangla'){{ $hot_deal->product_name_bn }} @else {{ $hot_deal->product_name_en }} @endif</a></h3>
                        <div class="rating rateit-small"></div>
                        <div class="product-price">
                            @if( $hot_deal->discount_price == NULL || $hot_deal->discount_price == 0)
                                <span class="price">$ {{ $hot_deal->selling_price }}</span>
                            @else
                                <span class="price"> ${{ $hot_deal->discount_price }} </span>
                                <span class="price-before-discount">$ {{ $hot_deal->selling_price }}</span>
                            @endif
                        </div>
                        <!-- /.product-price -->

                    </div>
                    <!-- /.product-info -->

                    <div class="cart clearfix animate-effect">
                        <div class="action">
                            <div class="add-cart-button btn-group">
                                <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                                <button class="btn btn-primary cart-btn" type="button" data-toggle="modal" data-target="#exampleModal" id="{{ $hot_deal->id }}" onclick="productView(this.id)">@if(session()->get('language') == 'bangla') কার্টে যোগ করুন @else Add to cart @endif</button>
                            </div>
                        </div>
                        <!-- /.action -->
                    </div>
                    <!-- /.cart -->
                </div>
            </div>
        @endforeach  <!-- end Hot Deals -->
    </div>
    <!-- /.sidebar-widget -->
</div>
