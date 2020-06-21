@extends('backend.components.layout')
@section('head-title','Loai Sản Phẩm')
@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <ol class="breadcrumb breadcrumb-col-teal" style="margin: 0px">
                    <li><a href="{{route("admin")}}"><i class="material-icons">home</i> Home</a></li>
                    <li><a href="{{route("slide")}}"><i class="material-icons">view_list</i>Danh Sách Slide</a></li>
                    <li class="active"><i class="material-icons">attachment</i> Chi Tiết</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4" style="height:255px !important; ">

            <div class="card">
                <div class="header">
                    <h4>Thông tin SP: </h4>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-hover dashboard-task-infos">
                            <tbody>
                            <tr>
                                <th>Tiêu Đề Slide: </th>
                                <td>{{$slide->__get("slide_title")}}</td>
                            </tr>
                            <tr>
                                <th>Trang Thái:</th>
                                 @if($slide->__get("status")==1)
                                    <td><p class="btn bg-red btn-block btn-xs waves-effect" style="width: 60%">Ẩn</p></td>
                                @elseif($slide->__get("status")==2)
                                    <td><p class="btn bg-teal btn-block btn-xs waves-effect" style="width: 60%">Hiện</p></td>
                                    @endif
                            </tr>
                            <tr>
                                <th>Loại Slide:</th>
                                <td> {{$slide->getTypeSlide()}}</td>
                            </tr>
                            <tr>
                                <th>Ngày Tạo:</th>
                                <td> {{$slide->__get("created_at")}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h4>Ảnh Slide</h4>
                </div>
                <div class="body">

                    <img src="{{url("upload/slide/{$slide->__get("image")}")}}" width="100%" height="255px" alt="">

                </div>
            </div>
        </div>
    </div>


@endsection
