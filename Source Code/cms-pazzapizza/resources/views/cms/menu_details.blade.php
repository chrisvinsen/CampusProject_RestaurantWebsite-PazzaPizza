@extends('cms.layouts.base')

@section('custom_css')
<!-- Nice Select -->
<link rel="stylesheet" href="{{ asset('plugins/nice-select/nice-select.css') }}">
<!-- Nouislider -->
<link rel="stylesheet" href="{{ asset('plugins/nouislider/nouislider.min.css') }}">
<!-- Bootstrap Select -->
<link rel="stylesheet" href="{{ asset('css/cms/bootstrap-select.min.css') }}">
<!-- Dropify -->
<link rel="stylesheet" href="{{ asset('css/cms/dropify.min.css') }}">
<!-- Sweetalert -->
<link rel="stylesheet" href="{{ asset('css/cms/sweetalert.css') }}">
@endsection

@section('content')
<!-- All Content -->
<!--================Single Product Area =================-->
<div class="product_image_area">
    <div class="container">
        <div class="row s_product_inner">
            <div class="col-lg-6">
                <div class="owl-carousel owl-theme s_Product_carousel">
                    <div class="single-prd-item">
                        <img class="img-fluid" src="{{ $product_details->image_url }}" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-5 offset-lg-1">
                <div class="s_product_text">
                    <h3>{{ $product_details->name }}</h3>
                    <input type="hidden" id="product-id" value="{{ $product_details->id }}">
                    <h2>Rp {{ number_format($product_details->price,0,",",".") }}</h2>
                    <ul class="list">
                        <li><a class="active" href="#"><span>Category</span> : {{ $product_details->category->name }}</a></li>
                        <li><a href="#"><span>Availibility</span> : 
                            @if($product_details->stock > 0)
                                <span> {{ $product_details->stock }} Stock</span>
                            @else
                                <span class="text-danger">Out of Stock</span>
                            @endif
                        </a></li>
                    </ul>
                    <p>
                        {{ $product_details->description }}
                    </p>
                    @if($product_details->stock > 0)
                    <div class="product_count">
                        <label for="qty">Quantity:</label>
                        <input type="number" id="qty-id" name="qty" min="1" max="{{ $product_details->stock }}" value="1" title="Quantity:" class="input-text qty">
                        <a class="button primary-btn" href="javascript:void(0)" onclick="addToCart({{ $product_details->id }})">Add to Cart</a>               
                    </div>
                    @endif
                    <div class="card_area d-flex align-items-center">
                        <a class="icon_btn" href="javascript:void(0)" onclick="addToFavorite({{ $product_details->id }})"><i class="lnr lnr lnr-heart"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--================End Single Product Area =================-->
<!--================Product Review Area =================-->
<section class="product_description_area" id="review_area-id">
    <div class="container">
        <div class="tab-content">
            <div class="tab-pane active" id="review">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="row total_rate">
                            <div class="col-6">
                                <div class="box_total">
                                    <h5>Overall</h5>
                                    <h4>{{ round($overall_review, 1) }}</h4>
                                    <h6>({{ $total_review }} Reviews)</h6>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="rating_list">
                                    <h3>Based on {{ $total_review }} Reviews</h3>
                                    <ul class="list">
                                        <li>
                                            <a href="#">5 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> {{ $total_5star }} </a>
                                        </li>
                                        <li>
                                            <a href="#">4 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star stroke-transparent"></i> {{ $total_4star }} </a>
                                        </li>
                                        <li>
                                            <a href="#">3 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star stroke-transparent"></i><i class="fa fa-star stroke-transparent"></i> {{ $total_3star }} </a>
                                        </li>
                                        <li>
                                            <a href="#">2 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star stroke-transparent"></i><i class="fa fa-star stroke-transparent"></i><i class="fa fa-star stroke-transparent"></i> {{ $total_2star }} </a>
                                        </li>
                                        <li>
                                            <a href="#">1 Star <i class="fa fa-star"></i><i class="fa fa-star stroke-transparent"></i><i class="fa fa-star stroke-transparent"></i><i class="fa fa-star stroke-transparent"></i><i class="fa fa-star stroke-transparent"></i> {{ $total_1star }} </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="review_list">
                            @if(sizeof($review_lists) > 0)
                            @foreach($review_lists as $key => $review)
                            <div class="review_item">
                                <div class="media">
                                    <div class="d-flex">
                                        <img class="rounded-circle" width="70px" src="{{ $review->user->photo_profile }}" onerror="if (this.src != '{{ asset('/images/cms/default_avatar.jpg') }}') this.src = '{{ asset('/images/cms/default_avatar.jpg') }}';" onerror="if (this.src != '{{ asset('/images/cms/default_avatar.jpg') }}') this.src = '{{ asset('/images/cms/default_avatar.jpg') }}';" alt="">
                                    </div>
                                    <div class="media-body">
                                        <h4>{{ $review->user->firstname }}</h4>
                                        @foreach(range(1, $review->rating) as $i)
                                        <i class="fa fa-star"></i>
                                        @endforeach
                                        <?php for($i = 0; $i < 5-$review->rating; $i++){ ?>
                                            <i class="fa fa-star stroke-transparent"></i>
                                        <?php }?>
                                    </div>
                                </div>
                                <p class="font-weight-bold">{{ $review->title }}</p>

                                <p>{{ $review->message }}</p>
                            </div>
                            @endforeach
                            @else
                            <p class="text-center">No Review Record</p>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="review_box">
                            <h4>Add a Review</h4>
                            <p>Your Rating:</p>
                            <ul class="list">
                                <li><a href="javascript:void(0)" id="star1"><i class="fa fa-star"></i></a></li>
                                <li><a href="javascript:void(0)" id="star2"><i class="fa fa-star"></i></a></li>
                                <li><a href="javascript:void(0)" id="star3"><i class="fa fa-star"></i></a></li>
                                <li><a href="javascript:void(0)" id="star4"><i class="fa fa-star"></i></a></li>
                                <li><a href="javascript:void(0)" id="star5"><i class="fa fa-star"></i></a></li>
                            </ul>
                            <input type="hidden" id="current_rating" value="5">
                            <p>Outstanding</p>
                            <form id="form-review" method="post" class="form-contact form-review mt-3">
                                @if($transaction_to_be_reviewed)
                                <input type="hidden" id="transaction_reviewed-id" value="{{ $transaction_to_be_reviewed->id }}">
                                @endif
                                <div class="form-group">
                                    <input class="form-control" maxlength="100" name="title" id="title-id" type="text" placeholder="Enter Title" @if(!$transaction_to_be_reviewed) disabled @endif>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control different-control w-100" maxlength="500" name="textarea" id="message-id" name="message" cols="30" rows="5" placeholder="Enter Message" @if(!$transaction_to_be_reviewed) disabled @endif></textarea>
                                    <span class="text-danger pl-1" id="title_err"></span>
                                </div>
                                <div class="form-group text-center text-md-right mt-3">
                                    @if($transaction_to_be_reviewed)
                                    <button type="submit" class="button button--active button-review">Submit Now</button>
                                    @else
                                    <span class="text-danger">You can write the review after purchase the product</span>
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Product Review Area =================-->
<!-- End of all content -->
@endsection

