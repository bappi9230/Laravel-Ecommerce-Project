<!DOCTYPE html>
<html lang="en">
<head>
<!-- Meta -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<meta name="description" content="">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="author" content="">
<meta name="keywords" content="MediaCenter, Template, eCommerce">
<meta name="robots" content="all">
<title>@yield('title')</title>

<!-- Bootstrap Core CSS -->
<link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css')}}">

<!-- Customizable CSS -->
<link rel="stylesheet" href="{{ asset('frontend/assets/css/main.css')}}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/blue.css')}}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.carousel.css')}}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.transitions.css')}}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/animate.min.css')}}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/rateit.css')}}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap-select.min.css')}}">

<!-- Icons/Glyphs -->
<link rel="stylesheet" href="{{ asset('frontend/assets/css/font-awesome.css')}}">

<!-- Fonts -->
<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
 <!-- toster css -->
 <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >
</head>
<body class="cnt-home">
<!-- ============================================== HEADER ============================================== -->
@include('frontend.body.header')

<!-- ============================================== HEADER : END ============================================== -->
@yield('content')

<!-- ============================================================= FOOTER ============================================================= -->
@include('frontend.body.footer')
<!-- ============================================================= FOOTER : END============================================================= -->

<!-- For demo purposes – can be removed on production -->

<!-- For demo purposes – can be removed on production : End -->

<!-- JavaScripts placed at the end of the document so the pages load faster -->
<script src="{{ asset('frontend/assets/js/jquery-1.11.1.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/bootstrap-hover-dropdown.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/echo.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/jquery.easing-1.3.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/bootstrap-slider.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/jquery.rateit.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/assets/js/lightbox.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/wow.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/scripts.js') }}"></script>

     <!-- sweet alert -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
     <!-- toster.js -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

        <script>
            @if(Session::has('message'))
                var type = "{{ Session::get('alert-type','info') }}"
                switch(type){
                    case 'info':
                    toastr.info(" {{ Session::get('message') }} ");
                    break;

                    case 'success':
                    toastr.success(" {{ Session::get('message') }} ");
                    break;

                    case 'warning':
                    toastr.warning(" {{ Session::get('message') }} ");
                    break;

                    case 'error':
                    toastr.error(" {{ Session::get('message') }} ");
                    break;
                }
            @endif
        </script>
<!--=========================CART Modal View================================= -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><strong><span id="pname"></span></strong></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeModal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card" style="width: 18rem;">
                            <img src=" " class="card-img-top" alt="no image" style="height: 200px; width: 200px;" id="pimage">
                        </div>
                    </div><!-- end col 4 -->
                    <div class="col-md-4">
                        <ul class="list-group">
                            <li class="list-group-item">Product Price: <strong class="text-success"><span id="price"></span></strong> <del id="discount_price"></del></li>
                            <li class="list-group-item">Product Code: <strong id="pcode"></strong></li>
                            <li class="list-group-item">Category: <strong id="pcategory"></strong></li>
                            <li class="list-group-item">Brand: <strong id="pbrand"></strong></li>
                            <li class="list-group-item">stock:
                                <span class="badge badge-pill badge-success" id="Available" style="background: green; color: white;"></span>
                                <span class="badge badge-pill badge-danger" id="stockout" style="background: red; color: white;"></span>
                            </li>
                        </ul>
                    </div><!-- end col 4 -->

                    <div class="col-md-4" id="colorArea">
                        <div class="form-group">
                            <label for="color">Product Color</label>
                            <select class="form-control" id="color" name="color">
                            </select>
                        </div>
                        <div class="form-group" id="sizeArea">
                            <label for="size">Product Size</label>
                            <select class="form-control" id="size" name="size">
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="qty">Product Quantity</label>
                              <input type="number" id="qty" value="1" min="1">
                        </div>
                    </div><!-- end col 4 -->
                </div><!-- end row -->
            </div>
            <input type="hidden" id="product_id">
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="addToCart()" >Add To Cart</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
        }
    })
    // Start Product View with Modal
    function productView(id){
        // alert(id)
        $.ajax({
            type: 'GET',
            url: '/product/view/modal/'+id,
            dataType:'json',
            success:function(data){
                $('#pname').text(data.product.product_name_en);
                $('#price').text(data.product.selling_price);
                $('#pcode').text(data.product.product_code);
                $('#pcategory').text(data.product.category.category_name_en);
                $('#pbrand').text(data.product.brand.brand_name_en);
                $('#pimage').attr('src','/'+data.product.product_thumbnail);


                $('#product_id').val(id);
                $('#qty').val(1);

                // Product Price
                if (data.product.discount_price == null || data.product.discount_price == 0) {
                    $('#price').text('');
                    $('#discount_price').text('');
                    $('#price').text('$'+data.product.selling_price);
                }else{
                    $('#price').text('$'+data.product.discount_price);
                    $('#discount_price').text('$'+data.product.selling_price);
                } // end prodcut price

                //product stock
                if( 0 < data.product.product_qty ){
                    $('#Available').text('');
                    $('#stockout').text('');
                    $('#Available').text('Available');
                }else {
                    $('#Available').text('');
                    $('#stockout').text('');
                    $('#stockout').text('StockOut');
                }
                //end product stock


                // Color
                $('select[name="color"]').empty();
                $.each(data.color,function(key,value){
                    $('select[name="color"]').append('<option value=" '+value+' ">'+value+' </option>')
                    if (data.color == "") {
                        $('#colorArea').hide();
                    }else{
                        $('#colorArea').show();
                    }
                }) // end color

                // Size
                $('select[name="size"]').empty();
                $.each(data.size,function(key,value){
                    $('select[name="size"]').append('<option value=" '+value+' ">'+value+' </option>')
                    if (data.size == "") {
                        $('#sizeArea').hide();
                    }else{
                        $('#sizeArea').show();
                    }
                }) // end size

            }
        })
    }
