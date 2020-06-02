@extends("components.layout")
@section("content")

<!--================Slider Area =================-->
<section class="main_slider_area">
    <div id="main_slider" class="rev_slider"  data-version="5.3.1.6">
        <ul>
            @foreach($slide1 as $value)
            <li  data-transition="fade" style="height: 350px" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="default" data-easeout="default" data-masterspeed="300"    data-rotate="0"  data-saveperformance="off"  data-title="Creative" data-param1="01" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                <!-- MAIN IMAGE -->
                <img src="{{asset("upload/slide"."/".$value->image)}}"   alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="5" class="rev-slidebg" data-no-retina>

                <!-- LAYER NR. 1 -->

            </li>
            @endforeach
        </ul>
    </div>
</section>

<!--================End Slider Area =================-->

<!--================Welcome Area =================-->
<section class="welcome_bakery_area">
    <div class="container">
        <div class="welcome_bakery_inner p_100">
            <div class="row">
                <div class="col-lg-6">
                    <div class="main_title">
                        <h2>Welcome to our Bakery</h2>
                        <p>Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur uis autem vel eum.</p>
                    </div>
                    <div class="welcome_left_text">
                        <p>Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise.</p>
                        <a class="pink_btn" href="#">Know more about us</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="welcome_img">
                        <img class="img-fluid" src="{{asset("frontend/img/cake-feature/welcome-right.jpg")}}" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="cake_feature_inner">
            <div class="main_title">
                <h2>Our Featured Cakes</h2>
                <h5> Seldolor sit amet consect etur</h5>
            </div>
            <div class="cake_feature_slider owl-carousel">
                @foreach($products as $value)
                <div class="item">
                    <div class="cake_feature_item">
                        <div class="cake_img">
                            <img src="{{asset($value->product_avatar)}}" alt="">
                        </div>
                        <div class="cake_text">
                            <h4>{{$loop->index+1}}</h4>
                            <h3>
                                <p>{{$value->getPrice()}}</p>
                                <p>{{$value->product_name}}</p>
                            </h3>

                            <a class="pest_btn" href="#">Add to cart</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!--================End Welcome Area =================-->

<!--================Special Recipe Area =================-->
<section class="special_recipe_area">
    <div class="container">
        <div class="special_recipe_slider owl-carousel">
            @foreach($type_pd1 as $value)
            <div class="item">
                <div class="media">
                    <div class="d-flex">
                        <img src="{{asset($value->image)}}" style="width: 150px" alt="">
                    </div>
                    <div class="media-body">
                        <h4>{{$value->name}}</h4>
                        <p>{!! $value->description !!}</p>
                        <a class="w_view_btn" href="#">View Details</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!--================End Special Recipe Area =================-->

<!--================Service Area =================-->
<section class="service_area">
    <div class="container">
        <div class="single_w_title">
            <h2>Main Services We Provide</h2>
        </div>
        <div class="row service_inner">
            <div class="col-lg-4 col-6">
                <div class="service_item">
                    <i class="flaticon-food-2"></i>
                    <h4>Celebration Cakes</h4>
                    <p>Duis aute irure dolor in reprehenderit in volup tate velit esse cillum dolore.</p>
                </div>
            </div>
            <div class="col-lg-4 col-6">
                <div class="service_item">
                    <i class="flaticon-food-1"></i>
                    <h4>Celebration Cakes</h4>
                    <p>Duis aute irure dolor in reprehenderit in volup tate velit esse cillum dolore.</p>
                </div>
            </div>
            <div class="col-lg-4 col-6">
                <div class="service_item">
                    <i class="flaticon-food"></i>
                    <h4>Celebration Cakes</h4>
                    <p>Duis aute irure dolor in reprehenderit in volup tate velit esse cillum dolore.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Service Area =================-->

<!--================Discover Menu Area =================-->
<section class="discover_menu_area">
    <div class="discover_menu_inner">
        <div class="container">
            <div class="main_title">
                <h2>Discover Menu</h2>
                <h5>Duis aute irure dolor in reprehenderit voluptate</h5>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="discover_item_inner">
                        @foreach($products1 as $value)
                        <div class="discover_item">
                            <h4>{{$value->type_product->name}}</h4>
                            <p>{{$value->__get("product_name")}} <span>{{$value->getPrice()}}</span></p>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="discover_item_inner">
                        @foreach($products2 as $value)
                        <div class="discover_item">
                            <h4>D{{$value->type_product->name}}</h4>
                            <p>{{$value->__get("product_name")}} <span>{{$value->getPrice()}}</span></p>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Discover Menu Area =================-->

