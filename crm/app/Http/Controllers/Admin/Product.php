<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class Product extends Common
{
    /**
     * 产品列表
     */
    public function productList(){
        if(! request()->ajax()){
            return view('Product.productList');
        }else{
            $limit = Input::get('limit');
            $page = Input::get('page');
            $product_data = DB::table('product')->where('product_status','<>',4)->forPage($page,$limit)->get()->toArray();
            $product_data = json_decode(json_encode($product_data),true);
            foreach($product_data as $k => &$v){
                $v['ctime'] = date('Y-m-d H:i:s',$v['ctime']);
            }
            return [
                'code' => 0,
                'msg' => '',
                'count' => 1000,
                'data' => $product_data
            ];
        }
    }

    /**
     *产品添加
     */
    public function productAdd(){
        if(! request()->ajax() || ! request()->isMethod('post')){
            return view('Product.productAdd');
        }else{
            $post = Input::post();
            unset($post['_token']);
            $post['ctime'] = time();
            $num = DB::table('product')->insertGetId($post);
            if($num > 0){
                return parent::success('添加成功');
            }else{
                return parent::error('添加失败');
            }
        }
    }

    /**
     * 产品修改
     */
    public function productSave(){
        $get = Input::get();
        //查询要修改的产品名是否已经存在
        $pro_info = DB::table('product')
            ->where([$get['field'] => $get['value']])
            ->first();
        if(!empty($pro_info)){
            return parent::error('产名品不能重复');
        }
        //执行修改
        $num = DB::table('product')
            ->where(['product_id' => $get['product_id']])
            ->update([$get['field'] => $get['value']]);
        if($num > 0){
            return parent::success('修改成功');
        }else{
            return parent::error('修改失败');
        }
    }
}
