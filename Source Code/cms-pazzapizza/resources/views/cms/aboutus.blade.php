@extends('cms.layouts.base')

@section('custom_css')
     
@endsection

@section('content')
<!-- All Content -->
<!-- ================ start banner area ================= -->   
<section class="blog-banner-area" id="blog">
    <div class="h-100" style="background-image: url('{{ asset('images/cms/aboutus_banner.jpg')  }}'); background-repeat:no-repeat; -webkit-background-size:cover; -moz-background-size:cover; -o-background-size:cover; background-size:cover; background-position:center;">
        <div class="blog-banner">
            <div class="text-center">
                <h1 style="color: #FBFBFB; text-shadow: 2px 2px #ED262A;">A B O U T &nbsp U S</h1>
            </div>
        </div>
    </div>
</section>
<!-- ================ end banner area ================= -->
<!--================About Us Area =================-->
<section class="blog_area single-post-area py-80px section-margin--small">
    <div class="container">
        <div class="row pb-5">
            <div class="col-lg-8 posts-list">
                <div class="single-post row">
                    <div class="col-lg-12">
                        <div class="feature-img rounded img-hover-zoom">
                            <img class="img-fluid mx-auto d-block rounded" src="{{ asset('images/cms/aboutus_banner_content.jpg') }}" alt="">
                        </div>
                    </div>
                    <div class="col-lg-3  col-md-3">
                        <div class="blog_info text-right">
                            <ul class="blog_meta list">
                                <li>
                                    <a href="javascript:void(0)">Industry
                                    <i class="lnr lnr-home"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">Restaurant
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">Founded
                                    <i class="lnr lnr-calendar-full"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">11 May, 2020
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">Founders
                                    <i class="lnr lnr-users"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">Christianto Vinsen, Delvin Chianardi, Michael Tuesdenn, and Velix Halim
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-9 blog_details">
                        <h2>Pazza Pizza or Pizza Pazza?</h2>
                        <p class="excert">
                            <b>Pazza Pizza</b> is an American restaurant chain and international franchise which was founded in 2020 in Jakarta Barat, Indonesia by Christianto Vinsen, Delvin Chianardi, Michael Tuesden, and Velix Halim. The company is known for its Italian American cuisine menu, including pizza and pasta, as well as side dishes and desserts.
                        </p>
                        <p>
                            <b>Pizza</b> is a flat, open-faced baked pie of Italian origin, consisting of a thin layer of bread dough topped with spiced tomato sauce and cheese, often garnished with anchovies, sausage slices, mushrooms, etc.
                        </p>
                        <p>
                            <b>Pazza</b> is slang from England, particularly the Buckinghamshire/Lincolnshire areas. To be intoxicated to the point of losing all morals and acting like a complete fool.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="blog_right_sidebar">
                    <aside class="single_sidebar_widget author_widget img-hover-zoom">
                        <h2>Our Vision</h2>
                        <img class="author_img rounded-circle my-4" src="{{ asset('images/cms/footer/personal_pan_pizza.png') }}" width="120px" alt="">
                        <p>
                            So seed seed green that winged cattle in. Gathering thing made fly you're no 
                            divided deep moved us lan Gathering thing us land years living.
                        </p>
                    </aside>
                    <div class="br"></div>
                    <aside class="single_sidebar_widget author_widget img-hover-zoom">
                        <h2>Our Mission</h2>
                        <img class="author_img rounded-circle my-4" src="{{ asset('images/cms/footer/large_pan_pizza.png') }}" width="120px" alt="">
                        <p>
                            So seed seed green that winged cattle in. Gathering thing made fly you're no divided deep moved 
                        </p>
                    </aside>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================About Us Area =================-->
<!--================Gallery Area =================-->
<section class="gallery_area">
    <div class="container box_1620">
        <div class="gallery_image row m0">
            @if(sizeof($new_product_lists) > 0)
            @foreach($new_product_lists as $key => $new_product)
                <a href="{{ route('menu') }}"><img src="{{ $new_product->image_url }}" alt="{{ $new_product->name }}"></a>
            @endforeach
            @endif
        </div>
    </div>
</section>
<!--================End Gallery Area =================-->
<!-- End of all content -->
@endsection

@section('custom_js')   

@endsection
