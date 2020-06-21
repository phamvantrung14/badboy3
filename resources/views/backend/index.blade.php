@extends('backend.components.layout')
@section('head-title','Admin')
@section('content')
    <!-- Widgets -->
    <div class="row clearfix">
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-pink hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">view_list</i>
                </div>
                <div class="content">
                    <div class="text">SẢN PHẨM</div>
                    <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20">{{count($totalProducts)}}</div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-cyan hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">book</i>
                </div>
                <div class="content">
                    <div class="text">TIN TỨC</div>
                    <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20">{{count($totalNews)}}</div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-light-green hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">store</i>
                </div>
                <div class="content">
                    <div class="text">CỬA HÀNG</div>
                    <div class="number count-to" data-from="0" data-to="243" data-speed="1000" data-fresh-interval="20">{{count($totalStore)}}</div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-orange hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">account_box</i>
                </div>
                <div class="content">
                    <div class="text">THÀNH VIÊN</div>
                    <div class="number count-to" data-from="0" data-to="1225" data-speed="1000" data-fresh-interval="20">{{count($totalMember)}}</div>
                </div>
            </div>
        </div>
    </div>
    <!-- #END# Widgets -->
    <!-- CPU Usage -->

    <!-- #END# CPU Usage -->
    <div class="row clearfix">
        <!-- Task Info -->
        <!-- #END# Task Info -->
        <!-- Browser Usage -->
        <div class="col-md-4">


        </div>
        <div class="row clearfix">
            <!-- Task Info -->
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                <div class="card">
                    <div class="header">
                        <h2>TASK INFOS</h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="javascript:void(0);" class=" waves-effect waves-block">Action</a></li>
                                    <li><a href="javascript:void(0);" class=" waves-effect waves-block">Another action</a></li>
                                    <li><a href="javascript:void(0);" class=" waves-effect waves-block">Something else here</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <figure class="highcharts-figure">
                    <div id="container"></div>

                    </figure>
                </div>
            </div>
            <!-- #END# Task Info -->
            <!-- Browser Usage -->
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="card">
                    <div class="header">
                        <h2>Trang Thai Don Hang</h2>
                    </div>
{{--                    <div class="body">--}}
                        <figure class="highcharts-figure">
                            <div id="container3"></div>

                        </figure>
{{--                    </div>--}}
                </div>
            </div>
            <!-- #END# Browser Usage -->
        </div>
        <!-- #END# Browser Usage -->
        <div class="row clearfix">
            <!-- Visitors -->
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="card">
                    <div class="body bg-pink">
                        <div class="sparkline" data-type="line" data-spot-radius="4" data-highlight-spot-color="rgb(233, 30, 99)" data-highlight-line-color="#fff" data-min-spot-color="rgb(255,255,255)" data-max-spot-color="rgb(255,255,255)" data-spot-color="rgb(255,255,255)" data-offset="90" data-width="100%" data-height="92px" data-line-width="2" data-line-color="rgba(255,255,255,0.7)" data-fill-color="rgba(0, 188, 212, 0)">
                           SẢN PHẨM MỚI
                        </div>
                        <ul class="dashboard-stat-list">
                            @foreach($productNews as $value)
                            <li>
                                {{$value->ma_sp}}-{{$value->product_name}}
                                <span class="pull-right"><b>{{$value->getPrice()}}</b></span>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #END# Visitors -->
            <!-- Latest Social Trends -->
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="card">
                    <div class="body bg-cyan">
                        <div class="m-b--35 font-bold">ĐƠN HÀNG ĐANG CHỜ XÁC NHẬN</div>
                        <ul class="dashboard-stat-list">
                            @foreach($orderWaiting as $value)
                            <li>
                                #{{$value->order_name}}
                                <span class="pull-right">
                                        {{$value->getTotalPrice()}}
                                    </span>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #END# Latest Social Trends -->
            <!-- Answered Tickets -->
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="card">
                    <div class="body bg-teal">
                        <div class="font-bold m-b--35">ĐƠN HÀNG ĐANG VẬN CHUYỂN</div>
                        <ul class="dashboard-stat-list">
                            @foreach($orderShip as $value)
                            <li>
                                {{$value->order_name}}
                                <span class="pull-right"><b>{{$value->getTotalPrice()}}</b></span>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #END# Answered Tickets -->
        </div>
{{--        doanh thu trong thang--}}
        <div class="row clearfix">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2>Thống Kê Doanh Thu Hàng Ngày Trong Tháng {{$month}}</h2>
                    </div>
                    <figure class="highcharts-figure">
                        <div id="container2" data-list-day="{{$listDay}}" data-money="{{$arrOrders}}" data-money-default="{{$arrOrdersDefault}}"></div>
                    </figure>
                </div>
            </div>
        </div>
    </div>


@endsection


