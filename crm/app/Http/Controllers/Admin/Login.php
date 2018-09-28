<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class Login extends Common
{
    /**
     * 登陆的视图页面 && 执行登陆
     */
    public function login(){
        if(!request()->ajax() || !request()->isMethod('post')){
            return view('Login.login');
        }else{
            $post = Input::post();
            unset($post['_token']);
            $admin_data = (array)DB::table('admin')->where(['admin_phone' => $post['admin_phone']])->first();
            if(empty($admin_data)){
                return parent::error('账号不存在');
            }
            if($post['admin_psd'] != $admin_data['admin_psd']){
                return parent::error('账号或密码错误');
            }
            session('admin_info',$admin_data);
            return $this->success();
        }
    }


    public function theme(){

    }
}
