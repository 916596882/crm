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
     * 跟踪订单添加
     */
    public function tailAdd()
    {
        return view('Tail/tailAdd');
    }


}