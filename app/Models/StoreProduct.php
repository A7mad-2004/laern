<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StoreProduct extends Model
{
    use HasFactory;
    use SoftDeletes;
    public function Store()
    {
        return $this->belongsTo(Store::class);
    }
    public function Product()
    {
        return $this->belongsTo(Product::class);
    }
}

