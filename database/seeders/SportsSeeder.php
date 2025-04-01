<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class SportsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    DB::table('sports')->insert([
        [
            'title' => 'Football',
            'description_info' => 'Football is a globally popular sport played by two teams of eleven players.',
            'description_rule' => 'The game is played over 90 minutes with a 15-minute halftime break. The team with the most goals wins.',
            'image' => 'https://img.olympics.com/images/image/private/t_s_pog_staticContent_hero_lg_2x/f_auto/primary/sv4zhez2lyydydg8a4tb',
            'link_info' => 'https://inside.fifa.com/about-fifa',
            'link_rule' => 'https://inside.fifa.com/legal/documents',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'title' => 'Basketball',
            'description_info' => 'Basketball is a fast-paced sport played by two teams of five players each.',
            'description_rule' => 'Teams score points by shooting the ball through the opponent’s hoop. The game has four quarters of 12 minutes each.',
            'image' => 'https://slubillikens.com/images/2020/6/29/Chaifetz_baseline.jpg',
            'link_info' => 'https://www.nba.com/news/about',
            'link_rule' => 'https://official.nba.com/rulebook/',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'title' => 'Tennis',
            'description_info' => 'Tennis is an individual or doubles sport played with a racket and a ball on a rectangular court.',
            'description_rule' => 'A match is played in sets. Players win points by hitting the ball into the opponent’s side without return.',
            'image' => 'https://www.allabouttennis.co.uk/wp-content/uploads/2025/01/The-Biggest-Tennis-Stadiums-in-the-World.jpg',
            'link_info' => 'https://www.itftennis.com/',
            'link_rule' => 'https://www.itftennis.com/en/about-us/governance/rules-and-regulations/',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'title' => 'Chess',
            'description_info' => 'Chess is a strategic board game played between two players, aiming to checkmate the opponent’s king.',
            'description_rule' => 'Each player controls 16 pieces, and the game follows strict movement rules for each piece type.',
            'image' => 'https://premierchessacademy.com/wp-content/uploads/2025/01/bigstock-208614778-1024x683-1.jpg',
            'link_info' => 'https://www.fide.com/fide/about-fide#:~:text=The%20International%20Chess%20Federation%20(FIDE,Global%20Sporting%20Organization%20in%201999.',
            'link_rule' => 'https://www.fide.com/FIDE/handbook/LawsOfChess.pdf',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'title' => 'Volleyball',
            'description_info' => 'Volleyball is a team sport where two teams of six players hit a ball over a net.',
            'description_rule' => 'A team can hit the ball up to three times before sending it over the net. Matches are played in best-of-five sets.',
            'image' => 'https://smumustangs.com/images/2024/9/11/A1_02610.jpg',
            'link_info' => 'https://www.fivb.com/volleyball/',
            'link_rule' => 'https://www.fivb.com/volleyball/the-game/official-volleyball-rules/',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'title' => 'Padel',
            'description_info' => 'Padel is a racket sport that combines elements of tennis and squash, played in an enclosed court with walls.',
            'description_rule' => 'The game is played in doubles, and the ball can bounce off the walls. Scoring follows the same rules as tennis.',
            'image' => 'https://www.madrid-destino.com/sites/default/files/styles/activities_outstanding_image/public/2021-12/foto%20ok%20padel.png?itok=AWrqP89L',
            'link_info' => 'https://www.padelfip.com/who-we-are/#:~:text=The%20International%20Padel%20Federation%20(FIP,member%20federations%20and%20regional%20associations',
            'link_rule' => 'https://www.padelfip.com/documentation/',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
    ]);
}

}
