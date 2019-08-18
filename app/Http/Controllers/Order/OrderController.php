<?php

namespace App\Http\Controllers\Order;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\CarModel;
use App\Model\OrderModel;
use App\Model\OrderDetailModel;

use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{

    // 生成订单
    public function create(Request $request){
        // 总价
        $order_amount = $request->input('price');
        $where = [
            'user_id'=>Auth::id()
        ];
        $goods = CarModel::where($where)->get()->toArray();
        // echo "<pre>";print_r($goods);echo "</pre>";die;
        $order_number = '1809abin'.time().Auth::id();
        $order_info = [
            'user_id'        => Auth::id(),
            'order_number'   => $order_number,     //订单编号
            'order_amount'   => $order_amount,
            'create_time'    => time(),
        ];
        //订单添加入库
        $order_id = OrderModel::insertGetId($order_info);
//        print_r($order_id);die;

        //订单详情表
        foreach ($goods as $k=>$v)
        {
            $detail = [
                'order_id'          => $order_id,
                'goods_id'          => $v['goods_id'],
                'buy_number'        => $v['buy_number'],
                'user_id'           => Auth::id()
            ];
            //订单详情表添加入库
            OrderDetailModel::insertGetId($detail);
        }
        echo '生成订单成功';
    }
    // 订单页面
    public function order(){
        $order = OrderModel::where('is_del',1)->get();
        $data = [
            'order' => $order
        ];  
        return view("order.order",$data);
    }
}
