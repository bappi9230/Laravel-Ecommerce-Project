@if($products ->isEmpty())
    <h4 class="text-gray-300 text-center"> Product Not Found</h4>
@else

<div class="container mt-5">
    <div class="row d-flex justify-content-center ">
        <div class="col-md-6">
            <div class="card">

                    @foreach($products as $product)


                          <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}">
                              <div class="list border-bottom">
                                  <img src="{{asset($product->product_thumbnail)}}" style="width: 35px;height: 35px;">

                                  <div class="d-flex flex-column ml-3">

                                      <small>{{$product->product_name_en}}</small>

                                      <small>${{$product->selling_price}}</small>
                                  </div>
                              </div>
                          </a>


                    @endforeach

            </div>
        </div>
    </div>

</div>
@endif

<style>
    body{

        background-color: #eee;
    }

    .card{

        background-color: #fff;
        padding: 15px;
        border:none;
    }

    .input-box{
        position: relative;
    }



    .form-control{

        height: 50px;
        background-color:#eeeeee69;
    }

    .form-control:focus{
        background-color: #eeeeee69;
        box-shadow: none;
        border-color: #eee;
    }


    .list{

        padding-top: 20px;
        padding-bottom: 10px;
        display: flex;
        align-items: center;

    }

    .border-bottom{

        border-bottom: 2px solid #eee;
    }


    .list small{
        font-size: 15px;
        color: black;
        margin-left: 10px;
    }
</style>

