@extends('cms.layouts.base')

@section('custom_css')
<!-- Nice Select -->
<link rel="stylesheet" href="{{ asset('plugins/nice-select/nice-select.css') }}">
<!-- Nouislider -->
<link rel="stylesheet" href="{{ asset('plugins/nouislider/nouislider.min.css') }}">
@endsection

@section('content')
<!-- All Content -->
<!-- ================ start banner area ================= -->
<section class="blog-banner-area" id="category">
    <div class="h-100" style="background-image: url('{{ asset('images/cms/register_banner.jpg') }}'); background-repeat:no-repeat; -webkit-background-size:cover; -moz-background-size:cover; -o-background-size:cover; background-size:cover; background-position:center;">
        <div class="blog-banner">
            <div class="text-center">
                <h1 style="color: #FBFBFB; text-shadow: 2px 2px #ED262A;">L O G I N </h1>
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
                <div class="login_box_img">
                    <div class="hover">
                        <h4>New to Pizza Pazza?</h4>
                        <p>There are advances being made in science and technology everyday, and a good example of this is the</p>
                        <a class="button button-account" href="{{ route('account.register') }}">Create an Account</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="login_form_inner">
                    <h3 class="text-center">LOG IN</h3>
                    <form class="row login_form" action="{{url('/account/loginPost')}}" id="contactForm" method = "POST">
                        {{csrf_field()}}
                        <div class="col-md-12 form-group">
                            <input type="email" maxlength="100" class="form-control" id="email" name="email" placeholder="Email">
                        </div>
                        <div class="col-md-12 form-group input-group">
                            <input type="password" maxlength="100" class="form-control" id="password" name="password" placeholder="Password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <i class="fa fa-eye show-password" onclick="showPassword()"></i>
                                </div>
                            </div>
                        </div>
                        @if (session('alert'))
                            <small class="text-danger px-3 pb-3">{{session('alert')}}</small>
                        @endif
                        <div class="col-md-12 form-group py-5">
                            <button type="submit" value="submit" class="button button-login w-100">Log In</button>
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
<script>
    function showPassword() {
        if ($("#password").attr('type') == "password") {
            $("#password").attr('type', "text")
        } else {
            $("#password").attr('type', "password")
        }
    }
</script>
@endsection
