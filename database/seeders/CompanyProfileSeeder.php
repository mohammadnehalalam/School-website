<?php

namespace Database\Seeders;
use App\Models\CompanyProfile;
use Illuminate\Database\Seeder;

class CompanyProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CompanyProfile::create([
            'name'    => 'Company Name',
            'phone'   => '01700000000',
            'email'   => 'info@domain.com',
            'address' => 'Address Here',
            'logo' => 'content/website/logo.png'
        ]);
    }
}
