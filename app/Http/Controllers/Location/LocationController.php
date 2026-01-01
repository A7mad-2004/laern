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
}
