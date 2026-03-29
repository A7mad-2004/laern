<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [

        'name',
        'discount',
        'price',
        'color',
        'brand_id',
        'image',

    ];

    protected $appends = ['price_after_dis','image_url'];
    public function getImageUrlAttribute()
    {
       return Storage::disk('upload')->url($this->image);
    }
    public  function brand()
    {
        return $this->belongsTo(Brand::class);
    }
    public  function getPriceAfterDisAttribute()
    {
        $price_after_dic = $this->price -$this->discount;
       return $price_after_dic;

    }
    public function StoreProducts()
    {
     return $this->hasMany(StoreProduct::class);
    }
    public function stores()
    {
        return $this->belongsToMany(Store::class,'store_products','product_id','store_id');
    }

}
