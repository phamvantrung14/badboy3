<header class="main_header_area">
    <div class="top_header_area row m0">
        <div class="container">
            <div class="float-left">
                <a href="tell:+18004567890"><i class="fa fa-phone" aria-hidden="true"></i> + (1800) 456 7890</a>
                <a href="mainto:info@cakebakery.com"><i class="fa fa-envelope-o" aria-hidden="true"></i> info@davidsburges.com</a>
            </div>
            <div class="float-right">

                @if(Auth::guard('cus')->check())

                    <div class="dropdown submenu h_social list_style">
                        <a style="color: #fff" class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" href="javascript:void(0);" role="button" aria-haspopup="true" aria-expanded="false">{{Auth::guard('cus')->user()->customer_name}}</a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="{{route("customer.donmua.profile",['customer'=>Auth::guard('cus')->user()->id])}}">Tài Khoản</a>
                            <a class="dropdown-item" href="{{route("customer.donmua",["customer"=>Auth::guard('cus')->user()->id])}}">Đơn Mua</a>
                            <a class="dropdown-item" href="{{route("customer.logout")}}">Thoát</a>
                        </div>
                    </div>

                @else
                    <ul class="h_social list_style">
                        <li><a href="{{route("customer.login")}}">Đăng Nhập</a></li>
                    </ul>
                @endif

                <ul class="h_search list_style">
                    <li class="shop_cart" ><a id="shop_cart" href="{{route("cart.view")}}">
                            <i class="lnr lnr-cart"></i>({{count($cart->items)}})
                        </a></li>
{{--                    <li><a class="popup-with-zoom-anim" href="#test-search"><i class="fa fa-search"></i></a></li>--}}
                </ul>

            </div>
        </div>
    </div>
    <div class="main_menu_area">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="javascript:void(0);">
                    <img src="{{asset("frontend/img/log-bg.png")}}" alt="">
                    <img src="{{asset("frontend/img/logo-2.png")}}" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="my_toggle_menu">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="dropdown submenu">
                            <a class="dropdown-toggle"  href="{{route("trang-chu")}}" role="button" aria-haspopup="true" aria-expanded="false">Trang Chủ</a>
                        </li>
                        <li class="dropdown submenu"><a href="{{route("trang-chu")}}">Giới Thiệu</a></li>
{{--                        <li><a href="menu.html">Sản Phẩm</a></li>--}}
                        <li class="dropdown submenu">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Sản Phẩm</a>
                            <ul class="dropdown-menu">
                                @foreach($type_pd as $value)
                                <li><a href="{{$value->getTypeProductUrl()}}">{{$value->name}}</a></li>
                                @endforeach
                            </ul>
                        </li>
                    </ul>
                    <ul class="navbar-nav justify-content-end">
                        <li class="dropdown submenu">
                            <a class="dropdown-toggle"  href="{{route("trangchu.tintuc")}}" role="button" aria-haspopup="true" aria-expanded="false">Tin Tức</a>
                        </li>
                        <li class="dropdown submenu">
                            <a class="dropdown-toggle"  href="{{route("home.store")}}" role="button" aria-haspopup="true" aria-expanded="false">Cửa Hàng</a>
                        </li>
                        <li><a href="contact.html">Liên Hệ</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</header>
