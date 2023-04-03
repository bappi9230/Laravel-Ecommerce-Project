@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="container-full">
<!-- Content Header (Page header) -->
<!-- Main content -->
<section class="content" style="padding-top:0px;">

    <!-- Basic Forms -->
    <div class="box">
    <div class="box-header with-border">
        <h4 class="box-title">Add Product</h4>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div class="row">
        <div class="col">
            <form method="post" action="{{ route('product.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12">

                        <div class="row">  <!--start 1st row -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Brand Select <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="brand_id" class="form-control" required="">
                                            <option value="" selected="" disabled="">Select Your Brand</option>
                                            @foreach($brands as $brand)
                                            <option value="{{$brand->id}}">{{ $brand->brand_name_en }}</option>
                                            @endforeach
                                        </select>
                                        <div class="help-block"></div>
                                        @error('brand_id')
                                            <span class="text-danger"> {{$message}} </span>
                                        @enderror
                                    </div>
                                </div>
                            </div> <!-- end col md 4 -->

                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Category Select <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="category_id" class="form-control" required="">
                                            <option value="" selected="" disabled="">Select Category</option>
                                            @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{ $category->category_name_en }}</option>
                                            @endforeach
                                        </select>
                                        <div class="help-block"></div>
                                        @error('category_id')
                                            <span class="text-danger"> {{$message}} </span>
                                        @enderror
                                    </div>
                                </div>
                            </div> <!-- end col md 4 -->

                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>SubCategory Select <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="subcategory_id" class="form-control" required="">
                                            <option value="" selected="" disabled="">Select SubCategory</option>

                                        </select>
                                        <div class="help-block"></div>
                                        @error('subcategory_id')
                                            <span class="text-danger"> {{$message}} </span>
                                        @enderror
                                    </div>
                                </div>
                            </div> <!-- end col md 4 -->
                        </div>  <!--end 1st row-->

                        <div class="row">  <!--start 2nd row -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Sub-Subcategory Select <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="subSubcategory_id" class="form-control" required="">
                                            <option value="" selected="" disabled="">Select Your Sub-SubCategory</option>

                                        </select>
                                        <div class="help-block"></div>
                                        @error('brand_id')
                                            <span class="text-danger"> {{$message}} </span>
                                        @enderror
                                    </div>
                                </div>
                            </div> <!-- end col md 4 -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Product Name English <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_name_en" class="form-control" required="">
                                        <div class="help-block"></div>
                                        @error('product_name_en')
                                            <span class="text-danger"> {{$message}} </span>
                                        @enderror
                                    </div>
                                </div>
                            </div> <!-- end col md 4 -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Product Name Bangla <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_name_bn" class="form-control" required="" >
                                        <div class="help-block"></div>
                                        @error('product_name_bn')
                                            <span class="text-danger"> {{$message}} </span>
                                        @enderror
                                    </div>
                                </div>
                            </div> <!-- end col md 4 -->
                        </div>  <!--end 2nd row-->

                        <div class="row">  <!--start 3rd row -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Product Code<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_code" class="form-control" required="" >
                                        <div class="help-block"></div>
                                        @error('product_code')
                                            <span class="text-danger"> {{$message}} </span>
                                        @enderror
                                    </div>
                                </div>
                            </div> <!-- end col md 4 -->

                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Product Quantity<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_qty" class="form-control" required="">
                                        <div class="help-block"></div>
                                        @error('product_qty')
                                            <span class="text-danger"> {{$message}} </span>
                                        @enderror
                                    </div>
                                </div>
                            </div> <!-- end col md 4 -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Product Tags English<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_tags_en" value="back,Ipsum,Amet" data-role="tagsinput" class="form-control" required="" >
                                        <div class="help-block"></div>
                                        @error('product_tags_en')
                                            <span class="text-danger"> {{$message}} </span>
                                        @enderror
                                    </div>
                                </div>
                            </div> <!-- end col md 4 -->
                        </div>  <!--end 3rd row-->

                        <div class="row">  <!--start 4th row -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Product Tags Bangla<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_tags_bn" value="ভাল,ব্যবহারযোগ্য" data-role="tagsinput" class="form-control" required="" >
                                        <div class="help-block"></div>
                                        @error('product_tags_bn')
                                            <span class="text-danger"> {{$message}} </span>
                                        @enderror
                                    </div>
                                </div>
                            </div> <!-- end col md 4 -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Product Size English<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_size_en" value="Small,Medium,Large" data-role="tagsinput" class="form-control" required="" >
                                        <div class="help-block"></div>
                                        @error('product_size_en')
                                            <span class="text-danger"> {{$message}} </span>
                                        @enderror
                                    </div>
                                </div>
                            </div> <!-- end col md 4 -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Product Size Bangla<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_size_bn" value="ছোট,মধ্যম,বড়" data-role="tagsinput" class="form-control" required="" >
                                        <div class="help-block"></div>
                                        @error('product_size_bn')
                                            <span class="text-danger"> {{$message}} </span>
                                        @enderror
                                    </div>
                                </div>
                            </div> <!-- end col md 4 -->
                        </div>  <!--end 4th row-->

                        <div class="row">  <!--start 5th row -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Product Color English<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_color_en" value="Red,Black,White" data-role="tagsinput" class="form-control" required="">
                                        <div class="help-block"></div>
                                        @error('product_color_en')
                                            <span class="text-danger"> {{$message}} </span>
                                        @enderror
                                    </div>
                                </div>
                            </div> <!-- end col md 4 -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Product Color Bangla<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_color_bn" value="লাল,কালো,সাদা" data-role="tagsinput" class="form-control" required="" >
                                        <div class="help-block"></div>
                                        @error('product_color_bn')
                                            <span class="text-danger"> {{$message}} </span>
                                        @enderror
                                    </div>
                                </div>
                            </div> <!-- end col md 4 -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Product Selling Price<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="selling_price" class="form-control" required="" >
                                        <div class="help-block"></div>
                                        @error('selling_price')
                                            <span class="text-danger"> {{$message}} </span>
                                        @enderror
                                    </div>
                                </div>
                            </div> <!-- end col md 4 -->
                        </div>  <!--end 5th row-->

                        <div class="row">  <!--start 6th row -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Product Discount Price<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="discount_price" class="form-control">
                                        <div class="help-block"></div>
                                        @error('discount_price')
                                            <span class="text-danger"> {{$message}} </span>
                                        @enderror
                                    </div>
                                </div>
                            </div> <!-- end col md 4 -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Main Thumbnail Image<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input id="image" type="file" name="product_thumbnail" class="form-control" required="">
                                        <div class="help-block"></div>
                                        @error('product_thumbnail')
                                            <span class="text-danger"> {{$message}} </span>
                                        @enderror
                                        <img  class="row pl-3" src="" id="showImage">
                                    </div>
                                </div>
                            </div> <!-- end col md 4 -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Multiple Image<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="file" name="multi_img[]" class="form-control" multiple="" id="multiImg" required="" >
                                        <div class="help-block"></div>
                                        @error('multi_img')
                                            <span class="text-danger"> {{$message}} </span>
                                        @enderror
                                        <div class="row pl-3" id="showMultiImage"></div>

                                    </div>
                                </div>
                            </div> <!-- end col md 4 -->
                        </div>  <!--end 6th row-->

                        <div class="row">  <!--start 7th row -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Product Short Description English <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <textarea name="short_descp_en" class="form-control" placeholder="Product's Short Description English" required="" ></textarea>
                                        <div class="help-block"></div>
                                        @error('short_descp_en')
                                            <span class="text-danger"> {{$message}} </span>
                                        @enderror
                                    </div>
                                </div>
                            </div> <!-- end col md 6 -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Product Short Description Bangla <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <textarea name="short_descp_bn" class="form-control" placeholder="Product's Short Description Bangla" required="" ></textarea>
                                        <div class="help-block"></div>
                                        @error('short_descp_bn')
                                            <span class="text-danger"> {{$message}} </span>
                                        @enderror
                                    </div>
                                </div>
                            </div> <!-- end col md 6 -->
                        </div>  <!--end 7th row-->

                        <div class="row">  <!--start 8th row -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Product Long Description English <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <textarea id="editor1" name="long_descp_en" rows="10" cols="80" required="">
                                            Product Long Description English
						                </textarea>
                                        <div class="help-block"></div>
                                        @error('long_descp_en')
                                            <span class="text-danger"> {{$message}} </span>
                                        @enderror
                                    </div>
                                </div>
                            </div> <!-- end col md 6 -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Product Long Description Bangla <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                     	<textarea id="editor2" name="long_descp_bn" rows="10" cols="80" required="">
                                            বাংলায় পণ্যের দীর্ঘ বিবরণ দিন
						                </textarea>
                                        <div class="help-block"></div>
                                        @error('long_descp_bn')
                                            <span class="text-danger"> {{$message}} </span>
                                        @enderror
                                    </div>
                                </div>
                            </div> <!-- end col md 6 -->
                        </div>  <!--end 8th row-->
                    </div><!--end col 12-->
                </div><!--end row-->

