<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class Order extends Common
{
    /**
     * 订单列表
     */
    public function orderList(){
        return view('Order/orderList');
    }
}