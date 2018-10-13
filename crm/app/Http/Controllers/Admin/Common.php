<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;

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

    /**
     * 删除信息
     */
    public function delete_info(){
        $post = Input::get();
        if(!empty($post['mark'] == 'tail_order')){
            $post['mark'] = 'tail';
            $num = DB::table($post['mark'].'_order')
                ->where([$post['mark'].'_id' => $post['id']])
                ->update([$post['mark'].'_status' => 4]);
        }else{
            $num = DB::table($post['mark'])
                ->where([$post['mark'].'_id' => $post['id']])
                ->update([$post['mark'].'_status' => 4]);
        }

        if($num > 0){
            return $this->success('删除成功');
        }else{
            return $this->error('删除失败');
        }
    }
}
