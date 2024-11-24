<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert(["name" => "Hotel"]);
        DB::table('categories')->insert(["name" => "Farm"]);
        DB::table('categories')->insert(["name" => "Historical Homes"]);
        DB::table('categories')->insert(["name" => "BeachFront"]);
        DB::table('categories')->insert(["name" => "Desert"]);
    }
}
