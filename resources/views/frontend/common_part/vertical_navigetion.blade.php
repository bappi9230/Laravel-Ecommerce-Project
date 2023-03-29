<div class="side-menu animate-dropdown outer-bottom-xs">
    <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> @if(session()->get('language') == 'bangla') ক্যাটাগরি  @else Categories @endif </div>
    <nav class="yamm megamenu-horizontal">
        <ul class="nav">

            @foreach( $categories as $category )
                <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon {{ $category->category_icon }}" aria-hidden="true"></i>
                        @if(session()->get('language') == 'bangla') {{ $category->category_name_bn }}  @else {{ $category->category_name_en }} @endif</a>
                    <ul class="dropdown-menu mega-menu">
                        <li class="yamm-content">
                            <div class="row">
                                <!-- Subcategory data  -->
                                @php
                                    $subcategories = App\models\SubCategory::where('category_id',$category->id)->orderBy('subcategory_name_en','ASC')->get();
                                @endphp
                                @foreach($subcategories as $subcategory)
                                    <div class="col-sm-12 col-md-3">
                                        <!-- SubSubcategory data  -->
                                        @php
                                            $subSubcategories = App\models\SubSubCategory::where('subcategory_id',$subcategory->id)->orderBy('subSubcategory_name_en','ASC')->get();
                                        @endphp
                                        <a href="{{ url('product/subcategory/'.$subcategory->id.'/'.$subcategory->subcategory_slug_en) }}">
                                            <h2 class="title">
                                                @if(session()->get('language') == 'bangla') {{$subcategory->subcategory_name_bn}}  @else {{$subcategory->subcategory_name_en}} @endif
                                            </h2>
                                        </a>
                                        @foreach($subSubcategories as $subSubcategory)
                                            <ul class="links list-unstyled">
                                                <li><a href="{{ url('product/subSubcategory/'.$subSubcategory->id.'/'.$subSubcategory->subSubcategory_slug_en) }}">@if(session()->get('language') == 'bangla') {{$subSubcategory->subSubcategory_name_bn}}  @else {{$subSubcategory->subSubcategory_name_en}}@endif</a></li>
                                            </ul>
                                        @endforeach <!--End SubSubcategory Foreach  -->
                                    </div>
                                @endforeach  <!--End Subcategory Foreach  -->
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </li>
                        <!-- /.yamm-content -->
                    </ul>
                    <!-- /.dropdown-menu --> </li>
                <!-- /.menu-item -->
            @endforeach  <!-- end Category foreach-->








            <!-- <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-paper-plane"></i>Kids and Babies</a> -->
            <!-- /.dropdown-menu --> </li>
            <!-- /.menu-item -->

            <!-- <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-futbol-o"></i>Sports</a> -->
            <!-- ================================== MEGAMENU VERTICAL ================================== -->
            <!-- /.dropdown-menu -->
            <!-- ================================== MEGAMENU VERTICAL ================================== --> </li>
            <!-- /.menu-item -->

            <!-- <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-envira"></i>Home and Garden</a> -->
            <!-- /.dropdown-menu --> </li>
            <!-- /.menu-item -->

        </ul>
        <!-- /.nav -->
    </nav>
    <!-- /.megamenu-horizontal -->
</div>
