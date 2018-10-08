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
            $product_data = DB::table('product')->forPage($page,$limit)->get()->toArray();
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
}
