@extends('Admin/layout/main')
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
@section('content-wrapper')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('panel') }}">Panel</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('panel.product') }}">Product Lists</a></li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Product</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form id="form-product" method="POST">
                            {{csrf_field()}}
                            <div class="card-body">
                                <input type="hidden" name="product_temp" maxlength="100" id="product_id" value="{{ $product->id }}">
                                <input type="hidden" name="image_url_temp" id="image_url_id" value="{{ $product->image_url }}">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group m-0">
                                            <label for = "name">Name</label>
                                            <input type="text" class="form-control" id =  "name-id" name = "name" placeholder = "Product Name" value="{{ $product->name }}">
                                            <small class="ml-1 text-danger" id="name_err"></small>
                                        </div>
                                        <div class="form-group">
                                            <label for = "category">Category</label>
                                            <select class="form-control custom-select" id = "category-id" name = "category">
                                                <option selected value="">Select one</option>
                                                @foreach($category_lists as $category)
                                                <option value = "{{ $category->id }}"
                                                    @if($category->id == $product->category_id)
                                                        selected
                                                    @endif
                                                    >{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                            <small class="ml-1 text-danger" id="category_err"></small>
                                        </div>
                                        <div class="form-group m-0">
                                            <label for = "description">Description</label>
                                            <textarea rows="5" maxlength="1000" class="form-control" id = "description-id" name = "description" placeholder = "Product Description">{{ $product->description }}</textarea>
                                            <small class="ml-1 text-danger" id="description_err"></small>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-6 form-group m-0">
                                                <label for="harga">Stock</label>
                                                <input type="text" class="form-control" id = "stock-id" name = "stock" placeholder = "Product Stock" value="{{ $product->stock }}">
                                                <small class="ml-1 text-danger" id="stock_err"></small>
                                            </div>
                                            <div class="col-md-6 form-group m-0">
                                                <label for="harga">Price</label>
                                                <input type="text" class="form-control" id = "price-id" name = "price" placeholder = "Product Price" value="{{ $product->price }}">
                                                <small class="ml-1 text-danger" id="price_err"></small>
                                            </div>
                                        </div>
                                        <div class="form-group m-0">
                                            <label class="control-label">Image</label>
                                            <input type="file" id="image-id" name="image" class="dropify" data-max-file-size="2M"/> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer text-right">
                                <a href="{{ route('panel') }}" class="btn btn-outline-secondary px-5 mx-1">Back</a>
                                <button type="submit" class="btn btn-outline-primary px-5 mx-1">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
    <!-- End Of Main Content -->
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
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
        // clearForm();
        $('.dropify').dropify({
            error: {
                'fileSize': 'The file size is too big (2M max).',
            }
        });

        $("#price-id").mask('000000000');
        $("#stock-id").mask('000');

        $("#name-id").on('keyup', function(){
            $("#name_err").text("");
        });
        $("#category-id").on('change', function(){
            $("#category_err").text("");
        });
        $("#description-id").on('keyup', function(){
            $("#description_err").text("");
        });
        $("#price-id").on('keyup', function(){
            $("#price_err").text("");
        });
        $("#stock-id").on('keyup', function(){
            $("#stock_err").text("");
        });

        var img_url = $("#image_url_id").val();

        var base_url = window.location.origin;
        var drEvent = $('#image-id').dropify({
            defaultFile: base_url + img_url
        });
        drEvent = drEvent.data('dropify');
        drEvent.resetPreview();
        drEvent.clearElement();
        drEvent.settings.defaultFile = base_url + img_url;
        drEvent.destroy();
        drEvent.init();
    });

    $('#form-product').submit(function(event) {
        event.preventDefault();
    
        data = new FormData();
    
        data.append('name', $('#name-id').val());
        data.append('description', $('#description-id').val());
        data.append('category_id', $('#category-id').children("option:selected").val());
        data.append('price', $('#price-id').val());
        data.append('stock', $('#stock-id').val());
        if ($('#image-id')[0].files[0] != null && $('#image-id')[0].files[0] != 'undefined') {
            data.append('image', $('#image-id')[0].files[0]);
        }
    
        var error = false; 
    
        if(!data.get('name')){
            $("#name_err").text("Product Name field must be filled");
            error = true;
        } 
        if(!data.get('price')){
            $("#price_err").text("Product Price field must be filled");
            error = true;
        } 
        if(!data.get('stock')){
            $("#stock_err").text("Product Stock field must be filled");
            error = true;
        } 
        if(!data.get('description')){
            $("#description_err").text("Description field must be filled");
            error = true;
        } 
        if(!data.get('category_id')){
            $("#category_err").text("Please choose the Category");
            error = true;
        } 
        
        url = "{{ route('panel.product.updatePost', $product->id) }}";
    
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
                        
                        swal({title : "Success!", text: "Product has been updated.", type: "success"}, function() {
                            window.top.location.href = "{{ route('panel.product') }}"
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
            console.log("Cannot update product. Please fill up all the form");
        }
    });
    
</script>
@endsection