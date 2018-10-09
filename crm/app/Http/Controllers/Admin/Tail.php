<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class Tail extends Common
{
    /**
     * 跟踪订单
     */
    public function tailList()
    {
        return view('Tail/tailList');
    }


    /**
     * 执行跟踪订单
     */
    public function tailListDo(){
        $where=[
            'status'=>1
        ];
        $tail_info= DB::table('tail_order')->where($where)->get();
        $tail_info=json_decode(json_encode($tail_info),true);
//        print_r($tail_info);exit;
        foreach($tail_info as $k=>&$v){
            $v['utime']=date('Y-m-d H:i:s',$v['utime']);
            if($v['tail_status']==1){
                $v['tail_status']='潜在客户';
            }elseif($v['tail_status']==2){
                $v['tail_status']='准备下单';
            }else{
                $v['tail_status']='犹豫客户';
            }

            if($v['tail_pay']==1){
                $v['tail_pay']='电话';
            }else{
                $v['tail_pay']='微信';
            }

        }
        //总条数
        $tail_count=DB::table('tail_order')->where($where)->count();
//        echo $tail_count;EXIT;

        $arr=[
            'code'=>0,
            'msg'=>'success',
            'count'=>$tail_count,
            'data'=>$tail_info
        ];
        echo json_encode($arr);exit;
    }


    /**
     * 跟踪订单添加
     */
    public function tailAdd()
    {

//        $where=[
//            'status'=>1
//        ];
//        $tail_info= DB::table('tail_order')->where($where)->get();
//        $tail_info=json_decode(json_encode($tail_info),true);
////        print_r($tail_info);exit;
//        foreach($tail_info as $k=>&$v){
//            $v['utime']=date('Y-m-d H:i:s',$v['utime']);
//        }
        return view('Tail/tailAdd');
    }


}