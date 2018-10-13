<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class Order extends Common
{
    /**
     * 订单列表
     */
    public function orderList(){
        return view('Order/orderList');
    }


    /**
     * 生成订单
     */
    public function createOrder(){
//        Array
//        (
//    [user_id] => 2
//    [product_name] => 保险
//    [cost_amount] => 654
//    [content] => 啊实打实大所多
//    [cost_status] => 1
//    [_token] => BXJbULAIjPLL0mhUouT5bwwZB3xOd71yNKkqsuPk
//)
        $post = Input::post();
        unset($post['_token']);
        try{
            DB::beginTransaction();
            //生成订单号
            $order_no = 1 . time() . rand(1000,9999) . $post['user_id'];

            //添加订单
            $order = [
                'order_no' => $order_no,
                'user_id' => $post['user_id'],
                'order_amount' => $post['cost_amount'],
                'order_status' => 1,
                'order_pay' => 1,
                'order_pay_type' => 1,
                'product_name' => $post['product_name'],
                'ctime' => time(),
            ];

            DB::table('order')->insertGetId($order);

            //删除跟踪订单的数据
            DB::table('tail_order')->where(['user_id' => $post['user_id']])->update(['tail_status' => 4]);
            DB::commit();
            return parent::success('添加成功');
        }catch(\Exception $e){
            DB::rollBack();
            print_r($e);
        }
    }

}