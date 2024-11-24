<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Lessor;

class LessorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $lessors = [
            [
                'phone_num' => '0798001234',
                'address' => '123 Amman Street, Amman, Jordan',
                'user_id' => 2,
            ],
            [
                'phone_num' => '0797123456',
                'address' => '45 Salt Road, Salt, Jordan',
                'user_id' => 3,
            ],
            [
                'phone_num' => '0778123456',
                'address' => '78 Aqaba Street, Aqaba, Jordan',
                'user_id' => 4,
            ],
            [
                'phone_num' => '0799001234',
                'address' => '89 Wadi Rum Village, Wadi Rum, Jordan',
                'user_id' => 5,
            ],
        ];

        foreach ($lessors as $lessor) {
            Lessor::create($lessor);
        }
    }
}
