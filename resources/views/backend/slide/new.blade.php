@extends('backend.components.layout')
@section('head-title','New Slide')
@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <ol class="breadcrumb breadcrumb-col-teal" style="margin: 0px">
                    <li><a href="{{route("store")}}"><i class="material-icons">home</i> Home</a></li>
                    <li><a href="{{route("slide")}}"><i class="material-icons">perm_media</i>  Quản Lý Slide</a></li>
                    <li class="active"><i class="material-icons">add_box</i> Thêm Mới Slide</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="row clearfix">
        <div class="card">
            <div class="header">
                <h4>
                    THÊM SLIDE
                </h4>
            </div>
            @if(count($errors)>0)
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times</button>
                    @foreach($errors->all() as $err)
                        <strong>{{$err}}</strong> ...
                    @endforeach
                </div>
            @endif
            <div class="body">
                <form method="post" action="{{route('save-slide')}}" enctype="multipart/form-data">
                    @csrf
                    @method("POST")
                    <label for="">Trạng Thái</label>
                    <div class="form-group">
                        <div class="demo-radio-button">
                            <input name="status" value="1" id="radio_1" type="radio" checked="">
                            <label for="radio_1">Ẩn</label>
                            <input name="status" value="2" id="radio_2" type="radio">
                            <label for="radio_2">Hiện</label>
                        </div>
                    </div>
                    <label for="">Tiêu Đề</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input class="form-control" id="" type="text" name="slide_title"   placeholder="Nhập tên cửa hàng">
                        </div>
                    </div>
                    <label for="">Loại Slide</label>
                    <div class="form-group">
                        <select name="type_slide" id="">
                            <option value="0">Mặc Định</option>
                            <option value="1">Trang Chủ</option>
                            <option value="2">Sản Phẩm</option>
                            <option value="3">Tin Tức</option>
                            <option value="4">Cửa Hàng</option>
                        </select>
                    </div>
                    <label for="">Chon ảnh</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input class="form-control" id="" type="file" name="image">
                        </div>
                    </div>
                    <br>
                    <button class="btn bg-cyan waves-effect" type="submit">THÊM MỚI SLIDE</button>
                </form>
            </div>
        </div>
        </div>
    </div>


@endsection

