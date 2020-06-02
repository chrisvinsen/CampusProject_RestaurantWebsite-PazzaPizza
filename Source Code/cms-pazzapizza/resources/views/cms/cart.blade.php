@extends('cms.layouts.base')

@section('custom_css')
<!-- Nice Select -->
<link rel="stylesheet" href="{{ asset('plugins/nice-select/nice-select.css') }}">
<!-- Nouislider -->
<link rel="stylesheet" href="{{ asset('plugins/nouislider/nouislider.min.css') }}">
<!-- Sweetalert -->
<link rel="stylesheet" href="{{ asset('css/cms/sweetalert.css') }}">
@endsection

@section('content')
<!-- All Content -->
<!-- ================ start banner area ================= -->
<section class="blog-banner-area" id="category">
    <div class="h-100" style="background-image: url('{{ asset('images/cms/menu_details_banner.jpg') }}'); background-repeat:no-repeat; -webkit-background-size:cover; -moz-background-size:cover; -o-background-size:cover; background-size:cover; background-position:center;">
        <div class="blog-banner">
            <div class="text-center">
                <h1 style="color: #FBFBFB; text-shadow: 2px 2px #ED262A;"> C A R T </h1>
            </div>
        </div>
    </div>
</section>
<!-- ================ end banner area ================= -->
<!--================Cart Area =================-->
<section class="cart_area">
    <div class="container">
        <div class="cart_inner">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th width="50">#</th>
                            <th>Product</th>
                            <th width="150">Price</th>
                            <th width="150">Stock Available</th>
                            <th width="150">Quantity</th>
                            <th width="150">Total</th>
                            <th width="100">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(sizeof($cart_lists) > 0)
                        <span class="d-none" id="total_cart">{{ sizeof($cart_lists) }}</span>
                        @foreach($cart_lists as $key => $cart)   
                        <tr>
                            <td>
                                <h5>{{ $key+1 }}</h5>
                            </td>
                            <td>
                                <div class="media">
                                    <div class="d-flex">
                                        <img width="75px" src="{{ asset( $cart->product->image_url ) }}" alt="">
                                    </div>
                                    <div class="media-body">
                                        <p>{{ $cart->product->name }}</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <h5>Rp {{ number_format($cart->product->price,0,",",".") }}</h5>
                                <span class="d-none" id="price{{ $key+1 }}">{{ $cart->product->price }}</h5>
                            </td>
                            <td>
                                <h5 id="stock{{ $key+1 }}">{{ $cart->product->stock }}</h5>
                            </td>
                            <td>
                                <div class="product_count">
                                    <form action="/cart/update/{{ $key+1 }}" method="post">
                                    @csrf
                                    @method('patch')
                                        <input type="hidden" name="pid[]" value="{{ $cart->product->id }}">
                                        <input type="text" name="qty[]" id="qty{{ $key+1 }}" value="@if( $cart->quantity_order > $cart->product->stock ) {{ $cart->product->stock }} @else {{ $cart->quantity_order }} @endif" title="Quantity:" class="input-text qty">
                                        <button onclick="increaseQty({{ $key+1 }})"
                                            class="increase items-count" type="button"><i class="lnr lnr-chevron-up"></i></button>
                                        <button onclick="decreaseQty({{ $key+1 }})"
                                            class="reduced items-count" type="button"><i class="lnr lnr-chevron-down"></i></button>
                                    </form>
                                </div>
                            </td>
                            <td>
                                <h5 id="total{{ $key+1 }}">Rp @if( $cart->quantity_order > $cart->product->stock ) {{ number_format($cart->product->price * $cart->product->stock,0,",",".") }} @else {{ number_format($cart->product->price * $cart->quantity_order,0,",",".") }} @endif </h5>
                                <span class="d-none" id="total_temp{{ $key+1 }}">@if( $cart->quantity_order > $cart->product->stock ){{ $cart->product->price * $cart->product->stock }}@else{{ $cart->product->price * $cart->quantity_order }}@endif</span>
                            </td>
                            <td>
                                <h5>
                                    <a class="cursor-pointer" onclick="deleteCart({{ $cart->id }})"><i class="fa fa-trash" style="font-size: 1.5em;"></i></a>
                                </h5>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr class="text-center">
                            <td colspan="7">Your shopping cart is empty.</td>
                        </tr>
                        @endif
                        <tr class="bottom_button">
                            <td colspan="3">
                                <a class="button" href="javascript:void(0)" onclick="clearAllCart()">Clear Cart</a>
                            </td>
                            <td></td>
                            <td class="text-right">
                                <h5>Subtotal</h5>
                            </td>
                            <td colspan="2" class="text-right">
                                <h5 id="subtotal_price"></h5>
                            </td>
                        </tr>
                        @if(sizeof($cart_lists) > 0)
                        <tr class="shipping_area">
                            <td colspan="7" class="text-right">
                                <h6 class="mb-3 mr-5 text-danger">Delivery</h6>
                                <div class="shipping_box">
                                    <ul class="list">
                                        <li class="active"><a href="javascript:void(0)">Free Delivery (Promotion)</a></li>
                                    </ul>
                                    <h6 class="mb-0 font-weight-bold">Total Price </h6>
                                    <h6 class="font-weight-bold" id="total_price"></h6>
                                </div>
                            </td>
                        </tr>
                        @endif
                        <tr class="out_button_area">
                            <td colspan="7">
                                <div class="checkout_btn_inner d-flex align-items-center float-right m-0">
                                    <a class="gray_btn" href="{{ route('menu') }}">Continue Order</a>
                                    @if(sizeof($cart_lists) > 0)
                                        <a class="primary-btn cursor-pointer ml-2" id="checkout-form">Proceed to checkout</a>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<!--================End Cart Area =================-->
