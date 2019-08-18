<?php

namespace App\Http\Controllers\Goods;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\GoodsModel;

class GoodsController extends Controller
{
    public function goods(){
        $where = [
            'is_del'  => 1
        ];
        $goods = GoodsModel::where($where)->get();
        $data = [
            'goods' => $goods
        ];
        return view("goods.goods",$data);
    }
    public function detail(Request $request){
        $id = $request->input("id");
        $where = [
            'goods_id'  => $id
        ];
        $goods = GoodsModel::where($where)->first();
        $data = [
            'goods' => $goods
        ];
        return view("goods.detail",$data);
    }
}
