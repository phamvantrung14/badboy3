
@foreach($order as $value)
    <div class="body mt-4">
    <div class="col-md-12 content-order">
        <div class="header">
            <div class="row">
                <h4>
                    Đơn Hàng Ngày: (<span>{{$value->updated_at}}</span>)
                </h4>
                <p class="status-h">{{$value->getStatus()}}</p>
            </div>
        </div>
        <div class="content">
            <table>
                <tr>
                    <td style="padding-right: 10px">Người Nhận:</td>
                    <td>  {{$value->order_name}}</td>
                </tr>
                <tr>
                    <td>Tổng Tiền:</td>
                    <td>{{$value->getTotalPrice()}}</td>
                </tr>
            </table>
            <button type="submit" class="btn-1 btn-ct mt-2" onclick="modalOrder({{$value->id}});"  data-toggle="modal" data-target="#myModal">Chi tiết</button>
{{--           @if($value->status==0 || $value->status==1)--}}

{{--                <form action="{{url("customer/huydon/{$value->id}")}}" method="POST">--}}
{{--                    @csrf--}}
{{--                    @method("POST")--}}
{{--                    <input type="hidden" name="status" value="4" id="sthuydon">--}}
{{--                    <button type="submit" class="btn-1 btn-ct mt-2">Hủy</button>--}}
{{--                </form>--}}
{{--        @endif--}}
            @if($value->status==0 || $value->status==1)
                <input type="hidden" name="status" value="4" id="sthuydon">
                <input type="hidden" class="" id="token" name="_token" value="{{csrf_token()}}">
                <button type="submit" class="btn-1 btn-ct mt-2" onclick="clickHuyDon({{$value->id}});"  >Hủy</button>
        @endif
                <!-- Modal -->
            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog" style="max-width: 650px!important;">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header" style="border-bottom: none !important;">
{{--                            <button type="button" class="close" data-dismiss="modal">&times;</button>--}}
                            <h4 class="modal-title">Chi Tiết Đơn Hàng:</h4>
                        </div>
                        <div class="modal-body">

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
@endforeach
