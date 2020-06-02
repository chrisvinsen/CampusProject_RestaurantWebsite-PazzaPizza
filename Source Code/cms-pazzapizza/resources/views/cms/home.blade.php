@extends('cms.layouts.base')

@section('custom_css')
<!-- Sweetalert -->
<link rel="stylesheet" href="{{ asset('css/cms/sweetalert.css') }}">
@endsection

@section('content')
<!-- All Content -->
<main class="site-main">
    <!--================ Home Banner start =================-->
    <section class="hero-banner">
        <div class="container">
            <div class="row no-gutters align-items-center pt-60px">
                <div class="col-5 d-none d-sm-block">
                    <div class="hero-banner__img rounded img-hover-zoom">
                        <img class="img-fluid rounded shadow" src="{{ asset('images/cms/home_banner.jpg') }}" alt="Home Banner">
                    </div>
                </div>
                <div class="col-sm-7 col-lg-6 offset-lg-1 pl-4 pl-md-5 pl-lg-0">
                    <div class="hero-banner__content">
                        <h4>Pazza is Pizza</h4>
                        <h1>Pizza is Pazza</h1>
                        <p>Pizza is a dish of Italian origin consisting of a flat, round base of dough baked with a topping of tomato sauce and cheese, typically with added meat or vegetables.</p>
                        <a class="button button-hero" href="{{ route('menu') }}">Order Now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================ Home Banner end =================-->
    <!--================ Category Product section start =================-->
    <section class="mt-0 container">
        <div class="owl-carousel owl-theme hero-carousel">
            @foreach($category_lists as $key => $category)
            @if(sizeof($category->product) > 0)
            <div class="hero-carousel__slide">
                <img src="{{ $category->product[sizeof($category->product)-1]->image_url }}" alt="" class="img-fluid">
                <a href="#" class="hero-carousel__slideOverlay">
                    <h3>{{ $category->name }}</h3>
                    <p>{{ $category->product[sizeof($category->product)-1]->name }}</p>
                </a>
            </div>
            @endif
            @endforeach
        </div>
    </section>
    <!--================ Category Product section end =================-->
    <!-- ================ New Menu section start ================= -->
    <section class="section-margin calc-60px">
        <div class="container">
            <div class="section-intro pb-60px">
                <p>Introducing our</p>
                <h2>New <span class="section-intro__style">Menu</span></h2>
            </div>
            <div class="row">
                @if(sizeof($new_product_lists) > 0)
                @foreach($new_product_lists as $key => $new_product)
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="card text-center card-product">
                        <div class="card-product__img">
                            <img class="card-img" src="{{ $new_product->image_url }}" alt="">
                            <ul class="card-product__imgOverlay">
                                <li><a href="{{ route('menu.details', $new_product->id) }}"><button><i class="ti-search"></i></button></a></li>
                                @if($new_product->stock > 0)
                                <li><a href="javascript:void(0)" onclick="addToCart({{ $new_product->id }})"><button><i class="ti-shopping-cart"></i></button></a></li>
                                @endif
                                <li><a href="javascript:void(0)" onclick="addToFavorite({{ $new_product->id }})"><button><i class="ti-heart"></i></button></a></li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <p>{{ $new_product->category->name }}</p>
                            <h4 class="card-product__title"><a href="#">{{ $new_product->name }}</a></h4>
                            <p class="card-product__price">Rp {{ number_format($new_product->price,0,",",".") }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
                @else
                <p>There is no new Menu</p>
                @endif
            </div>
        </div>
    </section>
    <!-- ================ New Menu section end ================= -->
    <!-- ================ Offer section start ================= -->
    <section class="offer" id="parallax-1" data-anchor-target="#parallax-1" data-300-top="background-position: 20px 30px" data-top-bottom="background-position: 0 20px" style="background:url('{{ asset('images/cms/home_banner_paralax.jpg') }}') right center no-repeat;">
        <div class="container">
            <div class="row">
                <div class="col-xl-5">
                    <div class="offer__content text-center">
                        <h3 style="text-shadow: 2px 2px white;">FREE DELIVERY</h3>
                        <h4 style="text-shadow: 2px 2px white;">OPENING PROMOTIONS</h4>
                        <p style="text-shadow: 0.5px 0.5px white;">Pizza is Pazza, Pazza is Pizza</p>
                        <a class="button button--active mt-3 mt-xl-4" href="{{ route('menu') }}">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ================ Oferr section end ================= -->
    <!-- ================ Best Selling Menu Carousel start ================= -->
    <section class="section-margin calc-60px">
        <div class="container">
            <div class="section-intro pb-60px">
                <p>Popular Foods and Drinks</p>
                <h2>Best <span class="section-intro__style">Sellers</span></h2>
            </div>
            @if(sizeof($best_transaction_lists) > 0)
            <div class="owl-carousel owl-theme" id="bestSellerCarousel">
                @foreach($best_transaction_lists as $key => $best_transaction)
                <div class="card text-center card-product">
                    <div class="card-product__img">
                        <img class="img-fluid" src="{{ $best_transaction->product->image_url }}" alt="">
                        <ul class="card-product__imgOverlay">
                            <li><a href="{{ route('menu.details', $best_transaction->product->id) }}"><button><i class="ti-search"></i></button></a></li>
                            @if($best_transaction->product->stock > 0)
                            <li><a href="javascript:void(0)" onclick="addToCart({{ $best_transaction->product->id }})"><button><i class="ti-shopping-cart"></i></button></a></li>
                            @endif
                            <li><a href="javascript:void(0)" onclick="addToFavorite({{ $best_transaction->product->id }})"><button><i class="ti-heart"></i></button></a></li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <p>{{ $best_transaction->product->category->name }}</p>
                        <h4 class="card-product__title"><a href="#"></a>{{ $best_transaction->product->name }}</h4>
                        <p class="card-product__price">{{ $best_transaction->product->price }}</p>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <p>There is no best selling Menu</p>
            @endif
        </div>
    </section>
    <!-- ================ Best Selling Menu Carousel end ================= -->
    <!-- ================ Quote section start ================= -->
    <section class="subscribe-position">
        <div class="container">
            <div class="subscribe text-center">
                <h3 class="subscribe__title">You Cant' Buy HAPPINESS, <br>But You Can Buy PIZZA <br>And That's Kind of The Same Thing</h3>
                <a class="button button-subscribe mr-auto mb-0 mt-3" href="{{ route('menu') }}">Order Now</a>
            </div>
        </div>
    </section>
    <!-- ================ Quote section end ================= -->
</main>
<!-- End of all content -->
@endsection

@section('custom_js')
<!-- Sweetalert -->
<script src="{{ asset('js/cms/sweetalert.min.js') }}"></script>
<!-- Custom JS -->
<script>
    function addToFavorite(idx) {

        data = new FormData();

        var url = "{{ route('account.favorite.store') }}";

        data.append('product_id', idx);

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
                        swal({
                            title : "Product Added to Favorite", 
                            text: "Please check your favorite lists.",
                            type: "success",
                            showConfirmButton: false,
                            timer: 1000
                        }, function(){
                            window.location.reload(true);
                        });
                    }
                },
                error: function(request, status, error) {
                    if (request.statusText == 'abort') {
                        return;
                    }
                    swal({
                        title : request.responseJSON.messages, 
                        text: "Please Check your Favorite Lists", 
                        type: "info"
                    }, function(){
                        if(request.responseJSON.status == "login"){
                            window.top.location.href = "{{ route('account.login') }}"
                        }
                    });
                }
            });
    }

    function addToCart(idx) {

        data = new FormData();

        var url = "{{ route('menu.order.cart.store') }}";

        data.append('product_id', idx);
        data.append('quantity_order', 1);

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
                        swal({
                            title : "Product Added to Cart", 
                            text: "Please check your cart lists.",
                            type: "success",
                            showConfirmButton: false,
                            timer: 1000
                        }, function(){
                            window.location.reload(true);
                        });
                    }
                },
                error: function(request, status, error) {
                    if (request.statusText == 'abort') {
                        return;
                    }
                    swal({
                        title : request.responseJSON.messages, 
                        text: "Please Check your Shopping Cart Lists", 
                        type: "info"
                    }, function(){
                        window.top.location.href = "{{ route('account.login') }}"
                    });
                }
            });
    }
</script>
@endsection
