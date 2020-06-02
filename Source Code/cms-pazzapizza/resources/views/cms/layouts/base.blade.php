<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pazza Pizza - {{ $title }}</title>

    <!-- Icon -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">

    <!-- ---------- Style ---------- -->

    <!-- Bootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('css/cms/bootstrap4/bootstrap.min.css') }}">
    <!-- Font awesome 5.12.1 -->
    <link rel="stylesheet" href="{{ asset('css/cms/fontawesome-5.12.1/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cms/fontawesome-5.12.1/css/fontawesome.min.css') }}">
    <!-- Themify Icons -->
    <link rel="stylesheet" href="{{ asset('plugins/themify-icons/themify-icons.css') }}">
    <!-- Linericon -->
    <link rel="stylesheet" href="{{ asset('plugins/linericon/style.css') }}">
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="{{ asset('plugins/owl-carousel/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/owl-carousel/owl.carousel.min.css') }}">
    <!-- CSS Pages -->
    <link rel="stylesheet" href="{{ asset('css/cms/pages/style.css') }}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/cms/custom.css') }}">
    @yield('custom_css')
</head>
<body style="overflow-x: hidden;">
	<!-- Header -->
  	@include('cms.layouts.header')  
    
    <!-- Content -->
  	@yield('content')

    <!-- Scroll to Top -->
    <a id="scroll_to_top"><i class="fa fa-chevron-up text-white"></i></a>

    <!-- Footer -->
    @include('cms.layouts.footer')  

    <!-- ---------- Script ---------- -->

    <!-- jQuery 3.4.1 -->
    <script src="{{ asset('js/cms/jquery-3.4.1/jquery-3.4.1.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('js/cms/bootstrap4/bootstrap.min.js') }}"></script>
    <!-- Skrollr -->
    <script src="{{ asset('plugins/skrollr.min.js') }}"></script>
    <!-- Owl Carousel -->
    <script src="{{ asset('plugins/owl-carousel/owl.carousel.min.js') }}"></script>
    <!-- Nice Select -->
    <script src="{{ asset('plugins/nice-select/jquery.nice-select.min.js') }}"></script>
    <!-- jQuery Ajaxchimp -->
    <script src="{{ asset('plugins/jquery.ajaxchimp.min.js') }}"></script>
    <!-- Mail Script -->
    <script src="{{ asset('plugins/mail-script.js') }}"></script>
    <!-- JS Pages -->
    <script src="{{ asset('js/cms/pages.js') }}"></script>
	@yield('custom_js')
</body>
</html>