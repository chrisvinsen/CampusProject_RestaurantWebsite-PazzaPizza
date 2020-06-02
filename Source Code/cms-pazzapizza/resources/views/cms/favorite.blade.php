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
<!-- ================ start banner area ================= -->   
<section class="blog-banner-area" id="blog">
    <div class="h-100" style="background-image: url('{{ asset('images/cms/menu_details_banner.jpg') }}'); background-repeat:no-repeat; -webkit-background-size:cover; -moz-background-size:cover; -o-background-size:cover; background-size:cover; background-position:center;">
        <div class="blog-banner">
            <div class="text-center">
                <h1 style="color: #FBFBFB; text-shadow: 2px 2px #ED262A;">F A V O R I T E</h1>
            </div>
        </div>
    </div>
</section>
<!-- ================ end banner area ================= -->
<!--================ Favorite Area =================-->
<section class="cart_area">
    <div class="container">
        <div class="cart_inner">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col" width="50">#</th>
                            <th scope="col">Product</th>
                            <th scope="col">Category</th>
                            <th scope="col">Stock</th>
                            <th scope="col">Price</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(sizeof($favorite_lists) > 0)
                        @foreach($favorite_lists as $key => $favorite)
                        <tr>
                            <td>
                                <h5>{{ $key+1 }}</h5>
                            </td>
                            <td>
                                <div class="media">
                                    <div class="d-flex">
                                        <img width="75px" src="{{ $favorite->product->image_url }}" alt="">
                                    </div>
                                    <div class="media-body">
                                        <p>{{ $favorite->product->name }}</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <h5>{{ $favorite->product->category->name }}</h5>
                            </td>
                            <td>
                                <h5>{{ $favorite->product->stock }}</h5>
                            </td>
                            <td>
                                <h5>{{ $favorite->product->price }}</h5>
                            </td>
                            <td>
                                <a class="px-2" href="javascript:void(0)" onclick="deleteFavorite({{ $favorite->id }})"><i class="fa fa-trash text-muted" style="font-size: 1.5em;"></i></a>
                                <a class="px-2" href="{{ route('menu.details', $favorite->product->id) }}"><i class="ti-shopping-cart text-muted" style="font-size: 1.5em;"></i></a>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr class="text-center">
                            <td colspan="6">No Favorite Records</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
                <div class="col-md-12">
                    <div class="float-right">
                        {{ $favorite_lists->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================ End Favorite Area =================-->
<!-- End of all content -->
@endsection

@section('custom_js')  
<!-- Bootstrap Select -->
<script src="{{ asset('js/cms/bootstrap-select.min.js') }}"></script>
<!-- Dropify -->
<script src="{{ asset('js/cms/dropify.min.js') }}"></script>
<!-- Sweetalert -->
<script src="{{ asset('js/cms/sweetalert.min.js') }}"></script>
<!-- Custom JS --> 
<script>
    function deleteFavorite(idx) {
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
                var url = "{{ route('account.favorite.destroy', ['userFavorite' => "id"]) }}";
                url = url.replace('id', idx);
                $.get(url, function( data ) {
                    swal({title : "Deleted!", text: "Product has been deleted from Favorite list.", type: "success"}, function() {
                        window.location.reload(true);
                    });   
                });
            }
        });
    }
</script>
@endsection
