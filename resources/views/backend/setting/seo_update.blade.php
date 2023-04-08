@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="container-full">

        <section class="content pt-0">

            <!-- Basic Forms -->
            <div class="row">
                <div class="col-8">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Site Setting Page </h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="col-10">
                            <div class="box-body">
                                <div class="table-responsive">
                                    <form method="post" action="{{route('update.seo.setting',$seo->id)}}" enctype="multipart/form-data">

                                        @csrf
                                        <div class="form-group">
                                            <h5>Meta Title <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="meta_title" class="form-control" value="{{ $seo->meta_title }}" > </div>
                                        </div>

                                        <div class="form-group">
                                            <h5>Meta Author <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="meta_author" class="form-control"  value="{{ $seo->meta_author }}"  > </div>
                                        </div>

                                        <div class="form-group">
                                            <h5>Meta Keyword <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="meta_keyword" class="form-control" value="{{ $seo->meta_keyword }}"   > </div>
                                        </div>

                                        <div class="form-group">
                                            <h5>Meta Description <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <textarea name="meta_description" id="textarea" class="form-control" required placeholder="Textarea text">
                                                    {{ $seo->meta_description }}
                                                </textarea>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <h5>Google Analytics <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <textarea name="google_analytics" id="textarea" class="form-control" required placeholder="Textarea text">
                                                    {{ $seo->google_analytics }}
                                                </textarea>
                                            </div>
                                        </div>

                                        <div class="text-xs-right">
                                            <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update">
                                        </div>

                                    </form>


                                </div>
                            </div>

                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
            </div>
            <!-- /.box -->

        </section>



    </div>

@endsection
