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
        if(! request()->ajax()){
            return view('Order/orderList');
        }else{
            $limit = Input::get('limit');
            $page = Input::get('page');
            $order_data = DB::table('order')->where('order_status','<>',4)->forPage($page,$limit)->get()->toArray();
            $order_data = json_decode(json_encode($order_data),true);
            foreach($order_data as $k => &$v){
                $obj = DB::table('user')->where(['user_id' => $v['user_id']])->select('user_name')->first();
                $v['user_id'] = $obj->user_name;
                $v['ctime'] = date('Y-m-d H:i:s',$v['ctime']);
            }
            return [
                'code' => 0,
                'msg' => '',
                'count' => 1000,
                'data' => $order_data
            ];
        }
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