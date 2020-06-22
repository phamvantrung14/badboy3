<?php

namespace App\Providers;
use App\HelperClass\Date;
use App\Models\Orders;
use App\Models\Type_products;

use App\Helper\CartHelper;
use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*',function ($view){
            $dt = Carbon::now('Asia/Ho_Chi_Minh');
            $type_pd = Type_products::all();
            //status order
            $waiting = Orders::where("status",0)->whereMonth("updated_at",date('m'))->get();
            $confirm = Orders::where("status",1)->whereMonth("updated_at",date('m'))->get();
            $ship = Orders::where("status",2)->whereMonth("updated_at",date('m'))->get();
            $complete = Orders::where("status",3)->whereMonth("updated_at",date('m'))->get();

            //end status orders
            $moneyDay = Orders::whereDay("updated_at",date('d'))->where("status",3)->sum('total_price');
            $moneyMonth = Orders::whereMonth("updated_at",date('m'))->where("status",3)->sum('total_price');
            $moneyYear = Orders::whereYear("updated_at",date('Y'))->where("status",3)->sum('total_price');
            $month = $dt->month;
            $day1 = $dt->day;
            $year = $dt->year;
            $dataMoney = [
                [
                    "name"=>"Doanh Thu Ngày ".$day1."(hôm nay)",
                    "y"=>(int)$moneyDay
                ],
                [
                    "name"=>"Doanh Thu Tháng ".$month,
                    "y"=>(int)$moneyMonth
                ],
                [
                    "name"=>"Doanh Thu Năm ".$year,
                    "y"=>(int)$moneyYear
                ]

            ];

//            dd($month);
            //doanh thu theo thang
            $revenueOdersMonth = Orders::where("status",3)->whereMonth("updated_at",date('m'))
                ->select(\DB::raw('sum(total_price) as totalMoney'),\DB::raw('DATE(updated_at) day'))->groupBy('day')
            ->get()->toArray();

            //doanh thu theo trang thái xác nhận đơn hàng
            $revenueOdersMonthDefault = Orders::where("status",1)->whereMonth("updated_at",date('m'))
                ->select(\DB::raw('sum(total_price) as totalMoney'),\DB::raw('DATE(updated_at) day'))->groupBy('day')
                ->get()->toArray();
            $listDay = Date::getListDayInMonth();
           $arrOrders = [];
           $arrOrdersDefault = [];
            foreach ($listDay as $day)
            {
                $total =0;
                foreach ($revenueOdersMonth as $key =>$revenue)
                {
                    if ($revenue['day'] == $day){
                        $total = $revenue['totalMoney'];
                        break;
                    }
                }
                $arrOrders[]=(int)$total;
                $total = 0;
                foreach ($revenueOdersMonthDefault as $key =>$revenue)
                {
                    if ($revenue['day'] == $day){
                        $total = $revenue['totalMoney'];
                        break;
                    }
                }
                $arrOrdersDefault[]=(int)$total;

            }
//            dd($arrOrders);
            $view->with([
               "type_pd"            =>$type_pd,
                "cart"              => new CartHelper(),
                'dataMoney'         =>json_encode($dataMoney),
                'listDay'           =>json_encode($listDay),
                'arrOrders'         =>json_encode($arrOrders),
                'arrOrdersDefault'  =>json_encode($arrOrdersDefault),
                'month'             =>$month,
                'waiting'           =>$waiting,
                'confirm'           =>$confirm,
                'ship'              =>$ship,
                'complete'          =>$complete,
                'day1'               =>$day1,
                'year'              =>$year
            ]);
        });


    }
}
