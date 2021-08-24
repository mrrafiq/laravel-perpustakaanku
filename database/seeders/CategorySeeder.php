<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            "name" => "Politik"
        ]       
        );
        Category::create([
            "name" => "Hukum"
        ]       
        );
        Category::create([
            "name" => "Gaya Hidup"
        ]       
        );
        Category::create([
            "name" => "Fashion"
        ]       
        );
    }
}
