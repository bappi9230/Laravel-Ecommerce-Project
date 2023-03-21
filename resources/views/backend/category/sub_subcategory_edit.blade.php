@extends('admin.admin_master')
@section('admin')
<div class="container-full">
<section class="content" style="padding: 0px 0px;">
<div class="row">

    <!-- ----------------Add sub sub category edit-------------- -->
    <div class="col-8">

        <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title pl-3 ">Edit Sub-Subcategory</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="table-responsive">
					<form method="post" action="{{route('subSubcategory.update')}}">
                        @csrf
                        <input type="hidden" name="id" value="{{ $subSubcategories->id }}">
                        <div class="col-md-12">

                            <div class="form-group">
								<h5>Category Select <span class="text-danger">*</span></h5>
								<div class="controls">
									<select name="category_id" class="form-control">
										<option value="" selected disabled>Select Category</option>
                                        @foreach($categories as $category)
										<option value="{{$category->id}}" {{ $category->id == $subSubcategories->category_id? 'selected':'' }} >{{ $category->category_name_en }}</option>
                                        @endforeach
									</select>
								<div class="help-block"></div></div>
							</div>

                            <div class="form-group">
								<h5>SubCategory Select <span class="text-danger">*</span></h5>
								<div class="controls">
									<select name="subcategory_id" class="form-control">
										<option value="" selected="" disabled="">Select Sub-Subcategory</option>
                                        @foreach($subcategories as $subcategory)
										<option value="{{$subcategory->id}}" {{ $subcategory->id == $subSubcategories->subcategory_id? 'selected':'' }} >{{ $subcategory->subcategory_name_en }}</option>
                                        @endforeach
									</select>
								<div class="help-block"></div></div>
							</div>

                            <div class="form-group">
                                <h5>Sub-Subcategory English <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="subSubcategory_name_en" value="{{ $subSubcategories->subSubcategory_name_en }}" class="form-control" >
                                </div>
                            </div>
                            <div class="form-group">
                                <h5>Sub-Subcategory Bangla <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="subSubcategory_name_bn" value="{{ $subSubcategories->subSubcategory_name_bn }}" class="form-control">
                                </div>
                            </div>

                            <div class="text-xs-right">
                                <input type="submit" class="btn btn-rounded btn-info" value="Submit">
                            </div>
                        </div>

					</form>
            </div>
        </div>
        <!-- /.box-body -->
        </div>
    </div>

    <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->

</div>

@endsection

