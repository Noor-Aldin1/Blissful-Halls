<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            // Admin
            [
                'name' => 'Admin',
                'email' => 'admin1@gmail.com',
                'password' => Hash::make('admin123'),
                'photo' => 'property_images/user.jpg',
                'role_id' => 3,
            ],
            // Lessors with Jordanian Names
            [
                'name' => 'Hassan Abu Zaid',
                'email' => 'h.abuzaid@gmail.com',
                'password' => Hash::make('lessor123'),
                'photo' => 'property_images/user.jpg',
                'role_id' => 2,
            ],
            [
                'name' => 'Salah Al-Din',
                'email' => 's.aldin@gmail.com',
                'password' => Hash::make('lessor123'),
                'photo' => 'property_images/user.jpg',
                'role_id' => 2,
            ],
            [
                'name' => 'Khalil Ibrahim',
                'email' => 'k.ibrahim@gmail.com',
                'password' => Hash::make('lessor123'),
                'photo' => 'property_images/user.jpg',
                'role_id' => 2,
            ],
            [
                'name' => 'Lina Al-Mahdi',
                'email' => 'l.almahdi@gmail.com',
                'password' => Hash::make('lessor123'),
                'photo' => 'property_images/user.jpg',
                'role_id' => 2,
            ],
            // Users with Jordanian Names
            [
                'name' => 'Mohammad Hossien',
                'email' => 'm.hossien@gmail.com',
                'password' => Hash::make('user123'),
                'photo' => 'property_images/user.jpg',
                'role_id' => 1,
            ],
            [
                'name' => 'Ahmad Khaled',
                'email' => 'a.khaled@gmail.com',
                'password' => Hash::make('user123'),
                'photo' => 'property_images/user.jpg',
                'role_id' => 1,
            ],
            [
                'name' => 'Omar Al-Masri',
                'email' => 'o.almasri@gmail.com',
                'password' => Hash::make('user123'),
                'photo' => 'property_images/user.jpg',
                'role_id' => 1,
            ],
            [
                'name' => 'Alaa Al-Jaber',
                'email' => 'a.aljaber@gmail.com',
                'password' => Hash::make('user123'),
                'photo' => 'property_images/user.jpg',
                'role_id' => 1,
            ],
            [
                'name' => 'Hana Abed',
                'email' => 'h.abed@gmail.com',
                'password' => Hash::make('user123'),
                'photo' => 'property_images/user.jpg',
                'role_id' => 1,
            ],
            [
                'name' => 'Sami Al-Zein',
                'email' => 's.alzein@gmail.com',
                'password' => Hash::make('user123'),
                'photo' => 'property_images/user.jpg',
                'role_id' => 1,
            ],
            [
                'name' => 'Maya Bader',
                'email' => 'm.bader@gmail.com',
                'password' => Hash::make('user123'),
                'photo' => 'property_images/user.jpg',
                'role_id' => 1,
            ],
            [
                'name' => 'Layla Al-Rashid',
                'email' => 'l.alrashid@gmail.com',
                'password' => Hash::make('user123'),
                'photo' => 'property_images/user.jpg',
                'role_id' => 1,
            ],
            [
                'name' => 'Youssef Al-Najjar',
                'email' => 'y.alnajjar@gmail.com',
                'password' => Hash::make('user123'),
                'photo' => 'property_images/user.jpg',
                'role_id' => 1,
            ],
            [
                'name' => 'Nadia Al-Taher',
                'email' => 'n.altaher@gmail.com',
                'password' => Hash::make('user123'),
                'photo' => 'property_images/user.jpg',
                'role_id' => 1,
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
