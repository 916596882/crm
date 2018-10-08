<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class After extends Common
{
    //售后列表
    public function afterList(){
        //订单id
        //用户id
        //管理员id 默认1
        return view('After/afterList');
    }

    //售后添加
    public function afterAdd(){
        return view('After/afterAdd');
    }
}
