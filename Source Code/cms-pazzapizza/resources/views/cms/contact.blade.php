@extends('cms.layouts.base')

@section('custom_css')
     
@endsection

@section('content')
<!-- All Content -->
<!-- ================ start banner area ================= -->
<section class="blog-banner-area" id="contact">
    <div class="h-100" style="background-image: url('{{ asset('images/cms/contact_banner.jpg') }}'); background-repeat:no-repeat; -webkit-background-size:cover; -moz-background-size:cover; -o-background-size:cover; background-size:cover; background-position:center;">
        <div class="blog-banner">
            <div class="text-center">
                <h1 style="color: #FBFBFB; text-shadow: 2px 2px #ED262A;">C O N T A C T</h1>
            </div>
        </div>
    </div>
</section>
<!-- ================ end banner area ================= -->
<!-- ================ contact section start ================= -->
<section class="section-margin--small">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div id="map" style="width: 100%; height: 400px">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d991.5140739158588!2d106.61816502917661!3d-6.256314466599188!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69fb56b25975f9%3A0x50c7d605ba8542f5!2sMultimedia%20Nusantara%20University!5e0!3m2!1sen!2sid!4v1589421239941!5m2!1sen!2sid" width="100%;" height="400px" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
            </div>
            <div class="col-lg-6 p-5">
                <div class="media contact-info">
                    <span class="contact-info__icon"><i class="ti-home"></i></span>
                    <div class="media-body">
                        <h3>Jakarta Indonesia</h3>
                        <p>Jl. Pazza pizza No. 1 - 21312, Jakarta, Indonesia.</p>
                    </div>
                </div>
                <div class="media contact-info">
                    <span class="contact-info__icon"><i class="ti-headphone"></i></span>
                    <div class="media-body">
                        <h3 class="mb-1"><a href="tel:+628317913123">+62 8317913123</a></h3>
                        <h3><a href="tel:+623137131222">+62 3137131222</a></h3>
                        <p>Mon to Fri 8am to 5pm</p>
                    </div>
                </div>
                <div class="media contact-info">
                    <span class="contact-info__icon"><i class="ti-email"></i></span>
                    <div class="media-body">
                        <h3 class="mb-1"><a href="mailto:order@pazzapizza.com">order@pazzapizza.com</a></h3>
                        <h3><a href="mailto:cs@pazzapizza.com">cs@pazzapizza.com</a></h3>
                        <p>Send us your questions anytime!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ================ contact section end ================= -->
<!-- End of all content -->
@endsection

@section('custom_js')   
<script src="{{ asset('plugins/jquery.form.js') }}"></script>
<script src="{{ asset('plugins/jquery.validate.min.js') }}"></script>
<script src="{{ asset('plugins/contact.js') }}"></script>
@endsection
