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
        if(! request()->ajax() || ! request()->isMethod('post')){
            return view('Cost/addCost');
        }else{
            $info=input::post();
            unset($info['_token']);
            $info['ctime']=time();
            $info['status']=1;

            $res=DB::table('cost')->insert($info);
            if($res > 0){
                return parent::success('添加成功');
            }else{
                return parent::error('添加失败');
            }
        }

    }

}