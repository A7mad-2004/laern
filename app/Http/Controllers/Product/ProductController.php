<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index(){
        $search = request()->query('name',null);
        $result=Product::query()->with(['brand','stores'])
            ->when($search,function( Builder $query) use($search){
                $query->where('name','like','%'.$search.'%');
            })
            ->paginate(5);

//        dd($result);
        return view('Product.index')->with(compact('result'));



    }
    public function create(){

        $brands = Brand::query()->select('id','name')->get();
        return view('Product.create',compact('brands'));
    }
    public function store(Request $request){
        $name = $request->input('name');
        $price = $request->input('price');
        $discount = $request->input('discount');
        $color = $request->input('color');
        $brand_id = $request->input('brand');
        $image = $request->file('product-image');
        $fileName = Str::random(10).'.'.$image->getClientOriginalExtension();
        $fileBath = "products/$fileName";
        $product = Product::query()->create([

            'name' => $name,
            'price' => $price,
            'discount' => $discount,
            'color' => $color,
            'brand_id' => $brand_id,
            'image'=> $fileBath


        ]);
        Storage::disk('upload')->put($fileBath, file_get_contents($image));

        return redirect()->back( );
    }
    public function edit($id)
    {
        $product=Product::query()->find($id);
        $brands = Brand::query()->select('id','name')->get();
        return view('Product.edit')->with(compact('product','brands'));
    }
    public function update(Request $request, $id)
    {
        $name=$request->input('name');
        $price=$request->input('price');
        $discount=$request->input('discount');
        $brand_id=$request->input('brand');
        $color=$request->input('color');
        $image = $request->file('product-image');
        $fileName = Str::random(10).'.'.$image->getClientOriginalExtension();
        $fileBath = "products/$fileName";

        Product::query()->find($id)->update([
            'name'=>$name,
            'price'=>$price,
            'discount'=>$discount,
            'brand_id'=>$brand_id,
            'color'=>$color,
            'image'=>$fileBath

        ]);
        Storage::disk('upload')->put($fileBath, file_get_contents($image));
        return redirect()->route('products.index');
    }
}
