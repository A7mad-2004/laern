<?php

namespace App\Http\Controllers\Location;

use App\Http\Controllers\Controller;
use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function index(){
        $result = Location::query()->with('store')->get();
    return view('Location.index',compact('result'));
    }
    public function test()
    {
        // بذبط كل الfunction على ال DB
        $collection = collect([
            (object)['name'=>'p1','price'=>80,'color'=>'red'],
            (object)['name'=>'p2','price'=>50,'color'=>'red'],
            (object)['name'=>'p3','price'=>10,'color'=>'green'],
        ]);
        $filter=$collection->filter(function ($item) {
            return $item->color == 'red';
        });
        $newitem = $collection->map(function ($item) {
            $item->category = ($item->price > 50)? 'high price':'low price';
            return $item;
        });
        dd($newitem);
    }
}
