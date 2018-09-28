<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Admin extends Common
{
    /**
     * 管理员列表
     */
    public function adminList(){
        return view('Admin.adminlist');
    }

    /**
     * 管理员添加
     */
    public function adminAdd(){
        return view('Admin.adminAdd');
    }
}
