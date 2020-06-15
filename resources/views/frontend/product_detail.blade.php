@extends("components.layout")
@section("content")
    <section class="banner_area">
        <div class="container">
            <div class="banner_text">
                <h3>Product Details</h3>
                <ul>
                    <li><a href="{{route("trang-chu")}}">Home</a></li>
                    <li><a href="product-details.html">Product Details</a></li>
                </ul>
            </div>
        </div>
    </section>

    <section class="product_details_area p_100">
        <div class="container">
            <div class="row product_d_price">
                <div class="col-lg-6">
                    <div class="product_img"><img class="img-fluid" alt="" width="100%" src="{{asset($pro_detail->product_avatar)}}"></div>
                </div>
                <div class="col-lg-6">
                    <div class="product_details_text">
                        <h4>{{$pro_detail->product_name}}</h4>
                        {!! $pro_detail->ingredient !!}
                        <h5>Giá bán :<span>  {{$pro_detail->getPrice()}}</span></h5>
                        <div class="quantity_box">
                            <label for="quantity">Quantity :</label>
                            <input id="quantity" type="text" placeholder="1">
                        </div>
                        <a class="pink_more" href="#">Add to Cart</a>
                    </div>
                </div>
            </div>
            <div class="product_tab_area">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-home-tab" role="tab" aria-selected="true" aria-controls="nav-home" href="#nav-home" data-toggle="tab">Mô Tả Sản Phẩm</a>
                        <a class="nav-item nav-link" id="nav-profile-tab" role="tab" aria-selected="false" aria-controls="nav-profile" href="#nav-profile" data-toggle="tab">Specification</a>
                        <a class="nav-item nav-link" id="nav-contact-tab" role="tab" aria-selected="false" aria-controls="nav-contact" href="#nav-contact" data-toggle="tab">Review (0)</a>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        {!! $pro_detail->product_description !!}
                    </div>
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                        <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
                    </div>
                    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                        <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="similar_product_area p_100">
        <div class="container">
            <div class="main_title">
                <h2>Similar Products</h2>
            </div>
            <div class="row similar_product_inner">
                @foreach($similar_product as $value)
                <div class="col-lg-3 col-md-4 col-6">
                    <div class="cake_feature_item">
                        <div class="cake_img">
                            <img alt="" src="{{asset($value->product_avatar)}}">
                        </div>
                        <div class="cake_text">
{{--                            <h4>$29</h4>--}}
                            <h3>{{$value->product_name}}</h3>
                            <p>{{$value->getPrice()}}</p>
                            <a class="pest_btn" href="#">Add to cart</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
