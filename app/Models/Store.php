<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Store extends Model
{
    use HasFactory;
    use SoftDeletes;

     // هاد هي العلاقة بينهم داخل الfunction بيربط بين الجدولين من خلال الديفولت name
    // يعني هان شان في ال location column اسمو store_id لازم بالمفرد ف راح ع الجدول ال stores وجاب الid تبعو حطو بالforaign key وصار عملية ربط
    public  function location(){
        // هيك بعمل انو اقلو هي هدول ال keys الي تستخدمهم
        return $this->hasOne(Location::class/*,'store_id','id'*/);
    }
    public function StoreProducts()
    {
         return $this->hasMany(StoreProduct::class);
    }
}
