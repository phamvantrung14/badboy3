@extends("components.layout")
@section("content")
    <section class="banner_area">
        <div class="container">
            <div class="banner_text">
                <h3>Danh Sách Cửa Hàng</h3>
                <ul>
                    <li><a href="index.html">Trang Chủ</a></li>
                    <li><a href="product-details.html">Danh Sách Cửa hàng</a></li>
                </ul>
            </div>
        </div>
    </section>
    <section class="product_details_area p_100">
        <div class="container">
            <div class="row product_d_price">
                <div class="col-lg-3">

                </div>
                <div class="col-lg-9">
                    <div class="product_details_text">
                        <h4>Danh Sách Cửa Hàng</h4>
                        @foreach($store as $value)
                            <p><b>{{$loop->index+1}}</b>. {{$value->store_name}} .Địa Chỉ : {{$value->address}} .SĐT: {{$value->phone}}</p>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
