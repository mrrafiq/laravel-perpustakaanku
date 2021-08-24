<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            "name" => "John Withney",
            "username" => "JohnWithney15",
            "password" => bcrypt('12345')
        ]       
        );

        User::create([
                "name" => "Rafiq Mulia Putra",
                "username" => "rafiqrafiq",
                "password" => bcrypt('12345')
        ]);
    }
}
