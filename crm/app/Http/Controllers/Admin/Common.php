<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Common extends Controller
{
    /**
     * 成功时返回ajax信息
     * @param $msg
     * @param $data
     * @return \think\response\Json
     */
    public function success($msg='ok',$data=''){
        return [
            'status' => 1000,
            'msg' => $msg,
            'data' => $data
        ];
    }

    /**
     * 失败时返回ajax信息
     * @param $msg
     * @return \think\response\Json
     */
    public function error($msg){
        return [
            'status' => 0,
            'msg' => $msg
        ];
    }
}
