@extends('backend.components.layout')
@section('head-title','Hệ Thống Tin Tức')
@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <ol class="breadcrumb breadcrumb-col-teal" style="margin: 0px">
                    <li><a href="{{route("admin")}}"><i class="material-icons">home</i> Home</a></li>
                    <li><a href="{{route("type-products")}}"><i class="material-icons">view_week</i>Quản Lý Loại Sản Phẩm</a></li>
                    <li class="active"><i class="material-icons">add_box</i> Thêm Mới Loại Sản Phẩm</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="row clearfix">
        <div class="card">
            <div class="header">
                <h4>
                    THÊM MỚI LOẠI SẢN PHẨM
                </h4>
{{--                                <ul class="header-dropdown m-r--5">--}}
{{--                                    <li class="dropdown">--}}
{{--                                        <a class="dropdown-toggle" role="button" aria-expanded="true" aria-haspopup="true" href="javascript:void(0);" data-toggle="dropdown">--}}
{{--                                            <i class="material-icons">more_vert</i>--}}
{{--                                        </a>--}}
{{--                                        <ul class="dropdown-menu pull-right">--}}
{{--                                            <li><a class=" waves-effect waves-block" href="javascript:void(0);">Action</a></li>--}}
{{--                                            <li><a class=" waves-effect waves-block" href="javascript:void(0);">Another action</a></li>--}}
{{--                                            <li><a class=" waves-effect waves-block" href="javascript:void(0);">Something else here</a></li>--}}
{{--                                        </ul>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
            </div>
            @if(count($errors)>0)
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times</button>
                    @foreach($errors->all() as $err)
                        <strong>{{$err}}</strong> ...
                    @endforeach
                </div>
            @endif
            @if(session('thong_bao'))
                <div class="header">
                    <div class="alert alert-success">
                        {{session('thong_bao')}}
                    </div>
                </div>
            @endif
            <div class="body">
                <form method="post" action="{{route('save-type-pd')}}" enctype="multipart/form-data">
                    @csrf
                    @method("POST")
                    <label for="">Tên Loại Sản Phẩm:</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input class="form-control" id="" type="text" name="name"   placeholder="Nhập tên loại sản phẩm">
                        </div>
                    </div>
                    <label for="">Mô Tả:</label>
                    <div class="form-group">
                        <div class="form-line">
                            <textarea type="text"  name="description" class="form-control ckeditor" id="demo" placeholder="Nhập nội dung bài viết ....."></textarea>
                        </div>
                    </div>
                    <label for="">Chon Ảnh:</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input class="form-control" id="" type="file" name="image">
                        </div>
                    </div>
                    <br>
                    <button class="btn bg-cyan waves-effect" type="submit">THÊM MỚI LOẠI SẢN PHẨM</button>
                </form>
            </div>
        </div>
        </div>
    </div>
@endsection