<!--===========================END CART Modal View============================== -->


<!--===========================ADD TO CART ============================== -->

    // Start Add To Cart Product
    function addToCart(){
        var product_name = $('#pname').text();
        var id = $('#product_id').val();
        var color = $('#color option:selected').text();
        var size = $('#size option:selected').text();
        var quantity = $('#qty').val();
        $.ajax({
            type: "POST",
            dataType: 'json',
            data:{
                color, size, quantity, product_name
            },
            url: "/cart/data/store/"+id,
            success:function(data){

                addMiniCart();

                $('#closeModal').click();
                console.log(data);

                // Start Message
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 3000
                })
                if ($.isEmptyObject(data.error)) {
                    Toast.fire({
                        type: 'success',
                        title: data.success
                    })
                }else{
                    Toast.fire({
                        type: 'error',
                        title: data.error
                    })
                }// End Message
            }
        })
    }
</script>
<!--===========================END ADD TO CART============================== -->


    <!--===========================ADD Mini CART============================== -->
    <script type="text/javascript">
        function addMiniCart(){
            $.ajax({
                type:'GET',
                url:'/product/mini/cart',
                dataType:'json',
                success:function (response) {
                    console.log(response);

                    $('span[id="cartTotal"]').text(response.cartTotal);
                    $('#cartQty').text(response.cartQty);

                    var miniCart = "";
                    $.each(response.carts, function(key,value){

                        miniCart += `
                <div class="cart-item product-summary">
                  <div class="row">
                    <div class="col-xs-4">
                       <div class="image"> <a href="detail.html">
                          <img src="/${value.options.image}" alt=""></a>
                       </div>
                    </div>
                    <div class="col-xs-7">
                      <h3 class="name"><a href="index.php?page-detail">${value.name}</a></h3>
                      <div class="price"><span>$</span>${value.price} * ${value.qty}</div>
                    </div>
                    <div class="col-xs-1 action"> <button type="submit" id="${ value.rowId}" onclick="miniCartRemove(this.id)" ><i class="fa fa-trash"></i></button> </div>
                  </div>
                </div>
                <!-- /.cart-item -->
                <div class="clearfix"></div>
                <hr>`
                    });
                    $('#miniCart').html(miniCart);

                }
            })
       }
        addMiniCart();
        //Remove mini cart
        function miniCartRemove(rowId){
            $.ajax({
                type:'GET',
                url:'/minicart/product-remove/'+rowId,
                dataType:'json',
                success:function (data){
                    addMiniCart();
                    console.log(data);

                    // Start Message
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            title: data.success
                        })
                    }else{
                        Toast.fire({
                            type: 'error',
                            title: data.error
                        })
                    }// End Message
                }

            })
        }
    </script>
    <!--===========================END Mini CART============================== -->

<!--===========================ADD TO WISH LIST============================== -->

<script type="text/javascript">
    function addToWishlist(product_id){
        $.ajax({
            type:'POST',
            url:'/add-to-wishlist/'+product_id,
            dataType:'json',
            success:function (data){
                console.log(data);

                // Start Message
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',

                    showConfirmButton: false,
                    timer: 3000
                })
                if ($.isEmptyObject(data.error)) {
                    Toast.fire({
                        type: 'success',
                        icon: 'success',
                        title: data.success
                    })
                }else{
                    Toast.fire({
                        type: 'error',
                        icon: 'error',
                        title: data.error
                    })
                }
                // End Message
            }
        })
    }
