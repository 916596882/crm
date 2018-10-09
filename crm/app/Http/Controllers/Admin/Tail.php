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
        $limit=input::get('limit');
        $page=input::get('page');
        $tail_info= DB::table('tail_order')->where($where)->forPage($page,$limit)->get();
        $tail_info=json_decode(json_encode($tail_info),true);
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
        if(! request()->ajax() || ! request()->isMethod('post')){
            return view('Tail.tailAdd');
        }else{
            $info=input::post();
            $info['utime']=strtotime($info['utime']);
            unset($info['_token']);
            session('admin_info');

            $info['ctime']=time();
//            print_r($info);exit;
            $res=DB::table('tail_order')->insert($info);
                if($res > 0){
                    return parent::success('添加成功');
                }else{
                    return parent::error('添加失败');
                }
            }
        }




}