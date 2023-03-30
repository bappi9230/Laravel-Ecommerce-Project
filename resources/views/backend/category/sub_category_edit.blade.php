@extends('admin.admin_master')
@section('admin')
<div class="container-full">
<section class="content" style="padding: 0px 0px;">
<div class="row">

    <!-- ----------------Add category-------------- -->
    <div class="col-8">

        <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title pl-3 ">Add Subcategory</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="table-responsive">
					<form method="post" action="{{route('subcategory.update')}}">
                        @csrf
                        <input type="hidden" name="id" value="{{ $subcategories->id }}">
                        <div class="col-md-12">

                            <div class="form-group">
								<h5>Category Select <span class="text-danger">*</span></h5>
								<div class="controls">
									<select name="category_id" id="select" required="" class="form-control" aria-invalid="false">
										<option value="" disabled>Select Your City</option>
                                        @foreach($categories as $category)
										<option value="{{$category->id}}" {{ $category->id == $subcategories->id? 'selected':'' }}>{{ $category->category_name_en }}</option>
                                        @endforeach
									</select>
							     	<div class="help-block"></div>
                                </div>
							</div>

                            <div class="form-group">
                                <h5>Subcategory English <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="subcategory_name_en" value="{{ $subcategories->subcategory_name_en }}" class="form-control" >
                                </div>
                            </div>
                            <div class="form-group">
                                <h5>Subcategory Bangla <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="subcategory_name_bn" value="{{ $subcategories->subcategory_name_bn }}" class="form-control">
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


    <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->

</div>

@endsection

