<?php

namespace Database\Seeders;

use App\Models\Store;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // في ال insert لازم اضيف كل الحقل حتى لو انا عامل الهم defoult
        Store::query()->insert([
            ['name'=> 'Store Ak' ,'phone'=>'059999999','is_delivery'=>false],
            ['name'=> 'one Store' ,'phone'=>'059888888','is_delivery'=>true],
            ['name'=> 'H&M Store' ,'phone'=>'059777777','is_delivery'=>true]

        ]);
        // dame data
//        Store::factory()->count(20)->create();
    }
}
