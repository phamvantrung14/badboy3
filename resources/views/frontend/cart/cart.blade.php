@extends("components.layout")
@section("content")
    <section class="banner_area">
        <div class="container">
            <div class="banner_text">
                <h3>Giỏ Hàng</h3>
                <ul>
                    <li><a href="{{route("trang-chu")}}">Trang Chủ</a></li>
                    <li><a href="cart.html">Giỏ Hàng</a></li>
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
{{--                            <form action="{{route("cart.update",["id" => $item["id"]])}}" method="get">--}}

                            <input type="number" id="qty{{$item['id']}}" name="qty" value="{{$item['qty']}}" style="width: 50%"/>
{{--                            <svg class="bi bi-arrow-counterclockwise" width="2em" height="2em" viewBox="0 0 16 16" onclick="updateQuantity({{$item['id']}});" fill="currentColor" style="padding-top: 5px!important;" xmlns="http://www.w3.org/2000/svg">--}}
{{--                                <path fill-rule="evenodd" d="M12.83 6.706a5 5 0 0 0-7.103-3.16.5.5 0 1 1-.454-.892A6 6 0 1 1 2.545 5.5a.5.5 0 1 1 .91.417 5 5 0 1 0 9.375.789z"/>--}}
{{--                                <path fill-rule="evenodd" d="M7.854.146a.5.5 0 0 0-.708 0l-2.5 2.5a.5.5 0 0 0 0 .708l2.5 2.5a.5.5 0 1 0 .708-.708L5.707 3 7.854.854a.5.5 0 0 0 0-.708z"/>--}}
{{--                            </svg>--}}
                                <input type="button" data-id="{{$item['id']}}" id="click1{{$item['id']}}" onclick="updateQuantity({{$item['id']}});" href="javascript:void(0);" value="update">

{{--                            </form>--}}
                        </td>
                        <td id="tongtien">{{number_format($item["price"]*$item['qty'])}} VNĐ</td>
                        <td><a data-id="{{$item['id']}}" id="clickdelete{{$item['id']}}" onclick="deleteOrder({{$item['id']}});" href="javascript:void(0);">X</a></td>
{{--                        {{route("cart.remove",["id"=>$item["id"]])}}--}}
                    </tr>
                    @endforeach
                    <tr>
                        <td class="" >
                            <a style="margin-left: 15px!important;" onclick="clearAll();" class="pest_btn" href="#">Xóa Giỏ Hàng</a>
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>

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
                            <h5>Tổng Sản Phẩm: <span>{{$cart->total_quantity}} Sản Phẩm</span></h5>
                        </div>
                        <div class="total">
                            <h4>Thành Tiền <span>{{number_format($cart->total_price)}} VNĐ</span></h4>
                        </div>
                        <div class="cart_footer">
                            <a class="pest_btn" href="{{route("checkout")}}">Thanh Toán</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
