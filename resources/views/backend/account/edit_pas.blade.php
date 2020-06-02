@extends('backend.components.layout')
@section('head-title',"Account")
@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <ol class="breadcrumb breadcrumb-col-teal" style="margin: 0px">
                    <li><a href="{{route("admin")}}"><i class="material-icons">home</i> Home</a></li>
                    <li><a href="{{route("account")}}"> <i class="material-icons">account_box</i>   Quản Lý Tài Khoản</a></li>
                    <li class="active"><i class="material-icons">create</i> Đổi Mật Khẩu</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="row clearfix">
            <div class="card">
                <div class="header">
                    <h4>
                        Tài Khoản: {{$user->__get("email")}}
                    </h4>
                </div>
                @if(session("error"))
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <strong>{{session("error")}}</strong> ...
                    </div>
                @endif
                @if(count($errors)>0)
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        @foreach($errors->all() as $err)
                            <strong>{{$err}}</strong> ...
                        @endforeach
                    </div>
                @endif
                <div class="body">
                    <form method="post" action="{{url("admin/account/save-pas/{$user->__get("id")}")}}" >
                        @csrf
                        @method("PUT")
                        <label for="password">Mật Khẩu Cũ: </label>
                        <div class="form-group">
                            <div class="form-line">
                                <input class="form-control" id=""  type="password" name="password_old"   placeholder="Nhập Mật Khẩu Cũ..">
                            </div>
                        </div>
                        <label for="password">Mật Khẩu Mới: </label>
                        <div class="form-group">
                            <div class="form-line">
                                <input class="form-control" id="" value="" type="password" name="password"   placeholder="Nhập Mật Khẩu Mới..">
                            </div>
                        </div>
                        <label for="password">Nhập Lại Mật Khẩu: </label>
                        <div class="form-group">
                            <div class="form-line">
                                <input class="form-control" id=""  type="password" name="password_confirm"   placeholder="Nhập Lại Mật Khẩu Khẩu Mới..">
                            </div>
                        </div>
                        <br>
                        <button class="btn bg-cyan waves-effect" type="submit">CẬP NHẬT TÀI KHOẢN</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

