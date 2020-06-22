<?php

namespace App\Http\Controllers;

use App\Models\Order_detail;
use App\Models\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stwaiting = Orders::where("status",0)->get();
        $stconfirm = Orders::where("status",1)->get();
        $stship = Orders::where("status",2)->get();
        $stconplete = Orders::where("status",3)->get();
        $stdelete = Orders::where("status",4)->get();
        $datas = Orders::paginate(15);
        return view("backend.orders.order",compact("datas","stwaiting","stconfirm","stship","stconplete","stdelete"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function show(Orders $order)
    {
//                dd($order->id);
        $data2 = Orders::findOrFail($order->__get("id"));
        $data2_detail = Order_detail::where("id_order",$order->__get("id"))->get();
//        dd($data_detail->all());
        return view("backend.orders.order_detail",compact("data2","data2_detail"));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function edit(Orders $orders)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Orders  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Orders $order)
    {
        //        dd($request->all());
        $data1 = Orders::findOrFail($order->__get("id"));
//        dd($data);
        $data_detail = Order_detail::where("id_order",$data1->__get("id"))->get();
        $data1->status = $request->status;
        $data1->save();
//        dd($data1->email);

        if ($data1->__get("status")==1) {
            $data = [
                "data_detail"=>$data_detail,
                "data1"=>$data1,
                "order_name" => $data1->get("order_name"),
                "email" => $data1->get("email")
            ];
            $email = [
                "trungpv398@gmail.com",
                $data1["email"],
            ];
            Mail::send("frontend.cart.confirmOder", $data, function ($mess) use ($data, $email) {
                $mess->from("trungpv398@gmail.com");
                $mess->to($email, "frontend.cart.confirmOder")->subject("Quý khách đặt hàng thành công");
            });
        }
        if ($data1->__get("status")==3)
        {
            $data = [
                "data_detail"=>$data_detail,
                "data1"=>$data1,
                "order_name" => $data1->get("order_name"),
                "email" => $data1->get("email")
            ];
            $email = [
                "trungpv398@gmail.com",
                $data1["email"],
            ];
            Mail::send("frontend.cart.completeOder", $data, function ($mess) use ($data, $email) {
                $mess->from("trungpv398@gmail.com");
                $mess->to($email, "frontend.cart.completeOder")->subject("Đơn hàng quý khách đã được hoàn thành.!..");
            });
        }


        return redirect()->back()->with("thong_bao","Cập Nhật Trạng Thái Thành Công..");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function destroy(Orders $orders)
    {
        //
    }

    public function getDangCho(Request $request)
    {
        $datas = Orders::where("status",$request->status)->paginate(15);
        return view("backend.orders.ajax-order",compact("datas"));
    }
    public function getDaXacNhan(Request $request)
    {
        $datas = Orders::where("status",$request->status)->paginate(15);
        return view("backend.orders.ajax-order",compact("datas"));
    }
    public function getDangGiao(Request $request)
    {
        $datas = Orders::where("status",$request->status)->paginate(15);
        return view("backend.orders.ajax-order",compact("datas"));
    }
    public function getHoanThanh(Request $request)
    {
        $datas = Orders::where("status",$request->status)->paginate(15);
        return view("backend.orders.ajax-order",compact("datas"));
    }
    public function getBiHuy(Request $request)
    {
        $datas = Orders::where("status",$request->status)->paginate(15);
        return view("backend.orders.ajax-order",compact("datas"));
    }
}
