<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Book::create([
            "category_id" => "1",
            "title" => "Kelinci dan Kura-kura",
            "author_id" => "1",
            "publisher_id" => "1",
            "year" => "2006",
            "stock" => "50",
            
        ]       
        );
    }
}
