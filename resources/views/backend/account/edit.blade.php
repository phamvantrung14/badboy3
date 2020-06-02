@extends('backend.components.layout')
@section('head-title',"Account")
@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <ol class="breadcrumb breadcrumb-col-teal" style="margin: 0px">
                    <li><a href="{{route("admin")}}"><i class="material-icons">home</i> Home</a></li>
                    <li><a href="{{route("account")}}"><i class="material-icons">account_box</i>   Quản Lý Tài Khoản</a></li>
                    <li class="active"><i class="material-icons">create</i> Chinh Sửa</li>
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
                @if(count($errors)>0)
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        @foreach($errors->all() as $err)
                            <strong>{{$err}}</strong> ...
                        @endforeach
                    </div>
                @endif
                <div class="body">
                    <form method="post" action="{{url("admin/account/update/{$user->__get("id")}")}}" enctype="multipart/form-data">
                        @csrf
                        @method("PUT")
{{--                        <label for="email_address">Khu vực</label>--}}
{{--                        <label for="">Phân Quyền:</label>--}}
{{--                        <div class="form-group">--}}
{{--                            <div class="demo-radio-button">--}}
{{--                                <input name="role" value="1" id="radio_1" type="radio" {{($user->__get("role")==1)? 'checked':''}}>--}}
{{--                                <label for="radio_1">Admin</label>--}}
{{--                                <input name="role" value="0" id="radio_2" type="radio" {{($user->__get("role")==0)? 'checked':''}}>--}}
{{--                                <label for="radio_2">Thường</label>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        <label for="password">Họ Tên:</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input class="form-control" id="" value="{{$user->__get("user_name")}}" type="text" name="user_name"   placeholder="Nhập tên của bạn..">
                            </div>
                        </div>
                        <label for="password">SĐT:</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input class="form-control" id="" value="{{$user->__get("phone_number")}}" type="text" name="phone_number"   placeholder="Nhập SĐT..">
                            </div>
                        </div>
                        <label for="password">Địa Chỉ:</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input class="form-control" id="" value="{{$user->__get("address")}}" type="text" name="address"   placeholder="Nhập Địa Chỉ..">
                            </div>
                        </div>
                        <label for="">Chon ảnh</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input class="form-control" id="" type="file" name="image"   >
                            </div>
{{--                            <img src="{{asset('upload/slide')}}" width="100px" alt="">--}}
                        </div>


                        <br>
                        <button class="btn bg-cyan waves-effect" type="submit">CẬP NHẬT TÀI KHOẢN</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