@section('custom_js')
<!-- Bootstrap Select -->
<script src="{{ asset('js/cms/bootstrap-select.min.js') }}"></script>
<!-- Dropify -->
<script src="{{ asset('js/cms/dropify.min.js') }}"></script>
<!-- Sweetalert -->
<script src="{{ asset('js/cms/sweetalert.min.js') }}"></script>
<!-- Jquery Mask -->
<script src="{{ asset('js/cms/jquery.mask.min.js') }}"></script>
<!-- Custom JS -->
<script>
    $(function(){
        $('.dropify').dropify({
            error: {
                'fileSize': 'The file size is too big (2M max).',
            }
        });

        $("#title-id").on('keyup', function(){
            $("#title_err").text("");
        });

        $("[type='number']").keypress(function (evt) {
            evt.preventDefault();
        });

        @if($transaction_to_be_reviewed)
        $("#star1").on('click', function(){
            $("#current_rating").val(1);
            $("#star1 i").removeClass('stroke-transparent');
            $("#star2 i").addClass('stroke-transparent');
            $("#star3 i").addClass('stroke-transparent');
            $("#star4 i").addClass('stroke-transparent');
            $("#star5 i").addClass('stroke-transparent');
        });
        $("#star2").on('click', function(){
            $("#current_rating").val(2);
            $("#star1 i").removeClass('stroke-transparent');
            $("#star2 i").removeClass('stroke-transparent');
            $("#star3 i").addClass('stroke-transparent');
            $("#star4 i").addClass('stroke-transparent');
            $("#star5 i").addClass('stroke-transparent');
        });
        $("#star3").on('click', function(){
            $("#current_rating").val(3);
            $("#star1 i").removeClass('stroke-transparent');
            $("#star2 i").removeClass('stroke-transparent');
            $("#star3 i").removeClass('stroke-transparent');
            $("#star4 i").addClass('stroke-transparent');
            $("#star5 i").addClass('stroke-transparent');
        });
        $("#star4").on('click', function(){
            $("#current_rating").val(4);
            $("#star1 i").removeClass('stroke-transparent');
            $("#star2 i").removeClass('stroke-transparent');
            $("#star3 i").removeClass('stroke-transparent');
            $("#star4 i").removeClass('stroke-transparent');
            $("#star5 i").addClass('stroke-transparent');
        });
        $("#star5").on('click', function(){
            $("#current_rating").val(5);
            $("#star1 i").removeClass('stroke-transparent');
            $("#star2 i").removeClass('stroke-transparent');
            $("#star3 i").removeClass('stroke-transparent');
            $("#star4 i").removeClass('stroke-transparent');
            $("#star5 i").removeClass('stroke-transparent');
        });
        @endif


    });
    
    function clearForm() {
        $('#title-id').val("");
        $('#message-id').val("");
    
        $("#title_err").text("");
        $("#message_err").text("");
    }
    
    $('#form-review').submit(function(event) {
        event.preventDefault();
    
    
        data = new FormData();
    
        data.append('product_id', $('#product-id').val());
        data.append('transaction_id', $('#transaction_reviewed-id').val());
        data.append('rating', $("#current_rating").val());
        data.append('title', $('#title-id').val());
        data.append('message', $('#message-id').val());

        var error = false; 
    
        if(!data.get('title')){
            $("#title_err").text("*Title field must be filled");
            error = true;
        } 
        
        url = "{{ route('menu.review.store') }}";
    
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
                        swal({title : "Success!", text: "Review has been uploaded.", type: "success"}, function() {
                            window.location.reload(true);
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
            console.log("Cannot add new review. Please fill up all the form");
        }
    });

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
        data.append('quantity_order', $("#qty-id").val());

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