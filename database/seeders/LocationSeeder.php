<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Location::query()->insert([
            ['address'=>'Gaza st 8','store_id'=>1],
            ['address'=>'rafah st 1','store_id'=>2],
        ]);
    }
}
