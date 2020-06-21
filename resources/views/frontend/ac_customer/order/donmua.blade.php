@extends("components.layout")
@section("content")
    <section class="banner_area">
        <div class="container">
            <div class="banner_text">
                <h3>Khách Hàng</h3>
                <ul>
                    <li><a href="{{route("trang-chu")}}">Trang Chủ</a></li>
                    <li><a href="javascript:void(0);">Khách Hàng</a></li>
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
                <li class="list-group-item1"><i class="fa fa-book" aria-hidden="true" style="color: blue; padding-right: 5px"></i> Đơn Mua</li>

            </ul>
        </div>
        <div class="col-md-9 content-order-account">
            <div class="menu">
                <ul class=" menu-ul nav nav-pills nav-fill" style="padding-top: 10px;padding-bottom: 10px">
                    <li class="nav-item">
                        <a class="nav-link nav-donmua active1" onclick="orderAll({{Auth::guard('cus')->user()->id}});" href="javascript:void(0);">Tất cả</a>
                    </li>
{{--                    {{route("customer.donmua.choxacnhan",["customer"=>Auth::guard('cus')->user()->id])}}--}}
                    <li class="nav-item">
                        <a class="nav-link nav-donmua" onclick="orderDangCho({{Auth::guard('cus')->user()->id}});" href="javascript:void(0);">Chờ xác nhận</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-donmua" onclick="orderLayHang({{Auth::guard('cus')->user()->id}});" href="javascript:void(0);" >Đã Xác Nhận</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-donmua" onclick="orderDangGiao({{Auth::guard('cus')->user()->id}});" href="javascript:void(0);">Đang giao</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-donmua" onclick="orderHoanThanh({{Auth::guard('cus')->user()->id}});" href="javascript:void(0);">Đã giao</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-donmua" onclick="orderDaHuy({{Auth::guard('cus')->user()->id}});" href="javascript:void(0);">Đã hủy</a>
                    </li>
                </ul>
            </div>
            <div class="body1">
                @foreach($order as $value)
                <div class="body mt-4">
                    <div class="col-md-12 content-order">
                        <div class="header">
                            <div class="row">
                            <h4>
                                Đơn Hàng Ngày: (<span>{{$value->updated_at}}</span>)
                            </h4>
                            <p class="status-h">{{$value->getStatus()}}</p>
                            </div>
                        </div>
                        <div class="content">
                            <table>
                                <tr>
                                    <td style="padding-right: 10px">Người Nhận:</td>
                                    <td>  {{$value->order_name}}</td>
                                </tr>
                                <tr>
                                    <td>Tổng Tiền:</td>
                                    <td>{{$value->getTotalPrice()}}</td>
                                </tr>
                            </table>
                            <button type="submit" class="btn-1 btn-ct mt-2" onclick="modalOrder({{$value->id}});"  data-toggle="modal" data-target="#myModal">Chi tiết</button>
                            @if($value->status==0 || $value->status==1)
{{--                                <form action="{{url("customer/huydon/{$value->__get('id')}")}}" method="get">--}}
{{--                                    @csrf--}}
{{--                                    @method("GET")--}}
{{--                                    <input type="hidden" name="status" value="4" >--}}
{{--                                    <button type="submit" class="btn-1 btn-ct mt-2">Hủy</button>--}}
{{--                                </form>--}}
                                <input type="hidden" name="status" id="sthuydon" value="4" >
                                <input type="hidden" class="" id="token" name="_token" value="{{csrf_token()}}">
                                <button type="button" onclick="clickHuyDon({{$value->id}});" class="btn-1 btn-ct mt-2">Hủy</button>
                         @endif
                            <!-- Modal -->
                            <div class="modal fade" id="myModal" role="dialog">
                                <div class="modal-dialog" style="max-width: 650px!important;">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header" style="border-bottom: none !important;">
{{--                                            <button type="button" class="close" data-dismiss="modal">&times;</button>--}}
                                            <h4 class="modal-title">Chi Tiết Đơn Hàng:</h4>
                                        </div>
                                        <div class="modal-body">

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>

        </div>
        </div>
    </div>
    <div class="container">


    </div>

@endsection
@extends("components.script")
@section("script")
    <script>
        function orderDangCho(customer) {
            $.ajax({
                url:"{{url("customer/choxacnhan")}}/"+customer,
                method:"GET",
            }).done(function (response) {
                // console.log(response);
                $(".content-order-account .body1").empty();
                $(".content-order-account .body1").html(response);
            })
        }
        function orderHoanThanh(customer) {
            $.ajax({
                url:"{{url("customer/hoanthanh")}}/"+customer,
                method:"GET",
            }).done(function (response) {
                // console.log(response);
                $(".content-order-account .body1").empty();
                $(".content-order-account .body1").html(response);
            })
        }
        function orderAll(customer) {
            $.ajax({
                url:"{{url("customer/tatca")}}/"+customer,
                method:"GET",
            }).done(function (response) {
                // console.log(response);
                $(".content-order-account .body1").empty();
                $(".content-order-account .body1").html(response);
            })
        }
        function clickHuyDon(id) {
            var _status = $("#sthuydon").val();
            var token = $("#token").val();
            console.log(token);
            $.ajax({
                url:"{{url("customer/huydon")}}/"+id,
                method:"GET",
                data:{
                    status :_status,
                    _token:token,
                    _method: "GET"
                }
            }).done(function (response) {
                // console.log(response);
                $(".content-order-account .body1").empty();
                $(".content-order-account .body1").html(response);
                alertify.success('Huy đơn thành công!!');
            })
        }
    </script>
@endsection

