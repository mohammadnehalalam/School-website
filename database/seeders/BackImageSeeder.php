<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BackImage;
class BackImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BackImage::create([
            'bgimage' => 'EmbeddedImage.jpg',

        ]);
    }
}
