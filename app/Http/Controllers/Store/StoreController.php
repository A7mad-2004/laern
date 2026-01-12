<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use App\Models\Store;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index(){
        // with عشان برحعلي العلاقة
        // هان مخصص ال customization
        $result = Store::query()
            ->with(['location'=>function(Builder $query)
            {
                $query->whereNotNull('id');
            }
            ])
            ->with(['products' => function (Builder $query)
            {
               $query->limit(10)->orderBy('created_at','DESC');
            }])
            ->get();
//        $result = store::query()->with(['products' ,'location']);
//        dd($result->toArray());
        return view('store.index',compact('result'));
    }

}
