<?php

namespace Database\Factories;

use App\Models\Brand;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Brand>
 */
class BrandFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    // ربط ال factory في ال table
      protected $model = Brand::class;
    public function definition(): array
    {
        return [
            //لازم اضيف ال factory باستخدام
            // php artisan make:factory name of model
            //طريقة اضافة عشوائية
            // كل منغير ب متغير
            'name'=> fake()->name,
            'country'=> Str::random(3)
        ];
    }
}
