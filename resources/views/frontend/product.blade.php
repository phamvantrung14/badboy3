@extends("components.layout")
@section("content")

    <section class="banner_area">
        <div class="container">
            <div class="banner_text">
                <h3>Shop</h3>
                <ul>
                    <li><a href="{{route("trang-chu")}}">Home</a></li>
                    <li><a href="shop.html">Shop</a></li>
                </ul>
            </div>
        </div>
    </section>
    <section class="product_area p_100">
        <div class="container">
            <div class="row product_inner_row">
                <div class="col-lg-9">

                    <div class="row product_item_inner">

                        @forelse($product as $value)
                        <div class="col-lg-4 col-md-4 col-6" >
                            <div class="cake_feature_item" >
                                <div class="cake_img">
                                    <img alt="" href="" height="280px" src="{{asset($value->product_avatar)}}">
                                </div>
                                <div class="cake_text">
{{--                                    <h4>$29</h4>--}}
                                    <a href="{{url("/product-detail/{$value->slug}")}}"><h3>{{$value->product_name}}</h3></a>
                                    <p>MSP: {{$value->ma_sp}}</p>
                                    <p>Giá: {{$value->getPrice()}}</p>
                                    <a class="pest_btn" href="#">Add to cart</a>
                                </div>
                            </div>
                        </div>
                        @empty

                            <p>No product found.</p>

                        @endforelse

                    </div>
                    {!! $product->render('vendor.pagination.pgi') !!}
                </div>
                <div class="col-lg-3">
                    <div class="product_left_sidebar">
                        <aside class="left_sidebar search_widget">
                            <div class="input-group">
                                <input class="form-control" type="text" placeholder="Enter Search Keywords">
                                <div class="input-group-append">
                                    <button class="btn" type="button"><i class="icon icon-Search"></i></button>
                                </div>
                            </div>
                        </aside>
                        <aside class="left_sidebar p_catgories_widget">
                            <div class="p_w_title">
                                <h3>Menu</h3>
                            </div>
                            <ul class="list_style">
                                @foreach($type_pd as $value)
                                <li><a href="{{$value->getTypeProductUrl()}}">{{$value->name}}</a></li>
                                @endforeach
                            </ul>
                        </aside>
                        <aside class="left_sidebar p_price_widget">
                            <div class="p_w_title">
                                <h3>Filter By Price</h3>
                            </div>
                            <div class="filter_price">
                                <div class="ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content" id="slider-range"><div class="ui-slider-range ui-corner-all ui-widget-header" style="left: 2%; width: 48%;"></div><span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 2%;"></span><span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 50%;"></span></div>
                                <label for="amount">Price range:</label>
                                <input id="amount" type="text" readonly="">
                                <a href="#">Filter</a>
                            </div>
                        </aside>
                        <aside class="left_sidebar p_sale_widget">
                            <div class="p_w_title">
                                <h3>Top Sale Products</h3>
                            </div>
                            <div class="media">
                                <div class="d-flex">
                                    <img alt="" src="img/product/sale-product/s-product-1.jpg">
                                </div>
                                <div class="media-body">
                                    <a href="#"><h4>Brown Cake</h4></a>
                                    <ul class="list_style">
                                        <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                    </ul>
                                    <h5>$29</h5>
                                </div>
                            </div>
                            <div class="media">
                                <div class="d-flex">
                                    <img alt="" src="img/product/sale-product/s-product-2.jpg">
                                </div>
                                <div class="media-body">
                                    <a href="#"><h4>Brown Cake</h4></a>
                                    <ul class="list_style">
                                        <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                    </ul>
                                    <h5>$29</h5>
                                </div>
                            </div>
                            <div class="media">
                                <div class="d-flex">
                                    <img alt="" src="img/product/sale-product/s-product-3.jpg">
                                </div>
                                <div class="media-body">
                                    <a href="#"><h4>Brown Cake</h4></a>
                                    <ul class="list_style">
                                        <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                    </ul>
                                    <h5>$29</h5>
                                </div>
                            </div>
                            <div class="media">
                                <div class="d-flex">
                                    <img alt="" src="img/product/sale-product/s-product-4.jpg">
                                </div>
                                <div class="media-body">
                                    <a href="#"><h4>Brown Cake</h4></a>
                                    <ul class="list_style">
                                        <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                    </ul>
                                    <h5>$29</h5>
                                </div>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
