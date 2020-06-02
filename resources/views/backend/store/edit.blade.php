@extends('backend.components.layout')
@section('head-title',"Store {$store->__get('store_name')}")
@section('content')

    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <ol class="breadcrumb breadcrumb-col-teal" style="margin: 0px; padding-bottom: 0px">
                    <li><a href="{{route("admin")}}"><i class="material-icons">home</i> Home</a></li>
                    <li><a href="{{route("store")}}"><i class="material-icons">store</i> Quản Lý Cửa Hàng</a></li>
                    <li class="active"><i class="material-icons">create</i> Chỉnh Sửa Store</li>

                </ol>
            </div>
        </div>
    </div>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="row clearfix">
        <div class="card">
            <div class="header">
                <h4>
                    CỬA HÀNG {{$store->__get('store_name')}}
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
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    @foreach($errors->all() as $err)
                        <strong>{{$err}}</strong> ...
                    @endforeach
                </div>
            @endif
            <div class="body">
                <form method="post" action="{{url("admin/store/update/{$store->__get("id")}")}}">
                    @csrf
                    @method("PUT")
                    <label for="email_address">Khu vực</label>
                    <div class="form-group">
                        <div class="form-line">
                            <select name="area" id="">
                                <option value="1" {{(($store->__get("area"))==1)? 'selected':' '}}>Hà Nội</option>
                                <option value="2" {{(($store->__get("area"))==2)? 'selected':' '}}>HCM</option>
                                <option value="3" {{(($store->__get("area"))==3)? 'selected':' '}}>Đà Nẵng</option>
                                <option value="4" {{(($store->__get("area"))==4)? 'selected':' '}}>Khu vực khác</option>
                            </select>
                        </div>
                    </div>
                    <label for="password">Tên cửa hàng</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input class="form-control" id="" value="{{$store->__get("store_name")}}" type="text" name="store_name"   placeholder="Nhập tên cửa hàng">
                        </div>
                    </div>
                    <label for="password">Địa chỉ</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input class="form-control" id="" value="{{$store->__get("address")}}" type="text" name="address"   placeholder="Nhập địa chỉ">
                        </div>
                    </div>
                    <label for="password">SĐT</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input class="form-control" id="" type="number" value="{{$store->__get("phone")}}" name="phone"   placeholder="Nhập số điện thoại cửa hàng">
                        </div>
                    </div>

                    <br>
                    <button class="btn bg-cyan waves-effect" type="submit">CẬP NHẬT CỬA HÀNG</button>
                </form>
            </div>
        </div>
        </div>
    </div>
@endsection