<hr>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="controls">
                                <fieldset>
                                    <input type="checkbox" id="checkbox_2" name="hot_deals" value="1">
                                    <label for="checkbox_2">Hot Deals</label>
                                </fieldset>
                                <fieldset>
                                    <input type="checkbox" id="checkbox_3" name="featured" value="1">
                                    <label for="checkbox_3">Featured</label>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="controls">
                                <fieldset>
                                    <input type="checkbox" id="checkbox_4" name="special_offer" value="1">
                                    <label for="checkbox_4">Special Offer</label>
                                </fieldset>
                                <fieldset>
                                    <input type="checkbox" id="checkbox_5" name="special_deals" value="1">
                                    <label for="checkbox_5">Special Deals</label>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-xs-right">
                    <input type="submit" class="btn btn-rounded btn-info" value="Add Product">
                </div>
            </form>

        </div>
        <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.box-body -->
    </div>
    <!-- /.box -->

</section>
<!-- /.content -->
</div>


  <!-- subcategory and Sub-subCategory show script  -->

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
                        $('select[name="subSubcategory_id"]').html('');
                        var d =$('select[name="subcategory_id"]').empty();
                            $('select[name="subcategory_id"]').append('<option value="">' + " Select Subcategory"+ '</option>');
                            $.each(data, function(key, value){
                                $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">' + value.subcategory_name_en + '</option>');
                            });
                        },
                    });
                    } else {
                alert('danger');
                }
            });

