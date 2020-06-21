@extends('backend.components.layout')
@section('head-title','Loai Sản Phẩm')
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
                        DANH SÁCH CÁC TÀI KHOẢN
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
                            <th>Tên Người Dùng</th>
                            <th>Địa Chỉ</th>
                            <th>Ngày tạo</th>
                            <th>Tác vụ</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($customer as $value)
                            <tr >
                                <th scope="row">{{$loop->index+1}}</th>
                                <td>{{$value->__get('email')}}</td>
                                <td>
                                    {{$value->__get("customer_name")}}
                                </td>
                               <td>{{$value->__get("address")}}</td>
                                <td>{{$value->__get('created_at')}}</td>
                                <td>
{{--                                    <a href="{{url("admin/account/cap-quyen/{$value->__get("id")}")}}" class="label bg-blue">Chi tiết</a>--}}
                                    {{--                                    <a href="{{url("admin/type_products/delete/{$value->__get("id")}")}}" class="label bg-red">Delete</a>--}}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

