@extends('cms.layouts.base')

@section('custom_css')
<!-- Nice Select -->
<link rel="stylesheet" href="{{ asset('plugins/nice-select/nice-select.css') }}">
<!-- Nouislider -->
<link rel="stylesheet" href="{{ asset('plugins/nouislider/nouislider.min.css') }}">
<style>
    .fa.fa-star{
        color: #fbd600;
    }
</style>
@endsection

@section('content')
<!-- All Content -->
<!-- ================ start banner area ================= -->   
<section class="blog-banner-area" id="category">
    <div class="h-100" style="background-image: url('{{ asset('images/cms/history_banner.jpg') }}'); background-repeat:no-repeat; -webkit-background-size:cover; -moz-background-size:cover; -o-background-size:cover; background-size:cover; background-position:center;">
        <div class="blog-banner">
            <div class="text-center">
                <h1 style="color: #FBFBFB; text-shadow: 2px 2px #ED262A;">HISTORY &nbsp TRANSACTION</h1>
            </div>
        </div>
    </div>
</section>
<!-- ================ end banner area ================= -->
<!--================History Area =================-->
<section class="cart_area">
    <div class="container">
        <div class="cart_inner">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th width="50">#</th>
                            <th width="100">Transaction ID</th>
                            <th scope="col">Date</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Price</th>
                            <th scope="col">Review</th>
                            <th scope="col">Total Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(sizeof($transaction_lists) > 0)
                        @foreach($transaction_lists as $key => $transaction)
                        <tr>
                            <td>
                                <h5>{{ $key+1 }}</h5>
                            </td>
                            <td>
                                <h5>{{ $transaction->id }}</h5>
                            </td>
                            <td>
                                <h5>{{ date_format($transaction->created_at, 'M, d Y, H:i:s') }}</h5>
                            </td>
                            <td>
                                <h5>Qty</h5>
                            </td>
                            <td></td>
                            <td></td>
                            <td>
                                <h5>Rp {{ number_format($transaction->total,0,",",".") }}</h5>
                            </td>
                        </tr>
                        @foreach($transaction->details as $key => $data)
                        <tr>
                            <td></td>
                            <td colspan="2" >
                                <div class="media">
                                    <div class="d-flex">
                                        <img width="75px" src="{{ $data->product->image_url }}" alt="">
                                    </div>
                                    <div class="media-body">
                                        <p>{{ $data->product->name }}</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                {{ $data->quantity_order }}
                            </td>
                            <td>
                                Rp {{ number_format($data->product->price,0,",",".") }}
                            </td>
                            <td>
                                @if($data->review_id)
                                @if($data->review->rating == 5)
                                    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                @elseif($data->review->rating == 4)
                                    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star stroke-transparent"></i>
                                @elseif($data->review->rating == 3)
                                    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star stroke-transparent"></i><i class="fa fa-star stroke-transparent"></i>
                                @elseif($data->review->rating == 2)
                                    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star stroke-transparent"></i><i class="fa fa-star stroke-transparent"></i><i class="fa fa-star stroke-transparent"></i>
                                @elseif($data->review->rating == 1)
                                    <i class="fa fa-star"></i><i class="fa fa-star stroke-transparent"></i><i class="fa fa-star stroke-transparent"></i><i class="fa fa-star stroke-transparent"></i><i class="fa fa-star stroke-transparent"></i>
                                @endif
                                @else
                                    <a href="{{ route('menu.details', $data->product->id) }}" class="text-danger">Review Now</a>
                                @endif
                            </td>
                            <td>
                                Rp {{ number_format($data->product->price * $data->quantity_order,0,",",".") }}
                            </td>
                        </tr>
                        @endforeach
                        @endforeach
                        @else
                        <tr>
                            <td colspan="7" class="text-center">No history transaction record</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
                <div class="p-3">
                    <div class="float-right">
                        {{ $transaction_lists->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End History Area =================-->
<!-- End of all content -->
@endsection

@section('custom_js')   

@endsection
