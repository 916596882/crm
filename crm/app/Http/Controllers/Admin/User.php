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
        $arr = DB::table('shop_area')->where($where)->get();
        $info = json_decode(json_encode($arr),true);
        return view('User/userAdd',['parent'=>$info]);
    }

    //市
    function finds(){
        $val = Input::get('val');
        $where = [
            'area_parent_id' => $val
        ];
        $arr = DB::table('shop_area')->where($where)->get();
        $info = json_decode(json_encode($arr),true);
        return json_encode(['info'=>$info]);
    }



}
