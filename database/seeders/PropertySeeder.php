<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Property;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $properties = [
            // Property ID 1
            [
                'lessor_id' => 1,
                'category_id' => 2,
                'name' => 'Wedding and Vacation Farm South',
                'description' => 'Nestled in the lush landscapes of Salt, the Wedding and Vacation Farm South is a picturesque destination perfect for weddings, family reunions, and peaceful getaways. This expansive property combines the elegance of modern architecture with the rustic charm of a traditional Jordanian farm. Guests can enjoy panoramic views of rolling hills, orchards, and meticulously manicured gardens, providing a serene backdrop for any event. The farm features multiple outdoor seating areas, a large event space, and luxurious accommodations that can comfortably host up to 100 guests. Its strategic location near Dababneh Circle makes it easily accessible while still offering privacy and tranquility.',
                'location' => 'Jordan',
                'address' => 'Salt, near Dababneh circle',
                'price_per_full_day' => 400,
                'availability' => 1,
                'capacity' => 100,
                'image' => 'WVF-SOUTH-2024',
            ],
            // Property ID 2
            [
                'lessor_id' => 1,
                'category_id' => 2,
                'name' => 'Villa Shams',
                'description' => 'Villa Shams is an exquisite luxury villa located on the serene shores of the Dead Sea in Jordan. The villa offers breathtaking views of the sea and the surrounding mountains, making it an ideal retreat for those seeking tranquility and natural beauty. With its spacious interiors, modern amenities, and beautifully landscaped gardens, Villa Shams is perfect for hosting events, family gatherings, or simply enjoying a peaceful vacation. The villa includes a private pool, outdoor lounge areas, and direct access to a secluded beach. Located just a short drive from Amman, Villa Shams combines the convenience of city access with the seclusion of a private retreat.',
                'location' => 'Jordan',
                'address' => 'Dead Sea, near Amman',
                'price_per_full_day' => 1000,
                'availability' => 1,
                'capacity' => 80,
                'image' => 'WVF-SOUTH-2024',
            ],
            // Property ID 3
            [
                'lessor_id' => 1,
                'category_id' => 3,
                'name' => 'Beach Front Property',
                'description' => 'This Beach Front Property is a luxurious seaside retreat located in the heart of Aqaba, offering unparalleled views of the Red Sea. Designed with elegance and comfort in mind, the property features contemporary architecture with expansive windows that let in natural light and provide stunning ocean vistas from every room. The property includes a private beach, infinity pool, and outdoor dining areas perfect for enjoying sunsets over the water. Whether you’re looking to relax on the beach, explore the vibrant marine life, or host an intimate gathering, this property provides the ideal setting. Its proximity to the main marina ensures easy access to water sports, dining, and shopping, making it a top choice for both relaxation and adventure.',
                'location' => 'Jordan',
                'address' => 'Aqaba, near the main marina',
                'price_per_full_day' => 1000,
                'availability' => 1,
                'capacity' => 60,
                'image' => 'WVF-SOUTH-2024',
            ],
            // Property ID 4
            [
                'lessor_id' => 1,
                'category_id' => 5,
                'name' => 'Desert Oasis Retreat',
                'description' => 'Experience the serenity and majesty of the Wadi Rum desert at the Desert Oasis Retreat. This unique property is nestled among the dramatic sandstone mountains and vast expanses of the Jordanian desert, offering guests an immersive experience in one of the world’s most breathtaking natural landscapes. The retreat is designed with eco-friendly principles in mind, combining traditional Bedouin architecture with modern amenities. Guests can enjoy stargazing from the comfort of their private tents, take guided tours through the desert, or relax in the oasis-inspired central courtyard. The retreat features multiple tents, each with luxurious interiors, en-suite bathrooms, and panoramic views of the desert. The property’s secluded location ensures complete privacy, making it the perfect getaway for those seeking tranquility and adventure.',
                'location' => 'Jordan',
                'address' => 'Wadi Rum, near the Lawrence’s Spring',
                'price_per_full_day' => 700,
                'availability' => 1,
                'capacity' => 50,
                'image' => 'WVF-SOUTH-2024',
            ],
            // Property ID 5
            [
                'lessor_id' => 2,
                'category_id' => 5,
                'name' => 'Wadi Rum Luxury Camp',
                'description' => 'Nestled within the majestic rock formations of Wadi Rum, the Wadi Rum Luxury Camp offers an unparalleled desert experience. This exclusive camp blends the rich heritage of Bedouin culture with modern luxury, providing a unique retreat in the heart of the Jordanian desert. The camp features elegantly designed tents with spacious interiors, each equipped with en-suite bathrooms, air conditioning, and private terraces offering breathtaking views of the surrounding landscape. Guests can indulge in traditional Jordanian cuisine under the stars, explore the desert on guided camel tours, or relax in the serene surroundings of the camp’s central courtyard. The property’s remote location guarantees privacy and tranquility, making it an ideal destination for those seeking a luxurious escape in the wilderness.',
                'location' => 'Jordan',
                'address' => 'Wadi Rum, near the Khazali Canyon',
                'price_per_full_day' => 900,
                'availability' => 1,
                'capacity' => 200,
                'image' => 'WVF-SOUTH-2024',
            ],
            // Property ID 6
            [
                'lessor_id' => 2,
                'category_id' => 1,
                'name' => 'Amman Palace Hotel',
                'description' => 'Situated in the heart of Amman, Amman Palace Hotel offers guests a luxurious stay with easy access to the vibrant capital of Jordan. The hotel’s design captures the modern essence of Amman while incorporating elements of traditional Jordanian architecture. Guests can enjoy spacious rooms, a rooftop terrace with panoramic views of the city, and a full-service spa. The hotel also offers exclusive guided tours of Amman, allowing guests to explore the city’s rich history, from the ancient Roman Amphitheatre to the Citadel, all in comfort and style. Amman Palace Hotel is the perfect base for those looking to immerse themselves in the dynamic culture and history of Jordan’s capital.',
                'location' => 'Jordan',
                'address' => 'Amman, near the Roman Amphitheatre',
                'price_per_full_day' => 1200,
                'availability' => 1,
                'capacity' => 150,
                'image' => 'WVF-SOUTH-2024',
            ],
            // Property ID 7
            [
                'lessor_id' => 2,
                'category_id' => 3,
                'name' => 'Red Sea Vista',
                'description' => 'Red Sea Vista is a beachfront property located in Irbid, offering breathtaking views of the Red Sea and the surrounding mountains. The property features modern, elegant interiors with floor-to-ceiling windows that provide stunning ocean vistas from every room. Guests can relax on the private beach, take a dip in the infinity pool, or enjoy a meal at the on-site restaurant, which serves fresh, locally sourced seafood. The property is also just a short drive from Aqaba’s main marina, offering easy access to water sports, diving, and other activities. Red Sea Vista is the perfect retreat for those seeking both relaxation and adventure in a stunning natural setting.',
                'location' => 'Jordan',
                'address' => 'Irbid, near west border',
                'price_per_full_day' => 1100,
                'availability' => 1,
                'capacity' => 70,
                'image' => 'WVF-SOUTH-2024',
            ],
            // Property ID 8
            [
                'lessor_id' => 2,
                'category_id' => 4,
                'name' => 'Historical Downtown Villa',
                'description' => 'This Historical Downtown Villa is a beautifully preserved property in the heart of Amman, just steps away from the city’s most famous landmarks. The villa’s architecture reflects the rich history of the area, with traditional stone walls, arched doorways, and intricate woodwork. Inside, the villa offers modern amenities and luxurious furnishings, making it the perfect blend of old-world charm and contemporary comfort. Guests can relax in the private garden, enjoy a meal in the formal dining room, or explore the nearby Roman Amphitheatre and Citadel. The villa’s central location makes it an ideal base for exploring Amman’s vibrant cultural scene.',
                'location' => 'Jordan',
                'address' => 'Amman, near the Roman Amphitheatre',
                'price_per_full_day' => 950,
                'availability' => 1,
                'capacity' => 120,
                'image' => 'WVF-SOUTH-2024',
            ],
            // Property ID 9
            [
                'lessor_id' => 2,
                'category_id' => 2,
                'name' => 'Entire villa in Amman Badr Al Jadedah',
                'description' => 'A two Floor s and Loft Villa in a 24/7 guarded gated community. It is adjacent to the affluent Dabouq area in Western Amman at 14 minutes drive to Amman City Mall, Restaurants and grocery stores. It provides a western view of West Bank and Dead Sea. The Villa has its private pool and jacuzzi. The 1st and 2nd floor of the villa has 3 Bedrooms, 2.5 Bathrooms, Living and Dinning areas and full kitchen. The 100 m2 loft has 1 bedroom, 1.5 Bath Rooms, living area, fireplace and full kitchen.',
                'location' => 'Jordan',
                'address' => 'Amman, Badr Al Jadedah',
                'price_per_full_day' => 600,
                'availability' => 1,
                'capacity' => 40,
                'image' => 'WVF-SOUTH-2024',
            ],
            // Property ID 10
            [
                'lessor_id' => 3,
                'category_id' => 1,
                'name' => 'Luxury Amman Hotel',
                'description' => 'Located in the heart of Jordan’s bustling capital, Luxury Amman Hotel offers world-class accommodations and amenities for both business and leisure travelers. The hotel features stylish, contemporary rooms with panoramic views of the city, a rooftop pool, and multiple dining options, including a fine-dining restaurant serving international cuisine. The hotel’s prime location in the city center provides easy access to Amman’s main attractions, including the Citadel, Rainbow Street, and the Jordan Museum. Whether you’re visiting for work or pleasure, Luxury Amman Hotel offers the perfect combination of comfort, convenience, and luxury.',
                'location' => 'Jordan',
                'address' => 'Amman, near the Citadel',
                'price_per_full_day' => 1300,
                'availability' => 1,
                'capacity' => 200,
                'image' => 'WVF-SOUTH-2024',
            ],
            // Property ID 11
            [
                'lessor_id' => 3,
                'category_id' => 2,
                'name' => 'Shams Farm',
                'description' => 'Featuring a garden, Shams Farm features accommodations in Ajloun. This property offers access to a terrace, free private parking, and free Wifi. Ajloun Castle is 4.3 miles away and Ruins of Jerash is 15 miles from the chalet. The chalet consists of 2 bedrooms, a living room, a fully equipped kitchen with an oven and a kettle, and 2 bathrooms with a walk-in shower and a bidet. Guests can take in the views of the mountain from the balcony, which also has outdoor furniture. There is also a seating area and a fireplace, The chalet also comes with outdoor fireplace and a picnic area for a day outdoors. Al Yarmok University is 19 miles from the chalet. The nearest airport is Queen Alia International Airport, 60 miles from Shams Farm.',
                'location' => 'Jordan',
                'address' => 'Ajloun, near Al Yarmok University',
                'price_per_full_day' => 800,
                'availability' => 1,
                'capacity' => 60,
                'image' => 'WVF-SOUTH-2024',
            ],
            // Property ID 12
            [
                'lessor_id' => 3,
                'category_id' => 2,
                'name' => 'Al Bassam Farm',
                'description' => 'Al Bassam Farm is a beautifully restored property located in the heart of Irbid, known for its rich history and vibrant culture. The house features traditional Jordanian architecture with modern comforts, including spacious living areas, a fully equipped kitchen, and luxurious bedrooms. Guests can explore the nearby St. George’s Church, home to the famous Mosaic Map, or wander through the bustling streets of Madaba, filled with shops, cafes, and markets. The Madaba Heritage House offers a unique opportunity to experience Jordanian culture and hospitality in a historic setting.',
                'location' => 'Jordan',
                'address' => 'Irbid, near beit ras',
                'price_per_full_day' => 290,
                'availability' => 1,
                'capacity' => 100,
                'image' => 'WVF-SOUTH-2024',
            ],
            // Property ID 13
            [
                'lessor_id' => 3,
                'category_id' => 5,
                'name' => 'Sun City Camp',
                'description' => 'Immerse yourself in an unforgettable desert experience without forgoing the comfort of home. Sun City invites guests into the heart of the magnificent desert landscape, offering a unique and luxurious way of camping. This Dome comes with your own private bathroom, air condition and terrace. We also offer buffet style breakfast and dinner included in the nightly rate. Extra bed is available opponent request.',
                'location' => 'Jordan',
                'address' => 'Dome in Wadi Rum Village',
                'price_per_full_day' => 550,
                'availability' => 1,
                'capacity' => 150,
                'image' => 'WVF-SOUTH-2024',
            ],
            // Property ID 14
            [
                'lessor_id' => 4,
                'category_id' => 1,
                'name' => 'The Ritz-Carlton, Amman',
                'description' => 'Take advantage of a poolside bar, 2 coffee shops/cafes, and a garden at The Ritz-Carlton, Amman. Treat yourself to a body scrub, a body treatment, or a manicure/pedicure at ESPA, the onsite spa. Be sure to enjoy a meal at any of the 8 on-site restaurants. Fitness classes are offered at the gym; the property also has a hair salon, dry cleaning/laundry services, and 3 bars. In addition to a 24-hour business center and a steam room, guests can connect to free WiFi in public areas. All 226 rooms include comforts such as premium bedding and laptop-compatible safes, in addition to thoughtful touches like laptop-friendly workspaces and air conditioning.',
                'location' => 'Jordan',
                'address' => 'Amman, near third circle',
                'price_per_full_day' => 1100,
                'availability' => 1,
                'capacity' => 50,
                'image' => 'WVF-SOUTH-2024',
            ]
        ];

        foreach ($properties as $property) {
            $property['image'] = 'property_images/credentials/' . $property['image'] . '.jpg';
            Property::create($property);
        }
    }
}
