@extends('admin.admin_master')
@section('admin')
    <div class="container-full" >
        <section class="content" style="padding-top: 0px;">
            <div class="row">

                <!-- ----------------Pending Orders-------------- -->

                <!-- all Category view  -->
                <div class="col-12">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title pl-3 ">Pending Order List</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Date </th>
                                        <th>Invoice </th>
                                        <th>Amount </th>
                                        <th>Payment </th>
                                        <th>Status </th>
                                        <th>Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($orders as $item)
                                        <tr>
                                            <td>{{ $item->order_date }}</td>
                                            <td>{{ $item->invoice_no }}%</td>
                                            <td>${{ $item->amount}}</td>
                                            <td>{{ $item->payment_method}}</td>
                                            <td> <span class="badge badge-pill badge-primary">{{ $item->status }} </span>  </td>
                                            <td>
                                                <a href="{{ route('pending.order.details',$item->id) }}" class="btn btn-info sm" title="Edit" ><i class="fa fa-eye"></i></a>
                                                <a href="{{ route('coupon.delete',$item->id) }}" class="btn btn-danger sm" title="Delete" id="delete" ><i class="fa fa-trash" ></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>Date </th>
                                        <th>Invoice </th>
                                        <th>Amount </th>
                                        <th>Payment </th>
                                        <th>Status </th>
                                        <th>Action</th>
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
    <!-- ----------------Pending Orders-------------- -->

@endsection

