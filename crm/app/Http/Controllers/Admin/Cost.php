<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class Cost extends Common
{
    /**
     * 费用列表
     */
    public function costList()
    {
        return view('Cost/costList');
    }

    /**
     * 费用添加
     */
    public function addCost()
    {
        return view('Cost/addCost');
    }

}