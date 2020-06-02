<!--================ Start Header Menu Area =================-->
<header class="header_area">
    <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <a class="navbar-brand logo_h" href="{{ route('home') }}"><img src="{{ asset('images/cms/logo_with_text.png') }}" width="225" alt="Pazza Pizza's Logo"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </button>
                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <ul class="nav navbar-nav menu_nav ml-auto mr-auto">
                        <li class="nav-item @if ($nav_menu == 'home') active @endif"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
                        <li class="nav-item @if ($nav_menu == 'menu') active @endif"><a class="nav-link" href="{{ route('menu') }}">Menu</a></li>
                        <li class="nav-item @if ($nav_menu == 'aboutus') active @endif"><a class="nav-link" href="{{ route('aboutus') }}">About Us</a></li>
                        <li class="nav-item @if ($nav_menu == 'contact') active @endif"><a class="nav-link" href="{{ route('contact') }}">Contact</a></li>
                    </ul>
                    <ul class="nav nav-shop">
                        <li class="nav-item mr-3">
                            <a class="nav-link" href="{{ route('account.favorite') }}" style="line-height: inherit; ">
                                <button>
                                    <i class="ti-heart"></i>
                                    @if($total_favorite > 0)
                                    <span class="nav-shop__circle">{{ $total_favorite }}</span> 
                                    @endif
                                </button>
                            </a>
                        </li>
                        <li class="nav-item mr-3">
                            <a class="nav-link" href="{{ route('menu.order.cart') }}" style="line-height: inherit; ">
                                <button>
                                    <i class="ti-shopping-cart"></i>
                                    @if($total_cart > 0)
                                    <span class="nav-shop__circle">{{ $total_cart }}</span>
                                    @endif
                                </button>
                            </a>
                        </li>
                        <li class="nav-item submenu dropdown @if ($nav_menu == 'account') active @endif">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                                aria-expanded="false"><i class="ti-user"></i>
                                @if($user)
                                    {{ $user->firstname }}
                                @else
                                    Account
                                @endif
                            </a>
                            <ul class="dropdown-menu">
                                @if($user)
                                @if($user->type == 'admin')
                                <li class="nav-item"><a class="nav-link" href="{{ route('panel') }}">Panel</a></li>
                                @endif
                                <li class="nav-item"><a class="nav-link" href="{{ route('account.profile', $user->id) }}">Show Profile</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ route('account.favorite') }}">My Favorite</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ route('menu.order.history') }}">History Transaction</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ route('account.logout') }}">Logout</a></li>
                                @else
                                <li class="nav-item"><a class="nav-link" href="{{ route('account.login') }}">Login</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ route('account.register') }}">Register</a></li>
                                @endif
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>