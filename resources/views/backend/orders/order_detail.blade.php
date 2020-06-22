@extends('backend.components.layout')
@section('head-title','Quản Lý Đơn Hàng')
@section('content')

    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <ol class="breadcrumb breadcrumb-col-teal" style="margin: 0px; padding-bottom: 0px">
                    <li><a href="{{route("admin")}}"><i class="material-icons">home</i> Home</a></li>
                    <li class="active"> <i class="material-icons">account_box</i> Quản Lý Tài Khoản</li>

                </ol>
            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            <div class="card">
                <div class="header">
                    <h4>
                        ĐƠN HÀNG: (anh/chị)-{{$data2->__get("order_name")}} - {{$data2->__get("created_at")}}
                    </h4>


                </div>

{{--                @if(session('thong_bao'))--}}
{{--                    <div class="header">--}}
{{--                        <div class="alert alert-success">--}}
{{--                            {{session('thong_bao')}}--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                @endif--}}

                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-hover dashboard-task-infos">
                            <tbody>
                            <tr>
                                <th>Người Nhận: </th>
                                <td>{{$data2->__get("order_name")}}</td>
                            </tr>
                            <tr>
                                <th>Email:</th>
                                <td>{{$data2->getEmail()}}</td>
                            </tr>
                            <tr>
                                <th>Giới Tính:</th>
                                <td>{{$data2->getGender()}}</td>
                            </tr>
                            <tr>
                                <th>Tổng Tiền:</th>
                                <td>{{$data2->getTotalPrice()}}</td>
                            </tr>
                            <tr>
                                <th>Địa Chỉ Nhận Hàng: </th>
                                <td>{{$data2->address}}</td>
                            </tr>
                            <tr>
                                <th>SĐT: </th>
                                <td>{{$data2->__get("phone_number")}}</td>
                            </tr>
                            <tr>
                                <th>Note: </th>
                                <td>{{$data2->getNote()}}</td>
                            </tr>
                            <tr>
                                <th>Trạng Thái ĐH: </th>
                                <td><a class="label bg-green">{{$data2->getStatus()}}</a></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            <div class="card">
                <div class="header">
                    <h4>
                        CẬP NHẬT TRẠNG THÁI ĐƠN HÀNG
                    </h4>
                </div>

                @if(session('thong_bao'))
                    <div class="header">
                        <div class="alert alert-success">
                            {{session('thong_bao')}}
                        </div>
                    </div>
                @endif

                <div class="body">
                    <div class="table-responsive">

                        <form action="{{route("orders.update",["order"=>$data2->__get("id")])}}" method="POST">
                            @csrf
                            @method("PUT")
                            <label for="">Trạng Thái:</label>
                            <div class="form-group">
                                <div class="form-line">
                                <select class="" name="status" id="">
                                    @if($data2->__get("status")==4)
{{--                                    <option value="0">Đang Xử Lý</option>--}}
{{--                                    <option value="1">Xác Nhận Đơn Hàng</option>--}}
{{--                                    <option value="2">Đang Vận Chuyển</option>--}}
{{--                                    <option value="3">Hoàn Thành</option>--}}
                                    <option value="4" selected>Hủy Đơn Hàng</option>
                                    @elseif($data2->__get("status")==3)
                                     <option value="3" selected>Hoàn Thành</option>
                                    @else
                                        <option value="0" {{($data2->status)==0?"selected":""}}>Đang Xử Lý</option>
                                        <option value="1" {{($data2->status)==1?"selected":""}}>Xác Nhận Đơn Hàng</option>
                                        <option value="2" {{($data2->status)==2?"selected":""}}>Đang Vận Chuyển</option>
                                        <option value="3" {{($data2->status)==3?"selected":""}}>Hoàn Thành</option>
                                        <option value="4" {{($data2->status)==4?"selected":""}}>Hủy Đơn Hàng</option>
                                    @endif
                                </select>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Cập Nhật</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        DANH SÁCH SẢN PHẨM
                    </h2>
                </div>
                <div class="body table-responsive">
                    <table class="table table-striped">
                        <thead class="text-center">
                        <tr>
                            <th>STT</th>
                            <th>Tên Sản Phẩm</th>
                            <th>Ảnh</th>
                            <th>Loại sản phẩm</th>
                            <th>Số Lượng</th>
                            <th>Giá</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data2_detail as $value)
                            <tr >
                                <th scope="row">{{$loop->index+1}}</th>
                                <td>{{$value->Product->product_name}}</td>
                                <td>
                                    <img  src="{{asset($value->Product->__get('product_avatar'))}}" width="80px" alt="">
                                </td>

                                <td>{{$value->Product->Type_product->__get('name')}}</td>
                                <td>{{$value->quantity}}</td>
                                <td>{{$value->getPrice()}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{--                    {!! $product->links() !!}--}}

                </div>
            </div>
        </div>
    </div>

@endsection

