@extends("components.layout")
@section("content")

    <section class="banner_area">
        <div class="container">
            <div class="banner_text">
                <h3>Sản Phẩm</h3>
                <ul>
                    <li><a href="{{route("trang-chu")}}">Trang Chủ</a></li>
                    <li><a href="">Sản Phẩm</a></li>
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
                                    <a class="pest_btn" onclick="addToCart({{$value->__get("id")}});" href="javascript:void(0);">Add to cart</a>
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
{{--                                <form action="{{url("/search-pd")}}" method="get">--}}
{{--                                <input type="text" id="keysearch" name="stk" class="form-control" placeholder="Enter Search Keywords">--}}
{{--                                    @csrf--}}
{{--                                    @method("GET")--}}
{{--                                <div class="input-group-append">--}}
{{--                                    <button class="btn"  type="submit">--}}
{{--                                        <svg class="bi bi-search" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">--}}
{{--                                            <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>--}}
{{--                                            <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>--}}
{{--                                        </svg>--}}
{{--                                        <i class="icon icon-Search"></i>--}}
{{--                                    </button>--}}
{{--                                </div>--}}
{{--                                </form>--}}
                                <input type="hidden" class="" id="token" name="_token" value="{{csrf_token()}}">

                                 <input type="text" id="keysearch" name="stk" class="form-control" placeholder="Nhập Tên Sản Phẩm">
                                    <div class="input-group-append">
                                        <button class="btn"  type="button" onclick="serchProducts();">
                                            <svg class="bi bi-search" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
                                                <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
                                            </svg>
                                            <i class="icon icon-Search"></i>
                                        </button>
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

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

