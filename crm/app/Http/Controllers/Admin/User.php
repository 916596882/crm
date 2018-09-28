<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class User extends Common
{
    //用户列表
    public function userList(){
        //"openType": 1,
        return view('User/userList');
    }

    //用户添加
    public function userAdd(){
        return view('User/userAdd');
    }


    
}