<!--================Client Says Area =================-->
<section class="client_says_area p_100">
    <div class="container">
        <div class="client_says_inner">
            <div class="c_says_title">
                <h2>What Our Client Says</h2>
            </div>
            <div class="client_says_slider owl-carousel">
                <div class="item">
                    <div class="media">
                        <div class="d-flex">
                            <img src="{{asset("frontend/img/client/client-1.png")}}" alt="">
                            <h3>“</h3>
                        </div>
                        <div class="media-body">
                            <p>Osed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci sed quia non numquam qui ratione voluptatem sequi nesciunt. Neque porro quisquam est.</p>
                            <h5>- Robert joe</h5>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="media">
                        <div class="d-flex">
                            <img src="{{asset("frontend/img/client/client-1.png")}}" alt="">
                        </div>
                        <div class="media-body">
                            <p>Osed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci sed quia non numquam qui ratione voluptatem sequi nesciunt. Neque porro quisquam est.</p>
                            <h5>- Robert joe</h5>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="media">
                        <div class="d-flex">
                            <img src="{{asset("frontend/img/client/client-1.png")}}" alt="">
                        </div>
                        <div class="media-body">
                            <p>Osed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci sed quia non numquam qui ratione voluptatem sequi nesciunt. Neque porro quisquam est.</p>
                            <h5>- Robert joe</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Client Says Area =================-->

<!--================End Client Says Area =================-->
<section class="our_chef_area p_100">
    <div class="container">
        <div class="row our_chef_inner">
            <div class="col-lg-3 col-6">
                <div class="chef_text_item">
                    <div class="main_title">
                        <h2>Our Chefs</h2>
                        <p>Lorem ipsum dolor sit amet, cons ectetur elit. Vestibulum nec odios Suspe ndisse cursus mal suada faci lisis. Lorem ipsum dolor sit ametion.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="chef_item">
                    <div class="chef_img">
                        <img class="img-fluid" src="{{asset("frontend/img/chef/chef-1.jpg")}}" alt="">
                        <ul class="list_style">
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>
                            <li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
                            <li><a href="#"><i class="fa fa-skype"></i></a></li>
                        </ul>
                    </div>
                    <a href="#"><h4>Michale Joe</h4></a>
                    <h5>Expert in Cake Making</h5>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="chef_item">
                    <div class="chef_img">
                        <img class="img-fluid" src="{{asset("frontend/img/chef/chef-2.jpg")}}" alt="">
                        <ul class="list_style">
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>
                            <li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
                            <li><a href="#"><i class="fa fa-skype"></i></a></li>
                        </ul>
                    </div>
                    <a href="#"><h4>Michale Joe</h4></a>
                    <h5>Expert in Cake Making</h5>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="chef_item">
                    <div class="chef_img">
                        <img class="img-fluid" src="{{asset("frontend/img/chef/chef-3.jpg")}}" alt="">
                        <ul class="list_style">
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>
                            <li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
                            <li><a href="#"><i class="fa fa-skype"></i></a></li>
                        </ul>
                    </div>
                    <a href="#"><h4>Michale Joe</h4></a>
                    <h5>Expert in Cake Making</h5>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Client Says Area =================-->

<!--================Latest News Area =================-->
<section class="latest_news_area p_100">
    <div class="container">
        <div class="main_title">
            <h2>Latest Blog</h2>
            <h5>an turn into your instructor your helper, your </h5>
        </div>
        <div class="row latest_news_inner">
            <div class="col-lg-4 col-md-6">
                <div class="l_news_image">
                    <div class="l_news_img">
                        <img class="img-fluid" src="{{asset("frontend/img/blog/latest-news/l-news-1.jpg")}}" alt="">
                    </div>
                    <div class="l_news_hover">
                        <a href="#"><h5>Oct 15, 2016</h5></a>
                        <a href="#"><h4>Nanotechnology immersion along the information</h4></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="l_news_item">
                    <div class="l_news_img">
                        <img class="img-fluid" src="{{asset("frontend/img/blog/latest-news/l-news-2.jpg")}}" alt="">
                    </div>
                    <div class="l_news_text">
                        <a href="#"><h5>Oct 15, 2016</h5></a>
                        <a href="#"><h4>Nanotechnology immersion along the information</h4></a>
                        <p>Lorem ipsum dolor sit amet, cons ectetur elit. Vestibulum nec odios Suspe ndisse cursus mal suada faci lisis. Lorem ipsum dolor sit ametion ....</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="l_news_item">
                    <div class="l_news_img">
                        <img class="img-fluid" src="{{asset("frontend/img/blog/latest-news/l-news-3.jpg")}}" alt="">
                    </div>
                    <div class="l_news_text">
                        <a href="#"><h5>Oct 15, 2016</h5></a>
                        <a href="#"><h4>Nanotechnology immersion along the information</h4></a>
                        <p>Lorem ipsum dolor sit amet, cons ectetur elit. Vestibulum nec odios Suspe ndisse cursus mal suada faci lisis. Lorem ipsum dolor sit ametion ....</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Latest News Area =================-->

<!--================Newsletter Area =================-->
@endsection
