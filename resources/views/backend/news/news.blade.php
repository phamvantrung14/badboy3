@extends('backend.components.layout')
@section('head-title','Hệ Thống Store')
@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <ol class="breadcrumb breadcrumb-col-teal" style="margin: 0px; padding-bottom: 0px">
                    <li><a href="{{route("admin")}}"><i class="material-icons">home</i> Home</a></li>
                    <li class="active"><i class="material-icons">book</i>Quản Lý Tin Tức</li>

                </ol>
            </div>
        </div>
    </div>
    <div class="row clearfix">

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h4>QUẢN LÝ TIN TỨC</h4>
                <ul class="header-dropdown m-r--5">
                    <li class="dropdown">
                        <a class="dropdown-toggle" role="button" aria-expanded="false" aria-haspopup="true" href="javascript:void(0);" data-toggle="dropdown">
                            <i class="material-icons">more_vert</i>
                        </a>
                        <ul class="dropdown-menu pull-right">
                            <li><a class=" waves-effect waves-block" href="{{route('new-news')}}">Thêm Mới Tin Tức</a></li>

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
            <div class="body">
                <div class="table-responsive">
                    <div class="dataTables_wrapper form-inline dt-bootstrap" id="DataTables_Table_0_wrapper">

                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                                    <thead>
                                    <tr role="row">
                                        <th tabindex="0" class="sorting" aria-controls="DataTables_Table_0" style="width: 40px;" aria-label="Salary: activate to sort column ascending" rowspan="1" colspan="1">STT</th>

                                        <th tabindex="0" class="sorting_asc" aria-controls="DataTables_Table_0" style="width: 230px;" aria-label="Name: activate to sort column descending" aria-sort="ascending" rowspan="1" colspan="1">Tiêu Đề</th>
                                        <th tabindex="0" class="sorting" aria-controls="DataTables_Table_0" style="width: 100px;" aria-label="Position: activate to sort column ascending" rowspan="1" colspan="1">Trạng Thái</th>
                                        <th tabindex="0" class="sorting" aria-controls="DataTables_Table_0" style="width: 100px;" aria-label="Office: activate to sort column ascending" rowspan="1" colspan="1">Ảnh</th>
                                        <th tabindex="0" class="sorting" aria-controls="DataTables_Table_0" style="width: 90px;" aria-label="Age: activate to sort column ascending" rowspan="1" colspan="1">Created_at</th>
                                        <th tabindex="0" class="sorting" aria-controls="DataTables_Table_0" style="width: 90px;" aria-label="Start date: activate to sort column ascending" rowspan="1" colspan="1">Updated_at</th>
                                        <th tabindex="0" class="sorting" aria-controls="DataTables_Table_0" style="width: 150px;" aria-label="Salary: activate to sort column ascending" rowspan="1" colspan="1">Tác Vụ</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th rowspan="1" colspan="1">STT</th>
                                        <th rowspan="1" colspan="1">Tiêu Đề</th>
                                        <th rowspan="1" colspan="1">Trạng Thái</th>
                                        <th rowspan="1" colspan="1">Ảnh</th>
                                        <th rowspan="1" colspan="1">Created_at</th>
                                        <th rowspan="1" colspan="1">Updated_at</th>
                                        <th rowspan="1" colspan="1">Tác Vụ</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    @foreach($news as $value)
                                    <tr class="odd" role="row">
                                        <td class="sorting_1">{{$loop->index+1}}</td>
                                        <td >{{$value->__get("new_title")}}</td>
                                        @if($value->__get("status")==1)
                                        <td><p class="btn bg-red btn-block btn-xs waves-effect " style="width: 60%; margin-top: 5%">Ẩn</p></td>
                                        @elseif($value->__get("status")==2)
                                        <td><p class="btn bg-teal btn-block btn-xs waves-effect" style="width: 60%; margin-top: 5%">Hiện</p></td>
                                        @endif
                                        <td><img src="{{asset($value->__get('image'))}}" width="80px" alt="">
                                            </td>
                                        <td>{{$value->__get("created_at")}}</td>
                                        <td>{{$value->__get("updated_at")}}</td>
                                        <td>
                                            <a href="{{url("admin/news/chi-tiet/{$value->__get("id")}")}}" class="label bg-green">Check</a>
                                            <a href="{{url("admin/news/edit/{$value->__get("id")}")}}" class="label bg-blue">Edit</a>
                                            <a href="{{url("admin/news/delete/{$value->__get("id")}")}}" class="label bg-red">Delete</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-5">

                            </div>
                            <div class="col-sm-7">
                                <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                                    {!! $news->links() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
