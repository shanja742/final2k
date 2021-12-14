<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class BrandSeeder extends Seeder
{

    public function run()
    {
        $brand = Category::create([
            'name' => 'Saree',
        ]);

        $brand = Category::create([
            'name' => 'Salwar',
        ]);

        $brand = Category::create([
            'name' => 'Top',
        ]);

        $brand = Category::create([
            'name' => 'Skirt',
        ]);

        $brand = Category::create([
            'name' => 'Blouse',
        ]);

        $brand = Category::create([
            'name' => 'Frock',
        ]);
    }
}
