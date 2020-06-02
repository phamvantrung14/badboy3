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
{{--                    <ul class="header-dropdown m-r--5">--}}
{{--                        <li class="dropdown">--}}
{{--                            <a class="dropdown-toggle" role="button" aria-expanded="false" aria-haspopup="true" href="javascript:void(0);" data-toggle="dropdown">--}}
{{--                                <i class="material-icons">more_vert</i>--}}
{{--                            </a>--}}
{{--                            <ul class="dropdown-menu pull-right">--}}
{{--                                <li><a class=" waves-effect waves-block" href="{{route('new-type-pd')}}">Thêm Mới Loại Sản Phẩm</a></li>--}}

{{--                            </ul>--}}
{{--                        </li>--}}
{{--                    </ul>--}}

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
                            <th>Ảnh</th>
                            <th>Phân Quyền</th>
                            <th>Ngày tạo</th>
                            <th>Tác vụ</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $value)
                            <tr >
                                <th scope="row">{{$loop->index+1}}</th>
                                <td>{{$value->__get('email')}}</td>
                                <td>
                                    <img  src="{{asset($value->__get('image'))}}" width="80px" alt="">
                                </td>
                                @if($value->__get("role")==1)

                                    <td><p class="btn bg-teal btn-block btn-xs waves-effect " style="width: 60%; margin-top: 5%">Admin</p></td>
                                @elseif($value->__get("role")==0)

                                    <td><p class="btn bg-primary btn-block btn-xs waves-effect " style="width: 60%; margin-top: 5%">Thường</p></td>
                                @endif
                                <td>{{$value->__get('created_at')}}</td>
                                <td>
                                    <a href="{{url("admin/account/cap-quyen/{$value->__get("id")}")}}" class="label bg-blue">Cấp Quyền</a>
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
