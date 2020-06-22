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
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h4>Tìm Kiếm Nhanh Theo Trạng Thái</h4>
                    <ul class="header-dropdown m-r--5">
                        <li class="dropdown">
                            <a class="dropdown-toggle" role="button" aria-expanded="false" aria-haspopup="true" href="javascript:void(0);" data-toggle="dropdown">
                                <i class="material-icons">more_vert</i>
                            </a>
                            <ul class="dropdown-menu pull-right">
                                <li><a class=" waves-effect waves-block" href="{{route('orders.index')}}">Tất cả</a></li>

                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="body">
                    <div class="row clearfix">
                        <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                            <input type="hidden" id="waiting" name="status" value="0">
                                <button class="btn btn-success btn-lg btn-block waves-effect" onclick="addStWaiting();" type="button">ĐANG CHỜ <span class="badge">{{count($stwaiting)}}</span></button>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                                <input type="hidden" id="confirm" name="status" value="1">
                                <button class="btn btn-primary btn-lg btn-block waves-effect" onclick="addStConfirm();" type="button">ĐÃ XÁC NHẬN <span class="badge">{{count($stconfirm)}}</span></button>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                                <input type="hidden" id="ship" name="status" value="2">
                                <button class="btn btn-danger btn-lg btn-block waves-effect" onclick="addStShip();" type="submit">ĐANG GIAO <span class="badge">{{count($stship)}}</span></button>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                                <input type="hidden" id="complete" name="status" value="3">
                                <button class="btn btn-warning btn-lg btn-block waves-effect"onclick="addStComplete();" type="submit">HOÀN THÀNH <span class="badge">{{count($stconplete)}}</span></button>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                            <input type="hidden" id="deleteOrder" name="status" value="4">
                            <button class="btn btn-warning btn-lg btn-block waves-effect" onclick="addStDeleteOrder();" type="submit">BỊ HỦY<span class="badge">{{count($stdelete)}}</span></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h4>
                        DANH SÁCH ĐƠN HÀNG
                    </h4>
                </div>

                @if(session('thong_bao'))
                    <div class="header">
                        <div class="alert alert-success">
                            {{session('thong_bao')}}
                        </div>
                    </div>
                @endif
                <div class="bb body table-responsive">
                    <table class="table table-striped">
                        <thead class="text-center">
                        <tr>
                            <th>STT</th>
                            <th>Email</th>
                            <th>Địa Chỉ</th>
                            <th>SĐT</th>
                            <th>Trạng Thái</th>
                            <th>Ngày Tạo</th>
                            <th>Tác vụ</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($datas as $value)
                            <tr >
                                <th scope="row">{{$loop->index+1}}</th>
                                <td>{{$value->__get('email')}}<br>
                                    ({{$value->getTotalPrice()}})
                                </td>
                                <td>
                                    {{$value->__get("address")}}
                                </td>
                                <td>{{$value->__get("phone_number")}}</td>
                                <td><p class="label bg-blue">{{$value->getStatus()}}</p></td>
                                <td>{{$value->__get('created_at')}}</td>
                                <td>
                                    <a href="{{route("orders.show",["order"=>$value->__get("id")])}}" class="label bg-green">Chi tiết</a>
                                </td>
{{--                                <td>--}}
{{--                                <form action="{{route("orders.show",["order"=>$value->__get("id")])}}" method="GET">--}}
{{--                                    @csrf--}}
{{--                                    @method("GET")--}}
{{--                                    <button type="submit" class="label bg-blue">Chi Tiết</button>--}}
{{--                                </form>--}}
{{--                                </td>--}}
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {!! $datas->render('vendor.pagination.pgiadmin') !!}
                </div>
            </div>
        </div>
    </div>

@endsection

