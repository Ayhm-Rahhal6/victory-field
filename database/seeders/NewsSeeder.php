<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    DB::table('news')->insert([
        [
            'title' => 'Real Madrid qualifies for the Champions League semi-finals',
            'description' => 'Real Madrid qualified for the Champions League semi-finals after defeating Atletico Madrid.',
            'image' => 'https://cdn.vox-cdn.com/thumbor/QVD6eVPjBAmww33FbN6phrrSTnA=/1400x788/filters:format(jpeg)/cdn.vox-cdn.com/uploads/chorus_asset/file/25577482/2166161452.jpg',
            'logo' => 'https://c8.alamy.com/comp/2G9YTTY/official-uefa-champions-league-icon-vector-illustration-logo-isolated-on-transparent-background-2G9YTTY.jpg',
            'source' => 'Champions League',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'title' => 'Barcelona leads the Spanish League',
            'description' => 'Barcelona tops La Liga after defeating Villarreal.',
            'image' => 'https://cnn-arabic-images.cnn.io/cloudinary/image/upload/w_1920,c_scale,q_auto/cnnarabic/2023/10/02/images/250921.jpg',
            'logo' => 'https://brandlogos.net/wp-content/uploads/2023/07/la_liga-logo_brandlogos.net_e6gnt.png',
            'source' => 'laliga',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'title' => 'FIFA announces the draw date for the 2026 World Cup',
            'description' => 'The FIFA World Cup 2026 will be held in Qatar from November 20 to December 18, 2026.',
            'image' => 'https://e0.365dm.com/24/11/768x432/skysports-world-cup-tuchel_6748956.jpg?20241115123944',
            'logo' => 'https://static.vecteezy.com/system/resources/thumbnails/012/251/871/small/world-cup-in-qatar-logo-on-white-background-vector.jpg',
            'source' => 'FIFA',
            'created_at' => now(),
            'updated_at' => now(),
        ],
    ]);
}

}
