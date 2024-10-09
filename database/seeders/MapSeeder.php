<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Map;

class MapSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Map::create([
            'link' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3650.3383266745946!2d90.36699521429804!3d23.80656539254687!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c72d1a5bf2a9%3A0x25a0f9a592e96ad8!2sLink-Up%20Technology%20Ltd.!5e0!3m2!1sen!2sbd!4v1655806317898!5m2!1sen!2sbd'
        ]);
    }
}
