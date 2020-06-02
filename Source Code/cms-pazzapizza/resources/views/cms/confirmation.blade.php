@extends('cms.layouts.base')

@section('custom_css')
<!-- Nice Select -->
<link rel="stylesheet" href="{{ asset('plugins/nice-select/nice-select.css') }}">
<!-- Nouislider -->
<link rel="stylesheet" href="{{ asset('plugins/nouislider/nouislider.min.css') }}">
@endsection

@section('content')
<!-- All Content -->
<!-- ================ start banner area ================= -->   
<section class="blog-banner-area" id="category" >
    <div class="h-100" style="background-image: url('{{ asset('images/cms/menu_banner.jpg') }}'); background-repeat:no-repeat; -webkit-background-size:cover; -moz-background-size:cover; -o-background-size:cover; background-size:cover; background-position:center;">
        <div class="container-fluid h-100" >
            <div class="blog-banner">
                <div class="text-center">
                    <h1 style="color: #FBFBFB; text-shadow: 2px 2px #ED262A;">ORDER &nbspCONFIRMATION</h1>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ================ end banner area ================= -->
<!--================Order Details Area =================-->
<section class="order_details section-margin--small">
    <div class="container">
        <p class="text-center billing-alert font-weight-bold">Thank you. Your order has been received.</p>
        <div class="row row-eq-height mb-5">
            <div class="col-md-6 mb-4 mb-xl-0">
                <div class="confirmation-card h-100">
                    <h3 class="billing-title">Order Info</h3>
                    <table class="order-rable">
                        <tr>
                            <td>Order number</td>
                            <td>: {{ $transaction->id }}</td>
                        </tr>
                        <tr>
                            <td>Date</td>
                            <td>: {{ date_format($transaction->created_at, 'M, d Y') }}</td>
                        </tr>
                        <tr>
                            <td>Time</td>
                            <td>: {{ date_format($transaction->created_at, 'H:i:s') }}</td>
                        </tr>
                        <tr>
                            <td>Total</td>
                            <td>: Rp {{ number_format($transaction->total,0,",",".") }} </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="col-md-6 mb-4 mb-xl-0">
                <div class="confirmation-card h-100">
                    <h3 class="billing-title">Delivery Address</h3>
                    <table class="order-rable">
                        <tr>
                            <td>Full Address</td>
                            <td>: {{ $transaction->address }}</td>
                        </tr>
                        <tr>
                            <td>Phone Number</td>
                            <td>: {{ $transaction->phone_number }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="order_details_table">
            <h2>Order Details</h2>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Product</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(sizeof($transaction_details) > 0)
                        <span id="total_cart" class="d-none">{{ sizeof($transaction_details) }}</span>
                        @foreach($transaction_details as $key => $details)
                        <tr>
                            <td>
                                <p>{{ $details->product->name }}</p>
                            </td>
                            <td>
                                <h5>x {{ $details->quantity_order }}</h5>
                            </td>
                            <td>
                                <p> Rp {{ number_format($details->quantity_order * $details->product->price,0,",",".") }} </p>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                        <tr>
                            <td>
                                <h4>Subtotal</h4>
                            </td>
                            <td>
                                <h5></h5>
                            </td>
                            <td>
                                <p>Rp {{ number_format($transaction->total,0,",",".") }}</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4>Shipping</h4>
                            </td>
                            <td>
                                <h5></h5>
                            </td>
                            <td>
                                <p>FREE</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4>Total</h4>
                            </td>
                            <td>
                                <h5></h5>
                            </td>
                            <td>
                                <h4>Rp {{ number_format($transaction->total,0,",",".") }}</h4>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="pt-5 text-right">
            <a class="button mx-2" href="{{ route('menu.order.history') }}">Check History Transaction</a>
            <a class="button mx-2" href="{{ route('home') }}">Back to Home</a>
        </div>
    </div>
</section>
<!--================End Order Details Area =================-->
<!-- End of all content -->
@endsection

@section('custom_js')   

@endsection
