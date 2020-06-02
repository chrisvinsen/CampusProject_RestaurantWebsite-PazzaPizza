<!--================ Start footer Area  =================-->    
<footer class="footer">
    <div class="footer-area">
        <div class="container">
            <div class="row section_gap">
                <div class="col-lg-3 col-md-12 text-lg-left text-center pb-5">
                    <div class="single-footer-widget tp_widgets">
                        <h4 class="footer_title large_title pb-2">Our Goals</h4>
                        <p>
                            To be the best pizza for every pizza occasion                                   
                        </p>
                        <p>
                            Alone we are delicious, Together we are YUM!
                        </p>
                    </div>
                </div>
                <div class="offset-lg-1 col-lg-2 d-lg-block d-none">
                    <div class="single-footer-widget tp_widgets">
                        <h4 class="footer_title">Quick Links</h4>
                        <ul class="list">
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li><a href="{{ route('menu') }}">Menu</a></li>
                            <li><a href="{{ route('aboutus') }}">Aboutus</a></li>
                            <li><a href="{{ route('contact') }}">Contact</a></li>
                            <li><a href="{{ route('account.login') }}">Login</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6 text-lg-left text-md-center text-center">
                    <div class="single-footer-widget instafeed">
                        <h4 class="footer_title">Gallery</h4>
                        <ul class="list instafeed d-flex flex-wrap">
                            <li class="img-hover-zoom"><img width="70px" src="{{ asset('images/cms/footer/personal_pan_pizza.png') }}" alt=""></li>
                            <li class="img-hover-zoom"><img width="70px" src="{{ asset('images/cms/footer/large_pan_pizza.png') }}" alt=""></li>
                            <li class="img-hover-zoom"><img width="70px" src="{{ asset('images/cms/footer/chicken_royale.png') }}" alt=""></li>
                            <li class="img-hover-zoom"><img width="70px" src="{{ asset('images/cms/footer/puff_pastry_mushroom.png') }}" alt=""></li>
                            <li class="img-hover-zoom"><img width="70px" src="{{ asset('images/cms/footer/garlic_cheese_bread.png') }}" alt=""></li>
                            <li class="img-hover-zoom"><img width="70px" src="{{ asset('images/cms/footer/lychee_breeze.png') }}" alt=""></li>
                        </ul>
                    </div>
                </div>
                <div class="offset-lg-1 col-lg-3 col-md-6 col-sm-6">
                    <div class="single-footer-widget tp_widgets">
                        <h4 class="footer_title text-lg-left text-md-center text-center">Contact Us</h4>
                        <div class="ml-40">
                            <p class="sm-head">
                                <span class="fa fa-location-arrow"></span>
                                Restaurant
                            </p>
                            <p>Jl. Pazza pizza No. 1 - 21312, Jakarta, Indonesia.</p>
                            <p class="sm-head">
                                <span class="fa fa-phone"></span>
                                Phone Number
                            </p>
                            <p>
                                +62 8317913123 <br>
                                +62 3137131222
                            </p>
                            <p class="sm-head">
                                <span class="fa fa-envelope"></span>
                                Email
                            </p>
                            <p>
                                order@pazzapizza.com <br>
                                cs@pazzapizza.com
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row d-flex">
                <p class="col-lg-12 footer-text text-center">
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Pazza Pizza
                </p>
            </div>
        </div>
    </div>
</footer>
<!--================ End footer Area  =================-->