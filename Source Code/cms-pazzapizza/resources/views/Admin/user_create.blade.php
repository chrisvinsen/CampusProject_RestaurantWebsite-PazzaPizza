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
                <h1>Add New User</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('panel') }}">Panel</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('panel.user') }}">User Lists</a></li>
                    <li class="breadcrumb-item active">Add</li>
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
                        <h3 class="card-title">Add New User</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form id="form-user" method="POST">
                        {{csrf_field()}}
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="pb-1">
                                                <div class="form-group mb-1">
                                                    <label for = "name">First Name</label>
                                                    <input maxlength="100" type="text" class="form-control" id =  "firstname-id" name = "firstname" placeholder = "First Name">
                                                </div>
                                                <div class="d-block">
                                                    <small class="ml-1 mb-1 text-danger d-block" id="firstname_err"></small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="pb-1">
                                                <div class="form-group mb-1">
                                                    <label for = "name">Last Name</label>
                                                    <input maxlength="100" type="text" class="form-control" id =  "lastname-id" name = "lastname" placeholder = "Last Name">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pb-1">
                                        <div class="form-group mb-1">
                                            <label for = "name">Email</label>
                                            <input type="email" maxlength="100" class="form-control" id =  "email-id" name = "email" placeholder = "Email">
                                        </div>
                                        <div class="d-block">
                                            <small class="ml-1 mb-1 text-danger d-block" id="email_err"></small>
                                        </div>
                                    </div>
                                    <div class="pb-1">
                                        <div class="form-group mb-1">
                                            <label class="control-label">Birth Date<span class="text-danger">*</span></label>
                                            <input type="text" id="birthdate-id" class="form-control" placeholder="Birth Date" onfocus="(this.type='date')">
                                        </div>
                                        <div class="d-block">
                                            <small class="ml-1 mb-1 text-danger d-block" id="birthdate_err"></small>
                                        </div>
                                    </div>
                                    <div class="pb-1">
                                        <div class="form-group mb-1">
                                            <label class="control-label d-block">Gender<span class="text-danger">*</span></label>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" class="custom-control-input" id="gender_male" name="gender" value="Male">
                                                <label class="custom-control-label" for="gender_male">Male</label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" class="custom-control-input" id="gender_female" name="gender" value="Female">
                                                <label class="custom-control-label" for="gender_female">Female</label>
                                            </div>
                                        </div>
                                        <div class="d-block">
                                            <small class="ml-1 mb-1 text-danger d-block" id="gender_err"></small>
                                        </div>
                                    </div>

                                    <div class="form-group pb-1">
                                        <label for = "category">Role / Type</label>
                                        <select class="form-control custom-select" id = "type-id" name = "type">
                                            <option value = "user" selected>User</option>
                                            <option value = "admin">Admin</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label">Image</label>
                                        <input type="file" id="image-id" name="image" class="dropify" data-max-file-size="2M"/> 
                                    </div>
                                    <div class="pb-1">
                                        <div class="form-group input-group mb-1">
                                            <input type="password" maxlength="100" class="form-control" id="password-id" name="password" placeholder="Password">
                                            <div class="input-group-append" style="cursor: pointer;">
                                                <div class="input-group-text">
                                                    <i class="fa fa-eye show-password" onclick="showPassword()"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-block">
                                            <small class="ml-1 mb-1 text-danger d-block" id="password_err"></small>
                                        </div>
                                    </div>
                                    <div class="pb-1">
                                        <div class="form-group input-group mb-1">
                                            <input type="password" maxlength="100" class="form-control" id="cpassword-id" name="cpassword" placeholder="Confirm Password">
                                            <div class="input-group-append" style="cursor: pointer;">
                                                <div class="input-group-text">
                                                    <i class="fa fa-eye show-password" onclick="showCPassword()"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-block">
                                            <small class="ml-1 mb-1 text-danger d-block" id="cpassword_err"></small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer text-right">
                            <a href="{{ route('panel.user') }}" class="btn btn-outline-secondary px-5 mx-1">Back</a>
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
    function showPassword() {
        if ($("#password-id").attr('type') == "password") {
            $("#password-id").attr('type', "text")
        } else {
            $("#password-id").attr('type', "password")
        }
    }
    function showCPassword() {
        if ($("#cpassword-id").attr('type') == "password") {
            $("#cpassword-id").attr('type', "text")
        } else {
            $("#cpassword-id").attr('type', "password")
        }
    }

    $(function(){
        $('.dropify').dropify({
            error: {
                'fileSize': 'The file size is too big (2M max).',
            }
        });

        $("#firstname-id").on('keyup', function(){
            $("#firstname_err").text("");
        });
        $("#email-id").on('keyup', function(){
            $("#email_err").text("");
        });
        $("#birthdate-id").on('keyup', function(){
            $("#birthdate_err").text("");
        });
        $("#gender_male, #gender_female").on('change', function(){
            $("#gender_err").text("");
        });
        $("#password-id").on('keyup', function(){
            $("#password_err").text("");
        });
        $("#cpassword-id").on('keyup', function(){
            $("#cpassword_err").text("");
        });
    });
    
    $('#form-user').submit(function(event) {
        event.preventDefault();
    
        data = new FormData();
    
        data.append('firstname', $('#firstname-id').val());
        data.append('lastname', $('#lastname-id').val());
        data.append('email', $('#email-id').val());
        data.append('birthdate', $('#birthdate-id').val());
        data.append('password', $('#password-id').val());
        data.append('cpassword', $('#cpassword-id').val());
        data.append('gender',  $("input[name='gender']:checked").val());
        data.append('type', $('#type-id').children("option:selected").val());
        if ($('#image-id')[0].files[0] != null && $('#image-id')[0].files[0] != 'undefined') {
            data.append('image', $('#image-id')[0].files[0]);
        }

        var error = false; 
    
        if(!data.get('firstname')){
            $("#firstname_err").text("First name field must be filled");
            error = true;
        } 
        if(!data.get('email')){
            $("#email_err").text("Email field must be filled");
            error = true;
        } 
        if(!data.get('birthdate')){
            $("#birthdate_err").text("Birthdate field must be filled");
            error = true;
        } 
        if(data.get('gender') == 'undefined'){
            $("#gender_err").text("Please choose the gender");
            error = true;
        } 
        if(!data.get('password')){
            $("#password_err").text("Password field must be filled");
            error = true;
        }
        if(!data.get('cpassword')){
            $("#cpassword_err").text("Confirmation Password field must be filled");
            error = true;
        }
        if(data.get('password') && data.get('cpassword')){
            if(data.get('password') != data.get('cpassword')){
                $("#cpassword_err").text("Password doesn't match");
                error = true;
            }
        }
        
        url = "{{ route('panel.user.store') }}";
    
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
                        
                        swal({title : "Success!", text: "User has been created.", type: "success"}, function() {
                            window.top.location.href = "{{ route('panel.user') }}"
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
            console.log("Cannot create new User. Please fill up all the form");
        }
    });
    
</script>
@endsection