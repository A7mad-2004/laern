<?php

namespace Database\Seeders;

use App\Models\StoreProduct;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StoreProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        StoreProduct::query()->insert([
           ['store_id'=>1,'product_id'=>1],
            ['store_id'=>1,'product_id'=>2],
            ['store_id'=>2,'product_id'=>3],
            ['store_id'=>2,'product_id'=>4],
            ['store_id'=>3,'product_id'=>5],
            ['store_id'=>3,'product_id'=>6],

        ]);
    }
}
