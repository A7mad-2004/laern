<?php

namespace App\Http\Controllers\Brand;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
       $result=Brand::query()->with('products')->get();
//       dd($result);
        return view('Brand.index')->with(compact('result'));
    }
}
