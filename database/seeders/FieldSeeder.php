<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Field;




class FieldSeeder extends Seeder
{
    public function run()
    {
        // رياضة كرة القدم
        Field::create([
            'name' => 'Football Field 1',
            'image' => 'football_field_1.jpg',
            'price_per_hour' => 10,
            'location' => 'Amman, Jordan',
            'sport' => 'Football'
        ]);
        Field::create([
            'name' => 'Football Field 2',
            'image' => 'football_field_2.jpg',
            'price_per_hour' => 12,
            'location' => 'Amman, Jordan',
            'sport' => 'Football'
        ]);
        Field::create([
            'name' => 'Football Field 3',
            'image' => 'football_field_3.jpg',
            'price_per_hour' => 15,
            'location' => 'Amman, Jordan',
            'sport' => 'Football'
        ]);
        Field::create([
            'name' => 'Football Field 4',
            'image' => 'football_field_4.jpg',
            'price_per_hour' => 14,
            'location' => 'Amman, Jordan',
            'sport' => 'Football'
        ]);
        Field::create([
            'name' => 'Football Field 5',
            'image' => 'football_field_5.jpg',
            'price_per_hour' => 13,
            'location' => 'Amman, Jordan',
            'sport' => 'Football'
        ]);
        Field::create([
            'name' => 'Football Field 6',
            'image' => 'football_field_6.jpg',
            'price_per_hour' => 16,
            'location' => 'Amman, Jordan',
            'sport' => 'Football'
        ]);

        // رياضة كرة السلة
        Field::create([
            'name' => 'Basketball Court 1',
            'image' => 'basketball_court_1.jpg',
            'price_per_hour' => 8,
            'location' => 'Amman, Jordan',
            'sport' => 'Basketball'
        ]);
        Field::create([
            'name' => 'Basketball Court 2',
            'image' => 'basketball_court_2.jpg',
            'price_per_hour' => 9,
            'location' => 'Amman, Jordan',
            'sport' => 'Basketball'
        ]);
        Field::create([
            'name' => 'Basketball Court 3',
            'image' => 'basketball_court_3.jpg',
            'price_per_hour' => 10,
            'location' => 'Amman, Jordan',
            'sport' => 'Basketball'
        ]);
        Field::create([
            'name' => 'Basketball Court 4',
            'image' => 'basketball_court_4.jpg',
            'price_per_hour' => 11,
            'location' => 'Amman, Jordan',
            'sport' => 'Basketball'
        ]);
        Field::create([
            'name' => 'Basketball Court 5',
            'image' => 'basketball_court_5.jpg',
            'price_per_hour' => 12,
            'location' => 'Amman, Jordan',
            'sport' => 'Basketball'
        ]);
        Field::create([
            'name' => 'Basketball Court 6',
            'image' => 'basketball_court_6.jpg',
            'price_per_hour' => 14,
            'location' => 'Amman, Jordan',
            'sport' => 'Basketball'
        ]);

        // إضافة المزيد من الرياضات بنفس الطريقة...
    }
}

