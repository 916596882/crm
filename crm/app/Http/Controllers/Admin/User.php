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
        $insert['position_name'] = $data['position'];
        $insert['product_id'] = $data['product'];
        $res = DB::table('user')->insert($insert);
        if($res){
            return json_encode(['status'=> 100]);
        }
    }



}
