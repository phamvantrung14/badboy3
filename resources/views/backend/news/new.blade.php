@extends('backend.components.layout')
@section('head-title','Hệ Thống Tin Tức')
@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <ol class="breadcrumb breadcrumb-col-teal" style="margin: 0px; padding-bottom: 0px">
                    <li><a href="{{route("store")}}"><i class="material-icons">home</i> Home</a></li>
                    <li><a href="{{route("news")}}"><i class="material-icons">book</i> Quản Lý Tin Tức</a></li>
                    <li class="active"><i class="material-icons">view_list</i> Thêm Mới Tin Tức</li>

                </ol>
            </div>
        </div>
    </div>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="row clearfix">
        <div class="card">
            <div class="header">
                <h4>
                    THÊM MỚI TIN TỨC
                </h4>
                {{--                <ul class="header-dropdown m-r--5">--}}
                {{--                    <li class="dropdown">--}}
                {{--                        <a class="dropdown-toggle" role="button" aria-expanded="true" aria-haspopup="true" href="javascript:void(0);" data-toggle="dropdown">--}}
                {{--                            <i class="material-icons">more_vert</i>--}}
                {{--                        </a>--}}
                {{--                        <ul class="dropdown-menu pull-right">--}}
                {{--                            <li><a class=" waves-effect waves-block" href="javascript:void(0);">Action</a></li>--}}
                {{--                            <li><a class=" waves-effect waves-block" href="javascript:void(0);">Another action</a></li>--}}
                {{--                            <li><a class=" waves-effect waves-block" href="javascript:void(0);">Something else here</a></li>--}}
                {{--                        </ul>--}}
                {{--                    </li>--}}
                {{--                </ul>--}}
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
                <form method="post" action="{{route('save-news')}}" enctype="multipart/form-data">
                    @csrf
                    @method("POST")
                    <label for="">Trạng Thái:</label>
                    <div class="form-group">
                        <div class="demo-radio-button">
                            <input name="status" value="1" id="radio_1" type="radio" checked="">
                            <label for="radio_1">Ẩn</label>
                            <input name="status" value="2" id="radio_2" type="radio">
                            <label for="radio_2">Hiện</label>
                        </div>
                    </div>
                    <label for="">Tiêu Đề:</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input class="form-control" id="" type="text" name="new_title"   placeholder="Nhập tiêu đề bài viết....">
                        </div>
                    </div>
                    <label for="">Nội Dung:</label>
                    <div class="form-group">
                        <div class="form-line">
                            <textarea type="text"  name="new_content" class="form-control ckeditor" id="demo" placeholder="Nhập nội dung bài viết ....."></textarea>
                        </div>
                    </div>
                    <label for="">Chon Ảnh:</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input class="form-control" id="" type="file" name="image">
                        </div>
                    </div>
                    <br>
                    <button class="btn bg-cyan waves-effect" type="submit">THÊM MỚI TIN TỨC</button>
                </form>
            </div>
        </div>
        </div>
    </div>
@endsection
