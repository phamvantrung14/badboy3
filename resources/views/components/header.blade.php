<header class="main_header_area">
    <div class="top_header_area row m0">
        <div class="container">
            <div class="float-left">
                <a href="tell:+18004567890"><i class="fa fa-phone" aria-hidden="true"></i> + (1800) 456 7890</a>
                <a href="mainto:info@cakebakery.com"><i class="fa fa-envelope-o" aria-hidden="true"></i> info@cakebakery.com</a>
            </div>
            <div class="float-right">
                <ul class="h_social list_style">
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                </ul>
                <ul class="h_search list_style">
                    <li class="shop_cart"><a href="#"><i class="lnr lnr-cart"></i></a></li>
                    <li><a class="popup-with-zoom-anim" href="#test-search"><i class="fa fa-search"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="main_menu_area">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="index.html">
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
                        <li class="dropdown submenu active">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Trang Chủ</a>

                        </li>
                        <li><a href="cake.html">Giới Thiệu</a></li>
{{--                        <li><a href="menu.html">Sản Phẩm</a></li>--}}
                        <li class="dropdown submenu">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">SẢn Phẩm</a>
                            <ul class="dropdown-menu">
                                @foreach($type_pd as $value)
                                <li><a href="about-us.html">{{$value->name}}</a></li>
                                @endforeach
                            </ul>
                        </li>
                    </ul>
                    <ul class="navbar-nav justify-content-end">
                        <li class="dropdown submenu">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Tin Tức</a>

                        </li>
                        <li class="dropdown submenu">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Cửa Hàng</a>
                            <ul class="dropdown-menu">
                                <li><a href="blog.html">Blog with sidebar</a></li>
                                <li><a href="blog-2column.html">Blog 2 column</a></li>
                                <li><a href="single-blog.html">Blog details</a></li>
                            </ul>
                        </li>

                        <li><a href="contact.html">Liên Hệ</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</header>
