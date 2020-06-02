@extends('Admin/layout/main')
@section('title','product Detail')
@section('content-wrapper')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Product Details</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('panel') }}">Panel</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('panel.product') }}">Product Lists</a></li>
                        <li class="breadcrumb-item active">Details</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{ $product->name }}</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 p-4">
                        <img class="w-100" src="{{ $product->image_url }}" alt="{{ $product->name }}">
                    </div>
                    <div class="col-md-6">
                        <div class="card-body">
                            <h3 class="mb-4">Product Information</h3>
                            <div class="form-group">
                                <label for="category">Name</label>
                                <p>{{ $product->name }}</p>
                            </div>
                            <div class="form-group">
                                <label for="category">Category</label>
                                <p>{{ $product->category->name }}</p>
                            </div>
                            <div class="form-group">
                                <label for="price">Price</label>
                                <p>{{ $product->price }}</p>
                            </div>
                            <div class="form-group">
                                <label for="price">Stock</label>
                                <p>{{ $product->stock }}</p>
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <p>{{ $product->description }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-right p-3">
                    <a href="{{ route('panel') }}" class="btn btn-outline-secondary mx-1">Back</a>
                    <a href="{{ route('panel.product.update', $product->id) }}" class="btn btn-outline-primary mx-1">Edit products</a>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection