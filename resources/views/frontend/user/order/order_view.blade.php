@extends('frontend.main_master')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <div class="body-content">
        <div class="container">
            <div class="row">
                @include('frontend.common_part.user_sidebar')
                <div class="col-md-1"></div>
                <div class="col-md-9"><br><br>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="text-center"><strong>{{ Auth::user()->name}}</strong> Welcome to Our online Shopping Page.</h3>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead class="thead-light" style="background-color: lightgrey">
                                    <tr >
                                        <th class="text-center" scope="col">Date</th>
                                        <th class="text-center" scope="col">Total</th>
                                        <th class="text-center" scope="col">Payment</th>
                                        <th class="text-center" scope="col">Invoice</th>
                                        <th class="text-center" scope="col">Order</th>
                                        <th class="text-center" scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody >
                                @foreach($orders as $item)
                                    <tr>
                                        <th scope="row">{{$item->order_date}}</th>
                                        <td>{{$item->amount}}</td>
                                        <td>{{$item->payment_method}}</td>
                                        <td>{{$item->invoice_no}}</td>
                                        <td>
                                                <span class="badge badge-pill" style="background-color: #0aa5df">{{ $item->status }}</span>
                                        </td>
                                        <td width="30%">
                                            <a href="{{url('/user/order/details',$item->id)}}" class="btn btn-info sm" title="Edit" ><i class="fa fa-eye"></i>View</a>
                                            <a href="" class="btn btn-danger sm" title="Delete" id="delete" ><i class="fa fa-download" ></i>Invoice</a>

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $('#image').change(function(e){
                var reader = new FileReader()
                reader.onload = function(e){
                    $('#showImage').attr('src',e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            })
        })
    </script>
@endsection
