<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {


        \App\Models\Owner::factory()->count(100)->hasCar(rand(1, 3))->create();

        \App\Models\Shortcodes::create(['shortcode' => 'Email', 'replace' => 'insurance@support.com']);
        \App\Models\Shortcodes::create(['shortcode' => 'Phone_number', 'replace' => '+212-994-9893']);
        \App\Models\Shortcodes::create(['shortcode' => 'Address', 'replace' => '47 W 13th St, New York, NY 10011, USA']);
    }
}
