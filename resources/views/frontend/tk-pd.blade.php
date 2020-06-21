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
                <a class="pest_btn" onclick="addToCart({{$value->__get("id")}});" href="javascript:void(0);">Add to cart</a>
            </div>
        </div>
    </div>
@empty

    <p>Không có sản phẩm.</p>

@endforelse
