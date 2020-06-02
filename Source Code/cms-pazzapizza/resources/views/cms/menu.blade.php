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
<!-- ================ Menu Banner start ================= -->   
<section class="blog-banner-area" id="category" >
    <div class="h-100" style="background-image: url('{{ asset('images/cms/menu_banner.jpg') }}'); background-repeat:no-repeat; -webkit-background-size:cover; -moz-background-size:cover; -o-background-size:cover; background-size:cover; background-position:center;">
        <div class="container-fluid h-100" >
            <div class="blog-banner">
                <div class="text-center">
                    <h1 style="color: #FBFBFB; text-shadow: 2px 2px #ED262A;">M E N U</h1>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ================ Menu Banner end ================= -->
<!-- ================ Category section start ================= -->        
<section class="section-margin--small mb-5">
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-4 col-md-5">
                <div class="sidebar-categories">
                    <div class="head">Filter Menu</div>
                    <ul class="main-categories">
                        <li class="common-filter">
                            <h5 class="text-secondary">Category</h5>
                            <ul>
                                <li class="filter-list"><input class="pixel-radio" type="radio" id="All" name="category" value="" @if(app('request')->input('category') == "") checked @endif><span for="All">Show All<span class="float-right"></span></span></li>
                                @if(sizeof($category_lists) > 0 && sizeof($all_product_lists) > 0)
                                @foreach($category_lists as $category)
                                @if($category->total_product > 0)
                                <li class="filter-list"><input class="pixel-radio" type="radio" id="{{ $category->name }}" name="category" value="{{ $category->id }}" @if(app('request')->input('category') == $category->id) checked @endif><span for="{{ $category->name }}">{{ $category->name }}<span class="float-right"> {{ $category->total_product }} </span></span></li>
                                @endif
                                @endforeach
                                @else
                                <span>No Records</span>
                                @endif
                            </ul>
                            <hr>
                            <h5 class="text-secondary">Price</h5>
                            <div class="form-group input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        Rp
                                    </div>
                                </div>
                                <input type="text" class="form-control" id="min_price" name="min_price" placeholder="Minimum Price" value="{{ app('request')->input('min_price') }}">
                            </div>
                            <div class="form-group input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        Rp
                                    </div>
                                </div>
                                <input type="text" class="form-control" id="max_price" name="max_price" placeholder="Maximum Price" value="{{ app('request')->input('max_price') }}">
                            </div>
                            <div class="pt-5 text-center">
                                <button type="button" class="btn btn-outline-danger px-5" id="filter-id"> Filter </button>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-9 col-lg-8 col-md-7">
                <!-- Start Filter Bar -->
                <div class="filter-bar d-flex flex-wrap align-items-center">
                    <div class="sorting">
                        <select name="sorting" id="sorting-id">
                            <option value="" selected>Sorting</option>
                            <option value="name_asc" @if( app('request')->input('sorting') == "name_asc") selected @endif>Name ASC</option>
                            <option value="name_desc" @if( app('request')->input('sorting') == "name_desc") selected @endif>Name DESC</option>
                            <option value="price_asc" @if( app('request')->input('sorting') == "price_asc") selected @endif>Lowest price</option>
                            <option value="price_desc" @if( app('request')->input('sorting') == "price_desc") selected @endif>Highest price</option>
                            <option value="created_asc" @if( app('request')->input('sorting') == "created_asc") selected @endif>Oldest</option>
                            <option value="created_desc" @if( app('request')->input('sorting') == "created_desc") selected @endif>Newest</option>
                        </select>
                    </div>
                    <div class="sorting mr-auto">
                        <select name="paginate" id="paginate-id">
                            <option value="" selected>Pagination</option>
                            <option value="20" @if( app('request')->input('paginate') == 20) selected @endif>Paginate 20</option>
                            <option value="40" @if( app('request')->input('paginate') == 40) selected @endif>Paginate 40</option>
                            <option value="60" @if( app('request')->input('paginate') == 60) selected @endif>Paginate 60</option>
                        </select>
                    </div>
                    <div>
                        <div class="input-group filter-bar-search">
                            <input type="text" maxlength="100" name="search" id="search-id" placeholder="Search" value="{{ app('request')->input('search') }}">
                            <div class="input-group-append">
                                <button type="button" id="search_button-id"><i class="ti-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Filter Bar -->
                <!-- Start Best Seller -->
                <section class="lattest-product-area pb-40 category-list">
                    <div class="row">
                    @if(sizeof($product_lists) > 0)
                    @foreach($product_lists as $product)
                        <div class="col-md-6 col-lg-4">
                            <div class="card text-center card-product">
                                <div class="card-product__img">
                                    <img class="card-img" src="{{ asset($product->image_url) }}" alt="">
                                    <ul class="card-product__imgOverlay">
                                        <a href="{{ route('menu.details', $product->id) }}">
                                            <li>
                                                <button>
                                                    <i class="ti-search"></i>
                                                </button>
                                            </li>
                                        </a>
                                        @if($product->stock > 0)
                                        <a href="javascript:void(0)" onclick="addToCart({{ $product->id }})">
                                            <li>
                                                <button>
                                                    <i class="ti-shopping-cart"></i>
                                                </button>
                                            </li>
                                        </a>
                                        @endif
                                        <a href="javascript:void(0)" onclick="addToFavorite({{ $product->id }})">
                                            <li>
                                                <button>
                                                    <i class="ti-heart"></i>
                                                </button>
                                            </li>
                                        </a>
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <p>{{ $product->category->name }}</p>
                                    <h4 class="card-product__title"><a href="#">{{ $product->name }}</a></h4>
                                    <p class="card-product__price"> Rp {{ number_format($product->price,0,",",".") }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    @else
                    <div class="w-100 text-center">
                        <span>No Records</span>
                    </div>
                    @endif
                    </div>
                    <div class="col-md-12">
                        <div class="float-right">
                            {{ $product_lists->appends(['search' => app('request')->input('search'), 'paginate' => app('request')->input('paginate'), 'sorting' => app('request')->input('sorting'), 'category' => app('request')->input('category'), 'min_price' => app('request')->input('min_price'), 'max_price' => app('request')->input('max_price')])->links() }}
                        </div>
                    </div>
                </section>
                <!-- End Best Seller -->
            </div>
        </div>
    </div>
</section>
<!-- ================ Category section end ================= -->          
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
<!-- End of all content -->
@endsection

@section('custom_js')   
<!-- Nouislider -->
<script src="{{ asset('plugins/nouislider/nouislider.min.js') }}"></script>
<!-- Jquery Mask -->
<script src="{{ asset('js/cms/jquery.mask.min.js') }}"></script>
<!-- Sweetalert -->
<script src="{{ asset('js/cms/sweetalert.min.js') }}"></script>
<!-- Custom JS -->
<script>
    $(function() {
        $("#min_price").mask('000000000');
        $("#max_price").mask('000000000');

        $("select#paginate-id").on('change', function(){
        //     $("#form-paginate").submit();
            sorting_product();
        })

        $("select#sorting-id").on('change', function(){
        //     $("#form-sorting").submit();
            sorting_product();
        })

        $("#filter-id").on('click', function(){
            sorting_product();
        })

        $("#search_button-id").on('click', function(){
            sorting_product();
        })
    });

    function sorting_product(){
        var category = $("input[name='category']:checked").val();
        var min_price = $("#min_price").val();
        var max_price = $("#max_price").val();
        var sorting = $("#sorting-id").val();
        var paginate = $("#paginate-id").val();
        var search = $("#search-id").val();

        var currentPageUrl = $(location).attr("href").split("?")[0];

        var newPageUrl = `${currentPageUrl}?`;

        if(category){
            newPageUrl += `category=${category}&`;
        }
        if(min_price){
            newPageUrl += `min_price=${min_price}&`;
        }
        if(max_price){
            newPageUrl += `max_price=${max_price}&`;
        }
        if(sorting){
            newPageUrl += `sorting=${sorting}&`;
        }
        if(paginate){
            newPageUrl += `paginate=${paginate}&`;
        }
        if(search){
            newPageUrl += `search=${search}&`;
        }

        newPageUrl = newPageUrl.substr(0, newPageUrl.length-1);

        window.location.href = `${newPageUrl}`;
    }

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


