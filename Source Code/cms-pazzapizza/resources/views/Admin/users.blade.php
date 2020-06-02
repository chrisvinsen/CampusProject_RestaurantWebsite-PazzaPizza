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
                    <h1 class="m-0 text-dark"> User Lists </h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('panel') }}">Panel</a></li>
                        <li class="breadcrumb-item active"> User Lists</li>
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
                                            <input type="text" maxlength="50" class="form-control float-right" name="search" placeholder="Search Here ..." value="{{ app('request')->input('search') }}">
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
                                        <th width="160">Photo Profile</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th width="85">Type</th>
                                        <th width="85">Gender</th>
                                        <th width="120">Birthdate</th>
                                        <th width="80">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(sizeof($user_lists) > 0)
                                    @foreach ($user_lists as $key => $user_info)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td><img src="{{ $user_info->photo_profile }}" onerror="if (this.src != '{{ asset('/images/cms/default_avatar.jpg') }}') this.src = '{{ asset('/images/cms/default_avatar.jpg') }}';" width="100"></td>
                                        <td>{{ $user_info->firstname }} {{ $user_info->lastname }}</td>
                                        <td>{{ $user_info->email }}</td>
                                        <td>{{ $user_info->type }}</td>
                                        <td>{{ $user_info->gender }}</td>
                                        <td>{{ $user_info->birthdate }}</td>
                                        <td>
                                            <a href="javascript:void(0)" onclick="deleteUser({{ $user_info->id }})" class="mx-1 text-muted cursor-pointer"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @else
                                    <tr class="text-center">
                                        <td colspan="8">There is no list of users besides you.</td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                            <div class="p-3">
                                <div class="float-right">
                                    {{ $user_lists->appends(['search' => app('request')->input('search')])->links() }}
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
    function deleteUser(idx) {
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
                var url = "{{ route('panel.user.destroy', ['modelUser' => "id"]) }}";
                url = url.replace('id', idx);
                $.get(url, function( data ) {
                    swal({title : "Deleted!", text: "User has been deleted.", type: "success"}, function() {
                        window.location.reload(true);
                    });   
                });
            }
        });
    }
</script>
@endsection