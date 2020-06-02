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
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"> Product Lists </h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('panel') }}">Panel</a></li>
                        <li class="breadcrumb-item active">Product Lists</li>
                    </ol>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header border-0">
                            <div class="card-tools">
                                <div class="card-tools">
                                    <form>
                                        <div class="input-group input-group-sm" style="width: 250px;">
                                            <input type="text" class="form-control float-right" name="search" maxlength="50" placeholder="Search Here ..." value="{{ app('request')->input('search') }}">
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-striped table-valign-middle">
                                <thead>
                                    <tr>
                                        <th width="50">#</th>
                                        <th width="160">Month</th>
                                        <th>Name</th>
                                        <th width="160">Category</th>
                                        <th width="100">Stock</th>
                                        <th width="160">Price</th>
                                        <th width="160">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(sizeof($product_lists) > 0)
                                    @foreach ($product_lists as $key => $product)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td><img src="{{ $product->image_url }}" width="100"></td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->category->name }}</td>
                                        <td>{{ $product->stock }}</td>
                                        <td> Rp {{ number_format($product->price,0,",",".") }}</td>
                                        <td>
                                            <a href="{{ route('panel.product.detail', $product->id) }}" class="mx-1 text-muted cursor-pointer"><i class="fa fa-search"></i></a>
                                            <a href="{{ route('panel.product.update', $product->id) }}" class="mx-1 text-muted cursor-pointer"><i class="fa fa-edit"></i></a>
                                            <a href="javascript:void(0)" onclick="deleteProduct({{ $product->id }})" class="mx-1 text-muted cursor-pointer"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @else
                                    <tr>
                                        <td colspan="7" class="text-center">No Product Record</td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                            <div class="p-3">
                                <div class="float-right">
                                    {{ $product_lists->appends(['search' => app('request')->input('search')])->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
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
    function deleteProduct(idx) {
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
                var url = "{{ route('panel.product.delete', ['product' => "id"]) }}";
                url = url.replace('id', idx);
                $.get(url, function( data ) {
                    swal({title : "Deleted!", text: "Product has been deleted.", type: "success"}, function() {
                        window.location.reload(true);
                    });   
                });
            }
        });
    }
</script>
@endsection