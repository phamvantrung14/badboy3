@extends('backend.components.layout')
@section('head-title','Chi tiết tin tức')
@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <ol class="breadcrumb breadcrumb-col-teal" style="margin: 0px; padding-bottom: 0px">
                    <li><a href="{{route("admin")}}"><i class="material-icons">home</i> Home</a></li>
                    <li><a href="{{route("news")}}"><i class="material-icons">book</i>Quản Lý Tin Tức</a></li>
                    <li class="active"><i class="material-icons">attachment</i>Chi Tiết Tin Tức</li>

                </ol>
            </div>
        </div>
    </div>

    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h4>
                        ẢNH TIN TỨC
                    </h4>
                </div>
                <div class="body">
                    <img src="{{asset($new->__get("image"))}}" width="100%" alt="">

                </div>
            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h4>
                        NỘI DUNG
                    </h4>
                </div>
                <div class="body">
                    {!! $new->__get("new_content") !!}
                </div>
            </div>
        </div>
    </div>
@endsection

