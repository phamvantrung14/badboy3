<!-- Jquery Core Js -->
<script src="{{asset('backend/plugins/jquery/jquery.min.js')}}"></script>

<!-- Bootstrap Core Js -->
<script src="{{asset('backend/plugins/bootstrap/js/bootstrap.js')}}"></script>

<!-- Select Plugin Js -->
<script src="{{asset('backend/plugins/bootstrap-select/js/bootstrap-select.js')}}"></script>

<!-- Slimscroll Plugin Js -->
<script src="{{asset('backend/plugins/jquery-slimscroll/jquery.slimscroll.js')}}"></script>

<!-- Waves Effect Plugin Js -->
<script src="{{asset('backend/plugins/node-waves/waves.js')}}"></script>

<!-- Jquery CountTo Plugin Js -->
<script src="{{asset('backend/plugins/jquery-countto/jquery.countTo.js')}}"></script>

<!-- Morris Plugin Js -->
{{--<script src="{{asset('backend/plugins/raphael/raphael.min.js')}}"></script>--}}
{{--<script src="{{asset('backend/plugins/morrisjs/morris.js')}}"></script>--}}

{{--<!-- ChartJs -->--}}
{{--<script src="{{asset('backend/plugins/chartjs/Chart.bundle.js')}}"></script>--}}

{{--<!-- Flot Charts Plugin Js -->--}}
{{--<script src="{{asset('backend/plugins/flot-charts/jquery.flot.js')}}"></script>--}}
{{--<script src="{{asset('backend/plugins/flot-charts/jquery.flot.resize.js')}}"></script>--}}
{{--<script src="{{asset('backend/plugins/flot-charts/jquery.flot.pie.js')}}"></script>--}}
{{--<script src="{{asset('backend/plugins/flot-charts/jquery.flot.categories.js')}}"></script>--}}
{{--<script src="{{asset('backend/plugins/flot-charts/jquery.flot.time.js')}}"></script>--}}

{{--<!-- Sparkline Chart Plugin Js -->--}}
<script src="{{asset('backend/plugins/jquery-sparkline/jquery.sparkline.js')}}"></script>

<!-- Custom Js -->
<script src="{{asset('backend/js/admin.js')}}"></script>




{{--<script src="{{asset('backend/js/pages/index.js')}}"></script>--}}
{{--<script src="{{asset('backend/plugins/light-gallery/js/lightgallery-all.js')}}"></script>--}}
<!-- Demo Js -->
<script src="{{asset('backend/js/demo.js')}}"></script>
<script src="{{asset('backend/js/ckeditor/ckeditor/ckeditor.js')}}"></script>
<script type="text/javascript">
    function timkiem() {
        $.ajax({
            url:"{{route("timkiem")}}",
            method:"POST",
            data:{
            },
            success: function () {
                alert("tim kiem thanh cong...")
            }
        })
    }
</script>
<script>
    function addStWaiting() {
        var _status = $("#waiting").val();
        $.ajax({
            url:"{{url("admin/order/dangcho")}}",
            method:"GET",
            data:{
                status:_status,
            }
        }).done(function (response) {
            $(".bb").empty();
            $(".bb").html(response);
        })
    }
    function addStConfirm() {
        var _status = $("#confirm").val();
        $.ajax({
            url:"{{url("admin/order/daxacnhan")}}",
            method:"GET",
            data:{
                status:_status,
            }
        }).done(function (response) {
            $(".bb").empty();
            $(".bb").html(response);
        })
    }
    function addStShip() {
        var _status = $("#ship").val();
        $.ajax({
            url:"{{url("admin/order/danggiao")}}",
            method:"GET",
            data:{
                status:_status,
            }
        }).done(function (response) {
            $(".bb").empty();
            $(".bb").html(response);
        })
    }
    function addStComplete() {
        var _status = $("#complete").val();
        $.ajax({
            url:"{{url("admin/order/hoanthanh")}}",
            method:"GET",
            data:{
                status:_status,
            }
        }).done(function (response) {
            $(".bb").empty();
            $(".bb").html(response);
        })
    }
    function addStDeleteOrder() {
        var _status = $("#deleteOrder").val();
        $.ajax({
            url:"{{url("admin/order/bihuy")}}",
            method:"GET",
            data:{
                status:_status,
            }
        }).done(function (response) {
            $(".bb").empty();
            $(".bb").html(response);
        })
    }
</script>
<script>
    $wt={{count($waiting)}} ;
    $cf={{count($confirm)}};
    $cp={{count($complete)}};
    $sh={{count($ship)}};
    let listday = $("#container2").attr("data-list-day");
    listday = JSON.parse(listday);
    let data = "{{$dataMoney}}";
    dataChart = JSON.parse(data.replace(/&quot;/g,'"'));
    let listMoneyMoth = $("#container2").attr('data-money');
    listMoneyMoth = JSON.parse(listMoneyMoth);
    let listMoneyMothDefault = $("#container2").attr('data-money-default');
    listMoneyMothDefault = JSON.parse(listMoneyMothDefault);
    Highcharts.chart('container', {
        chart: {type: 'column'},
        title: {text: 'Biểu đồ doanh thu ngày,tháng và năm(VNĐ)'},
        accessibility: {announceNewData: {enabled: true}},
        xAxis: {type: 'category'},yAxis: {title: {text: 'Mức độ'}},
        legend: {enabled: false},
        plotOptions: {series: {borderWidth: 0,dataLabels: {enabled: true,number_format: '{point.y:.1f}VNĐ'}}},
        tooltip: {headerFormat: '<span style="font-size:11px">{series.name}</span><br>',pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.f}VNĐ</b><br/>'},
        series: [{name: "Browsers", colorByPoint: true, data: dataChart,}]
    });
    Highcharts.chart('container2', {
        chart: {type: 'line'},
        title: {text: 'Biểu Đồ Doanh Thu Chi Tiết Hàng Ngày(VNĐ)'},
        subtitle: {text: ''},
        xAxis: {categories: listday},
        yAxis: {title: {text: 'Temperature (°C)'}},
        plotOptions: {line: {dataLabels: {enabled: true}, enableMouseTracking: false}},
        series: [{name: 'Hoàn Tất Giao Dịch', data:listMoneyMoth,}, {name: 'Đơn Hàng Được Xác Nhận', data:listMoneyMothDefault,}]
    });
    Highcharts.chart('container3', {
        chart: {plotBackgroundColor: null, plotBorderWidth: 0, plotShadow: false},
        title: {text: 'Trạng Thái<br>Đơn Hàng', align: 'center', verticalAlign: 'middle', y: 60},
        tooltip: {pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'},
        accessibility: {point: {valueSuffix: '%'}},
        plotOptions: {pie: {dataLabels: {enabled: true, distance: -50, style: {fontWeight: 'bold', color: 'white'}}, startAngle: -90, endAngle: 90, center: ['50%', '75%'], size: '110%'}},
        series: [{type: 'pie',name: 'Browser share', innerSize: '50%', data: [['Đang Chờ', $wt], ['Xác Nhận', $cf], ['Đang Giao', $sh], ['Hoàn Thành', $cp],]}]
    });
</script>

@yield("script")
