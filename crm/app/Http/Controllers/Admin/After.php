<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class After extends Common
{
    //售后列表
    public function afterList(){
        return view('After/afterList');
    }

    //售后添加
    public function afterAdd(){
        return view('After/afterAdd');
    }
}
