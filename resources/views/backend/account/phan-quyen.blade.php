@extends('backend.components.layout')
@section('head-title',"Account")
@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <ol class="breadcrumb breadcrumb-col-teal" style="margin: 0px">
                    <li><a href="{{route("admin")}}"><i class="material-icons">home</i> Home</a></li>
                    <li><a href="{{route("account")}}"><i class="material-icons">account_box</i>   Quản Lý Tài Khoản</a></li>
                    <li class="active"><i class="material-icons">create</i> Phân quyền</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="row clearfix">
    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">

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
                    <form method="post" action="{{url("admin/account/update-role/{$user->__get("id")}")}}" enctype="multipart/form-data">
                        @csrf
                        @method("PUT")
                        {{--                        <label for="email_address">Khu vực</label>--}}
                        <label for="">Phân Quyền:</label>
                        <div class="form-group">
                            <div class="demo-radio-button">
                                <input name="role" value="1" id="radio_1" type="radio" {{($user->__get("role")==1)? 'checked':''}}>
                                <label for="radio_1">Admin</label>
                                <input name="role" value="0" id="radio_2" type="radio" {{($user->__get("role")==0)? 'checked':''}}>
                                <label for="radio_2">Thường</label>
                            </div>
                        </div>

                        <br>
                        <button class="btn bg-cyan waves-effect" type="submit">CẬP NHẬT TÀI KHOẢN</button>
                    </form>
                </div>
            </div>

    </div>
    <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">

        <div class="card">
            <div class="header">
                <h4>Thông Tin Tài Khoản: </h4>

            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-hover dashboard-task-infos">
                        <tbody>
                        <tr>
                            <th>Tên Tài Khoản: </th>
                            <td>{{$user->__get("user_name")}}</td>

                        </tr>
                        <tr>
                            <th>Email:</th>
                            <td>{{$user->__get("email")}}</td>

                        </tr>
                        <tr>
                            <th>Số Điện Thoại:</th>
                            <td>{{$user->__get("phone_number")}}</td>

                        </tr>
                        <tr>
                            <th>Địa Chỉ: </th>
                            <td>{{$user->__get("address")}}</td>

                        </tr>
                        <tr>
                            <th>Quyền Hiện Tại: </th>
                            @if($user->__get("role")==1)
                                <td><p class="btn bg-teal btn-block btn-xs waves-effect " style="width: 60%; ">Admin</p></td>
                            @elseif($user->__get("role")==0)
                                <td><p class="btn bg-primary btn-block btn-xs waves-effect " style="width: 60%; ">Thường</p></td>
                            @endif
                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

