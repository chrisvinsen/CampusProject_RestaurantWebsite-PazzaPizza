@extends('cms.layouts.base')

@section('custom_css')
<!-- Nice Select -->
<link rel="stylesheet" href="{{ asset('plugins/nice-select/nice-select.css') }}">
<!-- Nouislider -->
<link rel="stylesheet" href="{{ asset('plugins/nouislider/nouislider.min.css') }}">
<!-- Bootstrap Select -->
<link rel="stylesheet" href="{{ asset('css/cms/bootstrap-select.min.css') }}">
<!-- Sweetalert -->
<link rel="stylesheet" href="{{ asset('css/cms/sweetalert.css') }}">
@endsection

@section('content')
<!-- All Content -->
<!-- ================ start banner area ================= -->
<section class="blog-banner-area" id="category">
    <div class="h-100" style="background-image: url('{{ asset('images/cms/register_banner.jpg') }}'); background-repeat:no-repeat; -webkit-background-size:cover; -moz-background-size:cover; -o-background-size:cover; background-size:cover; background-position:center;">
        <div class="blog-banner">
            <div class="text-center">
                <h1 style="color: #FBFBFB; text-shadow: 2px 2px #ED262A;">R E G I S T E R</h1>
            </div>
        </div>
    </div>
</section>
<!-- ================ end banner area ================= -->
<!--================Login Box Area =================-->
<section class="login_box_area section-margin">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="login_box_img h-100">
                    <div class="hover">
                        <h4>Already have an account?</h4>
                        <p>There are advances being made in science and technology everyday, and a good example of this is the</p>
                        <a class="button button-account" href="{{ route('account.login') }}">Login Now</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="login_form_inner register_form_inner">
                    <h3 class="text-center">Create an account</h3>
                    <form class="row login_form" id="register_form" method = "POST">
                        {{csrf_field()}}
                        <div class="col-md-12 form-group m-0">
                            <input type="text" maxlength="100" class="form-control" id="firstname-id" name="firstname" placeholder="First Name">
                            <small class="text-danger pl-2" id="firstname_err"></small>
                        </div>
                        <div class="col-md-12 form-group mb-3">
                            <input type="text" maxlength="100" class="form-control" id="lastname-id" name="lastname" placeholder="Last Name">
                        </div>
                        <div class="col-md-12 form-group m-0">
                            <input type="email" maxlength="100" class="form-control" id="email-id" name="email" placeholder="Email">
                            <small class="text-danger pl-2" id="email_err"></small>
                        </div>
                        <div class="col-md-12 form-group m-0">
                            <input type="text" class="form-control" placeholder="Birth Date" onfocus="(this.type='date')" name="birthdate" id="birthdate-id">
                            <small class="text-danger pl-2" id="birthdate_err"></small>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group text-center m-0">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="gender_male" name="gender" value="Male">
                                    <label class="custom-control-label" for="gender_male">Male</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="gender_female" name="gender" value="Female">
                                    <label class="custom-control-label" for="gender_female">Female</label>
                                </div>
                            </div>
                            <small class="text-danger pl-2 d-block text-center" id="gender_err"></small>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group input-group m-0">
                                <input type="password" maxlength="100" class="form-control" id="password-id" name="password" placeholder="Password">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <i class="fa fa-eye show-password" onclick="showPassword()"></i>
                                    </div>
                                </div>
                            </div>
                            <small class="text-danger pl-2" id="password_err"></small>
                        </div>
                        <div class="col-md-12 mb-3">
                            <div class="form-group input-group m-0">
                                <input type="password" maxlength="100" class="form-control" id="cpassword-id" name="cpassword" placeholder="Confirmation Password">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <i class="fa fa-eye show-password" onclick="showCPassword()"></i>
                                    </div>
                                </div>
                            </div>
                            <small class="text-danger pl-2" id="cpassword_err"></small>
                        </div>
                        <div class="col-md-12 form-group">
                            <button type="submit" value="submit" class="button button-register w-100">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Login Box Area =================-->
<!-- End of all content -->
@endsection

@section('custom_js')
<!-- Bootstrap Select -->
<script src="{{ asset('js/cms/bootstrap-select.min.js') }}"></script>
<!-- Sweetalert -->
<script src="{{ asset('js/cms/sweetalert.min.js') }}"></script>
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
    
    $('#register_form').submit(function(event) {
        event.preventDefault();
    
        data = new FormData();
    
        data.append('firstname', $('#firstname-id').val());
        data.append('lastname', $('#lastname-id').val());
        data.append('email', $('#email-id').val());
        data.append('birthdate', $('#birthdate-id').val());
        data.append('password', $('#password-id').val());
        data.append('cpassword', $('#cpassword-id').val());
        data.append('gender',  $("input[name='gender']:checked").val());

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
        
        url = "{{ route('account.registerPost') }}";
    
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
                        
                        swal({title : "Success!", text: "Register Succesfully.", type: "success"}, function() {
                            window.top.location.href = "{{ route('account.login') }}"
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
            console.log("Register Failed. Please try again later.");
        }
    });

</script>
@endsection
