<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Booking;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bookings = [
            [
                'user_id' => 6,
                'property_id' => 1,
                'status' => 'confirmed',
                'date' => '2024-08-01',
                'total_price' => 240, // 60% of 400
                'time_slot' => 'afternoon',
            ],
            [
                'user_id' => 7,
                'property_id' => 2,
                'status' => 'confirmed',
                'date' => '2024-08-05',
                'total_price' => 560, // 70% of 800
                'time_slot' => 'night',
            ],
            [
                'user_id' => 8,
                'property_id' => 1,
                'status' => 'confirmed',
                'date' => '2024-08-10',
                'total_price' => 280, // 70% of 400
                'time_slot' => 'night',
            ],
            [
                'user_id' => 9,
                'property_id' => 2,
                'status' => 'confirmed',
                'date' => '2024-08-15',
                'total_price' => 560, // 70% of 800
                'time_slot' => 'night',
            ],
            [
                'user_id' => 10,
                'property_id' => 3,
                'status' => 'confirmed',
                'date' => '2024-08-20',
                'total_price' => 1000, // Full day price
                'time_slot' => 'full day',
            ],
            [
                'user_id' => 11,
                'property_id' => 4,
                'status' => 'pending',
                'date' => '2024-08-25',
                'total_price' => 420, // 60% of 700
                'time_slot' => 'afternoon',
            ],
            [
                'user_id' => 12,
                'property_id' => 1,
                'status' => 'pending',
                'date' => '2024-08-30',
                'total_price' => 400, // Full day price
                'time_slot' => 'full day',
            ],
            [
                'user_id' => 13,
                'property_id' => 2,
                'status' => 'pending',
                'date' => '2024-09-01',
                'total_price' => 480, // 60% of 800
                'time_slot' => 'afternoon',
            ],
            [
                'user_id' => 14,
                'property_id' => 3,
                'status' => 'pending',
                'date' => '2024-09-03',
                'total_price' => 700, // 70% of 1000
                'time_slot' => 'night',
            ],
            [
                'user_id' => 15,
                'property_id' => 4,
                'status' => 'pending',
                'date' => '2024-09-07',
                'total_price' => 700, // Full day price
                'time_slot' => 'full day',
            ],
            [
                'user_id' => 6,
                'property_id' => 1,
                'status' => 'confirmed',
                'date' => '2024-08-02',
                'total_price' => 240, // 60% of 400
                'time_slot' => 'afternoon',
            ],
            [
                'user_id' => 7,
                'property_id' => 2,
                'status' => 'confirmed',
                'date' => '2024-08-06',
                'total_price' => 560, // 70% of 800
                'time_slot' => 'night',
            ],
            [
                'user_id' => 8,
                'property_id' => 3,
                'status' => 'pending',
                'date' => '2024-08-27',
                'total_price' => 1000, // Full day price
                'time_slot' => 'full day',
            ],
            [
                'user_id' => 9,
                'property_id' => 4,
                'status' => 'confirmed',
                'date' => '2024-08-16',
                'total_price' => 420, // 60% of 700
                'time_slot' => 'afternoon',
            ],
            [
                'user_id' => 10,
                'property_id' => 1,
                'status' => 'rejected',
                'date' => '2024-08-21',
                'total_price' => 280, // 70% of 400
                'time_slot' => 'night',
            ],
            [
                'user_id' => 11,
                'property_id' => 2,
                'status' => 'confirmed',
                'date' => '2024-08-26',
                'total_price' => 560, // 70% of 800
                'time_slot' => 'night',
            ],
            [
                'user_id' => 12,
                'property_id' => 3,
                'status' => 'pending',
                'date' => '2024-09-02',
                'total_price' => 1000, // Full day price
                'time_slot' => 'full day',
            ],
            [
                'user_id' => 13,
                'property_id' => 4,
                'status' => 'confirmed',
                'date' => '2024-09-04',
                'total_price' => 420, // 60% of 700
                'time_slot' => 'afternoon',
            ],
            [
                'user_id' => 14,
                'property_id' => 1,
                'status' => 'rejected',
                'date' => '2024-09-06',
                'total_price' => 280, // 70% of 400
                'time_slot' => 'night',
            ],
            [
                'user_id' => 15,
                'property_id' => 2,
                'status' => 'confirmed',
                'date' => '2024-09-07',
                'total_price' => 560, // 70% of 800
                'time_slot' => 'night',
            ],
            [
                'user_id' => 6,
                'property_id' => 5,
                'status' => 'confirmed',
                'date' => '2024-08-01',
                'total_price' => 240, // 60% of 400
                'time_slot' => 'afternoon',
            ],
            [
                'user_id' => 7,
                'property_id' => 6,
                'status' => 'pending',
                'date' => '2024-08-03',
                'total_price' => 280, // 70% of 400
                'time_slot' => 'night',
            ],
            [
                'user_id' => 8,
                'property_id' => 7,
                'status' => 'confirmed',
                'date' => '2024-08-05',
                'total_price' => 420, // 60% of 700
                'time_slot' => 'afternoon',
            ],
            [
                'user_id' => 9,
                'property_id' => 8,
                'status' => 'pending',
                'date' => '2024-08-07',
                'total_price' => 630, // 70% of 900
                'time_slot' => 'night',
            ],
            [
                'user_id' => 10,
                'property_id' => 9,
                'status' => 'confirmed',
                'date' => '2024-08-09',
                'total_price' => 600, // 60% of 1000
                'time_slot' => 'afternoon',
            ],
            [
                'user_id' => 11,
                'property_id' => 10,
                'status' => 'rejected',
                'date' => '2024-08-11',
                'total_price' => 770, // 70% of 1100
                'time_slot' => 'night',
            ],
            [
                'user_id' => 12,
                'property_id' => 11,
                'status' => 'confirmed',
                'date' => '2024-08-13',
                'total_price' => 960, // 60% of 1600
                'time_slot' => 'afternoon',
            ],
            [
                'user_id' => 13,
                'property_id' => 12,
                'status' => 'pending',
                'date' => '2024-08-15',
                'total_price' => 1050, // 70% of 1500
                'time_slot' => 'night',
            ],
            [
                'user_id' => 14,
                'property_id' => 13,
                'status' => 'confirmed',
                'date' => '2024-08-17',
                'total_price' => 720, // 60% of 1200
                'time_slot' => 'afternoon',
            ],
            [
                'user_id' => 15,
                'property_id' => 14,
                'status' => 'confirmed',
                'date' => '2024-08-19',
                'total_price' => 910, // 70% of 1300
                'time_slot' => 'night',
            ],
            [
                'user_id' => 6,
                'property_id' => 5,
                'status' => 'pending',
                'date' => '2024-08-21',
                'total_price' => 1080, // 60% of 1800
                'time_slot' => 'afternoon',
            ],
            [
                'user_id' => 7,
                'property_id' => 6,
                'status' => 'confirmed',
                'date' => '2024-08-23',
                'total_price' => 1190, // 70% of 1700
                'time_slot' => 'night',
            ],
            [
                'user_id' => 8,
                'property_id' => 7,
                'status' => 'rejected',
                'date' => '2024-08-25',
                'total_price' => 960, // 60% of 1600
                'time_slot' => 'afternoon',
            ],
            [
                'user_id' => 9,
                'property_id' => 8,
                'status' => 'confirmed',
                'date' => '2024-08-27',
                'total_price' => 1050, // 70% of 1500
                'time_slot' => 'night',
            ],
            [
                'user_id' => 10,
                'property_id' => 9,
                'status' => 'pending',
                'date' => '2024-08-29',
                'total_price' => 1200, // 60% of 2000
                'time_slot' => 'afternoon',
            ],
            [
                'user_id' => 11,
                'property_id' => 10,
                'status' => 'confirmed',
                'date' => '2024-08-31',
                'total_price' => 980, // 70% of 1400
                'time_slot' => 'night',
            ],
            [
                'user_id' => 12,
                'property_id' => 11,
                'status' => 'rejected',
                'date' => '2024-09-01',
                'total_price' => 720, // 60% of 1200
                'time_slot' => 'afternoon',
            ],
            [
                'user_id' => 13,
                'property_id' => 12,
                'status' => 'confirmed',
                'date' => '2024-09-02',
                'total_price' => 1190, // 70% of 1700
                'time_slot' => 'night',
            ],
            [
                'user_id' => 14,
                'property_id' => 13,
                'status' => 'pending',
                'date' => '2024-09-03',
                'total_price' => 900, // 60% of 1500
                'time_slot' => 'afternoon',
            ],
            [
                'user_id' => 15,
                'property_id' => 14,
                'status' => 'confirmed',
                'date' => '2024-09-04',
                'total_price' => 840, // 70% of 1200
                'time_slot' => 'night',
            ],
            [
                'user_id' => 6,
                'property_id' => 5,
                'status' => 'pending',
                'date' => '2024-09-05',
                'total_price' => 780, // 60% of 1300
                'time_slot' => 'afternoon',
            ],
            [
                'user_id' => 7,
                'property_id' => 6,
                'status' => 'confirmed',
                'date' => '2024-09-06',
                'total_price' => 1190, // 70% of 1700
                'time_slot' => 'night',
            ],
            [
                'user_id' => 8,
                'property_id' => 7,
                'status' => 'confirmed',
                'date' => '2024-09-07',
                'total_price' => 1020, // 60% of 1700
                'time_slot' => 'afternoon',
            ],
            [
                'user_id' => 9,
                'property_id' => 8,
                'status' => 'rejected',
                'date' => '2024-09-01',
                'total_price' => 1120, // 70% of 1600
                'time_slot' => 'night',
            ],
            [
                'user_id' => 10,
                'property_id' => 9,
                'status' => 'pending',
                'date' => '2024-09-02',
                'total_price' => 720, // 60% of 1200
                'time_slot' => 'afternoon',
            ],
            [
                'user_id' => 11,
                'property_id' => 10,
                'status' => 'confirmed',
                'date' => '2024-09-03',
                'total_price' => 840, // 70% of 1200
                'time_slot' => 'night',
            ],
            [
                'user_id' => 12,
                'property_id' => 11,
                'status' => 'pending',
                'date' => '2024-09-04',
                'total_price' => 780, // 60% of 1300
                'time_slot' => 'afternoon',
            ],
            [
                'user_id' => 13,
                'property_id' => 12,
                'status' => 'confirmed',
                'date' => '2024-09-05',
                'total_price' => 1050, // 70% of 1500
                'time_slot' => 'night',
            ],
            [
                'user_id' => 14,
                'property_id' => 13,
                'status' => 'rejected',
                'date' => '2024-09-06',
                'total_price' => 960, // 60% of 1600
                'time_slot' => 'afternoon',
            ],
            [
                'user_id' => 15,
                'property_id' => 14,
                'status' => 'confirmed',
                'date' => '2024-09-07',
                'total_price' => 1120, // 70% of 1600
                'time_slot' => 'night',
            ],
        ];

        foreach ($bookings as $booking) {
            Booking::create($booking);
        }
    }
}
