<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use App\Models\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index(){
        // with عشان برحعلي العلاقة
        $result = Store::query()->with(['location','Products'])->get();
//        $result = store::query()->with(['products' ,'location']);
//        dd($result->toArray());
        return view('store.index',compact('result'));
    }

}
