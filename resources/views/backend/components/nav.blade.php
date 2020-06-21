<div class="navbar-header">
    <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
    <a href="javascript:void(0);" class="bars"></a>
    <a class="navbar-brand" href="index.html">ADMINBSB - DAVIE'S BURGERS</a>
</div>
<div class="collapse navbar-collapse" id="navbar-collapse">
    <ul class="nav navbar-nav navbar-right">
        <!-- Call Search -->
{{--        <li><a href="javascript:void(0);" class="js-search" data-close="true"><i class="material-icons">search</i></a></li>--}}
        <!-- #END# Call Search -->
        <!-- Notifications -->
        <li class="dropdown">
            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                <i class="material-icons">notifications</i>
                <span class="label-count">{{count($waiting)}}</span>
            </a>
            <ul class="dropdown-menu">
                <li class="header">ĐƠN HÀNG ĐANG CHỜ</li>
                <li class="body">
                    <ul class="menu">
                        @foreach($waiting as $value)
                        <li>
                            <a href="javascript:void(0);">
                                <div class="icon-circle bg-light-green">
                                    <i class="material-icons">reorder</i>
                                </div>
                                <div class="menu-info">
                                    <h4>{{$value->order_name}}</h4>
                                    <p>
                                        <i class="material-icons" style="padding-right: 5px">access_time</i>{{$value->created_at}}
                                    </p>
                                </div>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </li>
{{--                <li class="footer">--}}
{{--                    <a href="javascript:void(0);">View All Notifications</a>--}}
{{--                </li>--}}
            </ul>
        </li>
        <!-- #END# Notifications -->
        <!-- Tasks -->
{{--        <li class="pull-right"><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="material-icons">more_vert</i></a></li>--}}
    </ul>
</div>
