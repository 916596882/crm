<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class After extends Common
{
    //售后列表
    public function afterList(){
        //订单id
        //用户id
        //管理员id 默认1
        return view('After/afterList');
    }

    //售后列表
    public function afterListDo(){
        $limit = Input::get('limit');
        $page = Input::get('page');
        //订单id
        //用户id
        //管理员id 默认1
        $where = [
            'after_status' => 1
        ];
        $arr = DB::table('after')
            ->join('user','user.user_id','=','after.user_id')
            ->join('product','product.product_id','=','after.product_id')
            ->where($where)
            ->forPage($page,$limit)
            ->get();
        $data = json_decode(json_encode($arr),true);
//        print_r($data);exit;
        foreach($data as $k=>&$v){
            if($v['is_deal']==1){
                $v['status'] = '处理';
            }else{
                $v['status'] = '未处理';
            }
        }
        $count = DB::table('after')->where($where)->count();
        $datas = [
            'code' => 0,
            'msg' => '',
            'count' => $count,
            'data' => $data
        ];
        return $datas;
    }

    //售后添加
    public function afterAdd(){
        //查出所有的客户
        $where = [
            'status' => 1
        ];
        $arr = DB::table('user')->where($where)->get();
        $array = DB::table('product')->get();
        return view('After/afterAdd',['arr'=>$arr,'array'=>$array]);
    }

    public function afterAddDo(){
        $arr = Input::post();
//        print_r($arr);exit;
        unset($arr['_token']);
//        CREATE TABLE `after` (
//        `after_id` int(11) NOT NULL AUTO_INCREMENT,
//  `order_id` int(11) DEFAULT NULL,
//  `after_status` int(11) DEFAULT NULL COMMENT '售后状态【1、质量问题2、态度问题3、个人问题4、物流问题】',
//  `is_deal` int(11) DEFAULT NULL COMMENT '是否处理OK【1、未成功2、已成功】',
//  `ctime` int(11) DEFAULT NULL,
//  `utime` int(11) DEFAULT NULL,
//  `admin_id` int(11) DEFAULT NULL,
//  PRIMARY KEY (`after_id`)
//) ENGINE=InnoDB DEFAULT CHARSET=utf8;
//        print_r($arr);
        $insert = [];
        $insert['order_id'] = 1;
        $insert['after_status'] = 1;
        //1 是展示 2 是不展示
        $insert['is_deal'] = $arr['sign'];
        $insert['text'] = $arr['text'];
        $insert['user_id'] = $arr['user_id'];
        $insert['ctime'] = time();
        $insert['product_id'] = $arr['product'];
        $res = DB::table('after')->insert($insert);
        if($res){
            return json_encode(['status'=>100]);
        }else{
            return json_encode(['status'=>1]);
        }
    }

    //修改
    public function afterUpdate(){
        $data = Input::get();
        $where = [
            'text' => $data['val']
        ];
        $info = (array)DB::table('after')->where('after_id','<>',$data['after_id'])->where($where)->first();
//        print_r($info);exit;
        if(!empty($info)){
            return json_encode(['status'=>1,'msg'=>'此内容已存在，换个试试吧']);
        }
        $saveWhere = [
            'after_id' => $data['after_id']
        ];
        $update = [
            'text' => $data['val']
        ];
        $res = DB::table('after')->where($saveWhere)->update($update);
        if($res>0){
            return json_encode(['status'=>100,'success'=>'成功']);
        }else{
            return json_encode(['status'=>1,'msg'=>'修改失败']);
        }
    }

}
