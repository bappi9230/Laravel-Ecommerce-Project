@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="container-full">
<section class="content pt-0">
<div class="row">


    <!-- all product view  -->
    <div class="col-12">

        <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title pl-3">Product List</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Product Image</th>
                        <th>Category</th>
                        <th>SubCategory</th>
                        <th>Sub Subcategory En</th>
                        <th>Product Name English</th>
                        <th>Product Quantity</th>
                        <th>Selling Price</th>
                        <th>Discount Price</th>
                        <th>Action</th>
                        <th>Product Status</th>

                    </tr>
                </thead>
            <tbody>
                @foreach($products as $item)
                   <tr>
                        <td style="width:20px;height:20px;"><img src="{{ asset($item->product_thumbnail)}}"></td>
                        <td >{{ $item->category->category_name_en }}</td>
                        <td >{{ $item->subcategory->subcategory_name_en}}</td>
                        <td >{{ $item->subSubcategory->subSubcategory_name_en }}</td>
                        <td>{{ $item->product_name_en }}</td>
                        <td >{{ $item->product_qty }}Piece</td>
                        <td >{{ $item->selling_price }}$</td>

                        <td >
                            @if($item->discount_price == NULL || $item->discount_price == 0)
                                <span class="badge badge-pill badge-danger">No Discount</span>
                            @else
                            @php
                            $discount = $item->selling_price - $item->discount_price;
                            $discount_percentage =($discount/$item->selling_price) * 100;
                            @endphp
                               <span class="badge badge-pill badge-danger"> {{ round( $discount_percentage) }} %</span>
                            @endif
                        </td>
                        <td >
                            @if($item->status == 1)
                            <span class="badge badge-pill badge-primary">Active</span>
                            @else
                            <span class="badge badge-pill badge-danger">Inactive</span>
                            @endif
                        </td>
                        <td width="30%">
                            <!-- <a href="{#" class="btn btn-primary sm" title="View"><i class="fa fa-eye" ></i></a> -->
                            <a href="{{ route('product.edit',$item->id) }}" class="btn btn-info sm" title="Edit" ><i class="fa fa-pencil"></i></a>
                            <a href="{{ route('product.delete',$item->id) }}" class="btn btn-danger sm" title="Delete" id="delete" ><i class="fa fa-trash" ></i></a>
                        @if($item->status == 1)
                            <a href="{{ route('product.inactive',$item->id) }}" class="btn btn-primary sm" title="Inactive Now"><i class="fa fa-arrow-down" ></i></a>
                        @else
                            <a href="{{ route('product.active',$item->id) }}" class="btn btn-success sm" title="Active Now"><i class="fa fa-arrow-up" ></i></a>
                        @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
                <tfoot>
                    <tr>
                        <th>Product Image</th>
                        <th>Category</th>
                        <th>SubCategory</th>
                        <th>Sub Subcategory En</th>
                        <th>Product Name English</th>
                        <th>Product Quantity</th>
                        <th>Selling Price</th>
                        <th>Discount Price</th>
                        <th>Action</th>
                        <th>Product Status</th>
                    </tr>
                </tfoot>
                </table>
            </div>
        </div>
        <!-- /.box-body -->
        </div>
    </div>
    <!-- /.col -->


    <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->

</div>

    <script type="text/javascript">
        $(document).ready(function() {
        $('select[name="category_id"]').on('change', function(){
            var category_id = $(this).val();
            if(category_id) {
                $.ajax({
                    url: "{{  url('/category/subcategory/ajax') }}/"+category_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                        var d =$('select[name="subcategory_id"]').empty();
                            $.each(data, function(key, value){
                                $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">' + value.subcategory_name_en + '</option>');
                            });
                        },
                    });
                    } else {
                alert('danger');
                }
            });
        });
    </script>

@endsection

