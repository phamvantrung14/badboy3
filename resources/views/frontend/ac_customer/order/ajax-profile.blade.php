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
    <div class="container mt-5 mb-5">
        <div class="row">

            <div class="col-md-3">
                <ul class="list-group">
                    <li class="list-group-item1 " aria-disabled="true"><img src="{{asset(Auth::guard('cus')->user()->getImage())}}" width="50px" alt=""><span>{{Auth::guard('cus')->user()->customer_name}}</span></li>
                    <li class="list-group-item1"><a href="{{route("customer.donmua.profile",['customer'=>Auth::guard('cus')->user()->id])}}"><i class="fa fa-user-circle-o" aria-hidden="true" style="color: yellow;padding-right: 5px"></i>  Tài khoản Của Tôi</a></li>
                    <li class="list-group-item1"><a href="{{route("customer.donmua",['customer'=>Auth::guard('cus')->user()->id])}})}}"><i class="fa fa-book" aria-hidden="true" style="color: blue; padding-right: 5px"></i> Đơn Mua</a></li>
                </ul>
            </div>

            <div class="col-md-9 content-order-account">

                <div class="body mt-4">
                    <div class="col-md-12 content-order">
                        <div class="header">
                            <div class="row">
                                <h5>
                                    Hồ Sơ Của Tôi
                                </h5>
{{--                                <p class="status-h">{{$value->getStatus()}}</p>--}}
                            </div>
                        </div>
                        <div class="content">
                            <form class="" action="{{url("customer/profile/$customer->id")}}" method="post" id="contactForm" novalidate="novalidate" enctype="multipart/form-data">
                                @csrf
                                @method("POST")
                            <div class="row">
                                <div class="col-md-8">
                                        <div class="form-group col-md-12">
                                            <label for="first" style="padding-right: 10px">Email *</label>
{{--                                            <input type="hidden" class="form-control" id="first" name="email" value="{{$customer->email}}" placeholder="First Name">--}}
                                            <span>{{$customer->email}}</span>
                                        </div>

                                        <div class="form-group col-md-12">
                                            <label for="company">Tên Người dùng *</label>
                                            <input type="text" class="form-control" id="company" name="customer_name" value="{{$customer->customer_name}}" placeholder="Nhập tên người dùng">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="address">Địa Chỉ *</label>
                                            <input type="text" class="form-control" id="address" value="{{$customer->address}}" name="address" placeholder="Nhập địa chỉ">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="address">SĐT *</label>
                                            <input type="text" class="form-control" id="address" value="{{$customer->phone_number}}" name="phone_number" placeholder="Nhập SĐT">
                                        </div>
                                    <button type="submit" class="btn btn-primary">Lưu</button>
                                </div>
                                <div class="col-md-4">
                                    <div class="row">

                                        <div class="card-md " >
                                            <img src="{{asset(Auth::guard('cus')->user()->getImage())}}" width="200px" class="card-img-top" alt="...">
                                            <div class="card-body mt-3">
                                                <input href="#" type="file" name="image" class="" placeholder="Chọn Ảnh"></input>
                                                <p>Chọn Ảnh</p>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="container">


    </div>

@endsection


