<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <link rel="stylesheet" href="">
</head>
<body>
<h1>Đơn hàng quý khách đã được xác nhận và đang được chuyển đến bộ phận giao hàng</h1>

@foreach($data_detail as $cat)
    <p>Tên sản phẩm: {{$cat->Product->product_name}} </p>
    <p>Số lượng: {{$cat->quantity}} </p>
    <p>Đơn giá: {{$cat->getPrice()}} VNĐ</p>
@endforeach
<h3>Tổng tiền : {{number_format($data1->total_price)}} VNĐ </h3>
</body>
</html>
