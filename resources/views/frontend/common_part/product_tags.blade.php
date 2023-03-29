@php
    $tags_en= App\Models\Product::groupBy('product_tags_en')->select('product_tags_en')->get();
    $tags_bn= App\MOdels\Product::groupBy('product_tags_bn')->select('product_tags_bn')->get();
@endphp

<div class="sidebar-widget product-tag wow fadeInUp">
    <h3 class="section-title">@if(session()->get('language') == 'bangla')  পণ্য ট্যাগ @else Product tags @endif</h3>
    <div class="sidebar-widget-body outer-top-xs">
        <div class="tag-list">
            @if(session()->get('language') == 'bangla')
                @foreach($tags_bn as $tags)
                    <a class="item" title="{{ str_replace(',',' ',$tags->product_tags_en) }}" href="{{ url('/product/tags/'.$tags->product_tags_bn) }}">{{ str_replace(',',' ',$tags->product_tags_bn) }}</a>
                @endforeach
            @else
                @foreach($tags_en as $tags)
                    <a class="item" title="{{ str_replace(',',' ',$tags->product_tags_en) }}" href="{{ url('/product/tags/'.$tags->product_tags_en) }}">{{ str_replace(',',' ',$tags->product_tags_en) }}</a>
                @endforeach
            @endif

        </div>
        <!-- /.tag-list -->
    </div>
    <!-- /.sidebar-widget-body -->
</div>
