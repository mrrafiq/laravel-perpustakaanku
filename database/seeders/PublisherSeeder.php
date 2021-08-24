<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Publisher;

class PublisherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Publisher::create([
            "name" => "Gramedia",
            "address" => "a[sd,poasmdpasdoask",
            "email" => "nonfiksi@gramediapublishers.com"
        ]       
        );
        Publisher::create([
            "name" => "Elex Media Komputindo",
            "address" => "a[sd,poasmdpasdoask",
            "email" => "redaksi.emk@gramediapublishers.com"
        ]       
        );
        Publisher::create([
            "name" => "Grasindo",
            "address" => "a[sd,poasmdpasdoask",
            "email" => "redaksi.emk@gramediapublishers.com"
        ]       
        );
        Publisher::create([
            "name" => "BIP",
            "address" => "a[sd,poasmdpasdoask",
            "email" => "redaksi.emk@gramediapublishers.com"
        ]       
        );
    }
}
