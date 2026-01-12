<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use App\Models\Store;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index(){
        // with عشان برحعلي العلاقة
        // هان مخصص ال customization
//        $result = Store::query()
//            ->with(['location'=>function(Builder $query)
//            {
//                $query->whereNotNull('id');
//            }
//            ])
//            ->with(['products' => function (Builder $query)
//            {
//               $query->limit(10)->orderBy('created_at','DESC');
//            }])
//            ->get();
        $result = Store::query()
            // هان الcondition على ال store نفسو باستخدام whereHas
            ->with('products')
//            ->whereHas('location', function ( Builder $query) {
//                $query->whereNotNull('id');
//            })
            ->get();
//        $result = store::query()->with(['products' ,'location']);
//        dd($result->toArray());
//        dd($result);
        return view('store.index',compact('result'));
    }
    public function edit($id)
    {
        $result = Store::query()->where('id','=',$id)->with('location')->first();
        ;

//        dd($result);
//        dd('HIT EDIT', $id);
        return view('store.edit', compact('result'));

    }
    public function update(Request $request, $id)
    {
//        dd($request->input('is_delivery'));
        $name = $request->input('name');
        $phone = $request->input('phone');
        $isDelivery = $request->input('is_delivery') ? true : false;

        Store::query()->find($id)->update([
            'name' => $name,
            'phone' => $phone,
            'is_delivery' => $isDelivery
        ]);
        return redirect()->route('stores.index');

    }

}
