<table class="table table-striped">
    <thead class="text-center">
    <tr>
        <th>STT</th>
        <th>Email</th>
        <th>Địa Chỉ</th>
        <th>SĐT</th>
        <th>Trạng Thái</th>
        <th>Ngày Tạo</th>
        <th>Tác vụ</th>
    </tr>
    </thead>
    <tbody>
    @foreach($datas as $value)
        <tr >
            <th scope="row">{{$loop->index+1}}</th>
            <td>{{$value->__get('email')}}<br>
                ({{$value->getTotalPrice()}})
            </td>
            <td>
                {{$value->__get("address")}}
            </td>
            <td>{{$value->__get("phone_number")}}</td>
            <td><p class="label bg-blue">{{$value->getStatus()}}</p></td>
            <td>{{$value->__get('created_at')}}</td>
            <td>
                <a href="{{route("orders.show",["order"=>$value->__get("id")])}}" class="label bg-green">Chi tiết</a>
            </td>
            {{--                                <td>--}}
            {{--                                <form action="{{route("orders.show",["order"=>$value->__get("id")])}}" method="GET">--}}
            {{--                                    @csrf--}}
            {{--                                    @method("GET")--}}
            {{--                                    <button type="submit" class="label bg-blue">Chi Tiết</button>--}}
            {{--                                </form>--}}
            {{--                                </td>--}}
        </tr>
    @endforeach
    </tbody>
</table>
{!! $datas->render('vendor.pagination.pgiadmin') !!}