// sub-subCategory
  $('select[name="subcategory_id"]').on('change', function(){
            var subcategory_id = $(this).val();
            if(subcategory_id) {
                $.ajax({
                    url: "{{  url('/category/subSubcategory/ajax') }}/"+subcategory_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                        var d =$('select[name="subSubcategory_id"]').empty();
                            $.each(data, function(key, value){
                                $('select[name="subSubcategory_id"]').append('<option value="'+ value.id +'">' + value.subSubcategory_name_en + '</option>');
                            });
                        },
                    });
                    } else {
                alert('danger');
                }
            });


        });
    </script>

 <!-- add multiple image  -->
<script type="text/javascript">
$(document).ready(function(){
   $('#image').change(function(e){
       var reader = new FileReader()
       reader.onload = function(e){
          $('#showImage').attr('src',e.target.result).width(80).height(80);
       }
    reader.readAsDataURL(e.target.files['0']);
   })
})
</script>


 <!-- add multiple image  -->
<script>

  $(document).ready(function(){
   $('#multiImg').on('change', function(){ //on file input change
      if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
      {
          var data = $(this)[0].files; //this file data

          $.each(data, function(index, file){ //loop though each file
              if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                  var fRead = new FileReader(); //new filereader
                  fRead.onload = (function(file){ //trigger function on successful read
                  return function(e) {
                      var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(80)
                  .height(80); //create image element
                      $('#showMultiImage').append(img); //append image to output element
                  };
                  })(file);
                  fRead.readAsDataURL(file); //URL representing the file's data.
              }
          });

      }else{
          alert("Your browser doesn't support File API!"); //if File API is absent
      }
   });
  });

  </script>

@endsection
