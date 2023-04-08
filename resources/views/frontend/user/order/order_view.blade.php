@extends('frontend.main_master')
@section('content')
    @section('title')
        Order List
    @endsection

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <div class="body-content">
        <div class="container pt-0">
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
{{--                                        @if($item->status == 'pending' || $item->status == 'confirm' || $item->status == 'processing' || $item->status == 'shipped' || $item->status == 'picked')--}}

{{--                                                <span class="badge badge-pill badge-warning" style="background: green;">{{ $item->status }} </span>--}}
{{--                                        @else--}}
{{--                                            @if($item->status == 'cancel')--}}
{{--                                                    <span class="badge badge-pill badge-warning" style="background: red;">{{ $item->status }}</span>--}}

{{--                                            @else--}}
{{--                                                @if($item->return_reason !== NULL )--}}
{{--                                                        <span class="badge badge-pill badge-warning" style="background:  #EDE04D;">return request </span>--}}
{{--                                                @else--}}
{{--                                                        <span class="badge badge-pill badge-warning" style="background: gray;">{{ $item->status }}</span>--}}
{{--                                                @endif--}}
{{--                                            @endif--}}
{{--                                        @endif--}}

                                            @if($item->status == 'pending')
                                                <span class="badge badge-pill badge-warning" style="background: #808080;">Pending</span>
                                            @elseif($item->status == 'confirm')
                                                <span class="badge badge-pill badge-warning" style="background: #808000;">Confirm </span>
                                            @elseif($item->status == 'processing')
                                                <span class="badge badge-pill badge-warning" style="background: #00008B;">Processing</span>
                                            @elseif($item->status == 'shipped')
                                                <span class="badge badge-pill badge-warning" style="background:#800080;">Shipped</span>
                                            @elseif($item->status == 'picked')
                                                <span class="badge badge-pill badge-warning" style="background:#00FF00;">Picked</span>
                                            @elseif($item->status == 'delivered')
                                                @if($item->return_reason !== NULL)
                                                    <span class="badge badge-pill badge-warning" style="background:#FF0000;">return request </span>
                                                @else
                                                    <span class="badge badge-pill badge-warning" style="background:#008000;">delivered</span>
                                                @endif

                                            @else
                                                <span class="badge badge-pill badge-warning" style="background:#FF0000;">Cancel </span>

                                            @endif







                                        </td>
                                        <td width="30%">
                                            <a href="{{url('/user/order/details',$item->id)}}" class="btn btn-info sm" title="Edit" ><i class="fa fa-eye"></i>View</a>
                                            <a target="_blank" href="{{ url('/user/pdf-generate',$item->id) }}" class="btn btn-danger sm" title="Delete" id="delete" ><i class="fa fa-download" ></i>Invoice</a>

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
