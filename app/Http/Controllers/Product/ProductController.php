<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $result=Product::query()->with(['brand','stores'])->get();

//        dd($result);
        return view('Product.index')->with(compact('result'));


    }
}