<!-- End of all content -->
@endsection

@section('custom_js')
<!-- Sweetalert -->
<script src="{{ asset('js/cms/sweetalert.min.js') }}"></script>
<!-- Jquery Mask -->
<script src="{{ asset('js/cms/jquery.mask.min.js') }}"></script>  
<!-- Custom JS -->
<script>

    $(function(){
        sumTotal();
        $("input.qty").keypress(function (evt) {
            evt.preventDefault();
        });
    });

    function increaseQty(idx){
        var current_qty = parseInt( $(`#qty${idx}`).val() );
        current_qty++;
        if(current_qty <= $(`#stock${idx}`).text()){
            $(`#qty${idx}`).val(current_qty);
            var temp_total = $(`#price${idx}`).text() * current_qty;
            $(`#total${idx}`).text(`Rp ${temp_total.toLocaleString()}`);
            $(`#total_temp${idx}`).text(temp_total);
            sumTotal()
        }
    }

    function decreaseQty(idx){
        var current_qty = parseInt( $(`#qty${idx}`).val() );
        if(current_qty > 0){
            current_qty--;
            $(`#qty${idx}`).val(current_qty);
            var temp_total = $(`#price${idx}`).text() * current_qty;
            $(`#total${idx}`).text(`Rp ${temp_total.toLocaleString()}`);
            $(`#total_temp${idx}`).text(temp_total);
            sumTotal()
        }
    }

    function sumTotal(){
        var total_cart = $("#total_cart").text();
        var sum = 0;
        for(var i = 1; i <= total_cart; i++){
            sum += parseInt($(`#total_temp${i}`).text());
        }
        $("#subtotal_price").text(`Rp ${sum.toLocaleString()}`);
        $("#total_price").text(`Rp ${sum.toLocaleString()}`);

        if(sum == 0)
            $("#checkout-form").hide();
        else
            $("#checkout-form").show();
    }

    function deleteCart(idx) {
        swal({   
            title: "Are you sure?",   
            text: "You will not be able to recover this imaginary file!",   
            type: "warning",   
            showCancelButton: true,   
            confirmButtonColor: "#DD6B55",   
            confirmButtonText: "Yes, delete it!",   
            cancelButtonText: "No, cancel!",   
            closeOnConfirm: false,   
            closeOnCancel: true 
        }, function(isConfirm){   
            if (isConfirm) {     
                var url = "{{ route('menu.order.cart.destroy', ['cart' => "id"]) }}";
                url = url.replace('id', idx);
                $.get(url, function( data ) {
                    swal({title : "Deleted!", text: "Cart has been removed.", type: "success"}, function() {
                        window.location.reload(true);
                    });   
                });
            }
        });
    }

    function clearAllCart(){
        swal({   
            title: "Are you sure?",   
            text: "You will not be able to recover this imaginary file!",   
            type: "warning",   
            showCancelButton: true,   
            confirmButtonColor: "#DD6B55",   
            confirmButtonText: "Yes, delete it!",   
            cancelButtonText: "No, cancel!",   
            closeOnConfirm: false,   
            closeOnCancel: true 
        }, function(isConfirm){   
            if (isConfirm) {     
                var url = "{{ route('menu.order.cart.destroy.all') }}";
                $.get(url, function( data ) {
                    swal({title : "Deleted!", text: "Cart has been removed.", type: "success"}, function() {
                        window.location.reload(true);
                    });   
                });
            }
        });
    }

    $('#checkout-form').on('click', function() {
        var total_cart = $("#total_cart").text();

        data = new FormData();
        var url = "{{ route('menu.order.cart.update') }}";

        $.each($('input[name^=pid]'), function(index, elem) {
            var value = $(elem).val();
            if (value) {
                data.append('product_id[]', value);
            }
        });
        $.each($('input[name^=qty]'), function(index, elem) {
            var value = $(elem).val();
            if (value) {
                data.append('quantity_order[]', value);
            }
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        ajaxRequest = $.ajax({
            url: url,
            type: "POST",
            data: data,
            contentType: false,
            processData: false,
            success: function(data) {
                window.top.location.href = "{{ route('menu.order.checkout') }}"
            }
        });
        
    });

</script>
@endsection
