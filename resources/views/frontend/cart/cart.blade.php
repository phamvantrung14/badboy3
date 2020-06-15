@extends("components.layout")
@section("content")
    <section class="banner_area">
        <div class="container">
            <div class="banner_text">
                <h3>Cart</h3>
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="cart.html">Cart</a></li>
                </ul>
            </div>
        </div>
    </section>
    <section class="cart_table_area p_100">
        <div class="container">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Preview</th>
                        <th scope="col">Tên Sản Phẩm</th>
                        <th scope="col">Giá</th>
                        <th scope="col">Số Lượng</th>
                        <th scope="col">Tổng Tiền</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($cart->items as $item)
                    <tr>
                        <td>
                            <img width="100px" src="{{asset($item["product_avatar"])}}" alt="">
                        </td>
                        <td>{{$item["product_name"]}}</td>
                        <td>{{number_format($item["price"])}}</td>
                        <td>
                            <form action="{{route("cart.update",["id" => $item["id"]])}}" method="get">

                                <input type="number" name="qty" value="{{$item['qty']}}">
                                <input type="submit" value="update">
                            </form>
                        </td>
                        <td>{{number_format($item["price"]*$item['qty'])}} VNĐ</td>
                        <td><a href="{{route("cart.remove",["id"=>$item["id"]])}}">X</a></td>
                    </tr>
                    @endforeach
                    <tr>
                        <td>
                            <form class="form-inline">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Coupon code">
                                </div>
                                <button type="submit" class="btn">Apply Coupon</button>
                            </form>
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <a class="pest_btn" href="#">Add To Cart</a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="row cart_total_inner">
                <div class="col-lg-7"></div>
                <div class="col-lg-5">
                    <div class="cart_total_text">
                        <div class="cart_head">
                            Cart Total
                        </div>
                        <div class="sub_total">
                            <h5>Tạm Tính: <span>{{number_format($cart->total_price)}} VNĐ</span></h5>
                        </div>
                        <div class="total">
                            <h4>Thành Tiền <span>{{number_format($cart->total_price)}} VNĐ</span></h4>
                        </div>
                        <div class="cart_footer">
                            <a class="pest_btn" href="{{route("checkout")}}">Proceed to Checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
