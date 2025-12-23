<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('test')->insert([

            'header' => Str::random(10),
            'subHeader'=> Str::random(10),
            'description'=> Str::random(10),
            'headCategories'=> Str::random(10),
            'subCategories' => Str::random(10)
        ]);
    }
}
