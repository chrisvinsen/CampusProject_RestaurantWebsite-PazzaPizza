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
<section class="blog-banner-area" id="contact">
    <div class="h-100" style="background-image: url('{{ asset('images/cms/menu_banner.jpg') }}'); background-repeat:no-repeat; -webkit-background-size:cover; -moz-background-size:cover; -o-background-size:cover; background-size:cover; background-position:center;">
        <div class="blog-banner">
            <div class="text-center">
                <h1 style="color: #FBFBFB; text-shadow: 2px 2px #ED262A;">C H E C K O U T</h1>
            </div>
        </div>
    </div>
</section>
<!-- ================ end banner area ================= -->
<!--================Checkout Area =================-->
<section class="checkout_area section-margin--small">
    <div class="container">
        <div class="billing_details">
            <div class="row">
                <div class="col-xl-8 col-lg-6 order-lg-1 order-2">
                    <h2 class="m-0">Order Details</h2>
                    <form id="form-payment" class="row contact_form" method="POST">
                        @csrf
                        <div class="col-md-12 form-group p_star m-0 mb-1">
                            <textarea maxlength="500" class="form-control" name="address" id="address-id" rows="3" placeholder="Address"></textarea>
                            <small class="ml-1 text-danger" id="address_err"></small>
                        </div>
                        <div class="col-md-12 form-group p_star m-0 mb-1">
                            <input type="text" class="form-control" id="phone_number-id" name="phone_number" placeholder="Phone Number">
                            <small class="ml-1 text-danger" id="phone_number_err"></small>
                        </div>
                        <div class="col-md-12 form-group p_star">
                            <textarea maxlength="500" class="form-control m-0" name="order_notes" id="order_notes-id" rows="3" placeholder="Add notes for the seller."></textarea>
                        </div>
                        <div class="col-md-12 form-group p_star mb-3">
                            <div class="creat_account">
                                <h3 class="m-0">Payment</h3>
                            </div>
                            <input type="text" class="form-control" id="money-id" name="money" placeholder="Enter the exact money">
                            <small class="ml-1 text-danger" id="money_err"></small>
                        </div>
                        <hr>
                        <div class="col-md-12 form-group p_star">
                            <button class="button" type="submit" id="submit-form">Submit and Pay</button>
                        </div>
                    </form>
                </div>
                <div class="col-xl-4 col-lg-6 order-lg-2 order-1 mb-5">
                    <div class="order_box">
                        <h2>Your Order</h2>
                        <ul class="list">
                            <li>
                                <a href="#">
                                    <h4>Product <span>Total</span></h4>
                                </a>
                            </li>
                            @if(sizeof($cart_lists) > 0)
                            <span class="d-none" id="total_cart">{{ sizeof($cart_lists) }}</span>
                            @foreach($cart_lists as $key => $cart)
                            <li>
                                <a href="#">{{ $cart->product->name }} 
                                    <span class="middle">x {{ $cart->quantity_order }}</span> 
                                    <span class="last">Rp {{ $cart->quantity_order * $cart->product->price }}</span>
                                    <span class="d-none" id="total_temp{{ $key+1 }}">{{ $cart->quantity_order * $cart->product->price }}</span>
                                </a>
                            </li>
                            @endforeach
                            @endif
                        </ul>
                        <hr>
                        <ul class="list list_2">
                            <li><a href="javascript:void(0)">Subtotal <span id="subtotal_price"></span></a></li>
                            <li><a href="javascript:void(0)">Shipping <span>Free</span></a></li>
                            <li><a href="javascript:void(0)" class="font-weight-bold">Total <span id="total_price"></span></a></li>
                            <span id="total_price_temp" class="d-none"></span>
                        </ul>
                        <hr>
                        <div class="payment_item">
                            <div class="radion_btn mb-0">
                                <label for="f-option5">Note</label>
                            </div>
                            <p>Please fill up all the order details and pay with the <span class="font-weight-bold">Exact Money</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Checkout Area =================-->
<!-- End of all content -->


@endsection

@section('custom_js') 
<!-- Sweetalert -->
<script src="{{ asset('js/cms/sweetalert.min.js') }}"></script>
<!-- Jquery Mask -->
<script src="{{ asset('js/cms/jquery.mask.min.js') }}"></script>  
<!-- Custom JS -->  
<script>
    function sumTotal(){
        var total_cart = $("#total_cart").text();
        var sum = 0;
        for(var i = 1; i <= total_cart; i++){
            sum += parseInt($(`#total_temp${i}`).text());
        }
        $("#subtotal_price").text(`Rp ${sum.toLocaleString()}`);
        $("#total_price").text(`Rp ${sum.toLocaleString()}`);
        $("#total_price_temp").text(sum);

        if(sum == 0)
            window.top.location.href = "{{ route('menu.order.cart') }}"
        else
            $("#submit-form").show();
    }

    $(function(){
        sumTotal();

        $("#phone_number-id").mask("Z99000000000000", {
           translation: {
             '0': {pattern: /\d/},
             '9': {pattern: /\d/, optional: true},
             'Z': {pattern: /[\-\+]/, optional: true}
           }
        });
        $("#money-id").mask('000000000000');

        $("#address-id").on('keyup', function(){
            $("#address_err").text("");
        });
        $("#phone_number-id").on('keyup', function(){
            $("#phone_number_err").text("");
        });
        $("#money-id").on('keyup', function(){
            $("#money_err").text("");
        });
    });

    $('#form-payment').submit(function(event) {
        event.preventDefault();
    
        data = new FormData();
    
        data.append('address', $('#address-id').val());
        data.append('phone_number', $('#phone_number-id').val());
        data.append('order_notes', $('#order_notes-id').val());
        data.append('money', $('#money-id').val());
    
        var error = false; 
    
        if(!data.get('address')){
            $("#address_err").text("Address field must be filled");
            error = true;
        } 
        if(!data.get('phone_number')){
            $("#phone_number_err").text("Phone Number field must be filled");
            error = true;
        } 
        if(!data.get('money')){
            $("#money_err").text("Money field must be filled");
            error = true;
        } else{
            if($("#total_price_temp").text() != data.get('money')){
                $("#money_err").text("Please pay with the exact money");
                error = true;
            }
        }

        url = "{{ route('menu.order.checkout.store') }}";
    
        if(!error){
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
                    if (data) {
                        console.log(data);
                        console.log(data.id);
                        swal({title : "Success!", text: "Payment has been received.", type: "success"}, function() {
                            var url = "{{ route('menu.order.confirmation', ['transaction' => "id"]) }}";
                            url = url.replace('id', data.id);
                            window.top.location.href = url;
                        }); 
                    }
                },
                error: function(request, status, error) {
                    if (request.statusText == 'abort') {
                        return;
                    }
                    alert(request.responseJSON.messages);
                }
            });
        }else{
            console.log("Transaction failed. Please try again.");
        }
    });
    
</script>
@endsection