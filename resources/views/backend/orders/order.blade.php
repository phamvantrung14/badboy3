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
                <div class="body table-responsive">
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
                </div>
            </div>
        </div>
    </div>

@endsection
