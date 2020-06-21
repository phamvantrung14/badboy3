

    <table class="table">
        <thead>
        <tr>
            <th>Ảnh</th>
            <th>Tên SP</th>
            <th>Số Lượng</th>
            <th>Giá Bán</th>
        </tr>
        </thead>
        <tbody>
        @foreach($orderby as $value)

            <tr>
            <td><img src="{{asset($value->Product->getImage())}}" width="100px" alt=""></td>
            <td>{{$value->Product->product_name}}</td>
            <td>{{$value->quantity}}</td>
            <td>{{$value->getPrice()}}</td>
        </tr>

        @endforeach

        </tbody>
    </table>

