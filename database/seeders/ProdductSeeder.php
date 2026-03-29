<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProdductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::query()->insert([
            ['name'=> 'T-shirt','price'=>50,'color'=>'red','brand_id'=>1,'discount'=>11],
            ['name'=> 'T-shirt','price'=>30,'color'=>'blake','brand_id'=>1,'discount'=>11],
            ['name'=> 'Ahmad tee','price'=>35,'color'=>'bleu','brand_id'=>3,'discount'=>11],
            ['name'=> 'Coffee ','price'=>20,'color'=>'bleu','brand_id'=>2,'discount'=>11],
            ['name'=> 'Laptop hp','price'=>500,'color'=>'bleu','brand_id'=>11,'discount'=>100.1],
            ['name'=> 'Laptop Dell G3','price'=>1500,'color'=>'bleu','brand_id'=>12,'discount'=>100.1],

        ]);
    }
}
