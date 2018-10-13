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
     *执行费用
     */
    public function costListDo()
    {
        $where = [
            'status' => 1
        ];
        $limit = input::get('limit');
        $page = input::get('page');
        $cost_info = DB::table('cost')->where($where)->forPage($page, $limit)->get();
        $cost_info = json_decode(json_encode($cost_info), true);
//        print_r($cost_info);exit;
        foreach ($cost_info as $k => &$v) {
            $v['ctime'] = date('Y-m-d H:i:s', $v['ctime']);
            if($v['cost_status']==1){
                $v['cost_status']='收入';
            }else{
                $v['cost_status']='支出';
            }
        }
        //总条数
        $cost_count=DB::table('cost')->where($where)->count();
//        echo $tail_count;EXIT;

        $arr=[
            'code'=>0,
            'msg'=>'success',
            'count'=>$cost_count,
            'data'=>$cost_info
        ];
        echo json_encode($arr);exit;

    }

    /**
     * 费用添加
     */
    public function addCost()
    {
        if(! request()->ajax() || ! request()->isMethod('post')){
            $user_data = DB::table('user')->get()->toArray();
            return view('Cost/addCost',[
                'user_info' => $user_data
            ]);
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