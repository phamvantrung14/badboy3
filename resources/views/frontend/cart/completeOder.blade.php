<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <link rel="stylesheet" href="">
</head>
<body>

       <p>Xin chào {{$data1->order_name}},</p>
       <p>Đơn hàng  của bạn đã được giao thành công ngày {{$data1->updated_at}}.
        Trong trường hợp sản phẩm nhận được bị bể/vỡ, bạn vui lòng gửi yêu cầu trả hàng/hoàn tiền kèm với hình ảnh chứng minh trong vòng 24 giờ kể từ khi nhận được hàng.
    </p>
    <hr>
    <h4>Thông Tin Đơn Hàng - Dành Cho Người Mua</h4>
    <h5>Ngày Đặt Hàng: {{$data1->created_at}}</h5>
        @foreach($data_detail as $value)
            <p>{{$loop->index+1}}.Sản Phẩm: {{$value->Product->product_name}}</p>
            <p>Mã SP: {{$value->Product->ma_sp}}</p>
            <p>Số Lượng: {{$value->quantity}}</p>
            <p>Giá: {{$value->getPrice()}}</p>
            <p>------------------------------------------------------------------------</p>
        @endforeach
        <h5>Tổng tiền : {{number_format($data1->total_price)}} VNĐ </h5>

</body>
</html>
