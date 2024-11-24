<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */

    private $roleData = [
        ["role"=> "user"],
        ["role"=> "lessor"],
        ["role"=> "admin"]
    ];

    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(RoleSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(UserSeeder::class);
        $this->call(LessorSeeder::class);
        $this->call(PropertySeeder::class);
        $this->call(PropertyImageSeeder::class);
        $this->call(BookingSeeder::class);
    // Other seeders can be called here
    }
}
