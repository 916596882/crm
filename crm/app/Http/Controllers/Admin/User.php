<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class User extends Common
{
    //用户列表
    public function userList(){
        //"openType": 1,
        return view('User/userList');
    }

    //用户添加
    public function userAdd(){
        $where = [
            'area_parent_id' => 0
        ];
        //省
        $arr = DB::table('shop_area')->where($where)->get();
        $info = json_decode(json_encode($arr),true);
        //产品
        $where = [
            'product_status' => 1
        ];
        $data = DB::table('product')->where($where)->get();
        $data = json_decode(json_encode($data),true);
        return view('User/userAdd',['parent'=>$info,'product'=>$data]);
    }

    //三级联动
    function finds(){
        $val = Input::get('val');
        $where = [
            'area_parent_id' => $val
        ];
        $arr = DB::table('shop_area')->where($where)->get();
        $info = json_decode(json_encode($arr),true);
        return json_encode(['info'=>$info]);
    }

    //用户添加
    function insert(){
        $data = Input::post();
        unset($data['_token']);
        $insert = [];
        $insert['user_name'] = $data['username'];
        $insert['user_phone'] = $data['usertel'];
        $insert['user_province'] = $data['province'];
        $insert['user_city'] = $data['city'];
        $insert['user_area'] = $data['area'];
        $insert['address'] = $data['text'];
        $insert['ctime'] = time();
        $insert['status'] = 1;
        $insert['position_name'] = $data['position'];
        $insert['product_id'] = $data['product'];
        $res = DB::table('user')->insert($insert);
        if($res){
            return json_encode(['status'=> 100]);
        }
    }

    //用户列表
    public function userLists(){
        $limit = Input::get('limit');
        $page = Input::get('page');
//            {
//                "code": 0,
//                "msg": "",
//                "count": 1000,
//                "data": [{}, {}]
//            }
        $userWhere = [
            'status' => 1
        ];

        $arr = DB::table('user')
            ->join('product','product.product_id','=','user.product_id')
            ->where($userWhere)
            ->forPage($page,$limit)
            ->get();
        //商品和用户信息
        $arr = json_decode(json_encode($arr),true);
//        print_r($arr);exit;
        $new = [];
        foreach($arr as $k=>$v){
            $new[] = $v['user_province'];
            $new[] = $v['user_city'];
            $new[] = $v['user_area'];
        }
        $area = DB::table('shop_area')->whereIn('id',$new)->get();
        $area = json_decode(json_encode($area),true);
        $array = [];
        foreach($area as $k=>$v){
            $array[$v['id']] = $v['area_name'];
        }
        foreach($arr as $k=>$v){
//            if($v['user_province']==$array[$k]){
//                $arr[$k]['province'] = $array[$v];
//            }
//            if($v['user_city']==$array[$k]){
//                $arr[$k]['city'] = $array[$v];
//            }
//            if($v['user_area']==$array[$k]){
//                $arr[$k]['area'] = $array[$v];
//            }
            $arr[$k]['user_province'] = $array[$v['user_province']];
            $arr[$k]['user_city'] = $array[$v['user_city']];
            $arr[$k]['user_area'] = $array[$v['user_area']];
        }
        $count = DB::table('user')->where($userWhere)->count();
        $data = [
            'code' => 0,
            'msg' => '',
            'count' => $count,
            'data' => $arr
        ];
        return $data;
    }

    //修改用户
    function userUpdate(){
        $data = Input::get();
        $where = [
            'user_name' => $data['val']
        ];
        $info = (array)DB::table('user')->where('user_id','<>',$data['user_id'])->where($where)->first();
//        print_r($info);exit;
        if(!empty($info)){
            return json_encode(['status'=>1,'msg'=>'此名字已存在，换个试试吧']);
        }
//        echo $data['user_id'];exit;
        $saveWhere = [
            'user_id' => $data['user_id']
        ];
        $update = [
            'user_name' => $data['val']
        ];
        $res = DB::table('user')->where($saveWhere)->update($update);
        if($res>0){
            return json_encode(['status'=>100,'success'=>'成功']);
        }else{
            return json_encode(['status'=>1,'msg'=>'修改失败']);
        }
    }

}
