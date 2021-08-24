<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Borrow;

class BorrowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Borrow::create([
            "member_id" => "1",
            "book_id" => "1",
            "borrow_date" => "2021-08-05",
            "return_date" => "2021-08-12",
            "fine" => "0",
            "status" => "0"
        ]       
        );
    }
}
