<?php

namespace App\Http\Controllers\Car;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Model\CarModel;
use App\Model\GoodsModel;

use Cookie;
// use Illuminate\Support\Facades\Cookie;
class CarController extends Controller
{
    // 添加购物车
    public function create(Request $request){
        $goods_id = $request->input("id");
        $price = $request->input("price");
        $user_id = Auth::id();
        if(Auth::check()){
            $this->mysql($goods_id,$user_id,$price);
        }else{
            $this->cookie($goods_id,$user_id,$price);
        }
    }
    // 购物车信息存入cookie
    public function cookie($goods_id,$user_id,$price){
        $key = "goods";
        // if(Cookie::get($key)){

        // }else{

        // }
        $data = [
            'goods_id'  => $goods_id,
            'user_id'   => $user_id,
            'add_price' =>$price,
            'buy_number'=> 1,
            'create_time'=>time()
        ];
        Cookie::queue($key,json_encode($data),1);
    }
    // 购物车信息存入数据库
    public function mysql($goods_id,$user_id,$price){
        $where = [
            'goods_id'  => $goods_id,
            'user_id'   => $user_id
        ];
        $car = CarModel::where($where)->first();
        if($car){
            $data = [
                'buy_number'    => $car->buy_number+1,
                'update_time'   => time()
            ];
            CarModel::where($where)->update($data);
        }else{
            $data = [
                'goods_id'  => $goods_id,
                'user_id'   => $user_id,
                'add_price' =>$price,
                'buy_number'=> 1,
                'create_time'=>time()
            ];
            CarModel::insertGetid($data);
        }
    }
    // 购物车展示
    public function car(){
        $where = [
            'user_id'   => Auth::id()
        ];
        $car = CarModel::where($where)->get()->toArray();
        $car_list = [];
        if($car){
            $price = 0;
            foreach($car as $k=>$v){
                $car_where = [
                    'goods_id'  => $v['goods_id']
                ];
                $car_t = GoodsModel::where($car_where)->first()->toArray();
                $price += $car_t['goods_selfprice'] * $v['buy_number'];
                $car_list[] = $car_t;
                $car_list[$k]['buy_number'] = $v['buy_number'];
            }
        }
        // echo "<pre>";print_r($car_list);echo "</pre>";die;
        $data = [
            'car_list'  => $car_list,
            'price'     => $price
        ];
        return view("car.car",$data);
    }
    // 删除购物车
    public function delete(Request $request){
        $goods_id = $request->input("id");
        $user_id=Auth::id();
        $where = [
            'goods_id'  => $goods_id,
            'user_id'   => $user_id
        ];
        $res = CarModel::where($where)->delete();
        if($res){
            echo "删除购物车商品成功";
        }else{
            echo "删除购物车商品失败";
        }
    }
}
