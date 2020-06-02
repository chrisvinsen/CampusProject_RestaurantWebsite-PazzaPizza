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
<style>
    .stroke-transparent {
        -webkit-text-stroke: 0.3px black;
        -webkit-text-fill-color: transparent;
    }
    .fa.fa-star{
        color: #fbd600;
    }
</style>
@endsection

@section('content-wrapper')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"> Dashboard </h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('panel') }}">Panel</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
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
                            <div class="d-flex justify-content-between">
                                <h3 class="card-title">Graph of Total Sales this Month</h3>
                                <a href="javascript:void(0);"><?php echo date('F Y'); ?></a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex">
                                <p class="d-flex flex-column">
                                    <span>Total Sales (Quantity)</span>
                                </p>
                            </div>
                            <!-- /.d-flex -->
                            <div class="position-relative mb-2">
                                <canvas id="sales-chart" height="200"></canvas>
                            </div>
                            <div class="d-flex flex-row justify-content-end">
                                <span>Date of Month</span>
                            </div>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header border-0">
                            <h3 class="card-title">Income Lists in <?php echo date('F Y'); ?></h3>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-striped table-valign-middle">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Date</th>
                                        <th>Quantity</th>
                                        <th>Income</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(sizeof($sales_of_month) > 0)
                                    <span class="d-none">{{ $i = 1 }}</span>
                                    @foreach ($sales_of_month as $key => $sales)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $key }} <?php echo date('F Y'); ?></td>
                                        <td id="qty{{ $key }}"></td>
                                        <td id="income{{ $key }}"></td>
                                    </tr>
                                    @endforeach
                                    @else
                                    <tr>
                                        <td colspan="4" class="text-center">No Sales Record</td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header border-0">
                            <h3 class="card-title">Sales Record</h3>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-striped table-valign-middle">
                                <thead>
                                    <tr>
                                        <th width="50">#</th>
                                        <th width="200">Date & Time</th>
                                        <th>Customer Name</th>
                                        <th>Product Name</th>
                                        <th width="100">Quantity</th>
                                        <th width="160">Total Price</th>
                                        <th width="160">Review</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(sizeof($sales_lists) > 0)
                                    @foreach ($sales_lists as $key => $record)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ date_format($record->created_at, 'M, d Y - H:i:s') }}</td>
                                        <td>{{ $record->transaction->user->firstname }} {{ $record->transaction->user->lastname }}</td>
                                        <td>{{ $record->product->name }}</td>
                                        <td>{{ $record->quantity_order }}</td>
                                        <td> Rp {{ number_format($record->product->price * $record->quantity_order,0,",",".") }}</td>
                                        <td>
                                            @if($record->review_id)
                                            @if($record->review->rating == 5)
                                                <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                            @elseif($record->review->rating == 4)
                                                <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star stroke-transparent"></i>
                                            @elseif($record->review->rating == 3)
                                                <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star stroke-transparent"></i><i class="fa fa-star stroke-transparent"></i>
                                            @elseif($record->review->rating == 2)
                                                <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star stroke-transparent"></i><i class="fa fa-star stroke-transparent"></i><i class="fa fa-star stroke-transparent"></i>
                                            @elseif($record->review->rating == 1)
                                                <i class="fa fa-star"></i><i class="fa fa-star stroke-transparent"></i><i class="fa fa-star stroke-transparent"></i><i class="fa fa-star stroke-transparent"></i><i class="fa fa-star stroke-transparent"></i>
                                            @endif
                                            @else
                                                <a href="javascript:void(0)" class="text-danger">Not yet reviewed</a>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                    @else
                                    <tr>
                                        <td colspan="7" class="text-center">No Sales Record</td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                            <div class="p-3">
                                <div class="float-right">
                                    {{ $sales_lists->appends(['search' => app('request')->input('search')])->links() }}
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
    $(function () {
        'use strict'

        var ticksStyle = {
            fontColor: '#495057',
            fontStyle: 'bold'
        }

        var mode = 'index'
        var intersect = true

        @foreach($sales_of_month as $key => $sales)
            var temp_qty{{ $key }} = 0;
            var temp_income{{ $key }} = 0;
            @foreach($sales as $sale)
                temp_qty{{ $key }} += parseInt('{{ $sale->quantity_order }}');
                temp_income{{ $key }} += parseInt('{{ $sale->quantity_order * $sale->product->price }}')
            @endforeach
            temp_income{{ $key }} = "Rp " + parseInt((temp_income{{ $key }})/1000).toFixed(3);
        @endforeach

        var max_quantity = 0;
        @foreach($sales_of_month as $key => $sales)
            if(temp_qty{{ $key }} > max_quantity)
                max_quantity = temp_qty{{ $key }}
            $("#qty{{ $key }}").text(temp_qty{{ $key }});
            $("#income{{ $key }}").text(temp_income{{ $key }});
        @endforeach

        var $salesChart = $('#sales-chart')
        var salesChart = new Chart($salesChart, {
            data: {
                // labels: ['18th', '20th', '22nd', '24th', '26th', '28th', '30th'],
                labels: [
                    @if(sizeof($sales_of_month) > 0)
                    @foreach($sales_of_month as $key => $sales)
                        "{{ $key }}",
                    @endforeach
                    @endif
                ],
                datasets: [{
                        type: 'line',
                        data: [
                            @foreach($sales_of_month as $key => $sales)
                                temp_qty{{ $key }},
                            @endforeach
                        ],
                        backgroundColor: 'transparent',
                        borderColor: '#007bff',
                        pointBorderColor: '#007bff',
                        pointBackgroundColor: '#007bff',
                        fill: false
                        // pointHoverBackgroundColor: '#007bff',
                        // pointHoverBorderColor    : '#007bff'
                    },
                ]
            },
            options: {
                maintainAspectRatio: false,
                tooltips: {
                    mode: mode,
                    intersect: intersect
                },
                hover: {
                    mode: mode,
                    intersect: intersect
                },
                legend: {
                    display: false
                },
                scales: {
                    yAxes: [{
                        // display: false,
                        gridLines: {
                            display: true,
                            lineWidth: '4px',
                            color: 'rgba(0, 0, 0, .2)',
                            zeroLineColor: 'transparent'
                        },
                        ticks: $.extend({
                            beginAtZero: true,
                            suggestedMax: max_quantity+1
                        }, ticksStyle)
                    }],
                    xAxes: [{
                        display: true,
                        gridLines: {
                            display: false
                        },
                        ticks: ticksStyle
                    }]
                }
            }
        })
    })
</script>
@endsection