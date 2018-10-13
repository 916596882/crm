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
            'tail_order.tail_status'=>1
        ];
        $limit=input::get('limit');
        $page=input::get('page');

        $tail_info = DB::table('tail_order')
            ->join('user','user.user_id','=','tail_order.user_id')
            ->where($where)
            ->forPage($page,$limit)
            ->get();

//        $tail_info= DB::table('tail_order')->where($where)->forPage($page,$limit)->get();
        $tail_info=json_decode(json_encode($tail_info),true);
//        print_r($tail_info);exit;
        foreach($tail_info as $k=>&$v){
            $v['utime']=date('Y-m-d H:i:s',$v['utime']);
            if($v['status']==1){
                $v['status']='潜在客户';
            }elseif($v['tail_status']==2){
                $v['status']='准备下单';
            }else{
                $v['status']='犹豫客户';
            }

            if($v['tail_pay']==1){
                $v['tail_pay']='电话';
            }else{
                $v['tail_pay']='微信';
            }

        }
        //总条数

        $tail_count=DB::table('tail_order')->where(['tail_status'=>1])->count();
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
            $where=[
                'status'=>1
            ];
            $user_info= DB::table('user')->where($where)->get();
            $user_info=json_decode(json_encode($user_info),true);
//            print_r($user_info);
            return view('Tail.tailAdd',['user_info'=>$user_info]);
        }else{
            $info=input::post();
//            print_r($info);exit;
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


    /**
     * 即点即改
     */
    public function tailSave(){
        $new_info=input::get();
//        print_r($new_info);exit;
        $where=[
            'tail_id'=>$new_info['id']
        ];
        $save=[
            'contents'=>$new_info['order']
        ];
       $res= DB::table('tail_order')->where($where)->update($save);
        if($res > 0){
            return parent::success('修改成功');
        }else{
            return parent::error('修改失败');
        }
    }



}