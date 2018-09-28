<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Product extends Common
{
    /**
     * 产品列表
     */
    public function productList(){
        return view('Product.productList');
    }

    /**
     *产品添加
     */
    public function productAdd(){
        return view('Product.productAdd');
    }
}
