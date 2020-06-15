@extends("components.layout")
@section("content")
    <section class="banner_area">
        <div class="container">
            <div class="banner_text">
                <h3>Chekout</h3>
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="checkout.html">Chekout</a></li>
                </ul>
            </div>
        </div>
    </section>

    <section class="billing_details_area p_100">
        <div class="container">
{{--            <div class="return_option">--}}
{{--                <h4>Returning customer? <a href="#">Click here to login</a></h4>--}}
{{--            </div>--}}
            <div class="row">
                <div class="col-lg-7">
                    <div class="main_title">
                        <h2>Thông Tin Thanh Toán</h2>
                    </div>
                    @if(count($errors)>0)
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times</button>
                            @foreach($errors->all() as $err)
                                <strong>{{$err}}</strong> ...
                            @endforeach
                        </div>
                    @endif
                    <div class="billing_form_area">
                        <form class="billing_form row" action="{{route("sbcheckout")}}" method="post" id="contactForm" novalidate="novalidate">
                            @csrf
                            @method("POST")
                            <div class="form-group col-md-6">
                                <label >Họ Tên *</label>
                                <input type="text" class="form-control" style="color: #0b0b0b"  name="order_name" placeholder="Nhập tên của bạn">
                            </div>
                            <div class="form-group col-md-6">
                                <label class="" for="last">Giới Tính *</label>
                                <select name="gender" class="form-control" id="">
                                    <option value="1" class="form-control" selected>Nam</option>
                                    <option value="2" class="form-control">Nữ</option>
                                </select>

                            </div>
                            <div class="form-group col-md-12">
                                <label for="company">Email *</label>
                                <input type="email" class="form-control" style="color: #0b0b0b" id="company" name="email" placeholder="Nhập email của bạn">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="company">Số Điện Thoại *</label>
                                <input type="text" class="form-control" style="color: #0b0b0b" id="company" name="phone_number" placeholder="Số điện thoại của bạn">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="address">Địa Chỉ Nhận Hàng*</label>
                                <input type="text" class="form-control" style="color: #0b0b0b" id="address" name="address" placeholder="Địa chỉ nhận hàng">
                            </div>

{{--                            <div class="select_check2 col-md-12">--}}
{{--                                <div class="creat_account">--}}
{{--                                    <input type="checkbox" id="f-option2" name="selector">--}}
{{--                                    <label for="f-option2">Ship to a different address?</label>--}}
{{--                                    <div class="check"></div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <div class="form-group col-md-12">
                                <label for="phone">Ghi chú*</label>
                                <textarea class="form-control" style="color: #0b0b0b" name="note" id="message" rows="1" placeholder="Ghi chú"></textarea>
                            </div>
                            <div class="order_box_price">
                                <div class="payment_list" style="border: 0px; ">
                                    <div id="accordion" class="accordion_area">
                                        <div class="card">
                                            <div class="card-header" id="headingOne">
                                                <h5 class="mb-0">
                                                    <input type="checkbox" class="btn btn-link collapsed" value="1" name="payment" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                                        Thanh Toán Khi Giao Hàng
                                                    </input>
                                                </h5>
                                            </div>
                                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion" style="">
                                                <div class="card-body">
                                                    Khi nhận hàng khách hàng kiểm tra hàng, rồi thanh toán cho Ship.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header" id="headingTwo">
                                                <h5 class="mb-0">
                                                    <input type="checkbox" class="btn btn-link collapsed" value="2" name="payment" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                        Chuyển Khoản
                                                    </input>
                                                </h5>
                                            </div>
                                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion" style="">
                                                <div class="card-body">
                                                    Vùi lòng chuyển khoản vào TK:
                                                    VietinBank 88886666888666.
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" value="submit" class="btn pest_btn ml-3">Đặt Hàng</button>


                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="order_box_price">
                        <div class="main_title">
                            <h2>Đơn Hàng Của Bạn</h2>
                        </div>
                        <div class="payment_list">
                            <div class="price_single_cost">
                                <h5>Sản Phẩm <span>Tổng</span></h5>
                                @foreach($cart->items as $item)
                                <h5>{{$item['product_name']}} x {{$item['qty']}} <span>{{number_format($item["price"]*$item['qty'])}} VNĐ</span></h5>
                                @endforeach
                                <h5>Shipping And Handling<span class="text_f">Free Shipping</span></h5>
                                <h3>Tổng Tiền <span>{{number_format($cart->total_price)}} VNĐ</span></h3>
                            </div>
{{--                            <div id="accordion" class="accordion_area">--}}
{{--                                <div class="card">--}}
{{--                                    <div class="card-header" id="headingOne">--}}
{{--                                        <h5 class="mb-0">--}}
{{--                                            <a class="btn btn-link collapsed" value="1" name="payment" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">--}}
{{--                                                Thanh Toán Khi Giao Hàng--}}
{{--                                            </a>--}}
{{--                                        </h5>--}}
{{--                                    </div>--}}
{{--                                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion" style="">--}}
{{--                                        <div class="card-body">--}}
{{--                                            Khi nhận hàng khách hàng kiểm tra hàng, rồi thanh toán cho Ship.--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="card">--}}
{{--                                    <div class="card-header" id="headingTwo">--}}
{{--                                        <h5 class="mb-0">--}}
{{--                                            <a class="btn btn-link collapsed" value="2" name="payment" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">--}}
{{--                                                Chuyển Khoản--}}
{{--                                            </a>--}}
{{--                                        </h5>--}}
{{--                                    </div>--}}
{{--                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion" style="">--}}
{{--                                        <div class="card-body">--}}
{{--                                            Vùi lòng chuyển khoản vào TK:--}}
{{--                                            VietinBank 88886666888666.--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                    <button type="submit" value="submit" class="btn pest_btn">Đặt Hàng</button>--}}


{{--                            </div>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
