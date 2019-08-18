<?php

namespace App\Http\Controllers\Task;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\OrderModel;

class TaskController extends Controller
{
    public function order_del(){

        $res = OrderModel::get();
        if($res){
            foreach($res as $k=>$v){
                if((time() - $v->create_time) > 1){
                    $where = [
                        'order_id'  => $v->order_id
                    ];
                    $data = [
                        'is_del'    => 2
                    ];
                    $res = OrderModel::where($where)->update($data);
                }
            }
        }
    }
}