</script>

<!--===========================END ADD TO WISH LIST============================== -->



<!--===========================Load Wishlist Data============================== -->

<script type="text/javascript">
    function wishlist(){
        $.ajax({
            type: 'GET',
            url: '/user/get-wishlist-product',
            dataType:'json',
            success:function(response){
                var rows = ""
                $.each(response, function(key,value){
                    rows += `
                <tr>
                    <td class="col-md-2"><img src="/${value.product.product_thumbnail} " alt="img"></td>
                    <td class="col-md-7">
                        <div class="product-name"><a href="#">${value.product.product_name_en}</a></div>

                        <div class="product-price">
                        ${value.product.discount_price == null
                        ? `<span class="price">$</span><span class="price">${value.product.selling_price}</span>`
                        :
                        `   <span class="price">$</span><span class="price">${value.product.discount_price}</span>
                            <span class="price-before-discount"style="color: darkgray;">$<del>${value.product.selling_price}</del></span>`
                    }

                        </div>
                    </td>
                    <td class="col-md-2">
                        <button class="btn btn-primary icon" type="button" title="Add Cart" data-toggle="modal" data-target="#exampleModal" id="${value.product_id}" onclick="productView(this.id)"> Add to Cart </button>
                    </td>
                    <td class="col-md-1 close-btn">
                        <button type="submit" id="${value.id}" onclick="removeWishlist(this.id)"><i class="fa fa-times"></i></button>
                    </td>
                </tr>`
                });

                $('#wishlist').html(rows);
            }
        })
    }
    wishlist();
</script>
<!--=========================== End Load Wishlist Data============================== -->


<!--=========================== Remove Wishlist Data============================== -->

<script type="text/javascript">
    function removeWishlist(id){
        $.ajax({
            type:'GET',
            url:'/user/remove-wishlist/'+id,
            dataType:'json',
            success:function (data){
                 wishlist();
                // Start Message
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                })
                if ($.isEmptyObject(data.error)) {
                    Toast.fire({
                        type: 'success',
                        icon: 'success',
                        title: data.success
                    })
                }else{
                    Toast.fire({
                        type: 'error',
                        icon: 'error',
                        title: data.error
                    })
                }
                // End Message
            }
        })

    }
</script>

<!--=========================== End Remove Wishlist Data============================== -->
/////////////////////////////////////////////////////////////

<!--===========================Load mycart Data============================== -->

<script type="text/javascript">
    function mycart(){
        $.ajax({
            type: 'GET',
            url: '/user/get-mycart',
            dataType:'json',
            success:function(response){
                var rows = ""
                $.each(response.carts, function(key,value){
                    rows += `
                <tr>
                    <td class="col-md-2"><img src="/${value.options.image} " alt="img"></td>
                    <td class="col-md-7">
                        <div class="product-name"><a href="#">${value.name}</a></div>

                        <div class="product-price">
                            <span class="price">$</span><span class="price">${value.price}</span>
                        </div>
                    </td>
                    <td class="col-md-2">
                        <button class="btn btn-primary icon" type="button" title="Add Cart" data-toggle="modal" data-target="#exampleModal" id="${value.product_id}" onclick="productView(this.id)"> Add to Cart </button>
                    </td>
                    <td class="col-md-1 close-btn">
                        <button type="submit" id="${value.id}" onclick="removeWishlist(this.id)"><i class="fa fa-times"></i></button>
                    </td>
                </tr>`
                });

                $('#mycart').html(rows);
            }
        })
    }
    mycart();
</script>
<!--=========================== End Load mycart Data============================== -->


<!--=========================== Remove mycart Data============================== -->

<script type="text/javascript">
    function removeWishlist(id){
        $.ajax({
            type:'GET',
            url:'/user/remove-mycart/'+id,
            dataType:'json',
            success:function (data){
                wishlist();
                // Start Message
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                })
                if ($.isEmptyObject(data.error)) {
                    Toast.fire({
                        type: 'success',
                        icon: 'success',
                        title: data.success
                    })
                }else{
                    Toast.fire({
                        type: 'error',
                        icon: 'error',
                        title: data.error
                    })
                }
                // End Message
            }
        })

    }
</script>

<!--=========================== End Remove mycart Data============================== -->



</body>
</html>
