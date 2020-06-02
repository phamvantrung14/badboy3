@extends('backend.components.layout')
@section('head-title','Loai Sản Phẩm')
@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <ol class="breadcrumb breadcrumb-col-teal" style="margin: 0px; padding-bottom: 0px">
                    <li><a href="{{route("admin")}}"><i class="material-icons">home</i> Home</a></li>
                    <li class="active"><i class="material-icons">view_week</i> Quản Lý Loại Sản Phẩm</li>

                </ol>
            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h4>
                        DANH SÁCH CÁC LOẠI SẢN PHẨM
                    </h4>
                    <ul class="header-dropdown m-r--5">
                        <li class="dropdown">
                            <a class="dropdown-toggle" role="button" aria-expanded="false" aria-haspopup="true" href="javascript:void(0);" data-toggle="dropdown">
                                <i class="material-icons">more_vert</i>
                            </a>
                            <ul class="dropdown-menu pull-right">
                                <li><a class=" waves-effect waves-block" href="{{route('new-type-pd')}}">Thêm Mới Loại Sản Phẩm</a></li>

                            </ul>
                        </li>
                    </ul>

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
                            <th>Tên loại Sản Phẩm</th>
                            <th>Ảnh</th>
                            <th>Mô Tả</th>
                            <th>Ngày tạo</th>
                            <th>Tác vụ</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($type as $value)
                            <tr >
                                <th scope="row">{{$loop->index+1}}</th>
                                <td>{{$value->__get('name')}}</td>
                                <td>
                                    <img  src="{{asset($value->__get('image'))}}" width="80px" alt="">
                                </td>
                                <td>{!! $value->__get('description') !!}</td>
                                <td>{{$value->__get('created_at')}}</td>
                                <td>
                                    <a href="{{url("admin/type_products/edit/{$value->__get("id")}")}}" class="label bg-blue">Edit</a>
                                    <a href="{{url("admin/type_products/delete/{$value->__get("id")}")}}" class="label bg-red">Delete</a>
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

