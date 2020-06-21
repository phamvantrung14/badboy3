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

        <div class="cake_feature_inner">
            <div class="main_title">
                <h2>Bánh Sinh Nhật</h2>
                <h5> Các sản phẩm mới nhất</h5>
            </div>
            <div class="cake_feature_slider owl-carousel">
                @foreach($cakeBirthday as $value)
                <div class="item">
                    <div class="cake_feature_item">
                        <div class="cake_img">
                            <img src="{{asset($value->product_avatar)}}" alt="">
                        </div>
                        <div class="cake_text">
{{--                            <h4>{{$loop->index+1}}</h4>--}}
                            <h3>
                                <p>{{$value->getPrice()}}</p>
                                <a href="{{url("/product-detail/{$value->slug}")}}" style="color: gray"><p>{{$value->product_name}}</p></a>
                            </h3>

{{--                            <a class="pest_btn" href="{{route("cart.add",["products"=> $value->id])}}">Add to cart</a>--}}
{{--                            <a class="pest_btn" href="{{url("cart/add/{$value->id}")}}">Add to cart</a>--}}
                            <a class="pest_btn" onclick="addToCart({{$value->__get("id")}});" href="javascript:void(0);">Add to cart</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

{{--        //hộp quà--}}
        <div class="cake_feature_inner">
            <div class="main_title">
                <h2>Hộp quà</h2>
                <h5> Các sản phẩm mới nhất</h5>
            </div>
            <div class="cake_feature_slider owl-carousel">
                @foreach($giftBox as $value)
                    <div class="item">
                        <div class="cake_feature_item">
                            <div class="cake_img">
                                <img src="{{asset($value->product_avatar)}}" alt="">
                            </div>
                            <div class="cake_text">
                                {{--                            <h4>{{$loop->index+1}}</h4>--}}
                                <h3>
                                    <p>{{$value->getPrice()}}</p>
                                    <a href="{{url("/product-detail/{$value->slug}")}}"style="color: gray"><p>{{$value->product_name}}</p></a>
                                </h3>

                                <a class="pest_btn" onclick="addToCart({{$value->__get("id")}});" href="javascript:void(0);">Add to cart</a>

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
                        <a class="w_view_btn" href="{{$value->getTypeProductUrl()}}">Xem Chi Tiết</a>
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
            <h2>Các Dịch Vụ Chính Của Cửa Hàng</h2>
        </div>
        <div class="row service_inner">
            <div class="col-lg-4 col-6">
                <div class="service_item">
                    <i class="flaticon-food-2"></i>
                    <h4>Bánh Ngọt</h4>
                    <p>Cung cấp các loại bánh ngọt,ăn nhanh tại các cửa hàng trong hệ thống</p>
                </div>
            </div>
            <div class="col-lg-4 col-6">
                <div class="service_item">
                    <i class="flaticon-food-1"></i>
                    <h4>Bánh Sự Kiện</h4>
                    <p>Nhận đặt các loại bánh để tổ chức sự kiện,sinh nhật hội nghị...</p>
                </div>
            </div>
            <div class="col-lg-4 col-6">
                <div class="service_item">
                    <i class="flaticon-food"></i>
                    <h4>Các Set Bánh,Hộp Quà.</h4>
                    <p>Cung cấp các set bánh gồm nhiều loại và mấu mã đa dạng...</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Service Area =================-->

<!--================Discover Menu Cua hang =================-->
<section class="discover_menu_area">
    <div class="discover_menu_inner">
        <div class="container">
            <div class="main_title">
                <h2>Menu</h2>
                <h5>Thực Đơn Nhà Hàng</h5>
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
                        @foreach($drinks as $value)
                        <div class="discover_item">
                            <h4>{{$value->__get("product_name")}}</h4>
                            <p>{{$value->type_product->name}} <span>{{$value->getPrice()}}</span></p>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Discover Menu Area =================-->



<!--================Latest News Area =================-->
<section class="latest_news_area p_100">
    <div class="container">
        <div class="main_title">
            <h2>Tin Tức</h2>
            <h5>luôn cập nhật nhưng thông tin mới nhất </h5>
        </div>
        <div class="row latest_news_inner">
            @foreach($news as $value)

                <div class="col-lg-4 col-md-6">
                    <div class="l_news_item">
                        <div class="l_news_img">
                            <img class="img-fluid" src="{{asset($value->image)}}" alt="">
                        </div>
                        <div class="l_news_text">
                            <a href=""><h5>{{$value->created_at}}</h5></a>
                            <a href="{{route("trangchu.chitiet.tintuc",['new'=>$value->id])}}"><p>{{$value->new_title}}</p></a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</section>
<!--================End Latest News Area =================-->

<!--================Newsletter Area =================-->
@endsection
